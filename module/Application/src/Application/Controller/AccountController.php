<?php

namespace Application\Controller;

use Zend\Authentication\AuthenticationService;
use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

use Autowp\Commons\Paginator\Adapter\Zend1DbTableSelect;
use Autowp\Forums\Forums;
use Autowp\Message\MessageService;
use Autowp\User\Auth\Adapter\Id as IdAuthAdapter;
use Autowp\User\Model\DbTable\User;
use Autowp\User\Model\DbTable\User\Rename as UserRename;

use Application\Controller\LoginController;
use Application\Model\Contact;
use Application\Model\DbTable;
use Application\Service\SpecificationsService;
use Application\Service\UsersService;
use Autowp\ExternalLoginService\Factory as ExternalLoginServiceFactory;

use Zend_Db_Expr;

use DateTimeZone;
use Exception;
use Imagick;
use Locale;

class AccountController extends AbstractActionController
{
    /**
     * @var UsersService
     */
    private $service;

    /**
     * @var Form
     */
    private $emailForm;

    /**
     * @var Form
     */
    private $profileForm;

    /**
     * @var Form
     */
    private $settingsForm;

    /**
     * @var Form
     */
    private $photoForm;

    /**
     * @var Form
     */
    private $changePasswordForm;

    /**
     * @var Form
     */
    private $deleteUserForm;

    /**
     * @var ExternalLoginServiceFactory
     */
    private $externalLoginFactory;

    /**
     * @var array
     */
    private $hosts = [];

    /**
     * @var SpecificationsService
     */
    private $specsService = null;

    /**
     * @var MessageService
     */
    private $message;

    public function __construct(
        UsersService $service,
        Form $emailForm,
        Form $profileForm,
        Form $settingsForm,
        Form $photoForm,
        Form $changePasswordForm,
        Form $deleteUserForm,
        ExternalLoginServiceFactory $externalLoginFactory,
        array $hosts,
        SpecificationsService $specsService,
        MessageService $message
    ) {

        $this->service = $service;
        $this->emailForm = $emailForm;
        $this->profileForm = $profileForm;
        $this->settingsForm = $settingsForm;
        $this->photoForm = $photoForm;
        $this->changePasswordForm = $changePasswordForm;
        $this->deleteUserForm = $deleteUserForm;
        $this->externalLoginFactory = $externalLoginFactory;
        $this->hosts = $hosts;
        $this->specsService = $specsService;
        $this->message = $message;
    }

    private function forwardToLogin()
    {
        return $this->forward()->dispatch(LoginController::class, [
            'action' => 'index'
        ]);
    }

    public function sidebar()
    {
        $user = $this->user()->get();

        $pictures = $this->catalogue()->getPictureTable();

        $db = $pictures->getAdapter();

        $picsCount = $db->fetchOne(
            $db->select()
                 ->from('pictures', [new Zend_Db_Expr('COUNT(1)')])
                 ->where('owner_id = ?', $user->id)
                 ->where('status = ?', DbTable\Picture::STATUS_ACCEPTED)
        );

        $subscribesCount = $db->fetchOne(
            $db->select()
                 ->from('forums_topics', new Zend_Db_Expr('COUNT(*)'))
                 ->join('forums_topics_subscribers', 'forums_topics.id=forums_topics_subscribers.topic_id', null)
                 ->where('forums_topics_subscribers.user_id = ?', $user->id)
                 ->where('forums_topics.status IN (?)', [Forums::STATUS_CLOSED, Forums::STATUS_NORMAL])
        );

        $notTakenPicturesCount = $pictures->getAdapter()->fetchOne(
            $pictures->select()
                ->from($pictures, new Zend_Db_Expr('COUNT(1)'))
                ->where('owner_id = ?', $user->id)
                ->where('status = ?', DbTable\Picture::STATUS_INBOX)
        );

        return [
            'smCount'    => $this->message->getSystemCount($user->id),
            'newSmCount' => $this->message->getNewSystemCount($user->id),
            'pmCount'    => $this->message->getInboxCount($user->id),
            'newPmCount' => $this->message->getInboxNewCount($user->id),
            'omCount'    => $this->message->getSentCount($user->id),
            'notTakenPicturesCount' => $notTakenPicturesCount,
            'subscribesCount'       => $subscribesCount,
            'picsCount'             => $picsCount
        ];
    }

