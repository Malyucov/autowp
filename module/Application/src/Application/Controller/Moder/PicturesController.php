<?php

namespace Application\Controller\Moder;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql;
use Zend\Db\TableGateway\TableGateway;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

use Autowp\Comments;
use Autowp\Commons\Paginator\Adapter\Zend1DbTableSelect;
use Autowp\Message\MessageService;
use Autowp\Traffic\TrafficControl;
use Autowp\User\Model\DbTable\User;
use Autowp\User\Model\DbTable\User\Row as UserRow;

use Application\DuplicateFinder;
use Application\Form\Moder\Inbox as InboxForm;
use Application\HostManager;
use Application\Model\Brand as BrandModel;
use Application\Model\DbTable;
use Application\Model\DbTable\Perspective;
use Application\Model\DbTable\Picture;
use Application\Model\DbTable\Item;
use Application\Model\Log;
use Application\Model\PictureItem;
use Application\Model\UserPicture;
use Application\PictureNameFormatter;
use Application\Service\TelegramService;

use Zend_Db_Expr;
use Zend_Db_Table_Rowset;

class PicturesController extends AbstractActionController
{
    private $table;

    /**
     * @var DbTable\Item\ParentTable
     */
    private $itemParentTable;

    private $textStorage;

    /**
     * @var Form
     */
    private $pictureForm;

    /**
     * @var Form
     */
    private $copyrightsForm;

    /**
     * @var Form
     */
    private $voteForm;

    /**
     * @var Form
     */
    private $banForm;

    /**
     * @var HostManager
     */
    private $hostManager;

    /**
     * @var PictureNameFormatter
     */
    private $pictureNameFormatter;

    /**
     * @var TelegramService
     */
    private $telegram;

    /**
     * @var MessageService
     */
    private $message;

    /**
     * @var TrafficControl
     */
    private $trafficControl;

    /**
     * @var PictureItem
     */
    private $pictureItem;

    /**
     * @var DuplicateFinder
     */
    private $duplicateFinder;

    /**
     * @var Comments\CommentsService
     */
    private $comments;

    /**
     * @var UserPicture
     */
    private $userPicture;
    
    /**
     * @var TableGateway
     */
    private $voteTemplateTable;

    private function getCarParentTable()
    {
        return $this->itemParentTable
            ? $this->itemParentTable
            : $this->itemParentTable = new DbTable\Item\ParentTable();
    }

    public function __construct(
        HostManager $hostManager,
        Picture $table,
        $textStorage,
        Form $pictureForm,
        Form $copyrightsForm,
        Form $voteForm,
        Form $banForm,
        PictureNameFormatter $pictureNameFormatter,
        TelegramService $telegram,
        MessageService $message,
        TrafficControl $trafficControl,
        PictureItem $pictureItem,
        DuplicateFinder $duplicateFinder,
        Comments\CommentsService $comments,
        Log $log,
        UserPicture $userPicture,
        Adapter $adapter
    ) {

        $this->hostManager = $hostManager;
        $this->table = $table;
        $this->textStorage = $textStorage;
        $this->pictureForm = $pictureForm;
        $this->copyrightsForm = $copyrightsForm;
        $this->voteForm = $voteForm;
        $this->banForm = $banForm;
        $this->pictureNameFormatter = $pictureNameFormatter;
        $this->telegram = $telegram;
        $this->message = $message;
        $this->trafficControl = $trafficControl;
        $this->pictureItem = $pictureItem;
        $this->duplicateFinder = $duplicateFinder;
        $this->comments = $comments;
        $this->log = $log;
        $this->userPicture = $userPicture;
        
        $this->voteTemplateTable = new TableGateway('picture_moder_vote_template', $adapter);
    }

    public function ownerTypeaheadAction()
    {
        $query = $this->params()->fromQuery('query');

        $users = new User();

        $selects = [];

        $selects[] = $users->select(true)
            ->join(['p' => 'pictures'], 'users.id = p.owner_id', null)
            ->group('users.id')
            ->where('users.id like ?', $query . '%')
            ->limit(10);

        $selects[] = $users->select(true)
            ->join(['p' => 'pictures'], 'users.id = p.owner_id', null)
            ->group('users.id')
            ->where('users.login like ?', $query . '%')
            ->limit(10);

        $selects[] = $users->select(true)
            ->join(['p' => 'pictures'], 'users.id = p.owner_id', null)
            ->group('users.id')
            ->where('users.identity like ?', $query . '%')
            ->limit(10);

        $selects[] = $users->select(true)
            ->join(['p' => 'pictures'], 'users.id = p.owner_id', null)
            ->group('users.id')
            ->where('users.name like ?', $query . '%')
            ->limit(10);


        $options = [];
        foreach ($selects as $select) {
            if (count($options) < 10) {
                foreach ($users->fetchAll($select) as $user) {
                    $str = ['#' . $user->id];
                    if ($user->name) {
                        $str[] = $user->name;
                        if ($user->login) {
                            $str[] = '(' . $user->login . ')';
                        }
                    } else {
                        $str[] = $user->login;
                    }
                    $options[$user->id] = implode(' ', $str);
                }
            }
        }

        return new JsonModel(array_values($options));
    }

    private function getFilterForm($status)
    {
        $db = $this->table->getAdapter();

        $brandMultioptions = [];

        $form = new InboxForm(null, [
            'perspectiveOptions' => [
                ''     => 'moder/pictures/filter/perspective/any',
                'null' => 'moder/pictures/filter/perspective/empty'
            ] + $db->fetchPairs(
                $db
                    ->select()
                    ->from('perspectives', ['id', 'name'])
                    ->order('position')
            ),
            'brandOptions'       => [
                '' => 'moder/pictures/filter/brand/any'
            ] + $brandMultioptions,
        ]);

        $form->setAttribute('action', $this->url()->fromRoute(null, [
            'action' => 'index'
        ]));

        return $form;
    }

    public function indexAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $perPage = 24;

        $orders = [
            1 => ['sql' => 'pictures.add_date DESC'],
            2 => ['sql' => 'pictures.add_date'],
            3 => ['sql' => ['pictures.width DESC', 'pictures.height DESC']],
            4 => ['sql' => ['pictures.width', 'pictures.height']],
            5 => ['sql' => 'pictures.filesize DESC'],
            6 => ['sql' => 'pictures.filesize'],
            7 => ['sql' => 'comment_topic.messages DESC'],
            8 => ['sql' => 'picture_view.views DESC'],
            9 => ['sql' => 'pdr.day_date DESC'],
            10 => ['sql' => 'df_distance.distance ASC'],
            11 => ['sql' => ['pictures.removing_date DESC', 'pictures.id']],
            12 => ['sql' => 'picture_vote_summary.positive DESC'],
            13 => ['sql' => 'picture_vote_summary.negative DESC'],
        ];

        if ($this->getRequest()->isPost()) {
            $form = $this->getFilterForm(Picture::STATUS_INBOX);
            $form->setData($this->params()->fromPost());
            if ($form->isValid()) {
                $post = $form->getData();
                foreach ($post as $key => $value) {
                    if (strlen($value) == 0) {
                        unset($post[$key]);
                    }
                }
                $post['action'] = 'index';
                return $this->redirect()->toRoute('moder/pictures/params', $post);
            }
        } else {
            $form = $this->getFilterForm($this->params('status'));
            $form->setData($this->params()->fromRoute());
            $form->isValid();
        }

        $formdata = $form->getData();

        $select = $this->table->select(true)
            ->group('pictures.id');

        $joinPdr = false;
        $joinLeftComments = false;
        $joinComments = false;
        $pictureItemJoined = false;
        $similarPictureJoined = false;

        if (strlen($formdata['status'])) {
            switch ($formdata['status']) {
                case Picture::STATUS_INBOX:
                case Picture::STATUS_ACCEPTED:
                case Picture::STATUS_REMOVING:
                    $select->where('pictures.status = ?', $formdata['status']);
                    break;
                case 'custom1':
                    $select->where('pictures.status not in (?)', [
                        Picture::STATUS_REMOVING,
                        Picture::STATUS_REMOVED
                    ]);
                    break;
            }
        }

        if ($formdata['item_id']) {
            if (! $pictureItemJoined) {
                $pictureItemJoined = true;
                $select->join('picture_item', 'pictures.id = picture_item.picture_id', null);
            }
            $select
                ->join('item_parent_cache', 'picture_item.item_id = item_parent_cache.item_id', null)
                ->where('item_parent_cache.parent_id = ?', $formdata['item_id']);
        }

        if ($formdata['perspective_id']) {
            if (! $pictureItemJoined) {
                $pictureItemJoined = true;
                $select->join('picture_item', 'pictures.id = picture_item.picture_id', null);
            }
            if ($formdata['perspective_id'] == 'null') {
                $select->where('picture_item.perspective_id IS NULL');
            } else {
                $select->where('picture_item.perspective_id = ?', $formdata['perspective_id']);
            }
        }

        if (strlen($formdata['comments'])) {
            if ($formdata['comments'] == '1') {
                $joinComments = true;
                $select->where('comment_topic.messages > 0');
            } elseif ($formdata['comments'] == '0') {
                $joinLeftComments = true;
                $select->where('comment_topic.messages = 0 or comment_topic.messages is null');
            }
        }

        if ($formdata['owner_id']) {
            $select->where('pictures.owner_id = ?', $formdata['owner_id']);
        }

        if ($formdata['car_type_id']) {
            if (! $pictureItemJoined) {
                $pictureItemJoined = true;
                $select->join('picture_item', 'pictures.id = picture_item.picture_id', null);
            }
            $select
                ->join('item', 'picture_item.item_id = item.id', null)
                ->join('car_types_parents', 'item.car_type_id=car_types_parents.id', null)
                ->where('car_types_parents.parent_id = ?', $formdata['car_type_id']);
        }

        if ($formdata['special_name']) {
            $select->where('pictures.name <> "" and pictures.name is not null');
        }

        if ($formdata['similar']) {
            $formdata['order'] = 10;
            $select
                ->join('df_distance', 'pictures.id = df_distance.src_picture_id', null)
                ->where('not df_distance.hide');

            if (strlen($formdata['status'])) {
                if (! $similarPictureJoined) {
                    $similarPictureJoined = true;
                    $select->join(['similar' => 'pictures'], 'df_distance.dst_picture_id = similar.id', null);
                }

                switch ($formdata['status']) {
                    case Picture::STATUS_INBOX:
                    case Picture::STATUS_ACCEPTED:
                    case Picture::STATUS_REMOVING:
                        $select->where('similar.status = ?', $formdata['status']);
                        break;
                    case 'custom1':
                        $select->where('similar.status not in (?)', [
                        Picture::STATUS_REMOVING,
                        Picture::STATUS_REMOVED
                        ]);
                        break;
                }
            }
        }

        if (strlen($formdata['requests'])) {
            switch ($formdata['requests']) {
                case '0':
                    $select
                        ->joinLeft(['pdr' => 'pictures_moder_votes'], 'pictures.id=pdr.picture_id', null)
                        ->where('pdr.picture_id IS NULL');
                    break;

                case '1':
                    $select
                        ->join(['pdr' => 'pictures_moder_votes'], 'pictures.id=pdr.picture_id', null)
                        ->where('pdr.vote > 0');
                    break;

                case '2':
                    $select
                        ->join(['pdr' => 'pictures_moder_votes'], 'pictures.id=pdr.picture_id', null)
                        ->where('pdr.vote <= 0');
                    break;

                case '3':
                    $joinPdr = true;
                    break;
            }
        }

        if (strlen($formdata['replace'])) {
            if ($formdata['replace'] == '1') {
                $select->where('pictures.replace_picture_id');
            } elseif ($formdata['replace'] == '0') {
                $select->where('pictures.replace_picture_id is null');
            }
        }

        if ($formdata['lost']) {
            $select
                ->joinLeft(
                    ['pi_left' => 'picture_item'],
                    'pictures.id = pi_left.picture_id',
                    null
                )
                ->where('pi_left.item_id IS NULL');
        }

        if ($formdata['gps']) {
            $select->where('pictures.point IS NOT NULL');
        }

        if ($formdata['order']) {
            $select->order($orders[$formdata['order']]['sql']);
            switch ($formdata['order']) {
                case 7:
                    $joinLeftComments = true;
                    break;
                case 8:
                    $select->joinLeft('picture_view', 'pictures.id = picture_view.picture_id', null);
                    break;
                case 9:
                    $joinPdr = true;
                    break;
                case 12:
                    $select
                        ->join('picture_vote_summary', 'pictures.id = picture_vote_summary.picture_id', null)
                        ->where('picture_vote_summary.positive > 0');
                    break;
                case 13:
                    $select
                        ->join('picture_vote_summary', 'pictures.id = picture_vote_summary.picture_id', null)
                        ->where('picture_vote_summary.negative > 0');
                    break;
            }
        } else {
            $select->order($orders[1]['sql']);
        }

        if ($joinPdr) {
            $select
                ->join(['pdr' => 'pictures_moder_votes'], 'pictures.id=pdr.picture_id', null);
        }

        if ($joinLeftComments) {
            $expr = 'pictures.id = comment_topic.item_id and ' .
                    $this->table->getAdapter()->quoteInto(
                        'comment_topic.type_id = ?',
                        \Application\Comments::PICTURES_TYPE_ID
                    );
            $select->joinLeft('comment_topic', $expr, null);
        } elseif ($joinComments) {
            $select
                ->join('comment_topic', 'pictures.id = comment_topic.item_id', null)
                ->where('comment_topic.type_id = ?', \Application\Comments::PICTURES_TYPE_ID);
        }

        $paginator = new \Zend\Paginator\Paginator(
            new Zend1DbTableSelect($select)
        );

        $paginator
            ->setItemCountPerPage($perPage)
            ->setCurrentPageNumber($this->params('page'));

        $select->limitPage($paginator->getCurrentPageNumber(), $paginator->getItemCountPerPage());

        $picturesData = $this->pic()->listData($select, [
            'width' => 4
        ]);