    public function sendPersonalMessageAction()
    {
        $currentUser = $this->user()->get();
        if (! $currentUser) {
            return $this->forwardToLogin();
        }

        $userTable = new User();

        $user = $userTable->find($this->params()->fromPost('user_id'))->current();
        if (! $user) {
            return $this->notFoundAction();
        }

        $message = $this->params()->fromPost('message');

        $this->message->send($currentUser->id, $user->id, $message);

        return new JsonModel([
            'ok'      => true,
            'message' => $this->translate('account/personal-message/sent')
        ]);
    }

    public function deletePersonalMessageAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $user = $this->user()->get();

        $this->message->delete($user->id, $this->params()->fromPost('id'));

        return new JsonModel([
            'ok' => true
        ]);
    }

    public function addAccountFailedAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        return [
            'sidebar' => $this->sidebar()
        ];
    }

    /**
     * @param string $serviceId
     * @return Autowp_ExternalLoginService_Abstract
     */
    private function getExternalLoginService($serviceId)
    {
        $service = $this->externalLoginFactory->getService($serviceId, $serviceId, [
            'redirect_uri' => 'http://en.wheelsage.org/login/callback'
        ]);

        if (! $service) {
            throw new Exception("Service `$serviceId` not found");
        }
        return $service;
    }

    public function accountsAction()
    {
        $user = $this->user()->get();

        if (! $user) {
            return $this->forwardToLogin();
        }

        $uaTable = new DbTable\User\Account();

        $uaRows = $uaTable->fetchAll([
            'user_id = ?' => $user->id
        ]);

        $accounts = [];
        foreach ($uaRows as $uaRow) {
            $accounts[] = [
                'name'      => $uaRow->name,
                'link'      => $uaRow->link,
                'icon'      => 'fa fa-' . $uaRow->service_id,
                'canRemove' => $this->canRemoveAccount($uaRow->service_id),
                'removeUrl' => $this->url()->fromRoute('account/remove-account', [
                    'service' => $uaRow->service_id
                ])
            ];
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $serviceId = $this->params()->fromPost('type');
            $service = $this->getExternalLoginService($serviceId);

            $loginUrl = $service->getLoginUrl();

            $table = new DbTable\LoginState();
            $row = $table->createRow([
                'state'    => $service->getState(),
                'time'     => new Zend_Db_Expr('now()'),
                'user_id'  => $user->id,
                'language' => $this->language(),
                'service'  => $serviceId,
                'url'      => $this->url()->fromRoute('account/accounts')
            ]);

            $row->save();

            return $this->redirect()->toUrl($loginUrl);
        }

        return [
            'sidebar'  => $this->sidebar(),
            'accounts' => $accounts,
            'types'    => [
                'facebook'    => 'Facebook',
                'vk'          => 'VK',
                'google-plus' => 'Google+',
                'twitter'     => 'Twitter',
                'github'      => 'Github',
                'linkedin'    => 'Linkedin'
            ]
        ];
    }

    private function canRemoveAccount($serviceId)
    {
        if (! $this->user()->logedIn()) {
            return false;
        }

        if ($this->user()->get()->e_mail) {
            return true;
        }

        $uaTable = new DbTable\User\Account();
        $uaRow = $uaTable->fetchRow([
            'user_id = ?'     => $this->user()->get()->id,
            'service_id <> ?' => $serviceId
        ]);

        if ($uaRow) {
            return true;
        }

        return false;
    }

    public function removeAccountAction()
    {
        $user = $this->user()->get();
        if (! $user) {
            return $this->forwardToLogin();
        }

        $serviceId = (string)$this->params('service');

        $uaTable = new DbTable\User\Account();
        $uaRow = $uaTable->fetchRow([
            'user_id = ?'    => $user->id,
            'service_id = ?' => $serviceId
        ]);

        if (! $uaRow) {
            return $this->notFoundAction();
        }

        if (! $this->canRemoveAccount($serviceId)) {
            return $this->forward()->dispatch(self::class, [
                'action' => 'remove-account-failed'
            ]);
        }

        $uaRow->delete();

        $this->flashMessenger()->addSuccessMessage($this->translate('account/accounts/removed'));

        return $this->redirect()->toRoute('account/accounts');
    }

    public function removeAccountFailedAction()
    {
    }

    public function profileAction()
    {
        $user = $this->user()->get();

        if (! $user) {
            return $this->forwardToLogin();
        }

        $request = $this->getRequest();

        $this->profileForm->setAttribute('action', $this->url()->fromRoute('account/profile', [
            'form' => 'profile'
        ]));

        $this->profileForm->setData([
            'name' => $user->name
        ]);
        if ($request->isPost() && $this->params('form') == 'profile') {
            $this->profileForm->setData($this->params()->fromPost());
            if ($this->profileForm->isValid()) {
                $values = $this->profileForm->getData();

                $oldName = $user->getCompoundName();

                $user->setFromArray([
                    'name' => $values['name']
                ])->save();

                $newName = $user->getCompoundName();

                if ($oldName != $newName) {
                    $userRenames = new UserRename();
                    $userRenames->insert([
                        'user_id'  => $user->id,
                        'old_name' => $oldName,
                        'new_name' => $newName,
                        'date'     => new Zend_Db_Expr('NOW()')
                    ]);
                }

                $this->flashMessenger()->addSuccessMessage($this->translate('account/profile/saved'));

                return $this->redirect()->toRoute();
            }
        }

        if ($request->isPost() && $this->params('form') == 'reset-photo') {
            $oldImageId = $user->img;
            if ($oldImageId) {
                $user->img = null;
                $user->save();
                $this->imageStorage()->removeImage($oldImageId);
            }

            $this->flashMessenger()->addSuccessMessage($this->translate('account/profile/photo/deleted'));

            return $this->redirect()->toRoute();
        }

        $this->photoForm->setAttribute('action', $this->url()->fromRoute('account/profile', [
            'form' => 'photo'
        ]));

        if ($request->isPost() && $this->params('form') == 'photo') {
            $data = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                $this->getRequest()->getFiles()->toArray()
            );
            $this->photoForm->setData($data);
            if ($this->photoForm->isValid()) {
                $imageStorage = $this->imageStorage();
                $imageSampler = $imageStorage->getImageSampler();

                $imagick = new Imagick();
                if (! $imagick->readImage($data['photo']['tmp_name'])) {
                    throw new Exception("Error loading image");
                }
                $format = $imageStorage->getFormat('photo');
                $imageSampler->convertImagick($imagick, $format);

                $newImageId = $imageStorage->addImageFromImagick($imagick, 'user');

                $imagick->clear();

                $oldImageId = $user->img;
                $user->img = $newImageId;
                $user->save();
                if ($oldImageId) {
                    $imageStorage->removeImage($oldImageId);
                }

                $this->flashMessenger()->addSuccessMessage($this->translate('account/profile/photo/saved'));

                return $this->redirect()->toRoute('account/profile');
            }
        }

        $language = $this->language();

        foreach (DateTimeZone::listAbbreviations() as $group) {
            foreach ($group as $timeZone) {
                $tzId = $timeZone['timezone_id'];
                if ($tzId) {
                    $list[] = $tzId;
                }
            }
        }
        sort($list, SORT_STRING);
        $list = array_combine($list, $list);

        foreach ($this->hosts as $language => $options) {
            $languages[$language] = Locale::getDisplayLanguage($language, $language);
        }

        $this->settingsForm->setAttribute('action', $this->url()->fromRoute('account/profile', [
            'form' => 'settings'
        ]));
        $this->settingsForm->get('language')->setValueOptions($languages);
        $this->settingsForm->get('timezone')->setValueOptions($list);

        $this->settingsForm->setData([
            'timezone' => $user->timezone,
            'language' => $user->language
        ]);

        if ($request->isPost() && $this->params('form') == 'settings') {
            $this->settingsForm->setData($this->params()->fromPost());
            if ($this->settingsForm->isValid()) {
                $values = $this->settingsForm->getData();

                $user->timezone = $values['timezone'];
                $user->language = $values['language'];
                $user->save();

                $this->flashMessenger()->addSuccessMessage($this->translate('account/profile/saved'));

                return $this->redirect()->toRoute();
            }
        }

        return [
            'settingsForm' => $this->settingsForm,
            'profileForm'  => $this->profileForm,
            'photoForm'    => $this->photoForm,
            'sidebar'      => $this->sidebar()
        ];
    }

    public function emailAction()
    {
        $user = $this->user()->get();
        if (! $user) {
            return $this->forwardToLogin();
        }

        $request = $this->getRequest();

        $this->emailForm->setAttribute('action', $this->url()->fromRoute('account/email'));
        $this->emailForm->setData([
            'email' => $user->e_mail
        ]);
        if ($request->isPost()) {
            $this->emailForm->setData($this->params()->fromPost());
            if ($this->emailForm->isValid()) {
                $values = $this->emailForm->getData();

                $this->service->changeEmailStart($user, $values['email'], $this->language());

                $this->flashMessenger()->addSuccessMessage(
                    $this->translate('users/change-email/confirmation-message-sent')
                );

                return $this->redirect()->toRoute();
            }
        }

        return [
            'sidebar' => $this->sidebar(),
            'form'    => $this->emailForm
        ];
    }

    public function emailcheckAction()
    {
        $code = $this->params('email_check_code');
        $user = $this->service->emailChangeFinish($code);

        $template = 'application/account/emailcheck-fail';

        if ($user) {
            if (! $this->user()->logedIn()) {
                $adapter = new IdAuthAdapter();
                $adapter->setIdentity($user->id);
                $auth = new AuthenticationService();
                $result = $auth->authenticate($adapter);

                if ($result->isValid()) {
                    // hmmm...
                }
            }

            $template = 'application/account/emailcheck-ok';
        }

        $viewModel = new ViewModel();

        $viewModel->setTemplate($template);

        if ($this->user()->logedIn()) {
            $viewModel->setVariables([
                'sidebar' => $this->sidebar()
            ]);
        }

        return $viewModel;
    }

    private function preparePersonalMessages($messages)
    {
        //TODO: remove
        return $messages;
    }

    public function personalMessagesInboxAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $user = $this->user()->get();

        $inbox = $this->message->getInbox($user->id, $this->params('page'));

        return [
            'paginator' => $inbox['paginator'],
            'messages'  => $this->preparePersonalMessages($inbox['messages']),
            'sidebar'   => $this->sidebar()
        ];
    }

    public function personalMessagesSentAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $user = $this->user()->get();

        $sentbox = $this->message->getSentbox($user->id, $this->params('page'));

        return [
            'paginator' => $sentbox['paginator'],
            'messages'  => $this->preparePersonalMessages($sentbox['messages']),
            'sidebar'   => $this->sidebar()
        ];
    }

    public function personalMessagesSystemAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $user = $this->user()->get();

        $systembox = $this->message->getSystembox($user->id, $this->params('page'));

        return [
            'paginator' => $systembox['paginator'],
            'messages'  => $this->preparePersonalMessages($systembox['messages']),
            'sidebar'   => $this->sidebar()
        ];
    }

    public function personalMessagesUserAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $users = new User();

        $user = $users->find($this->params('user_id'))->current();
        if (! $user) {
            return $this->notFoundAction();
        }

        $logedInUser = $this->user()->get();

        $dialogbox = $this->message->getDialogbox($logedInUser->id, $user->id, $this->params('page'));

        return [
            'paginator' => $dialogbox['paginator'],
            'messages'  => $this->preparePersonalMessages($dialogbox['messages']),
            'sidebar'   => $this->sidebar(),
            'urlParams' => [
                'user_id' => $user->id
            ]
        ];
    }

    public function notTakenPicturesAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $pictures = $this->catalogue()->getPictureTable();

        $select = $pictures->select(true)
            ->where('owner_id = ?', $this->user()->get()->id)
            ->where('status = ?', DbTable\Picture::STATUS_INBOX)
            ->order(['add_date DESC']);

        $paginator = new \Zend\Paginator\Paginator(
            new Zend1DbTableSelect($select)
        );

        $paginator
            ->setItemCountPerPage(16)
            ->setCurrentPageNumber($this->params('page'));

        $select->limitPage($paginator->getCurrentPageNumber(), $paginator->getItemCountPerPage());

        $picturesData = $this->pic()->listData($select, [
            'width' => 4
        ]);

        return [
            'paginator'    => $paginator,
            'picturesData' => $picturesData,
            'sidebar'      => $this->sidebar()
        ];
    }

    public function clearSystemMessagesAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $this->message->deleteAllSystem($this->user()->get()->id);

        return $this->redirect()->toRoute('account/personal-messages/system');
    }

    public function clearSentMessagesAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $this->message->deleteAllSent($this->user()->get()->id);

        return $this->redirect()->toRoute('account/personal-messages/sent');
    }

    public function accessAction()
    {
        $user = $this->user()->get();
        if (! $user) {
            return $this->forwardToLogin();
        }

        $request = $this->getRequest();

        if ($request->isPost()) {
            $this->changePasswordForm->setData($this->params()->fromPost());
            if ($this->changePasswordForm->isValid()) {
                $values = $this->changePasswordForm->getData();

                $correct = $this->service->checkPassword($user->id, $values['password_old']);

                if (! $correct) {
                    $this->changePasswordForm->get('password_old')->setMessages([
                        $this->translate('account/access/change-password/current-password-is-incorrect')
                    ]);
                } else {
                    $this->service->setPassword($user, $values['password']);

                    $this->flashMessenger()->addSuccessMessage(
                        $this->translate('account/access/change-password/saved')
                    );

                    return $this->redirect()->toRoute('account/access');
                }
            }
        }

        return [
            'sidebar'      => $this->sidebar(),
            'formPassword' => $this->changePasswordForm
        ];
    }

    public function deleteAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $request = $this->getRequest();

        $this->deleteUserForm->setAttribute('action', $this->url()->fromRoute('account/delete'));

        if ($request->isPost()) {
            $this->deleteUserForm->setData($this->params()->fromPost());
            if ($this->deleteUserForm->isValid()) {
                $values = $this->deleteUserForm->getData();

                $user = $this->user()->get();

                $valid = $this->service->checkPassword($user->id, $values['password']);

                if (! $valid) {
                    $this->deleteUserForm->get('password')->setMessages([
                        $this->translate('account/access/self-delete/password-is-incorrect')
                    ]);
                } else {
                    $user->deleted = true;
                    $user->save();

                    $this->service->markDeleted($user->id);

                    $auth = new AuthenticationService();
                    $auth->clearIdentity();
                    $this->service->clearRememberCookie($this->language());

                    $viewModel = new ViewModel();

                    $viewModel->setTemplate('application/account/deleted');

                    return $viewModel;
                }
            }
        }

        return [
            'sidebar' => $this->sidebar(),
            'form'    => $this->deleteUserForm
        ];
    }

    public function specsConflictsAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $filter = $this->params('conflict', '0');
        $page = (int)$this->params('page');

        $userId = $this->user()->get()->id;

        $language = $this->language();

        $data = $this->specsService->getConflicts($userId, $filter, $page, 50, $language);
        $conflicts = $data['conflicts'];
        $paginator = $data['paginator'];

        $userTable = new User();
        $itemTable = new DbTable\Item();

        foreach ($conflicts as &$conflict) {
            foreach ($conflict['values'] as &$value) {
                $value['user'] = $userTable->find($value['userId'])->current();
            }

            $car = $itemTable->find($conflict['itemId'])->current();
            $conflict['object'] = $car ? $this->car()->formatName($car, $language) : null;
            $conflict['url'] = $this->url()->fromRoute('cars/params', [
                'action'  => 'car-specifications-editor',
                'item_id' => $conflict['itemId'],
                'tab'     => 'spec'
            ]);
        }
        unset($conflict);

        return [
            'sidebar'   => $this->sidebar(),
            'filter'    => (string)$filter,
            'conflicts' => $conflicts,
            'paginator' => $paginator,
            'weight'    => $this->user()->get()->specs_weight
        ];
    }

    public function contactsAction()
    {
        if (! $this->user()->logedIn()) {
            return $this->forwardToLogin();
        }

        $user = $this->user()->get();

        $userTable = new User();

        $userRows = $userTable->fetchAll(
            $userTable->select(true)
                ->join('contact', 'users.id = contact.contact_user_id', null)
                ->where('contact.user_id = ?', $user->id)
                ->order(['users.deleted', 'users.name'])
        );
        $users = [];
        foreach ($userRows as $row) {
            $users[] = $row;
        }

        return [
            'sidebar' => $this->sidebar(),
            'users'   => $users
        ];
    }
}