        if ($this->user()->inheritsRole('moder')) {
            $perspectives = new Perspective();
            $multioptions = $perspectives->getAdapter()->fetchPairs(
                $perspectives->getAdapter()->select()
                    ->from($perspectives->info('name'), ['id', 'name'])
                    ->order('position')
            );

            $multioptions = array_replace([
                '' => '--'
            ], $multioptions);

            foreach ($picturesData['items'] as &$pictureItem) {
                $itemIds = $this->pictureItem->getPictureItemsByType($pictureItem['id'], [
                    DbTable\Item\Type::VEHICLE,
                    DbTable\Item\Type::BRAND
                ]);

                if (count($itemIds) == 1) {
                    $itemId = $itemIds[0];

                    $perspective = $this->pictureItem->getPerspective($pictureItem['id'], $itemId);

                    $pictureItem['perspective'] = [
                        'options' => $multioptions,
                        'url'     => $this->url()->fromRoute('api/picture-item', [
                            'picture_id' => $pictureItem['id'],
                            'item_id'    => $itemId
                        ]),
                        'value'   => $perspective,
                        'user'    => null
                    ];
                }

                $pictureItem['similar'] = null;
                $similar = $this->duplicateFinder->findSimilar($pictureItem['id']);
                if ($similar) {
                    $similarRow = $this->table->find($similar['picture_id'])->current();
                    if ($similarRow) {
                        $pictureItem['similar'] = [
                            'url'      => $this->pictureUrl($similarRow),
                            'distance' => $similar['distance']
                        ];
                    }
                }
            }
        }
        unset($pictureItem);

        $reasons = [];
        
        $user = $this->user()->get();
        
        if ($user) {
            $select = new Sql\Select($this->voteTemplateTable->getTable());
            $select
                ->columns(['reason', 'vote'])
                ->where(['user_id' => $user['id']])
                ->order('reason');
        
            foreach ($this->voteTemplateTable->selectWith($select) as $row) {
                $reasons[] = $row['reason'];
            }
        }
        
        $reasons = array_combine($reasons, $reasons);


        return [
            'paginator'    => $paginator,
            'picturesData' => $picturesData,
            'form'         => $form,
            'reasons'      => $reasons
        ];
    }

    private function pictureUrl(DbTable\Picture\Row $picture, $forceCanonical = false, $uri = null)
    {
        return $this->url()->fromRoute('moder/pictures/params', [
            'action'     => 'picture',
            'picture_id' => $picture->id
        ], [
            'force_canonical' => $forceCanonical,
            'uri'             => $uri
        ]);
    }

    private function pictureCanDelete($picture)
    {
        $canDelete = false;
        if ($picture->canDelete()) {
            $user = $this->user()->get();
            if ($this->user()->isAllowed('picture', 'remove')) {
                if ($this->pictureVoteExists($picture, $user)) {
                    $canDelete = true;
                }
            } elseif ($this->user()->isAllowed('picture', 'remove_by_vote')) {
                if ($this->pictureVoteExists($picture, $user)) {
                    $db = $this->table->getAdapter();
                    $acceptVotes = (int)$db->fetchOne(
                        $db->select()
                            ->from('pictures_moder_votes', [new Zend_Db_Expr('COUNT(1)')])
                            ->where('picture_id = ?', $picture->id)
                            ->where('vote > 0')
                    );
                    $deleteVotes = (int)$db->fetchOne(
                        $db->select()
                            ->from('pictures_moder_votes', [new Zend_Db_Expr('COUNT(1)')])
                            ->where('picture_id = ?', $picture->id)
                            ->where('vote = 0')
                    );

                    $canDelete = ($deleteVotes > $acceptVotes);
                }
            }
        }

        return $canDelete;
    }


    private function pictureVoteExists($picture, $user)
    {
        $db = $this->table->getAdapter();
        return $db->fetchOne(
            $db->select()
                ->from('pictures_moder_votes', new Zend_Db_Expr('COUNT(1)'))
                ->where('picture_id = ?', $picture->id)
                ->where('user_id = ?', $user->id)
        );
    }

    public function deletePictureAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        $canDelete = $this->pictureCanDelete($picture);
        if (! $canDelete) {
            return $this->forbiddenAction();
        }

        $user = $this->user()->get();
        $picture->setFromArray([
            'status'                => Picture::STATUS_REMOVING,
            'removing_date'         => new Zend_Db_Expr('CURDATE()'),
            'change_status_user_id' => $user->id
        ]);
        $picture->save();

        if ($owner = $picture->findParentRow(User::class, 'Owner')) {
            if ($owner->id != $user->id) {
                $uri = $this->hostManager->getUriByLanguage($owner->language);

                $requests = new DbTable\Picture\ModerVote();
                $deleteRequests = $requests->fetchAll(
                    $requests->select()
                        ->where('picture_id = ?', $picture->id)
                        ->where('vote = 0')
                );

                $reasons = [];
                if (count($deleteRequests)) {
                    foreach ($deleteRequests as $request) {
                        if ($user = $request->findParentRow(User::class)) {
                            $reasons[] = $this->userModerUrl($user, true, $uri) . ' : ' . $request->reason;
                        }
                    }
                }

                $message = sprintf(
                    $this->translate('pm/your-picture-%s-enqueued-to-remove-%s', 'default', $owner->language),
                    $this->pic()->url($picture->identity, true, $uri),
                    implode("\n", $reasons)
                );

                $this->message->send(null, $owner->id, $message);
            }
        }

        $this->log(sprintf(
            'Картинка %s поставлена в очередь на удаление',
            htmlspecialchars($this->pic()->name($picture, $this->language()))
        ), $picture);

        return $this->redirect()->toUrl($this->pictureUrl($picture));
    }

    /**
     * @param UserRow $user
     * @param bool $full
     * @param \Zend\Uri\Uri $uri
     * @return string
     */
    private function userModerUrl(UserRow $user, $full = false, $uri = null)
    {
        return $this->url()->fromRoute('users/user', [
            'user_id' => $user->identity ? $user->identity : 'user' . $user->id
        ], [
            'force_canonical' => $full,
            'uri'             => $uri
        ]);
    }

    private function notifyVote($picture, $vote, $reason)
    {
        $owner = $picture->findParentRow(User::class, 'Owner');
        $ownerIsModer = $owner && $this->user($owner)->inheritsRole('moder');
        if ($ownerIsModer) {
            if ($owner->id != $this->user()->get()->id) {
                $uri = $this->hostManager->getUriByLanguage($owner->language);

                $message = sprintf(
                    $this->translate(
                        $vote
                            ? 'pm/new-picture-%s-vote-%s/accept'
                            : 'pm/new-picture-%s-vote-%s/delete',
                        'default',
                        $owner->language
                    ),
                    $this->pictureUrl($picture, true, $uri),
                    $reason
                );

                $this->message->send(null, $owner->id, $message);
            }
        }
    }

    public function pictureVoteAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        $hideVote = (bool)$this->params('hide-vote');

        $canDelete = $this->pictureCanDelete($picture);

        $isLastPicture = null;
        if ($picture->status == Picture::STATUS_ACCEPTED) {
            $db = $this->table->getAdapter();
            $isLastPicture = ! $db->fetchOne(
                $db->select()
                    ->from('pictures', [new Zend_Db_Expr('COUNT(1)')])
                    ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
                    ->join(
                        ['pi2' => 'picture_item'],
                        'picture_item.item_id = pi2.item_id',
                        null
                    )
                    ->where('pi2.picture_id = ?', $picture->id)
                    ->where('pictures.status = ?', Picture::STATUS_ACCEPTED)
                    ->where('pictures.id <> ?', $picture->id)
            );
        }

        $db = $this->table->getAdapter();
        $acceptedCount = $db->fetchOne(
            $db->select()
                ->from('pictures', [new Zend_Db_Expr('COUNT(1)')])
                ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
                ->join(
                    ['pi2' => 'picture_item'],
                    'picture_item.item_id = pi2.item_id',
                    null
                )
                ->where('pi2.picture_id = ?', $picture->id)
                ->where('status = ?', Picture::STATUS_ACCEPTED)
        );

        $user = $this->user()->get();
        $voteExists = $this->pictureVoteExists($picture, $user);

        $request = $this->getRequest();

        if (! $voteExists && $this->user()->isAllowed('picture', 'moder_vote')) {
            $this->voteForm->setAttribute('action', $this->url()->fromRoute('moder/pictures/params', [
                'action'     => 'picture-vote',
                'form'       => 'picture-vote',
                'picture_id' => $picture->id
            ], [], true));
        }

        $moderVotes = null;
        if (! $hideVote) {
            $moderVotes = $picture->findDependentRowset(DbTable\Picture\ModerVote::class);
        }

        return [
            'isLastPicture'     => $isLastPicture,
            'acceptedCount'     => $acceptedCount,
            'canDelete'         => $canDelete,
            'deleteUrl'         => $this->url()->fromRoute('moder/pictures/params', [
                'action'     => 'delete-picture',
                'picture_id' => $picture->id,
                'form'       => 'picture-delete'
            ]),
            'formPictureVote'   => $this->voteForm,
            'unvoteUrl'         => $this->url()->fromRoute('moder/pictures/params', [
                'action'     => 'picture-vote',
                'form'       => 'picture-unvote',
                'picture_id' => $picture->id
            ]),
            'moderVotes'        => $moderVotes
        ];
    }

    public function pictureAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        $prevPicture = $this->table->fetchRow(
            $this->table->select(true)
                 ->where('id < ?', $picture->id)
                 ->order('id DESC')
                 ->limit(1)
        );

        $nextPicture = $this->table->fetchRow(
            $this->table->select(true)
                 ->where('id > ?', $picture->id)
                 ->order('id')
                 ->limit(1)
        );

        $prevNewPicture = $this->table->fetchRow(
            $this->table->select(true)
                 ->where('id < ?', $picture->id)
                 ->where('status = ?', Picture::STATUS_INBOX)
                 ->order('id DESC')
                 ->limit(1)
        );

        $nextNewPicture = $this->table->fetchRow(
            $this->table->select(true)
                 ->where('id > ?', $picture->id)
                 ->where('status = ?', Picture::STATUS_INBOX)
                 ->order('id')
                 ->limit(1)
        );


        $ban = false;
        $canBan = $this->user()->isAllowed('user', 'ban') && $picture->ip !== null && $picture->ip !== '';
        $canViewIp = $this->user()->isAllowed('user', 'ip');

        if ($canBan) {
            $ban = $this->trafficControl->getBanInfo(inet_ntop($picture->ip));
            if ($ban) {
                $userTable = new User();
                $ban['user'] = $userTable->find($ban['user_id'])->current();
            }
        }

        $this->pictureForm->setAttribute('action', $this->url()->fromRoute(null, [
            'form' => 'picture-edit'
        ], [], true));

        $this->pictureForm->populateValues([
            'name' => $picture->name
        ]);
        $request = $this->getRequest();
        if ($request->isPost() && $this->params()->fromRoute('form') == 'picture-edit') {
            $this->pictureForm->setData($this->params()->fromPost());
            if ($this->pictureForm->isValid()) {
                $values = $this->pictureForm->getData();
                $picture->setFromArray([
                    'name' => $values['name']
                ]);
                $picture->save();

                return $this->redirect()->toUrl($this->pictureUrl($picture));
            }
        }

        $this->copyrightsForm->setAttribute('action', $this->url()->fromRoute(null, [
            'form' => 'copyrights-edit'
        ], [], true));
        if ($picture->copyrights_text_id) {
            $text = $this->textStorage->getText($picture->copyrights_text_id);
            $this->copyrightsForm->populateValues([
                'text' => $text
            ]);
        }
        if ($request->isPost() && ($this->params()->fromRoute('form') == 'copyrights-edit')) {
            $this->copyrightsForm->setData($this->params()->fromPost());
            if ($this->copyrightsForm->isValid()) {
                $values = $this->copyrightsForm->getData();

                $text = $values['text'];

                $user = $this->user()->get();

                if ($picture->copyrights_text_id) {
                    $this->textStorage->setText($picture->copyrights_text_id, $text, $user->id);
                } elseif ($text) {
                    $textId = $this->textStorage->createText($text, $user->id);
                    $picture->copyrights_text_id = $textId;
                    $picture->save();
                }

                $this->log(sprintf(
                    'Редактирование текста копирайтов изображения %s',
                    htmlspecialchars($this->pic()->name($picture, $this->language()))
                ), $picture);

                if ($picture->copyrights_text_id) {
                    $userIds = $this->textStorage->getTextUserIds($picture->copyrights_text_id);

                    $userTable = new User();
                    foreach ($userIds as $userId) {
                        if ($userId != $user->id) {
                            foreach ($userTable->find($userId) as $userRow) {
                                $uri = $this->hostManager->getUriByLanguage($userRow->language);

                                $message = sprintf(
                                    $this->translate(
                                        'pm/user-%s-edited-picture-copyrights-%s-%s',
                                        'default',
                                        $userRow->language
                                    ),
                                    $this->userModerUrl($user, true, $uri),
                                    $this->pic()->name($picture, $userRow->language),
                                    $this->pictureUrl($picture, true, $uri)
                                );

                                $this->message->send(null, $userRow->id, $message);
                            }
                        }
                    }
                }

                return $this->redirect()->toUrl($this->pictureUrl($picture));
            }
        }

        $imageStorage = $this->imageStorage();
        $iptcStr = $imageStorage->getImageIPTC($picture->image_id);

        $exif = $imageStorage->getImageEXIF($picture->image_id);

        $exifStr = '';
        $notSections = ['FILE', 'COMPUTED'];
        if ($exif !== false) {
            foreach ($exif as $key => $section) {
                if (array_search($key, $notSections) !== false) {
                    continue;
                }

                $exifStr .= '<p>['.htmlspecialchars($key).']';
                foreach ($section as $name => $val) {
                    $exifStr .= "<br />".htmlspecialchars($name).": ";
                    if (is_array($val)) {
                        $exifStr .= htmlspecialchars(implode(', ', $val));
                    } else {
                        $exifStr .= htmlspecialchars($val);
                    }
                }

                $exifStr .= '</p>';
            }
        }

        $canMove = $this->user()->isAllowed('picture', 'move');

        $lastCar = null;
        $namespace = new \Zend\Session\Container('Moder_Car');
        if (isset($namespace->lastCarId)) {
            $cars = new Item();
            $car = $cars->find($namespace->lastCarId)->current();

            if ($car) {
                $exists = $this->pictureItem->isExists($picture->id, $car->id);

                if (! $exists) {
                    $lastCar = $car;
                }
            }
        }

        $unacceptPictureForm = null;

        $canUnaccept = ($picture->status == Picture::STATUS_ACCEPTED)
                    && $this->user()->isAllowed('picture', 'unaccept');

        if ($canUnaccept) {
            if ($request->isPost() && $this->params('form') == 'picture-unaccept') {
                $this->unaccept($picture);

                $referer = $this->getRequest()->getServer('HTTP_REFERER');
                return $this->redirect()->toUrl($referer ? $referer : $this->url()->fromRoute(null, [], [], true));
            }
        }

        $canAccept = $this->canAccept($picture);

        if ($canAccept) {
            if ($request->isPost() && $this->params('form') == 'picture-accept') {
                $this->accept($picture);

                $referer = $request->getServer('HTTP_REFERER');
                $url = $referer ? $referer : $this->url()->fromRoute(null, [], [], true);
                return $this->redirect()->toUrl($url);
            }
        }

        $canRestore = $this->canRestore($picture);

        $replacePicture = null;
        if ($picture->replace_picture_id) {
            $row = $this->table->find($picture->replace_picture_id)->current();
            if ($row) {
                $canAcceptReplace = $this->canReplace($picture, $row);

                $replacePicture = [
                    'url' => $this->url()->fromRoute('moder/pictures/params', [
                        'action'     => 'picture',
                        'picture_id' => $row->id
                    ], [], true),
                    'canAccept' => $canAcceptReplace,
                    'acceptUrl' => $this->url()->fromRoute('moder/pictures/params', [
                        'action'     => 'accept-replace',
                        'picture_id' => $picture->id
                    ], [], true),
                    'cancelUrl' => $this->url()->fromRoute('moder/pictures/params', [
                        'action'     => 'cancel-replace',
                        'picture_id' => $picture->id
                    ], [], true),
                ];
            }
        }

        $imageStorage = $this->imageStorage();

        $image = $imageStorage->getImage($picture->image_id);

        if (! $image) {
            return $this->notFoundAction();
        }

        $sourceUrl = $image->getSrc();

        $image = $imageStorage->getFormatedImage($picture->getFormatRequest(), 'picture-gallery-full');
        $galleryFullUrl = null;
        if ($image) {
            $galleryFullUrl = $image->getSrc();
        }


        $canCrop = $this->canCrop();
        $crop = false;

        if ($canCrop) {
            if ($picture->cropParametersExists()) {
                $crop = [
                    (int)$picture->crop_left,  (int)$picture->crop_top,
                    (int)$picture->crop_width, (int)$picture->crop_height,
                ];
            } else {
                $crop = [
                    0, 0,
                    (int)$picture->width, (int)$picture->height,
                ];
            }
        }

        if ($canBan) {
            $this->banForm->setAttribute('action', $this->url()->fromRoute('ban/ban-ip', [
                'ip' => inet_ntop($picture->ip)
            ]));
            $this->banForm->populateValues([
                'submit' => 'ban/ban'
            ]);
        }

        $perspectives = new Perspective();

        $multioptions = $perspectives->getAdapter()->fetchPairs(
            $perspectives->getAdapter()->select()
                ->from($perspectives->info('name'), ['id', 'name'])
                ->order('position')
        );

        $multioptions = array_replace([
            '' => '--'
        ], $multioptions);

        $items = [];
        $itemIds = $this->pictureItem->getPictureItems($picture['id']);
        $itemTable = new Item();
        foreach ($itemTable->find($itemIds) as $item) {
            $brandModel = new BrandModel();
            $relatedBrands = $brandModel->getList($this->language(), function ($select) use ($item) {
                $select
                    ->join('item_parent_cache', 'item.id = item_parent_cache.parent_id', null)
                    ->where('item_parent_cache.item_id = ?', $item['id'])
                    ->group('item.id');
            });

            $area = $this->pictureItem->getArea($picture['id'], $item['id']);
            $hasArea = true;
            if (! $area) {
                $hasArea = false;
                $area = [
                    0, 0,
                    (int)$picture->width, (int)$picture->height,
                ];
            }

            $items[] = [
                'item_id'     => $item['id'],
                'row'         => $item,
                'perspective' => [
                    'options' => $multioptions,
                    'url'     => $this->url()->fromRoute('api/picture-item', [
                        'picture_id' => $picture['id'],
                        'item_id'    => $item['id']
                    ]),
                    'value'   => $this->pictureItem->getPerspective($picture->id, $item['id'])
                ],
                'relatedBrands' => $relatedBrands,
                'removeUrl'     => $this->url()->fromRoute('moder/picture-item/params', [
                    'action'     => 'remove',
                    'picture_id' => $picture->id,
                    'item_id'    => $item['id']
                ]),
                'canRemove'     => count($itemIds) > 1,
                'area' => [
                    'sourceUrl' => $sourceUrl,
                    'crop'      => [
                        'x' => $area[0],
                        'y' => $area[1],
                        'w' => $area[2],
                        'h' => $area[3],
                    ],
                    'width'     => $picture->width,
                    'height'    => $picture->height,
                    'saveUrl'   => $this->url()->fromRoute('moder/picture-item/params', [
                        'action'     => 'save-area',
                        'picture_id' => $picture->id,
                        'item_id'    => $item['id']
                    ])
                ],
                'hasArea' => $hasArea
            ];
        }

        $similarPicture = null;
        $similar = $this->duplicateFinder->findSimilar($picture['id']);
        if ($similar) {
            $similarRow = $this->table->find($similar['picture_id'])->current();
            if ($similarRow) {
                $similarPicture = [
                    'url'           => $this->pictureUrl($similarRow),
                    'distance'      => $similar['distance'],
                    'formatRequest' => $similarRow->getFormatRequest(),
                    'hideUrl'       => $this->url()->fromRoute('moder/pictures/params', [
                        'action'  => 'hide-similar',
                        'id'      => $picture['id'],
                        'dest_id' => $similarRow['id']
                    ])
                ];
            }
        }

        return [
            'ban'             => $ban,
            'canBan'          => $canBan,
            'canViewIp'       => $canViewIp,
            'prevPicture'     => $prevPicture,
            'nextPicture'     => $nextPicture,
            'prevNewPicture'  => $prevNewPicture,
            'nextNewPicture'  => $nextNewPicture,
            'editPictureForm' => $this->pictureForm,
            'copyrightsForm'  => $this->copyrightsForm,
            'picture'                       => $picture,
            'canMove'                       => $canMove,
            'canNormalize'                  => $this->canNormalize($picture),
            'canCrop'                       => $this->canCrop(),
            'canFlop'                       => $this->canFlop($picture),
            'canRestore'                    => $canRestore,
            'canAccept'                     => $canAccept,
            'canUnaccept'                   => $canUnaccept,
            'unacceptUrl'                   => $this->url()->fromRoute(null, [
                'form' => 'picture-unaccept'
            ], [], true),
            'acceptUrl'                     => $this->url()->fromRoute(null, [
                'form' => 'picture-accept'
            ], [], true),
            'restoreUrl'                    => $this->url()->fromRoute(null, [
                'action' => 'restore'
            ], [], true),
            'iptc'                          => $iptcStr,
            'exif'                          => $exifStr,
            'lastCar'                       => $lastCar,
            'galleryFullUrl'                => $galleryFullUrl,
            'sourceUrl'                     => $sourceUrl,
            'replacePicture'                => $replacePicture,
            'crop'                          => $crop,
            'banForm'                       => $this->banForm,
            'pictureVote'                   => $this->pictureVote($picture->id, []),
            'items'                         => $items,
            'similarPicture'                => $similarPicture
        ];
    }

    public function hideSimilarAction()
    {
        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $srcPicture = $this->table->find($this->params('id'))->current();
        $dstPicture = $this->table->find($this->params('dest_id'))->current();

        if (! $srcPicture || ! $dstPicture) {
            return $this->notFoundAction();
        }

        $this->duplicateFinder->hideSimilar($srcPicture['id'], $dstPicture['id']);

        $this->log('Отменёно предупреждение о повторе', [$srcPicture, $dstPicture]);

        return $this->redirect()->toUrl($this->pictureUrl($srcPicture));
    }

    private function canCrop()
    {
        return $this->user()->isAllowed('picture', 'crop');
    }

    private function canNormalize(DbTable\Picture\Row $picture)
    {
        return in_array($picture->status, [Picture::STATUS_INBOX])
            && $this->user()->isAllowed('picture', 'normalize');
    }

    private function canFlop(DbTable\Picture\Row $picture)
    {
        return in_array($picture->status, [Picture::STATUS_INBOX, Picture::STATUS_REMOVING])
            && $this->user()->isAllowed('picture', 'flop');
    }

    private function canRestore(DbTable\Picture\Row $picture)
    {
        return $picture->status == Picture::STATUS_REMOVING
            && $this->user()->isAllowed('picture', 'restore');
    }

    public function restoreAction()
    {
        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();

        if (! $picture) {
            return $this->notFoundAction();
        }

        if (! $this->canRestore($picture)) {
            return $this->forbiddenAction();
        }

        $user = $this->user()->get();
        $picture->setFromArray([
            'status'                => Picture::STATUS_INBOX,
            'change_status_user_id' => $user->id
        ]);
        $picture->save();

        $this->log(sprintf(
            'Картинки `%s` восстановлена из очереди удаления',
            htmlspecialchars($this->pic()->name($picture, $this->language()))
        ), $picture);

        $referer = $this->getRequest()->getServer('HTTP_REFERER');
        return $this->redirect()->toUrl($referer ? $referer : $this->url()->fromRoute(null, [], [], true));
    }

    public function flopAction()
    {
        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        if (! $this->canFlop($picture)) {
            return $this->forbiddenAction();
        }

        if ($picture->image_id) {
            $this->imageStorage()->flop($picture->image_id);
        }

        $this->log(sprintf(
            'К картинке %s применён flop',
            htmlspecialchars($this->pic()->name($picture, $this->language()))
        ), $picture);

        return new JsonModel([
            'ok' => true
        ]);
    }

    public function normalizeAction()
    {
        if (! $this->getRequest()->isPost()) {
            return $this->notFoundAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        if (! $this->canNormalize($picture)) {
            return $this->notFoundAction();
        }

        if ($picture->image_id) {
            $this->imageStorage()->normalize($picture->image_id);
        }

        $this->log(sprintf(
            'К картинке %s применён normalize',
            htmlspecialchars($this->pic()->name($picture, $this->language()))
        ), $picture);

        return new JsonModel([
            'ok' => true
        ]);
    }

    public function filesRepairAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        if ($picture->image_id) {
            $this->imageStorage()->flush([
                'image' => $picture->image_id
            ]);
        }

        return new JsonModel([
            'ok' => true
        ]);
    }

    public function filesCorrectNamesAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->notFoundAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        $this->imageStorage()->changeImageName($picture->image_id, [
            'pattern' => $picture->getFileNamePattern(),
        ]);

        return new JsonModel([
            'ok' => true
        ]);
    }

    public function cropperSaveAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture || ! $this->canCrop()) {
            return $this->notFoundAction();
        }

        $left = round($this->params()->fromPost('x'));
        $top = round($this->params()->fromPost('y'));
        $width = round($this->params()->fromPost('w'));
        $height = round($this->params()->fromPost('h'));

        $left = max(0, $left);
        $left = min($picture->width, $left);
        $width = max(1, $width);
        $width = min($picture->width, $width);

        $top = max(0, $top);
        $top = min($picture->height, $top);
        $height = max(1, $height);
        $height = min($picture->height, $height);

        if ($left > 0 || $top > 0 || $width < $picture->width || $height < $picture->height) {
            $picture->setFromArray([
                'crop_left'   => $left,
                'crop_top'    => $top,
                'crop_width'  => $width,
                'crop_height' => $height
            ]);
        } else {
            $picture->setFromArray([
                'crop_left'   => null,
                'crop_top'    => null,
                'crop_width'  => null,
                'crop_height' => null
            ]);
        }
        $picture->save();

        $this->imageStorage()->flush([
            'image' => $picture->image_id
        ]);

        $this->log(sprintf(
            'Выделение области на картинке %s',
            htmlspecialchars($this->pic()->name($picture, $this->language()))
        ), [$picture]);

        return new JsonModel([
            'ok' => true
        ]);
    }

    private function prepareCars(Zend_Db_Table_Rowset $rows)
    {
        $itemParentTable = $this->getCarParentTable();
        $itemParentAdapter = $itemParentTable->getAdapter();

        $cars = [];
        foreach ($rows as $row) {
            $haveChilds = (bool)$itemParentAdapter->fetchOne(
                $itemParentAdapter->select()
                    ->from($itemParentTable->info('name'), new Zend_Db_Expr('1'))
                    ->where('parent_id = ?', $row->id)
            );
            $cars[] = [
                'name' => $this->car()->formatName($row, $this->language()),
                'url'  => $this->url()->fromRoute(null, [
                    'action'  => 'move',
                    'item_id' => $row['id']
                ], [], true),
                'haveChilds' => $haveChilds,
                'isGroup'    => $row->is_group,
                'type'       => null,
                'loadUrl'    => $this->url()->fromRoute(null, [
                    'action'  => 'car-childs',
                    'item_id' => $row['id']
                ], [], true),
            ];
        }

        return $cars;
    }

    private function prepareCarParentRows($rows)
    {
        $itemParentTable = $this->getCarParentTable();
        $itemParentAdapter = $itemParentTable->getAdapter();
        $itemTable = new Item();

        $items = [];
        foreach ($rows as $itemParentRow) {
            $car = $itemTable->find($itemParentRow->item_id)->current();
            if ($car) {
                $haveChilds = (bool)$itemParentAdapter->fetchOne(
                    $itemParentAdapter->select()
                        ->from($itemParentTable->info('name'), new Zend_Db_Expr('1'))
                        ->where('parent_id = ?', $car->id)
                );
                $items[] = [
                    'name' => $this->car()->formatName($car, $this->language()),
                    'url'  => $this->url()->fromRoute(null, [
                        'action' => 'move',
                        'item_id' => $car['id']
                    ], [], true),
                    'haveChilds' => $haveChilds,
                    'isGroup'    => $car['is_group'],
                    'type'       => $itemParentRow->type,
                    'loadUrl'    => $this->url()->fromRoute(null, [
                        'action' => 'car-childs',
                        'item_id' => $car['id']
                    ], [], true),
                ];
            }
        }

        return $items;
    }

    public function carChildsAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $user = $this->user()->get();
        if (! $user) {
            return $this->forbiddenAction();
        }

        $itemTable = new Item();
        $itemParentTable = $this->getCarParentTable();

        $car = $itemTable->find($this->params('item_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $rows = $itemParentTable->fetchAll(
            $itemParentTable->select(true)
                ->join('item', 'item.id = item_parent.item_id', null)
                ->where('item_parent.parent_id = ?', $car->id)
                ->order([
                    'item_parent.type',
                    'item.begin_order_cache',
                    'item.end_order_cache',
                    'item.name',
                    'item.body',
                    'item.spec_id'
                ])
        );

        $viewModel = new ViewModel([
            'cars' => $this->prepareCarParentRows($rows)
        ]);
        $viewModel->setTerminal(true);

        return $viewModel;
    }

    public function conceptsAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $itemTable = new DbTable\Item();
        $brand = $itemTable->fetchRow([
            'id = ?'           => (int)$this->params('brand_id'),
            'item_type_id = ?' => DbTable\Item\Type::BRAND
        ]);
        if (! $brand) {
            return $this->notFoundAction();
        }

        $rows = $itemTable->fetchAll(
            $itemTable->select(true)
                ->join('item_parent_cache', 'item.id = item_parent_cache.item_id', null)
                ->where('item_parent_cache.parent_id = ?', $brand->id)
                ->where('item.is_concept')
                ->order(['item.name', 'item.begin_year', 'item.end_year'])
                ->group('item.id')
        );
        $concepts = $this->prepareCars($rows);

        $viewModel = new ViewModel([
            'concepts' => $concepts,
        ]);
        return $viewModel->setTerminal(true);
    }

    private function canReplace($picture, $replacedPicture)
    {
        $can1 = false;
        switch ($picture->status) {
            case Picture::STATUS_ACCEPTED:
                $can1 = true;
                break;

            case Picture::STATUS_INBOX:
                $can1 = $this->user()->isAllowed('picture', 'accept');
                break;
        }

        $can2 = false;
        switch ($replacedPicture->status) {
            case Picture::STATUS_ACCEPTED:
                $can2 = $this->user()->isAllowed('picture', 'unaccept')
                     && $this->user()->isAllowed('picture', 'remove_by_vote');
                break;

            case Picture::STATUS_INBOX:
                $can2 = $this->user()->isAllowed('picture', 'remove_by_vote');
                break;

            case Picture::STATUS_REMOVING:
            case Picture::STATUS_REMOVED:
                $can2 = true;
                break;
        }

        return $can1 && $can2 && $this->user()->isAllowed('picture', 'move');
    }

    public function cancelReplaceAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        if (! $picture->replace_picture_id) {
            return $this->notFoundAction();
        }

        $replacePicture = $this->table->find($picture->replace_picture_id)->current();
        if (! $replacePicture) {
            return $this->notFoundAction();
        }

        if (! $this->user()->isAllowed('picture', 'move')) {
            return $this->forbiddenAction();
        }

        $picture->replace_picture_id = null;
        $picture->save();

        // log
        $this->log(sprintf(
            'Замена %s на %s отклонена',
            htmlspecialchars($this->pic()->name($replacePicture, $this->language())),
            htmlspecialchars($this->pic()->name($picture, $this->language()))
        ), [$picture, $replacePicture]);

        return $this->redirect()->toRoute(null, [
            'action' => 'picture'
        ], [], true);
    }

    public function acceptReplaceAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        if (! $picture->replace_picture_id) {
            return $this->notFoundAction();
        }

        $replacePicture = $this->table->find($picture->replace_picture_id)->current();
        if (! $replacePicture) {
            return $this->notFoundAction();
        }

        if (! $this->canReplace($picture, $replacePicture)) {
            return $this->forbiddenAction();
        }

        $user = $this->user()->get();

        // statuses
        if ($picture->status != Picture::STATUS_ACCEPTED) {
            $picture->setFromArray([
                'status'                => Picture::STATUS_ACCEPTED,
                'change_status_user_id' => $user->id
            ]);
            if (! $picture->accept_datetime) {
                $picture->accept_datetime = new Zend_Db_Expr('NOW()');
            }
            $picture->save();

            if ($picture->owner_id) {
                $this->userPicture->refreshPicturesCount($picture->owner_id);
            }
        }

        if (! in_array($replacePicture->status, [Picture::STATUS_REMOVING, Picture::STATUS_REMOVED])) {
            $replacePicture->setFromArray([
                'status'                => Picture::STATUS_REMOVING,
                'removing_date'         => new Zend_Db_Expr('now()'),
                'change_status_user_id' => $user->id
            ]);
            $replacePicture->save();
            if ($replacePicture->owner_id) {
                $this->userPicture->refreshPicturesCount($replacePicture->owner_id);
            }
        }

        // comments
        $this->comments->moveMessages(
            \Application\Comments::PICTURES_TYPE_ID,
            $replacePicture->id,
            \Application\Comments::PICTURES_TYPE_ID,
            $picture->id
        );

        // pms
        $owner = $picture->findParentRow(User::class, 'Owner');
        $replaceOwner = $replacePicture->findParentRow(User::class, 'Owner');
        $recepients = [];
        if ($owner) {
            $recepients[$owner->id] = $owner;
        }
        if ($replaceOwner) {
            $recepients[$replaceOwner->id] = $replaceOwner;
        }
        unset($recepients[$user->id]);
        if ($recepients) {
            foreach ($recepients as $recepient) {
                $uri = $this->hostManager->getUriByLanguage($recepient->language);

                $url = $this->pic()->url($picture->identity, true, $uri);
                $replaceUrl = $this->pic()->url($replacePicture->identity, true, $uri);

                $moderUrl = $this->url()->fromRoute('users/user', [
                    'user_id' => $user->identity ? $user->identity : 'user' . $user->id
                ], [
                    'force_canonical' => true,
                    'uri'             => $uri
                ]);

                $message = sprintf(
                    $this->translate('pm/user-%s-accept-replace-%s-%s', 'default', $recepient->language),
                    $moderUrl,
                    $replaceUrl,
                    $url
                );

                $this->message->send(null, $recepient->id, $message);
            }
        }

        // log
        $this->log(sprintf(
            'Замена %s на %s',
            htmlspecialchars($this->pic()->name($replacePicture, $this->language())),
            htmlspecialchars($this->pic()->name($picture, $this->language()))
        ), [$picture, $replacePicture]);

        return $this->redirect()->toRoute(null, [
            'action' => 'picture'
        ], [], true);
    }

    private function canAccept(DbTable\Picture\Row $picture)
    {
        return $picture->canAccept() && $this->user()->isAllowed('picture', 'accept');
    }

    private function unaccept(DbTable\Picture\Row $picture)
    {
        $previousStatusUserId = $picture->change_status_user_id;

        $user = $this->user()->get();
        $picture->setFromArray([
            'status'                => Picture::STATUS_INBOX,
            'change_status_user_id' => $user->id
        ]);
        $picture->save();

        if ($picture->owner_id) {
            $this->userPicture->refreshPicturesCount($picture->owner_id);
        }

        $this->log(sprintf(
            'С картинки %s снят статус "принято"',
            htmlspecialchars($this->pic()->name($picture, $this->language()))
        ), $picture);


        $pictureUrl = $this->pic()->url($picture->identity, true);
        if ($previousStatusUserId != $user->id) {
            $userTable = new User();
            foreach ($userTable->find($previousStatusUserId) as $prevUser) {
                $message = sprintf(
                    'С картинки %s снят статус "принято"',
                    $pictureUrl
                );
                $this->message->send(null, $prevUser->id, $message);
            }
        }
    }

    private function accept(DbTable\Picture\Row $picture)
    {
        $canAccept = $this->canAccept($picture);

        if ($canAccept) {
            $user = $this->user()->get();

            $previousStatusUserId = $picture->change_status_user_id;

            $pictureTable = new Picture();

            $success = $pictureTable->accept($picture->id, $user->id, $isFirstTimeAccepted);
            if ($success) {
                $owner = $picture->findParentRow(User::class, 'Owner');

                if ($owner) {
                    $this->userPicture->refreshPicturesCount($owner['id']);
                }

                if ($isFirstTimeAccepted) {
                    if ($owner && ($owner->id != $user->id)) {
                        $uri = $this->hostManager->getUriByLanguage($owner->language);

                        $message = sprintf(
                            $this->translate('pm/your-picture-accepted-%s', 'default', $owner->language),
                            $this->pic()->url($picture->identity, true, $uri)
                        );

                        $this->message->send(null, $owner->id, $message);
                    }

                    $this->telegram->notifyPicture($picture->id);
                }
            }


            if ($previousStatusUserId != $user->id) {
                $userTable = new User();
                foreach ($userTable->find($previousStatusUserId) as $prevUser) {
                    $message = sprintf(
                        'Принята картинка %s',
                        $this->pic()->url($picture->identity, true)
                    );
                    $this->message->send(null, $prevUser->id, $message);
                }
            }

            $this->log(sprintf(
                'Картинка %s принята',
                htmlspecialchars($this->pic()->name($picture, $this->language()))
            ), $picture);
        }
    }

    public function acceptAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        foreach ($this->table->find($this->params()->fromPost('id')) as $picture) {
            $this->accept($picture);
        }

        return new JsonModel([
            'status' => true
        ]);
    }

    public function voteAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $pictureRows = $this->table->find($this->params()->fromPost('id'));

        $user = $this->user()->get();

        $request = $this->getRequest();

        $hasVoteRight = $this->user()->isAllowed('picture', 'moder_vote');

        $vote = (int)$this->params()->fromPost('vote');

        $reason = trim($this->params()->fromPost('reason'));

        $moderVotes = new DbTable\Picture\ModerVote();

        foreach ($pictureRows as $picture) {
            $voteExists = $this->pictureVoteExists($picture, $user);

            if (! $voteExists && $hasVoteRight) {
                $moderVotes->insert([
                    'user_id'    => $user->id,
                    'picture_id' => $picture->id,
                    'day_date'   => new Zend_Db_Expr('NOW()'),
                    'reason'     => $reason,
                    'vote'       => $vote ? 1 : 0
                ]);

                if ($vote && $picture->status == Picture::STATUS_REMOVING) {
                    $picture->status = Picture::STATUS_INBOX;
                    $picture->save();
                }

                if ((! $vote) && $picture->status == Picture::STATUS_ACCEPTED) {
                    $this->unaccept($picture);
                }

                $message = sprintf(
                    $vote
                        ? 'Подана заявка на принятие картинки %s'
                        : 'Подана заявка на удаление картинки %s',
                    htmlspecialchars($this->pic()->name($picture, $this->language()))
                );
                $this->log($message, $picture);

                $this->notifyVote($picture, $vote, $values['reason']);
            }
        }

        return new JsonModel([
            'status' => true
        ]);
    }

    public function moveAction()
    {
        $canMove = $this->user()->isAllowed('picture', 'move');
        if (! $canMove) {
            return $this->forbiddenAction();
        }

        $picture = $this->table->find($this->params('picture_id'))->current();
        if (! $picture) {
            return $this->notFoundAction();
        }

        $itemTable = new Item();
        $srcItem = $itemTable->find($this->params('src_item_id'))->current();

        $itemId = (int)$this->params('item_id');
        if ($itemId) {
            $userId = $this->user()->get()->id;

            $perspectiveId = (int)$this->params('perspective_id');

            $dstItem = $itemTable->find($itemId)->current();

            if (! $dstItem) {
                return $this->notFoundAction();
            }

            if ($srcItem) {
                $this->pictureItem->changePictureItem($picture->id, $srcItem->id, $dstItem->id);

                $this->log->addEvent($userId, sprintf(
                    'Картинка %s перемещена из %s в %s',
                    htmlspecialchars('#' . $picture->id),
                    htmlspecialchars('#' . $srcItem->id),
                    htmlspecialchars('#' . $dstItem->id)
                ), [$srcItem, $dstItem, $picture]);
            } else {
                $this->pictureItem->add($picture->id, $dstItem->id);

                $this->log->addEvent($userId, sprintf(
                    'Картинка %s связана с %s',
                    htmlspecialchars('#' . $picture->id),
                    htmlspecialchars('#' . $dstItem->id)
                ), [$dstItem, $picture]);
            }

            if ($perspectiveId) {
                $this->pictureItem->setProperties($picture->id, $dstItem->id, [
                    'perspective' => $perspectiveId
                ]);
            }

            if ($picture->image_id) {
                $this->imageStorage()->changeImageName($picture->image_id, [
                    'pattern' => $picture->getFileNamePattern(),
                ]);
            }

            $namespace = new \Zend\Session\Container('Moder_Car');
            $namespace->lastCarId = $itemId;

            return $this->redirect()->toUrl($this->pictureUrl($picture));
        }

        $brandModel = new BrandModel();
        $brand = $brandModel->getBrandById($this->params('brand_id'), $this->language());
        $brands = null;
        $factories = null;
        $museums = null;
        $vehicles = [];
        $engines = [];
        $haveConcepts = null;

        $showFactories = false;
        $showMuseums = false;

        if ($brand) {
            $rows = $itemTable->fetchAll(
                $itemTable->select(true)
                    ->join('item_parent', 'item.id = item_parent.item_id', null)
                    ->where('item_parent.parent_id = ?', $brand['id'])
                    ->where('NOT item.is_concept')
                    ->where('item.item_type_id = ?', DbTable\Item\Type::VEHICLE)
                    ->order([
                        'item.name',
                        'item.begin_year',
                        'item.end_year',
                        'item.begin_model_year',
                        'item.end_model_year'
                    ])
            );
            $vehicles = $this->prepareCars($rows);

            $rows = $itemTable->fetchAll(
                $itemTable->select(true)
                    ->join('item_parent', 'item.id = item_parent.item_id', null)
                    ->where('item_parent.parent_id = ?', $brand['id'])
                    ->where('item.item_type_id = ?', DbTable\Item\Type::ENGINE)
                    ->order([
                        'item.name',
                        'item.begin_year',
                        'item.end_year',
                        'item.begin_model_year',
                        'item.end_model_year'
                    ])
            );
            $engines = $this->prepareCars($rows);

            $haveConcepts = (bool)$itemTable->fetchRow(
                $itemTable->select(true)
                    ->join('item_parent_cache', 'item.id = item_parent_cache.item_id', null)
                    ->where('item_parent_cache.parent_id = ?', $brand['id'])
                    ->where('item.is_concept')
            );
        } elseif ($this->params('factories')) {
            $showFactories = true;

            $factories = $itemTable->fetchAll(
                $itemTable->select(true)
                    ->where('item_type_id = ?', DbTable\Item\Type::FACTORY)
                    ->order('name')
            );
        } elseif ($this->params('museums')) {
            $showMuseums = true;

            $museums = $itemTable->fetchAll(
                $itemTable->select(true)
                    ->where('item_type_id = ?', DbTable\Item\Type::MUSEUM)
                    ->order('name')
            );
        } else {
            $brands = $brandModel->getList($this->language(), function ($select) {
            });
        }

        return [
            'srcItem'      => $srcItem,
            'picture'      => $picture,
            'brand'        => $brand,
            'brands'       => $brands,
            'vehicles'     => $vehicles,
            'engines'      => $engines,
            'factories'    => $factories,
            'museums'      => $museums,
            'haveConcepts' => $haveConcepts,
            'conceptsUrl'  => $this->url()->fromRoute(null, [
                'action' => 'concepts'
            ], [], true),
            'showFactories' => $showFactories,
            'showMuseums'   => $showMuseums
        ];
    }
}
