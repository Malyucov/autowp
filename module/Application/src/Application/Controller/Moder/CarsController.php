<?php

namespace Application\Controller\Moder;

use Zend\Form\Form;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;

use Application\Form\Moder\Car as CarForm;
use Application\Form\Moder\CarOrganize as CarOrganizeForm;
use Application\Form\Moder\CarOrganizePictures as CarOrganizePicturesForm;
use Application\Form\Moder\ItemLanguages as ItemLanguagesForm;
use Application\HostManager;
use Application\Model\Brand as BrandModel;
use Application\Model\BrandVehicle;
use Application\Model\DbTable;
use Application\Model\Message;
use Application\Model\Modification;
use Application\Model\PictureItem;
use Application\Model\VehicleType;
use Application\Paginator\Adapter\Zend1DbTableSelect;
use Application\Service\SpecificationsService;

use Zend_Db_Expr;

use Exception;

class CarsController extends AbstractActionController
{
    private $allowedLanguages = ['ru', 'en', 'it', 'fr', 'zh', 'de', 'es'];

    /**
     * @var DbTable\Vehicle\ParentTable
     */
    private $carParentTable;

    /**
     * @var DbTable\BrandItem
     */
    private $brandItemTable;

    /**
     * @var DbTable\Brand
     */
    private $brandTable;

    private $textStorage;

    private $translator;

    /**
     * @var Form
     */
    private $descForm;

    /**
     * @var Form
     */
    private $textForm;

    /**
     * @var Form
     */
    private $twinsForm;

    /**
     * @var Form
     */
    private $brandItemForm;

    /**
     * @var Form
     */
    private $carParentForm;

    /**
     * @var Form
     */
    private $filterForm;

    /**
     * @var HostManager
     */
    private $hostManager;

    /**
     * @var BrandVehicle
     */
    private $brandVehicle;

    /**
     * @var Message
     */
    private $message;

    /**
     * @var SpecificationsService
     */
    private $specificationsService;

    /**
     * @var PictureItem
     */
    private $pictureItem;

    public function __construct(
        HostManager $hostManager,
        $textStorage,
        $translator,
        Form $descForm,
        Form $textForm,
        Form $twinsForm,
        Form $brandItemForm,
        Form $carParentForm,
        Form $filterForm,
        BrandVehicle $brandVehicle,
        Message $message,
        SpecificationsService $specificationsService,
        PictureItem $pictureItem
    ) {

        $this->hostManager = $hostManager;
        $this->textStorage = $textStorage;
        $this->translator = $translator;
        $this->descForm = $descForm;
        $this->textForm = $textForm;
        $this->twinsForm = $twinsForm;
        $this->brandItemForm = $brandItemForm;
        $this->carParentForm = $carParentForm;
        $this->filterForm = $filterForm;
        $this->brandVehicle = $brandVehicle;
        $this->message = $message;
        $this->specificationsService = $specificationsService;
        $this->pictureItem = $pictureItem;
    }

    private function canMove(DbTable\Vehicle\Row $car)
    {
        return $this->user()->isAllowed('car', 'move');
    }

    private function getVehicleTypeOptions($table, $parentId = null)
    {
        if ($parentId) {
            $filter = [
                'parent_id = ?' => $parentId
            ];
        } else {
            $filter = 'parent_id is null';
        }

        $rows = $table->fetchAll($filter, 'position');
        $result = [];
        foreach ($rows as $row) {
            $result[$row->id] = $row->name;

            foreach ($this->getVehicleTypeOptions($table, $row->id) as $key => $value) {
                $result[$key] = '...' . $this->translate($value);
            }
        }

        return $result;
    }

    public function indexAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $specTable = new DbTable\Spec();
        $specOptions = $this->loadSpecs($specTable, null, 0);

        $vehicleTypeTable = new DbTable\Vehicle\Type();
        $vehicleTypeOptions = $this->getVehicleTypeOptions($vehicleTypeTable, null);

        $this->filterForm->setAttribute('action', $this->url()->fromRoute(null, [], [], true));

        $this->filterForm->get('spec')->setValueOptions(array_replace(['' => '--'], $specOptions));
        $this->filterForm->get('vehicle_type_id')->setValueOptions(array_replace([
            ''      => '--',
            'empty' => 'moder/vehicles/filter/vehicle-type/empty'
        ], $vehicleTypeOptions));
        $this->filterForm->get('vehicle_childs_type_id')->setValueOptions(array_replace([
            '' => '--'
        ], $vehicleTypeOptions));

        if ($this->getRequest()->isPost()) {
            $this->filterForm->setData($this->params()->fromPost());
            if ($this->filterForm->isValid()) {
                $params = $this->filterForm->getData();
                foreach ($params as $key => $value) {
                    if (strlen($value) <= 0) {
                        unset($params[$key]);
                    }
                }

                return $this->redirect()->toRoute('moder/cars/params', array_replace($params, [
                    'action' => 'index'
                ]));
            }
        }

        $this->filterForm->setData(array_replace(['order' => '1'], $this->params()->fromRoute()));

        $carTable = $this->catalogue()->getCarTable();

        $select = $carTable->select(true);

        if ($this->filterForm->isValid()) {
            $values = $this->filterForm->getData();

            $group = false;

            if ($values['name']) {
                $select->where('cars.name like ?', '%' . $values['name'] . '%');
            }

            if ($values['no_name']) {
                $select->where('cars.name not like ?', '%' . $values['no_name'] . '%');
            }

            if ($values['item_type_id']) {
                $select->where('cars.item_type_id = ?', $values['item_type_id']);
            }

            if ($values['vehicle_type_id']) {
                if ($values['vehicle_type_id'] == 'empty') {
                    $select
                        ->joinLeft('vehicle_vehicle_type', 'cars.id = vehicle_vehicle_type.vehicle_id', null)
                        ->where('vehicle_vehicle_type.vehicle_id is null');
                } else {
                    $select
                        ->join('vehicle_vehicle_type', 'cars.id = vehicle_vehicle_type.vehicle_id', null)
                        ->where('vehicle_vehicle_type.vehicle_type_id = ?', $values['vehicle_type_id']);
                }
            }

            if ($values['vehicle_childs_type_id']) {
                $group = true;
                $select
                    ->join(
                        ['cpc_childs' => 'item_parent_cache'],
                        'cars.id = cpc_childs.parent_id',
                        null
                    )
                    ->join(
                        ['vvt_child' => 'vehicle_vehicle_type'],
                        'cpc_childs.item_id = vvt_child.vehicle_id',
                        null
                    )
                    ->join('car_types_parents', 'vvt_child.vehicle_type_id = car_types_parents.id', null)
                    ->where('car_types_parents.parent_id = ?', $values['vehicle_childs_type_id']);
            }

            if ($values['spec']) {
                $select->where('cars.spec_id = ?', $values['spec']);
            }

            if ($values['from_year']) {
                $select->where('cars.begin_year = ?', $values['from_year']);
            }

            if ($values['to_year']) {
                $select->where('cars.end_year = ?', $values['to_year']);
            }

            if ($values['category']) {
                $select
                    ->join(['item_parent_cache'], 'cars.id = item_parent_cache.item_id', null)
                    ->join(['category' => 'cars'], 'item_parent_cache.parent_id = category.id', null)
                    ->where('category.item_type_id = ?', DbTable\Item\Type::CATEGORY)
                    ->where('category.id = ?', $values['category']);
            }

            /*if ($values['no_category']) {
                $itemParentTable = new DbTable\Vehicle\ParentTable();

                $ids = $itemParentTable->getAdapter()->fetchCol(
                    $itemParentTable->getAdapter()->select()
                        ->from('item_parent_cache', 'item_id')
                        ->where('parent_id = ?', $values['no_category'])
                );

                if ($ids) {
                    $expr = $carTable->getAdapter()->quoteInto(
                        'cars.id = no_category.item_id and no_category.parent_id in (?)',
                        $ids
                    );
                    $select
                        ->joinLeft(['no_category' => 'item_parent_cache'], $expr, null)
                        ->where('no_category.item_id is null');
                }
            }*/

            if ($values['no_parent']) {
                $select
                    ->joinLeft(
                        'item_parent_cache',
                        'cars.id = item_parent_cache.item_id and cars.id <> item_parent_cache.parent_id',
                        null
                    )
                    ->joinLeft('brand_item', 'cars.id = brand_item.car_id', null)
                    ->where('item_parent_cache.item_id IS NULL')
                    ->where('brand_item.car_id IS NULL');
            }
            
            if ($values['text']) {
                $select
                    ->join('car_language', 'cars.id = car_language.car_id', null)
                    ->join('textstorage_text', 'car_language.text_id = textstorage_text.id', null)
                    ->where('textstorage_text.text like ?', '%' . $values['text'] . '%');
            }

            switch ($values['order']) {
                case '0':
                    $select->order('id asc');
                    break;

                default:
                case '1':
                    $select->order('id desc');
                    break;
            }

            if ($group) {
                $select->group('cars.id');
            }
        }

        $paginator = new \Zend\Paginator\Paginator(
            new Zend1DbTableSelect($select)
        );

        $paginator
            ->setItemCountPerPage(10)
            ->setCurrentPageNumber($this->params('page'));

        return [
            'form'      => $this->filterForm,
            'paginator' => $paginator,
            'listData'  => $this->car()->listData($paginator->getCurrentItems(), [
                'pictureFetcher' => new \Application\Model\Item\PerspectivePictureFetcher([
                    'type'                 => null,
                    'onlyExactlyPictures'  => false,
                    'dateSort'             => false,
                    'disableLargePictures' => false,
                    'perspectivePageId'    => null,
                    'onlyChilds'           => []
                ])
            ])
        ];
    }

    public function alphaAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();
        $carAdapter = $carTable->getAdapter();
        $chars = $carAdapter->fetchCol(
            $carAdapter->select()
                ->distinct()
                ->from('cars', ['char' => new Zend_Db_Expr('UPPER(LEFT(name, 1))')])
                ->order('char')
        );


        $groups = [
            'numbers' => [],
            'english' => [],
            'other'   => []
        ];

        foreach ($chars as $char) {
            if (preg_match('|^["0-9-]$|isu', $char)) {
                $groups['numbers'][] = $char;
            } elseif (preg_match('|^[A-Za-z]$|isu', $char)) {
                $groups['english'][] = $char;
            } else {
                $groups['other'][] = $char;
            }
        }

        $cars = [];
        $char = null;

        $c = $this->params('char');

        if ($c) {
            $char = mb_substr(trim($c), 0, 1);

            $char = $char;
            $cars = $carTable->fetchAll(
                $carTable->select(true)
                    ->where('name LIKE ?', $char.'%')
                    ->order(['name', 'begin_year', 'end_year'])
            );
        }

        return [
            'chars'  => $chars,
            'char'   => $char,
            'groups' => $groups,
            'cars'   => $cars
        ];
    }

    /**
     * @param DbTable\Vehicle\Row $car
     * @return string
     */
    private function carModerUrl(DbTable\Vehicle\Row $car, $full = false, $tab = null, $uri = null)
    {
        return $this->url()->fromRoute('moder/cars/params', [
            'action' => 'car',
            'car_id' => $car->id,
            'tab'    => $tab
        ], [
            'force_canonical' => $full,
            'uri'             => $uri
        ]);
    }

    /**
     * @param \Autowp\User\Model\DbTable\User\Row $user
     * @param bool $full
     * @param \Zend\Uri\Uri $uri
     * @return string
     */
    private function userModerUrl(\Autowp\User\Model\DbTable\User\Row $user, $full = false, $uri = null)
    {
        return $this->url()->fromRoute('users/user', [
            'user_id' => $user->identity ? $user->identity : 'user' . $user->id
        ], [
            'force_canonical' => $full,
            'uri'             => $uri
        ]);
    }

    /**
     * @param DbTable\Vehicle\Row $car
     * @return void
     */
    private function redirectToCar(DbTable\Vehicle\Row $car, $tab = null)
    {
        return $this->redirect()->toUrl($this->carModerUrl($car, true, $tab));
    }

    private function canEditMeta(DbTable\Vehicle\Row $car)
    {
        return $this->user()->isAllowed('car', 'edit_meta');
    }

    public function carPicturesAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        // all pictures
        $table = $this->catalogue()->getPictureTable();
        $select = $table->select(true)
            ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
            ->where('picture_item.item_id = ?', $car->id)
            ->order(['pictures.status', 'pictures.id']);

        $picturesData = $this->pic()->listData($select, [
            'width' => 6
        ]);

        $model = new ViewModel([
            'picturesData' => $picturesData,
        ]);

        return $model->setTerminal(true);
    }

    private function getRandomPicture($car)
    {
        $pictures = $this->catalogue()->getPictureTable();

        $randomPicture = false;
        $statuses = [
            DbTable\Picture::STATUS_ACCEPTED,
            DbTable\Picture::STATUS_NEW,
            DbTable\Picture::STATUS_INBOX,
            DbTable\Picture::STATUS_REMOVING
        ];
        foreach ($statuses as $status) {
            $randomPicture = $pictures->fetchRow(
                $pictures->select(true)
                    ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
                    ->where('picture_item.item_id = ?', $car->id)
                    ->where('pictures.status = ?', $status)
                    ->order(new Zend_Db_Expr('RAND()'))
                    ->limit(1)
            );
            if ($randomPicture) {
                break;
            }
        }

        return $randomPicture;
    }

    private function getDescriptionForm()
    {
        $this->descForm->setAttribute(
            'action',
            $this->url()->fromRoute('moder/cars/params', [
                'form' => 'car-edit-description'
            ], [], true)
        );

        return $this->descForm;
    }

    private function carToForm(DbTable\Vehicle\Row $car)
    {
        return [
            'name'        => $car->name,
            'catname'     => $car->catname,
            'body'        => $car->body,
            'spec_id'     => $car->spec_inherit ? 'inherited' : ($car->spec_id ? $car->spec_id : ''),
            'is_concept'  => $car->is_concept_inherit ? 'inherited' : (bool)$car->is_concept,
            'is_group'    => $car->is_group,
            'model_year'  => [
                'begin' => $car->begin_model_year,
                'end'   => $car->end_model_year,
            ],
            'begin' => [
                'year'  => $car->begin_year,
                'month' => $car->begin_month,
            ],
            'end' => [
                'year'  => $car->end_year,
                'month' => $car->end_month,
                'today' => $car->today === null ? '' : $car->today
            ],
            'produced' => [
                'count'   => $car->produced,
                'exactly' => $car->produced_exactly
            ],
        ];
    }

    public function carAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $pictures = $this->catalogue()->getPictureTable();


        $canEditMeta = $this->canEditMeta($car);

        if ($canEditMeta) {
            $carParentTable = $this->getCarParentTable();
            $haveChilds = (bool)$carParentTable->fetchRow([
                'parent_id = ?' => $car->id
            ]);

            $isGroupDisabled = $car->is_group && $haveChilds;

            $specTable = new DbTable\Spec();
            $specOptions = $this->loadSpecs($specTable, null, 0);

            $inheritedSpec = null;
            if ($car->spec_inherit) {
                if ($car->spec_id) {
                    $specRow = $specTable->find($car->spec_id)->current();
                    if ($specRow) {
                        $inheritedSpec = $specRow->short_name;
                    }
                }
            } else {
                $db = $carTable->getAdapter();
                $avgSpecId = $db->fetchOne(
                    $db->select()
                        ->from($carTable->info('name'), 'AVG(spec_id)')
                        ->join('car_parent', 'cars.id = car_parent.parent_id', null)
                        ->where('car_parent.car_id = ?', $car->id)
                );
                if ($avgSpecId) {
                    $specRow = $specTable->find($avgSpecId)->current();
                    if ($specRow) {
                        $inheritedSpec = $specRow->short_name;
                    }
                }
            }

            $formModerCarEditMeta = new CarForm(null, [
                'itemType'           => $car->item_type_id,
                'language'           => $this->language(),
                'translator'         => $this->translator,
                'inheritedIsConcept' => $car->is_concept_inherit ? $car->is_concept : null,
                'isGroupDisabled'    => $isGroupDisabled,
                'specOptions'        => array_replace(['' => '-'], $specOptions),
                'inheritedSpec'      => $inheritedSpec,
            ]);
            $formModerCarEditMeta->setAttribute('action', $this->url()->fromRoute('moder/cars/params', [
                'action' => 'car',
                'car_id' => $car->id,
                'form'   => 'car-edit-meta'
            ], [], true));

            $data = $this->carToForm($car);

            $vehicleType = new VehicleType();
            $data['vehicle_type_id'] = $vehicleType->getVehicleTypes($car->id);

            $oldData = $car->toArray();
            $oldData['vehicle_type_id'] = $vehicleType->getVehicleTypes($car->id);

            $formModerCarEditMeta->populateValues($data);

            $request = $this->getRequest();

            /*$textForm = null;
            $descriptionForm = null;*/

            if ($request->isPost() && $this->params('form') == 'car-edit-meta') {
                $formModerCarEditMeta->setData($this->params()->fromPost());
                if ($formModerCarEditMeta->isValid()) {
                    $values = $formModerCarEditMeta->getData();

                    $user = $this->user()->get();
                    $ucsTable = new DbTable\User\CarSubscribe();
                    $ucsTable->subscribe($user, $car);

                    if ($haveChilds || $car->item_type_id == DbTable\Item\Type::CATEGORY) {
                        $values['is_group'] = 1;
                    }

                    $car->setFromArray($this->prepareCarMetaToSave($values))->save();

                    $vehicleType->setVehicleTypes($car->id, (array)$values['vehicle_type_id']);

                    $carTable->updateInteritance($car);

                    $newData = $car->toArray();
                    $newData['vehicle_type_id'] = $vehicleType->getVehicleTypes($car->id);

                    $car->updateOrderCache();

                    $this->brandVehicle->refreshAutoByVehicle($car->id);

                    $htmlChanges = [];
                    foreach ($this->buildChangesMessage($oldData, $newData, 'en') as $line) {
                        $htmlChanges[] = htmlspecialchars($line);
                    }

                    $message = sprintf(
                        'Редактирование мета-информации автомобиля %s',
                        htmlspecialchars($this->car()->formatName($car, 'en')).
                        ( count($htmlChanges) ? '<p>'.implode('<br />', $htmlChanges).'</p>' : '')
                    );
                    $this->log($message, $car);

                    $user = $this->user()->get();
                    foreach ($ucsTable->getCarSubscribers($car) as $subscriber) {
                        if ($subscriber && ($subscriber->id != $user->id)) {
                            $uri = $this->hostManager->getUriByLanguage($subscriber->language);

                            $changes = $this->buildChangesMessage($oldData, $newData, $subscriber->language);

                            $message = sprintf(
                                $this->translate(
                                    'pm/user-%s-edited-vehicle-meta-data-%s-%s-%s',
                                    'default',
                                    $subscriber->language
                                ),
                                $this->userModerUrl($user, true, $uri),
                                $this->car()->formatName($car, $subscriber->language),
                                $this->carModerUrl($car, true, null, $uri),
                                ( count($changes) ? implode("\n", $changes) : '')
                            );

                            $this->message->send(null, $subscriber->id, $message);
                        }
                    }

                    return $this->redirectToCar($car, 'meta');
                }
            }
        }


        $picturesCount = $pictures->getAdapter()->fetchOne(
            $pictures->getAdapter()->select()
                ->from('pictures', [new Zend_Db_Expr('COUNT(1)')])
                ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
                ->where('picture_item.item_id = ?', $car->id)
        );

        $ucsTable = new DbTable\User\CarSubscribe();

        $user = $this->user()->get();
        $ucsRow = $ucsTable->fetchRow([
            'user_id = ?' => $user->id,
            'item_id = ?'  => $car->id
        ]);

        $db = $carTable->getAdapter();

        $carLangTable = new DbTable\Vehicle\Language();
        $langNameCount = $carLangTable->getAdapter()->fetchOne(
            $carLangTable->getAdapter()->select()
                ->from('car_language', 'count(1)')
                ->where('car_id = ?', $car->id)
        );

        $twinsGroupsCount = $db->fetchOne(
            $db->select()
                ->from('twins_groups_cars', 'count(1)')
                ->where('car_id = ?', $car->id)
        );

        $catalogueLinksCount = $db->fetchOne(
            $db->select()
                ->from('car_parent', 'count(1)')
                ->where('car_id = ?', $car->id)
        );
        $catalogueLinksCount += $db->fetchOne(
            $db->select()
                ->from('car_parent', 'count(1)')
                ->where('parent_id = ?', $car->id)
        );
        $catalogueLinksCount += $db->fetchOne(
            $db->select()
                ->from('brand_item', 'count(1)')
                ->where('car_id = ?', $car->id)
        );

        $factoriesCount = $db->fetchOne(
            $db->select()
                ->from('factory_item', 'count(1)')
                ->where('item_id = ?', $car->id)
        );

        $engineVehiclesCount = $db->fetchOne(
            $db->select()
                ->from('cars', 'count(1)')
                ->where('engine_item_id = ?', $car->id)
        );

        $tabs = [
            'meta' => [
                'icon'  => 'glyphicon glyphicon-pencil',
                'title' => 'moder/vehicle/tabs/meta',
                'count' => 0,
            ],
            'name' => [
                'icon'      => 'glyphicon glyphicon-align-left',
                'title'     => 'moder/vehicle/tabs/name',
                'data-load' => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car-name'
                ], [], true),
                'count' => $langNameCount,
            ],
            'catalogue' => [
                'icon'      => false,
                'title'     => 'moder/vehicle/tabs/catalogue',
                'data-load' => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car-catalogue'
                ], [], true),
                'count' => $catalogueLinksCount,
            ],
            'vehicles' => [
                'icon'      => false,
                'title'     => 'moder/vehicle/tabs/vehicles',
                'data-load' => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'engine-vehicles'
                ], [], true),
                'count' => $engineVehiclesCount,
            ],
            'tree' => [
                'icon'      => 'fa fa-tree',
                'title'     => 'moder/vehicle/tabs/tree',
                'data-load' => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car-tree'
                ], [], true),
                'count' => 0,
            ],
            'twins' => [
                'icon'      => 'glyphicon glyphicon-adjust',
                'title'     => 'moder/vehicle/tabs/twins',
                'data-load' => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car-twins'
                ], [], true),
                'count' => $twinsGroupsCount,
            ],
            'factories' => [
                'icon'      => 'fa fa-cogs',
                'title'     => 'moder/vehicle/tabs/factories',
                'data-load' => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car-factories'
                ], [], true),
                'count' => $factoriesCount,
            ],
            'pictures' => [
                'icon'      => 'glyphicon glyphicon-th',
                'title'     => 'moder/vehicle/tabs/pictures',
                'data-load' => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car-pictures'
                ], [], true),
                'count' => $picturesCount,
            ],
        ];
        
        if ($car->item_type_id != DbTable\Item\Type::VEHICLE) {
            unset($tabs['twins']);
        }

        if ($car->item_type_id != DbTable\Item\Type::ENGINE) {
            unset($tabs['vehicles']);
        }
        
        if (!in_array($car->item_type_id, [DbTable\Item\Type::ENGINE, DbTable\Item\Type::VEHICLE])) {
            unset($tabs['pictures']);
            unset($tabs['factories']);
        }

        if ($this->user()->get()->id == 1) {
            $tabs['modifications'] = [
                'icon'      => 'glyphicon glyphicon-th',
                'title'     => 'moder/vehicle/tabs/modifications',
                'data-load' => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car-modifications'
                ], [], true),
                'count' => 0
            ];
        }

        $currentTab = $this->params('tab', 'meta');
        foreach ($tabs as $id => &$tab) {
            $tab['active'] = $id == $currentTab;
        }

        $specsCount = $this->specificationsService->getSpecsCount($car->id);

        return [
            'picturesCount'  => $picturesCount,
            'canEditMeta'    => $canEditMeta,
            'car'            => $car,
            'randomPicture'  => $this->getRandomPicture($car),
            'subscribed'     => (bool)$ucsRow,
            'tabs'           => $tabs,
            'specsCount'     => $specsCount,
            'formModerCarEditMeta' => $formModerCarEditMeta
        ];
    }

    private function buildChangesMessage($oldData, $newData, $language)
    {
        $fields = [
            'name'             => ['str', 'moder/vehicle/changes/name-%s-%s'],
            'body'             => ['str', 'moder/vehicle/changes/body-%s-%s'],
            'begin_year'       => ['int', 'moder/vehicle/changes/from/year-%s-%s'],
            'begin_month'      => ['int', 'moder/vehicle/changes/from/month-%s-%s'],
            'end_year'         => ['int', 'moder/vehicle/changes/to/year-%s-%s'],
            'end_month'        => ['int', 'moder/vehicle/changes/to/month-%s-%s'],
            'today'            => ['bool', 'moder/vehicle/changes/to/today-%s-%s'],
            'produced'         => ['int', 'moder/vehicle/changes/produced/count-%s-%s'],
            'produced_exactly' => ['bool', 'moder/vehicle/changes/produced/exactly-%s-%s'],
            'is_concept'       => ['bool', 'moder/vehicle/changes/is-concept-%s-%s'],
            'is_group'         => ['bool', 'moder/vehicle/changes/is-group-%s-%s'],
            'begin_model_year' => ['int', 'moder/vehicle/changes/model-years/from-%s-%s'],
            'end_model_year'   => ['int', 'moder/vehicle/changes/model-years/to-%s-%s'],
            'spec_id'          => ['spec_id', 'moder/vehicle/changes/spec-%s-%s'],
            'vehicle_type_id'  => ['vehicle_type_id', 'moder/vehicle/changes/car-type-%s-%s']
        ];

        $changes = [];
        foreach ($fields as $field => $info) {
            $message = $this->translate($info[1], 'default', $language);
            switch ($info[0]) {
                case 'int':
                    $old = is_null($oldData[$field]) ? null : (int)$oldData[$field];
                    $new = is_null($newData[$field]) ? null : (int)$newData[$field];
                    if ($old !== $new) {
                        $changes[] = sprintf($message, $old, $new);
                    }
                    break;
                case 'str':
                    $old = is_null($oldData[$field]) ? null : (string)$oldData[$field];
                    $new = is_null($newData[$field]) ? null : (string)$newData[$field];
                    if ($old !== $new) {
                        $changes[] = sprintf($message, $old, $new);
                    }
                    break;
                case 'bool':
                    $old = is_null($oldData[$field])
                        ? null
                        : $this->translate($oldData[$field]
                            ? 'moder/vehicle/changes/boolean/true'
                            : 'moder/vehicle/changes/boolean/false');
                    $new = is_null($newData[$field])
                        ? null
                        : $this->translate($newData[$field]
                            ? 'moder/vehicle/changes/boolean/true'
                            : 'moder/vehicle/changes/boolean/false');
                    if ($old !== $new) {
                        $changes[] = sprintf($message, $old, $new);
                    }
                    break;

                case 'spec_id':
                    $specTable = new DbTable\Spec();
                    $old = $oldData[$field];
                    $new = $newData[$field];
                    if ($old !== $new) {
                        $old = $specTable->find($old)->current();
                        $new = $specTable->find($new)->current();
                        $changes[] = sprintf($message, $old ? $old->short_name : '-', $new ? $new->short_name : '-');
                    }
                    break;

                case 'vehicle_type_id':
                    $vehicleTypeTable = new DbTable\Vehicle\Type();
                    $old = $oldData[$field];
                    $new = $newData[$field];
                    $old = $old ? (array)$old : [];
                    $new = $new ? (array)$new : [];
                    if (array_diff($old, $new) !== array_diff($new, $old)) {
                        $oldNames = [];
                        foreach ($vehicleTypeTable->find($old) as $row) {
                            $oldNames[] = $this->translate($row->name);
                        }
                        $newNames = [];
                        foreach ($vehicleTypeTable->find($new) as $row) {
                            $newNames[] = $this->translate($row->name);
                        }
                        $changes[] = sprintf(
                            $message,
                            $oldNames ? implode(', ', $oldNames) : '-',
                            $newNames ? implode(', ', $newNames) : '-'
                        );
                    }
                    break;
            }
        }

        return $changes;
    }

    public function carSelectBrandAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();
        $car = $carTable->fetchRow([
            'id = ?' => (int)$this->params('car_id'),
            'item_type_id IN (?)' => [DbTable\Item\Type::ENGINE, DbTable\Item\Type::VEHICLE]
        ]);
        if (! $car) {
            return $this->notFoundAction();
        }

        $canMove = $this->canMove($car);
        if (! $canMove) {
            return $this->forbiddenAction();
        }

        $brands = $this->getBrandTable();

        return [
            'brands' => $brands->fetchAll(
                $brands->select(true)
                    ->order(['brands.position', 'brands.name'])
            ),
            'car' => $car
        ];
    }


    public function setBrandItemTypeAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canMove = $this->canMove($car);
        if (! $canMove) {
            return $this->forbiddenAction();
        }

        $brandTable = $this->getBrandTable();
        $brand = $brandTable->find($this->params('brand_id'))->current();
        if (! $brand) {
            return $this->notFoundAction();
        }

        $type = (int)$this->params()->fromPost('type');

        $brandItemTable = new DbTable\BrandItem();
        $brandItemRow = $brandItemTable->fetchRow([
            'brand_id = ?' => $brand->id,
            'car_id = ?'   => $car->id
        ]);

        if (! $brandItemRow) {
            return $this->notFoundAction();
        }

        $brandItemRow->type = $type;
        $brandItemRow->save();

        if ($this->getRequest()->isXmlHttpRequest()) {
            return new JsonModel([
                'ok' => true
            ]);
        } else {
            return $this->redirect()->toUrl($this->carModerUrl($car));
        }
    }

    public function setBrandItemCatnameAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canMove = $this->canMove($car);
        if (! $canMove) {
            return $this->forbiddenAction();
        }

        $brandTable = $this->getBrandTable();
        $brand = $brandTable->find($this->params('brand_id'))->current();
        if (! $brand) {
            return $this->notFoundAction();
        }

        $brandItemTable = new DbTable\BrandItem();
        $brandItemRow = $brandItemTable->fetchRow([
            'brand_id = ?' => $brand->id,
            'car_id = ?'   => $car->id
        ]);

        if (! $brandItemRow) {
            return $this->notFoundAction();
        }

        $ok = false;
        $this->brandItemForm->setData($this->params()->fromPost());
        if ($this->brandItemForm->isValid()) {
            $values = $this->brandItemForm->getData();

            $sameBrandItemRow = $brandItemTable->fetchRow([
                'brand_id = ?' => $brand->id,
                'catname = ?'  => $values['catname'],
                'car_id <> ?'  => $car->id
            ]);

            if (! $sameBrandItemRow) {
                $brandItemRow->catname = $values['catname'] ? $values['catname'] : $car->id;
                $brandItemRow->save();

                $ok = true;
            }
        }

        if ($this->getRequest()->isXmlHttpRequest()) {
            return new JsonModel([
                'ok' => $ok,
                'messages' => $this->brandItemForm->getMessages()
            ]);
        } else {
            return $this->redirect()->toUrl($this->carModerUrl($car, false, 'catalogue'));
        }
    }

    public function carSelectTwinsGroupAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();
        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canEditTwins = $this->user()->isAllowed('twins', 'edit');
        if (! $canEditTwins) {
            return $this->forbiddenAction();
        }

        $brand = null;

        $twinsGroups = new DbTable\Twins\Group();

        $twinsGroup = $twinsGroups->find($this->params('twins_group_id'))->current();

        if ($twinsGroup) {
            $twinsGroupsCars = new DbTable\Twins\GroupVehicle();
            $twinsGroupsCars->insert([
                'twins_group_id' => $twinsGroup->id,
                'car_id' => $car->id
            ]);

            $this->log(sprintf(
                'Автомобиль %s добавлен в группу близнецов %s',
                htmlspecialchars($this->car()->formatName($car, 'en')),
                htmlspecialchars($twinsGroup->name)
            ), [$twinsGroup, $car]);

            return $this->redirectToCar($car, 'twins');
        }

        $brandTable = $this->getBrandTable();
        $brand = $brandTable->find($this->params('brand_id'))->current();
        $brands = [];
        $groups = [];
        if ($brand) {
            $groups = $twinsGroups->fetchAll(
                $twinsGroups
                ->select(true)
                ->join('twins_groups_cars', 'twins_groups.id = twins_groups_cars.twins_group_id', null)
                ->join('item_parent_cache', 'twins_groups_cars.car_id = item_parent_cache.item_id', null)
                ->join('brand_item', 'item_parent_cache.parent_id = brand_item.car_id', null)
                ->where('brand_item.brand_id = ?', $brand->id)
                ->group('twins_groups.id')
                ->order('twins_groups.name')
            );
        } else {
            $brands = $brandTable->fetchAll(
                $brandTable->select(true)
                ->join('brand_item', 'brands.id = brand_item.brand_id', null)
                ->join('item_parent_cache', 'brand_item.car_id = item_parent_cache.parent_id', null)
                ->join('twins_groups_cars', 'item_parent_cache.item_id = twins_groups_cars.car_id', null)
                ->group('brands.id')
                ->order(['brands.position', 'brands.name'])
            );
        }

        $this->twinsForm->setAttribute('action', $this->url()->fromRoute('moder/cars/params', [], [], true));
        if ($this->getRequest()->isPost()) {
            $this->twinsForm->setData($this->params()->fromPost());
            if ($this->twinsForm->isValid()) {
                $values = $this->twinsForm->getData();
                $values['add_datetime'] = new Zend_Db_Expr('NOW()');

                $id = $twinsGroups->insert($values);

                return $this->forward()->dispatch(self::class, [
                    'action'         => 'car-select-twins-group',
                    'car_id'         => $car->id,
                    'twins_group_id' => $id
                ]);
            }
        }

        return [
            'car'               => $car,
            'brand'             => $brand,
            'formTwinsGroupAdd' => $this->twinsForm,
            'canEditTwins'      => $canEditTwins,
            'brands'            => $brands,
            'groups'            => $groups
        ];
    }

    public function carRemoveFromTwinsGroupAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();
        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

            $canEditTwins = $this->user()->isAllowed('twins', 'edit');
        if (! $canEditTwins) {
            throw new Exception('Access denied');
        }

                $twinsGroups = new DbTable\Twins\Group();
                $twinsGroup = $twinsGroups->find($this->params('twins_group_id'))->current();

        if (! $twinsGroup) {
            return $this->notFoundAction();
        }

                $twinsGroupVehicleTable = new DbTable\Twins\GroupVehicle();
                $twinsGroupCar = $twinsGroupVehicleTable->fetchRow(
                    $twinsGroupVehicleTable->select(true)
                        ->where('car_id = ?', $car->id)
                        ->where('twins_group_id = ?', $twinsGroup->id)
                );

                $twinsGroupCar->delete();

                // remove empty group
                $twinsGroupsCarsRow = $twinsGroupVehicleTable->fetchRow(
                    $twinsGroupVehicleTable->select(true)
                        ->where('twins_group_id = ?', $twinsGroup->id)
                );
        if (! $twinsGroupsCarsRow) {
            $twinsGroup->delete();
        }

                return $this->redirectToCar($car, 'twins');
    }

    public function carSelectFactoryAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();
        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canEditFactory = $this->user()->isAllowed('factory', 'edit');
        if (! $canEditFactory) {
            return $this->forbiddenAction();
        }

        $factoryTable = new DbTable\Factory();

        $factory = $factoryTable->find($this->params()->fromPost('factory_id'))->current();

        if ($factory) {
            $factoryCarTable = new DbTable\FactoryCar();
            $factoryCarTable->insert([
                'factory_id' => $factory->id,
                'item_id'    => $car->id
            ]);

            $this->log(sprintf(
                'Автомобиль %s добавлен к заводу %s',
                htmlspecialchars($this->car()->formatName($car, 'en')),
                htmlspecialchars($factory->name)
            ), [$factory, $car]);

            return $this->redirectToCar($car, 'factories');
        }

        return [
            'factories' => $factoryTable->fetchAll(
                $factoryTable->select(true)
                    ->order('factory.name')
            ),
            'car' => $car
        ];
    }


    public function carRemoveFromFactoryAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();
        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canEditFactory = $this->user()->isAllowed('factory', 'edit');
        if (! $canEditFactory) {
            return $this->forbiddenAction();
        }

        $factoryTable = new DbTable\Factory();
        $factory = $factoryTable->find($this->params('factory_id'))->current();

        if (! $factory) {
            return $this->notFoundAction();
        }

        $factoryCarTable = new DbTable\FactoryCar();
        $factoryCar = $factoryCarTable->fetchRow(
            $factoryCarTable->select(true)
                ->where('car_id = ?', $car->id)
                ->where('factory_id = ?', $factory->id)
        );

        if ($factoryCar) {
            $factoryCar->delete();
        }

        return $this->redirectToCar($car, 'factories');
    }

    public function subscribeAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $user = $this->user()->get();
        $ucsTable = new DbTable\User\CarSubscribe();
        $ucsTable->subscribe($user, $car);

        return new JsonModel([
            'ok' => true
        ]);
    }

    public function unsubscribeAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $user = $this->user()->get();
        $ucsTable = new DbTable\User\CarSubscribe();
        $ucsTable->unsubscribe($user, $car);

        return new JsonModel([
            'ok' => true
        ]);
    }

    public function treeAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canEditMeta = $this->canEditMeta($car);

        if (! $canEditMeta) {
            return $this->notFoundAction();
        }

        $parents = $carTable->fetchAll(
            $carTable->select(true)
            ->join('car_parent', 'cars.id = car_parent.parent_id', null)
            ->where('car_parent.car_id = ?', $car->id)
            ->order($this->catalogue()->carsOrdering())
        );

        $allParents = $carTable->fetchAll(
            $carTable->select(true)
            ->join('item_parent_cache', 'cars.id = item_parent_cache.parent_id', null)
            ->where('item_parent_cache.item_id = ?', $car->id)
            ->order($this->catalogue()->carsOrdering())
        );

        $allChilds = $carTable->fetchAll(
            $carTable->select(true)
            ->join('item_parent_cache', 'cars.id = item_parent_cache.item_id', null)
            ->where('item_parent_cache.parent_id = ?', $car->id)
            ->order($this->catalogue()->carsOrdering())
        );

        $graphItems = [];
        foreach ($allParents as $c) {
            $graphItems[$c->id] = $this->car()->formatName($c, $this->language());
        }
        foreach ($allChilds as $c) {
            $graphItems[$c->id] = $this->car()->formatName($c, $this->language());
        }

        $graphItemsIds = array_keys($graphItems);

        $carParentTable = $this->getCarParentTable();

        $carParentRows = $carParentTable->fetchAll(
            $carParentTable->select(true)
                ->where('car_id in (?)', $graphItemsIds)
                ->where('parent_id in (?)', $graphItemsIds)
        );
        $graphLinks = [];
        foreach ($carParentRows as $carParentRow) {
            $graphLinks[] = [
                'car_id'    => $carParentRow->car_id,
                'parent_id' => $carParentRow->parent_id
            ];
        }

        $carParentRows = $carParentTable->fetchAll([
            'parent_id = ?' => $car->id
        ]);

        $childCars = [];
        foreach ($carParentRows as $carParentRow) {
            $childRow = $carTable->find($carParentRow->car_id)->current();
            $childCars[] = [
                'name'      => $this->car()->formatName($childRow, $this->language()),
                'isPrimary' => $carParentRow->is_primary,
                'treeUrl'   => $this->url()->fromRoute('moder/cars/params', [
                    'car_id' => $childRow->id
                ], [], true),
                'moderUrl'  => $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car',
                    'car_id' => $childRow->id
                ], [], true),
                'setIsPrimaryUrl' => $this->url()->fromRoute('moder/cars/params', [
                    'action'    => 'set-is-primary',
                    'car_id'    => $childRow->id,
                    'parent_id' => $car->id,
                    'value'     => ! $carParentRow->is_primary
                ], [], true)
            ];
        }

        return [
            'car'        => $car,
            'parents'    => $parents,
            'childs'     => $childCars,
            'graphItems' => $graphItems,
            'graphLinks' => $graphLinks
        ];
    }

    public function rebuildTreeAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canEditMeta = $this->canEditMeta($car);

        if (! $canEditMeta) {
            return $this->notFoundAction();
        }

        $cpcTable = new DbTable\Vehicle\ParentCache();

        $cpcTable->rebuildCache($car);

        return $this->redirect()->toRoute('moder/cars/params', [
            'action' => 'tree'
        ], [], true);
    }

    public function setIsPrimaryAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canEditMeta = $this->canEditMeta($car);
        if (! $canEditMeta) {
            return $this->notFoundAction();
        }

        $parentCar = $carTable->find($this->params('parent_id'))->current();
        if (! $parentCar) {
            return $this->notFoundAction();
        }

        $canEditMeta = $this->canEditMeta($parentCar);
        if (! $canEditMeta) {
            return $this->notFoundAction();
        }

        $carParentTable = $this->getCarParentTable();
        $carParentRow = $carParentTable->fetchRow([
            'car_id = ?'    => $car->id,
            'parent_id = ?' => $parentCar->id
        ]);

        if (! $carParentRow) {
            return $this->notFoundAction();
        }

        $carParentRow->is_primary = (bool)$this->params('value');
        $carParentRow->save();

        return $this->redirect()->toRoute('moder/cars/params', [
            'action' => 'tree',
            'car_id' => $parentCar->id,
        ]);
    }

    public function removeParentAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        if (! $this->getRequest()->isPost()) {
            return $this->notFoundAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canEditMeta = $this->canEditMeta($car);

        if (! $canEditMeta) {
            return $this->notFoundAction();
        }

        $parentCar = $carTable->find($this->params('parent_id'))->current();
        if (! $parentCar) {
            return $this->notFoundAction();
        }

        $carParentTable = $this->getCarParentTable();

        $carParentTable->removeParent($car, $parentCar);

        $carTable->updateInteritance($car);

        $vehicleType = new VehicleType();
        $vehicleType->refreshInheritanceFromParents($car->id);

        $this->specificationsService->updateActualValues($car->id);

        $message = sprintf(
            '%s перестал быть родительским автомобилем для %s',
            htmlspecialchars($this->car()->formatName($parentCar, 'en')),
            htmlspecialchars($this->car()->formatName($car, 'en'))
        );
        $this->log($message, [$car, $parentCar]);

        return $this->redirect()->toUrl($this->getRequest()->getServer('HTTP_REFERER'));
    }

    public function addParentAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        /*if (!$this->getRequest()->isPost()) {
         return $this->notFoundAction();
         }*/

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canEditMeta = $this->canEditMeta($car);

        if (! $canEditMeta) {
            return $this->notFoundAction();
        }

        $parentCar = $carTable->find($this->params('parent_id'))->current();
        if (! $parentCar) {
            return $this->notFoundAction();
        }

        /*if (!$parentCar->is_group) {
         return $this->_forward('add-parent-options');
         }*/

        $this->getCarParentTable()->addParent($car, $parentCar);

        $carTable->updateInteritance($car);

        $vehicleType = new VehicleType();
        $vehicleType->refreshInheritanceFromParents($car->id);

        $this->specificationsService->updateActualValues($car->id);

        $message = sprintf(
            '%s выбран как родительский автомобиль для %s',
            htmlspecialchars($this->car()->formatName($parentCar, 'en')),
            htmlspecialchars($this->car()->formatName($car, 'en'))
        );
        $this->log($message, [$car, $parentCar]);

        $url = $this->url()->fromRoute('moder/cars/params', [
            'action' => 'car',
            'tab'    => 'catalogue'
        ], [], true);
        if ($this->getRequest()->isXmlHttpRequest()) {
            return new JsonModel([
                'ok'  => true,
                'url' => $url
            ]);
        } else {
            return $this->redirect()->toUrl($url);
        }
    }

    public function carAutocompleteAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $carRow = $carTable->find($this->params('car_id'))->current();
        if (! $carRow) {
            return $this->notFoundAction();
        }

        $query = trim($this->params()->fromQuery('q'));

        $result = [];

        $language = $this->language();
        $imageStorage = $this->imageStorage();
        
        if (in_array($carRow->item_type_id, [DbTable\Item\Type::VEHICLE, DbTable\Item\Type::ENGINE])) {

            $brandModel = new BrandModel();
            $brandRows = $brandModel->getList([
                'language' => $language,
                'columns'  => ['id', 'name', 'img']
            ], function ($select) use ($query) {
                $select->where('brands.name like ?', $query . '%');
            });
    
            foreach ($brandRows as $brandRow) {
                $img = false;
                if ($brandRow['img']) {
                    $imageInfo = $imageStorage->getFormatedImage($brandRow['img'], 'brandicon2');
                    if ($imageInfo) {
                        $img = $imageInfo->getSrc();
                    }
                }
    
                $result[] = [
                    'url'   => $this->url()->fromRoute('moder/brand-vehicle/params', [
                        'action'     => 'add',
                        'brand_id'   => $brandRow['id'],
                        'vehicle_id' => $carRow->id
                    ], [], true),
                    'name'  => $brandRow['name'],
                    'image' => $img,
                    'type'  => 'brand'
                ];
            }
        }


        $beginYear = false;
        $endYear = false;
        $today = false;
        $body = false;

        $pattern = "|^" .
                "(([0-9]{4})([-–]([^[:space:]]{2,4}))?[[:space:]]+)?(.*?)( \((.+)\))?( '([0-9]{4})(–(.+))?)?" .
            "$|isu";

        if (preg_match($pattern, $query, $match)) {
            $query = trim($match[5]);
            $body = isset($match[7]) ? trim($match[7]) : null;
            $beginYear = isset($match[9]) ? (int)$match[9] : null;
            $endYear = isset($match[11]) ? $match[11] : null;
            $beginModelYear = isset($match[2]) ? (int)$match[2] : null;
            $endModelYear = isset($match[4]) ? $match[4] : null;

            if ($endYear == 'н.в.') {
                $today = true;
                $endYear = false;
            } else {
                $eyLength = strlen($endYear);
                if ($eyLength) {
                    if ($eyLength == 2) {
                        $endYear = $beginYear - $beginYear % 100 + $endYear;
                    } else {
                        $endYear = (int)$endYear;
                    }
                } else {
                    $endYear = false;
                }
            }

            if ($endModelYear == 'н.в.') {
                $today = true;
                $endModelYear = false;
            } else {
                $eyLength = strlen($endModelYear);
                if ($eyLength) {
                    if ($eyLength == 2) {
                        $endModelYear = $beginModelYear - $beginModelYear % 100 + $endModelYear;
                    } else {
                        $endModelYear = (int)$endModelYear;
                    }
                } else {
                    $endModelYear = false;
                }
            }
        }

        $specTable = new DbTable\Spec();
        $specRow = $specTable->fetchRow([
            'INSTR(?, short_name)' => $query
        ]);

        $specId = null;
        if ($specRow) {
            $specId = $specRow->id;
            $query = trim(str_replace($specRow->short_name, '', $query));
        }
        
        $allowedItemTypes = [$carRow->item_type_id];
        if (in_array($carRow->item_type_id, [DbTable\Item\Type::VEHICLE, DbTable\Item\Type::ENGINE])) {
            $allowedItemTypes[] = DbTable\Item\Type::CATEGORY;
        }

        $select = $carTable->select(true)
            ->where('cars.is_group')
            ->where('cars.item_type_id IN (?)', $allowedItemTypes)
            ->where('cars.name like ?', $query . '%')
            ->order(['length(cars.name)', 'cars.is_group desc', 'cars.name'])
            ->limit(15);

        if ($specId) {
            $select->where('spec_id = ?', $specId);
        }

        if ($beginYear) {
            $select->where('cars.begin_year = ?', $beginYear);
        }
        if ($today) {
            $select->where('cars.today');
        } elseif ($endYear) {
            $select->where('cars.end_year = ?', $endYear);
        }
        if ($body) {
            $select->where('cars.body like ?', $body . '%');
        }

        if ($beginModelYear) {
            $select->where('cars.begin_model_year = ?', $beginModelYear);
        }

        if ($endModelYear) {
            $select->where('cars.end_model_year = ?', $endModelYear);
        }

        $expr = $carTable->getAdapter()->quoteInto(
            'cars.id = item_parent_cache.item_id and item_parent_cache.parent_id = ?',
            $carRow->id
        );
        $select
            ->joinLeft('item_parent_cache', $expr, null)
            ->where('item_parent_cache.item_id is null');


        $carRows = $carTable->fetchAll($select);

        foreach ($carRows as $carRow) {
            $result[] = [
                'url'      => $this->url()->fromRoute('moder/cars/params', [
                    'action'    => 'add-parent',
                    'parent_id' => $carRow->id
                ], [], true),
                'is_group' => (boolean)$carRow->is_group,
                'name'     => $this->car()->formatName($carRow, $language),
                'type'     => 'car'
            ];
        }

        return new JsonModel($result);
    }

    public function carTwinsAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }


        $twinsGroupsTable = new DbTable\Twins\Group();

        $twinsGroups = [];
        $canEditTwins = $this->user()->isAllowed('twins', 'edit');

        $twinsGroupRows = $twinsGroupsTable->fetchAll(
            $twinsGroupsTable->select(true)
            ->join('twins_groups_cars', 'twins_groups.id = twins_groups_cars.twins_group_id', null)
            ->where('twins_groups_cars.car_id = ?', $car->id)
        );
        foreach ($twinsGroupRows as $twinsGroupRow) {
            $twinsGroup = [
                'id'        => $twinsGroupRow->id,
                'name'      => $twinsGroupRow->name,
                'inherited' => false,
            ];

            if ($canEditTwins) {
                $twinsGroup['removeUrl'] = $this->url()->fromRoute('moder/cars/params', [
                    'action'         => 'car-remove-from-twins-group',
                    'car_id'         => $car->id,
                    'twins_group_id' => $twinsGroup['id']
                ]);
            }

            $twinsGroups[$twinsGroupRow->id] = $twinsGroup;
        }
        $twinsGroupRows = $twinsGroupsTable->fetchAll(
            $twinsGroupsTable->select(true)
            ->join('twins_groups_cars', 'twins_groups.id = twins_groups_cars.twins_group_id', null)
            ->join('item_parent_cache', 'twins_groups_cars.car_id = item_parent_cache.parent_id', null)
            ->where('item_parent_cache.item_id = ?', $car->id)
        );
        foreach ($twinsGroupRows as $twinsGroupRow) {
            if (isset($twinsGroups[$twinsGroupRow->id])) {
                continue;
            }

            $carRows = $carTable->fetchAll(
                $carTable->select(true)
                ->join('item_parent_cache', 'cars.id = item_parent_cache.parent_id', null)
                ->where('item_parent_cache.item_id = ?', $car->id)
                ->join('twins_groups_cars', 'twins_groups_cars.car_id = item_parent_cache.parent_id', null)
                ->where('twins_groups_cars.twins_group_id = ?', $twinsGroupRow->id)
            );

            $inheritedFrom = [];
            foreach ($carRows as $carRow) {
                $inheritedFrom[] = [
                    'name' => $this->car()->formatName($carRow, $this->language()),
                    'url'  => $this->carModerUrl($carRow)
                ];
            }

            $twinsGroups[$twinsGroupRow->id] = [
                'id'            => $twinsGroupRow->id,
                'name'          => $twinsGroupRow->name,
                'inherited'     => true,
                'inheritedFrom' => $inheritedFrom
            ];
        }

        foreach ($twinsGroups as &$twinsGroup) {
            $twinsGroup['url'] = $this->url()->fromRoute('moder/twins/params', [
                'action'         => 'twins-group',
                'twins_group_id' => $twinsGroup['id']
            ]);
        }

        $model = new ViewModel([
            'car'          => $car,
            'twinsGroups'  => $twinsGroups,
            'canEditTwins' => $canEditTwins,
        ]);

        return $model->setTerminal(true);
    }

    public function carFactoriesAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $factoryTable = new DbTable\Factory();

        $factories = [];
        $canEditFactory = $this->user()->isAllowed('factory', 'edit');

        $factoriesRows = $factoryTable->fetchAll(
            $factoryTable->select(true)
                ->join('factory_item', 'factory.id = factory_item.factory_id', null)
                ->where('factory_item.item_id = ?', $car->id)
        );
        foreach ($factoriesRows as $factoriesRow) {
            $factory = [
                'id'        => $factoriesRow->id,
                'name'      => $factoriesRow->name,
                'inherited' => false,
            ];

            if ($canEditFactory) {
                $factory['removeUrl'] = $this->url()->fromRoute('moder/cars/params', [
                    'action'     => 'car-remove-from-factory',
                    'car_id'     => $car->id,
                    'factory_id' => $factory['id']
                ]);
            }

            $factories[$factoriesRow->id] = $factory;
        }
        $factoriesRows = $factoryTable->fetchAll(
            $factoryTable->select(true)
            ->join('factory_item', 'factory.id = factory_item.factory_id', null)
            ->join('item_parent_cache', 'factory_item.item_id = item_parent_cache.parent_id', null)
            ->where('item_parent_cache.item_id = ?', $car->id)
        );
        foreach ($factoriesRows as $factoriesRow) {
            if (isset($factories[$factoriesRow->id])) {
                continue;
            }

            $carRows = $carTable->fetchAll(
                $carTable->select(true)
                ->join('item_parent_cache', 'cars.id = item_parent_cache.parent_id', null)
                ->where('item_parent_cache.item_id = ?', $car->id)
                ->join('factory_item', 'factory_item.item_id = item_parent_cache.parent_id', null)
                ->where('factory_item.factory_id = ?', $factoriesRow->id)
            );

            $inheritedFrom = [];
            foreach ($carRows as $carRow) {
                $inheritedFrom[] = [
                    'name' => $this->car()->formatName($carRow, $this->language()),
                    'url'  => $this->carModerUrl($carRow)
                ];
            }

            $factories[$factoriesRow->id] = [
                'id'            => $factoriesRow->id,
                'name'          => $factoriesRow->name,
                'inherited'     => true,
                'inheritedFrom' => $inheritedFrom
            ];
        }

        foreach ($factories as &$factory) {
            $factory['url'] = $this->url()->fromRoute('moder/factories/params', [
                'action'     => 'factory',
                'factory_id' => $factory['id']
            ]);
        }

        $model = new ViewModel([
            'car'            => $car,
            'factories'      => $factories,
            'canEditFactory' => $canEditFactory,
        ]);

        return $model->setTerminal(true);
    }

    public function engineVehiclesAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $itemTable = $this->catalogue()->getCarTable();

        $engine = $itemTable->find($this->params('car_id'))->current();
        if (! $engine) {
            return $this->notFoundAction();
        }

        $items = $itemTable->fetchAll([
            'engine_item_id = ?' => $engine->id
        ]);

        $model = new ViewModel([
            'items' => $items
        ]);

        return $model->setTerminal(true);
    }

    private function carTreeWalk(DbTable\Vehicle\Row $car, $carParentRow = null)
    {
        $data = [
            'name'   => $this->car()->formatName($car, $this->language()),
            'url'    => $this->carModerUrl($car),
            'childs' => [],
            'type'   => $carParentRow ? $carParentRow->type : null
        ];

        $carParentTable = $this->getCarParentTable();
        $carParentRows = $carParentTable->fetchAll(
            $carParentTable->select(true)
            ->join('cars', 'car_parent.car_id = cars.id', null)
            ->where('car_parent.parent_id = ?', $car['id'])
            ->order(array_merge(['car_parent.type'], $this->catalogue()->carsOrdering()))
        );

        $carTable = $this->catalogue()->getCarTable();
        foreach ($carParentRows as $carParentRow) {
            $carRow = $carTable->find($carParentRow->car_id)->current();
            if ($carRow) {
                $data['childs'][] = $this->carTreeWalk($carRow, $carParentRow);
            }
        }

        return $data;
    }

    public function carTreeAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $model = new ViewModel([
            'car' => $this->carTreeWalk($car)
        ]);

        return $model->setTerminal(true);
    }

    private function getBrandVehicles(DbTable\Vehicle\Row $vehicle)
    {
        $brandTable = $this->getBrandTable();
        $brandItemTable = new DbTable\BrandItem();
        $brandVehicleLangaugeTable = new DbTable\Brand\VehicleLanguage();

        $brandItemRows = $brandItemTable->fetchAll(
            $brandItemTable->select(true)
                ->where('car_id = ?', $vehicle->id)
        );

        $brands = [];
        foreach ($brandItemRows as $brandItemRow) {
            $brandRow = $brandTable->find($brandItemRow->brand_id)->current();
            if ($brandRow) {
                $bvlRow = $brandVehicleLangaugeTable->fetchRow([
                    'vehicle_id = ?' => $vehicle->id,
                    'brand_id = ?'   => $brandRow->id,
                    'language = ?'   => $this->language()
                ]);

                if ($brandItemRow->catname) {
                    $url = $this->url()->fromRoute('catalogue', [
                        'action'        => 'brand-item',
                        'brand_catname' => $brandRow->folder,
                        'car_catname'   => $brandItemRow->catname
                    ]);
                } else {
                    $url = $this->url()->fromRoute('catalogue', [
                        'action'        => 'car',
                        'brand_catname' => $brandRow->folder,
                        'car_id'        => $vehicle->id
                    ]);
                }

                $brands[] = [
                    'brand' => [
                        'name'     => $brandRow->name,
                        'moderUrl' => $this->url()->fromRoute('moder/brands/params', [
                            'action'     => 'brand',
                            'brand_id'   => $brandRow->id
                        ]),
                    ],
                    'type'      => $brandItemRow->type,
                    'name'      => $bvlRow ? $bvlRow->name : null,
                    'catname'   => $brandItemRow->catname,
                    'url'       => $url,
                    'editUrl'   => $this->url()->fromRoute('moder/brand-vehicle/params', [
                        'action'     => 'item',
                        'brand_id'   => $brandRow->id,
                        'vehicle_id' => $vehicle->id,
                    ]),
                    'deleteUrl' => $this->url()->fromRoute('moder/brand-vehicle/params', [
                        'action'     => 'delete',
                        'brand_id'   => $brandRow->id,
                        'vehicle_id' => $vehicle->id,
                    ]),
                    'setbrandItemTypeUrl' => $this->url()->fromRoute('moder/cars/params', [
                        'action'   => 'set-brand-item-type',
                        'brand_id' => $brandRow->id,
                    ], [], true),
                    'setbrandItemCatnameUrl' => $this->url()->fromRoute('moder/cars/params', [
                        'action'   => 'set-brand-item-catname',
                        'brand_id' => $brandRow->id,
                    ], [], true),
                ];
            }
        }

        return $brands;
    }

    public function carCatalogueAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }
        
        $canAddBrand = in_array($car->item_type_id, [DbTable\Item\Type::VEHICLE, DbTable\Item\Type::ENGINE]);

        $brandTable = $this->getBrandTable();

        $relevantBrands = [];

        if ($canAddBrand && strlen($car->name) > 0) {
            $rows = $brandTable->fetchAll(
                $brandTable->select(true)
                    ->where('INSTR(?, name)', $car->name)
            );

            foreach ($rows as $row) {
                $relevantBrands[$row->id] = $row;
            }

            $brandRows = $brandTable->fetchAll(
                $brandTable->select(true)
                    ->join('brand_item', 'brands.id = brand_item.brand_id', null)
                    ->join('item_parent_cache', 'brand_item.car_id = item_parent_cache.parent_id', null)
                    ->where('item_parent_cache.item_id = ?', $car->id)
            );

            foreach ($brandRows as $brand) {
                unset($relevantBrands[$brand->id]);
            }
        }
        $canUseTree = true;

        $parents = [];
        $childs = [];

        $carParentTable = $this->getCarParentTable();

        $order = array_merge(['car_parent.type'], $this->catalogue()->carsOrdering());

        $carParentRows = $carParentTable->fetchAll(
            $carParentTable->select(true)
                ->join('cars', 'car_parent.parent_id = cars.id', null)
                ->where('car_parent.car_id = ?', $car->id)
                ->order($order)
        );
        $parents = $this->perepareCatalogueCars($carParentRows, true);

        $carParentRows = $carParentTable->fetchAll(
            $carParentTable->select(true)
                ->join('cars', 'car_parent.car_id = cars.id', null)
                ->where('car_parent.parent_id = ?', $car->id)
                ->order($order)
        );
        $childs = $this->perepareCatalogueCars($carParentRows, false);
        
        $model = new ViewModel([
            'car'                 => $car,
            'canMove'             => $this->canMove($car),
            'canAddBrand'         => $canAddBrand,
            'brands'              => $this->getBrandVehicles($car),
            'publicUrls'          => $this->carPublicUrls($car),
            'relevantBrands'      => $relevantBrands,
            'canUseTree'          => $canUseTree,
            'parents'             => $parents,
            'childs'              => $childs,
            'carParentTypeOptions' => [
                DbTable\Vehicle\ParentTable::TYPE_DEFAULT => $this->translate('catalogue/sub-model'),
                DbTable\Vehicle\ParentTable::TYPE_TUNING  => $this->translate('catalogue/related'),
                DbTable\Vehicle\ParentTable::TYPE_SPORT   => $this->translate('catalogue/sport'),
                DbTable\Vehicle\ParentTable::TYPE_DESIGN  => $this->translate('catalogue/design'),
            ]
        ]);

        return $model->setTerminal(true);
    }

    /**
     * @return DbTable\Vehicle\ParentTable
     */
    private function getCarParentTable()
    {
        return $this->carParentTable
            ? $this->carParentTable
            : $this->carParentTable = new DbTable\Vehicle\ParentTable();
    }

    /**
     * @return DbTable\BrandItem
     */
    private function getBrandItemTable()
    {
        return $this->brandItemTable
            ? $this->brandItemTable
            : $this->brandItemTable = new DbTable\BrandItem();
    }

    /**
     * @return DbTable\Brand
     */
    private function getBrandTable()
    {
        return $this->brandTable
            ? $this->brandTable
            : $this->brandTable = new DbTable\Brand();
    }

    private function walkUpUntilBrand($id, array $path)
    {
        $urls = [];

        $brandItemRows = $this->getBrandItemTable()->fetchAll([
            'car_id = ?' => $id
        ]);

        foreach ($brandItemRows as $brandItemRow) {
            $brand = $this->getBrandTable()->find($brandItemRow->brand_id)->current();
            if (! $brand) {
                throw new Exception("Broken link `{$brandItemRow->brand_id}`");
            }

            $urls[] = $this->url()->fromRoute('catalogue', [
                'action'        => 'brand-item',
                'brand_catname' => $brand->folder,
                'car_catname'   => $brandItemRow->catname,
                'path'          => $path
            ]);
        }

        $parentRows = $this->getCarParentTable()->fetchAll([
            'car_id = ?' => $id
        ]);
        foreach ($parentRows as $parentRow) {
            $urls = array_merge(
                $urls,
                $this->walkUpUntilBrand($parentRow->parent_id, array_merge([$parentRow->catname], $path))
            );
        }

        return $urls;
    }

    private function carPublicUrls(DbTable\Vehicle\Row $car)
    {
        if ($car['item_type_id'] == DbTable\Item\Type::CATEGORY) {
            return [
                $this->url()->fromRoute('categories', [
                    'action'           => 'category',
                    'category_catname' => $car['catname'],
                ])
            ];
        }
        
        return $this->walkUpUntilBrand($car->id, []);
    }

    private function perepareCatalogueCars($carParentRows, $parent)
    {
        $cars = [];

        $carTable = $this->catalogue()->getCarTable();
        $carParentTable = new DbTable\Vehicle\ParentTable();

        $parentIds = [];
        foreach ($carParentRows as $carParentRow) {
            $parentIds = $carParentRow->parent_id;
        }

        $language = $this->language();

        foreach ($carParentRows as $carParentRow) {
            $carRow = $carTable->fetchRow([
                'id = ?' => $parent ? $carParentRow->parent_id : $carParentRow->car_id
            ]);
            if (! $carRow) {
                throw new Exception("Broken car parent link");
            }

            $duplicateRow = null;
            if (! $parent) {
                $select = $carTable->select(true)
                    ->join('car_parent', 'cars.id = car_parent.car_id', null)
                    ->join('item_parent_cache', 'car_parent.car_id = item_parent_cache.parent_id', null)
                    ->where('item_parent_cache.item_id = ?', $carRow->id)
                    ->where('car_parent.parent_id = ?', $carParentRow->parent_id)
                    ->where('car_parent.car_id <> ?', $carRow->id)
                    ->where('car_parent.type = ?', $carParentRow->type);

                $duplicateRow = $carTable->fetchRow($select);
            } else {
                /*$select = $carTable->select(true)
                 ->where('cars.id IN (?)', $parentIds)
                 ->where('cars.id <> ?', $carRow->id)
                 ->join('item_parent_cache', 'cars.id = item_parent_cache.item_id', null)
                 ->where('item_parent_cache.parent_id = ?', $carRow->id)
                 ->where('not item_parent_cache.tuning')
                 ->where('not item_parent_cache.sport');*/

                $select = $carTable->select(true)
                    ->join('car_parent', 'cars.id = car_parent.parent_id', null)
                    ->where('car_parent.car_id = ?', $carParentRow->car_id)
                    ->where('car_parent.parent_id <> ?', $carRow->id)
                    ->join('item_parent_cache', 'cars.id = item_parent_cache.item_id', null)
                    ->where('item_parent_cache.parent_id = ?', $carRow->id)
                    ->where('not item_parent_cache.tuning')
                    ->where('not item_parent_cache.sport')
                    ->where('car_parent.type = ?', DbTable\Vehicle\ParentTable::TYPE_DEFAULT);

                $duplicateRow = $carTable->fetchRow($select);
            }

            $inheritBrands = [];
            if ($parent) {
                $brandItemTable = new DbTable\BrandItem();
                $brandTable = $this->getBrandTable();

                $brandItemRows = $brandItemTable->fetchAll(
                    $brandItemTable->select(true)
                        ->join('item_parent_cache', 'brand_item.car_id = item_parent_cache.parent_id', null)
                        ->where('item_parent_cache.item_id = ?', $carRow->id)
                );

                foreach ($brandItemRows as $brandItemRow) {
                    $brandRow = $brandTable->find($brandItemRow->brand_id)->current();
                    if ($brandRow) {
                        $url = $this->url()->fromRoute('catalogue', [
                            'action'        => 'brand',
                            'brand_catname' => $brandRow->folder
                        ]);

                        $inheritedCar = null;
                        if ($brandItemRow->car_id != $carParentRow->parent_id) {
                            $inheritedCar = $carTable->find($brandItemRow->car_id)->current();

                            $paths = $carParentTable->getPathsToBrand($inheritedCar->id, $brandRow->id);

                            $publicUrls = [];
                            foreach ($paths as $path) {
                                $publicUrls[] = $this->url()->fromRoute('catalogue', array_replace([
                                    'action' => 'brand-item',
                                    'brand_catname' => $brandRow->folder
                                ], $path));
                            }

                            $inheritedCar = [
                                'name' => $this->car()->formatName($inheritedCar, $this->language()),
                                'url'  => $this->url()->fromRoute('moder/cars/params', [
                                    'action' => 'car',
                                    'car_id' => $inheritedCar->id,
                                ], [], true),
                                'publicUrls' => $publicUrls,
                                'type' => $brandItemRow->type
                            ];
                        }

                        $inheritBrands[] = [
                            'name'     => $brandRow->name,
                            'type'     => $brandItemRow->type,
                            'catname'  => $brandItemRow->catname,
                            'moderUrl' => $this->url()->fromRoute('moder/brands/params', [
                                'action'   => 'brand',
                                'brand_id' => $brandRow->id
                            ]),
                            'url' => $url,
                            'car' => $inheritedCar
                        ];
                    }
                }
            }

            $cars[] = [
                'id'         => $carRow->id,
                'name'       => $carRow->getNameData($language),
                'publicUrls' => $this->carPublicUrls($carRow),
                'type'       => $carParentRow->type,
                'duplicateRow' => $duplicateRow,
                'url'        => $this->url()->fromRoute('moder/cars/params', [
                    'action'     => 'car',
                    'car_id'     => $carRow->id,
                    'tab'        => 'catalogue'
                ]),
                'parent'    => [
                    'type'      => $carParentRow->type,
                    'name'      => $carParentRow->name,
                    'catname'   => $carParentRow->catname,
                ],
                'deleteUrl' => $this->url()->fromRoute('moder/cars/params', [
                    'action'     => 'remove-parent',
                    'car_id'     => $parent ? $carParentRow->car_id : $carRow->id,
                    'parent_id'  => $parent ? $carRow->id : $carParentRow->parent_id,
                ], [], true),
                'typeUrl' => $this->url()->fromRoute('moder/cars/params', [
                    'action'     => 'car-parent-set-type',
                    'car_id'     => $carParentRow->car_id,
                    'parent_id'  => $carParentRow->parent_id
                ], [], true),
                'catnameUrl' => $this->url()->fromRoute('moder/cars/params', [
                    'action'     => 'car-parent-set-catname',
                    'car_id'     => $carParentRow->car_id,
                    'parent_id'  => $carParentRow->parent_id
                ], [], true),
                'inheritBrands' => $inheritBrands
            ];
        }

        return $cars;
    }

    public function carNameAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }
        
        $user = $this->user()->get();

        $carTable = $this->catalogue()->getCarTable();
        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $carLangTable = new DbTable\Vehicle\Language();
        
        $values = [];
        
        $language = $this->language();
        
        foreach ($this->allowedLanguages as $code) {
            $carLangRow = $carLangTable->fetchRow([
                'car_id = ?'   => $car->id,
                'language = ?' => $code
            ]);
            
            $text = null;
            if ($carLangRow && $carLangRow->text_id) {
                $text = $this->textStorage->getText($carLangRow->text_id);
            }
            
            $fullText = null;
            if ($carLangRow && $carLangRow->full_text_id) {
                $fullText = $this->textStorage->getText($carLangRow->full_text_id);
            }
        
            $values[$code] = [
                'name'      => $carLangRow ? $carLangRow->name : null,
                'text'      => $text,
                'full_text' => $fullText
            ];
        }
        
        $form = new ItemLanguagesForm(null, [
            'languages' => $this->allowedLanguages
        ]);
        $form->setAttribute('action', $this->url()->fromRoute(null, [], [], true));
        $form->populateValues($values);
        
        if ($this->getRequest()->isPost()) {
            $form->setData($this->params()->fromPost());
            if ($form->isValid()) {
                $values = $form->getData();
                
                $changes = [];
                
                foreach ($this->allowedLanguages as $lang) {
                    $langValues = $values[$lang];
                    unset($values[$lang]);
                    
                    $fullText = $langValues['full_text'];
                    $text = $langValues['text'];
                    $name = $langValues['name'];
                    
                    $langRow = $carLangTable->fetchRow([
                        'car_id = ?'   => $car->id,
                        'language = ?' => $lang
                    ]);
                    if (! $langRow) {
                        $langRow = $carLangTable->createRow([
                            'car_id'   => $car->id,
                            'language' => $lang
                        ]);
                        $nameChanged = true;
                    } else {
                        $nameChanged = ($name != $langRow->name);
                    }
                    
                    $langRow->setFromArray([
                        'name' => $name,
                    ]);
                    
                    if ($langRow->text_id) {
                        
                        $textChanged = ($text != $this->textStorage->getText($langRow->text_id));
                        
                        $this->textStorage->setText($langRow->text_id, $text, $user->id);
                    } elseif ($text) {
                        
                        $textChanged = true;
                        
                        $textId = $this->textStorage->createText($text, $user->id);
                        $langRow->text_id = $textId;
                    }
                    
                    if ($langRow->full_text_id) {
                        
                        $fullTextChanged = ($fullText != $this->textStorage->getText($langRow->full_text_id));
                        
                        $this->textStorage->setText($langRow->full_text_id, $fullText, $user->id);
                        
                    } elseif ($fullText) {
                        
                        $fullTextChanged = true;
                        
                        $fullTextId = $this->textStorage->createText($fullText, $user->id);
                        $langRow->full_text_id = $fullTextId;
                    }
                    
                    if ($langRow->name || $langRow->text_id || $langRow->full_text_id) {
                        $langRow->save();
                    }
                    
                    if ($nameChanged) {
                        $changes[$lang][] = 'name';
                    }
                    
                    if ($textChanged) {
                        $changes[$lang][] = 'text';
                    }
                    
                    if ($fullTextChanged) {
                        $changes[$lang][] = 'full_text';
                    }
                }
                
                $this->brandVehicle->refreshAutoByVehicle($car->id);
                
                /*if ($changes) {
                    $userIds = $this->textStorage->getTextUserIds($car->full_text_id);
                
                    $userTable = new \Autowp\User\Model\DbTable\User();
                    foreach ($userIds as $userId) {
                        if ($userId != $user->id) {
                            foreach ($userTable->find($userId) as $userRow) {
                                $uri = $this->hostManager->getUriByLanguage($userRow->language);
                
                                $message = sprintf(
                                    $this->translate(
                                        'pm/user-%s-edited-vehicle-full-description-%s-%s',
                                        'default',
                                        $userRow->language
                                    ),
                                    $this->userModerUrl($user, true, $uri),
                                    $this->car()->formatName($car, $userRow->language),
                                    $this->carModerUrl($car, true, null, $uri)
                                );
                
                                $this->message->send(null, $userRow->id, $message);
                            }
                        }
                    }
                }*/
                /*
                    if ($car->text_id) {
                        $userIds = $this->textStorage->getTextUserIds($car->text_id);

                        $userTable = new \Autowp\User\Model\DbTable\User();
                        foreach ($userIds as $userId) {
                            if ($userId != $user->id) {
                                foreach ($userTable->find($userId) as $userRow) {
                                    $uri = $this->hostManager->getUriByLanguage($userRow->language);

                                    $message = sprintf(
                                        $this->translate(
                                            'pm/user-%s-edited-vehicle-description-%s-%s',
                                            'default',
                                            $userRow->language
                                        ),
                                        $this->userModerUrl($user, true, $uri),
                                        $this->car()->formatName($car, $userRow->language),
                                        $this->carModerUrl($car, true, null, $uri)
                                    );

                                    $this->message->send(null, $userRow->id, $message);
                                }
                            }
                        }
                    }
                    
                $changes = [];

                foreach ($this->allowedLanguages as $lang) {
                    $value = trim($this->params()->fromPost($lang));
        
                    $row = $carLangTable->fetchRow([
                        'car_id = ?'   => $car->id,
                        'language = ?' => $lang
                    ]);
        
                    if ($value) {
                        if (! $row) {
                            $row = $carLangTable->createRow([
                                'car_id'   => $car->id,
                                'language' => $lang
                            ]);
                        }
        
                        if ($row->name != $value) {
                            $changes[] = 'Установлено ' . strtoupper($lang) . ': ' . $value;
                        }
        
                        $row->name = $value;
                        $row->save();
                    } else {
                        if ($row) {
                            $changes[] = 'Удалено ' . strtoupper($lang) . ': ' . $row->name;
                            $row->delete();
                        }
                    }
                }
        
                if ($changes) {
                    foreach ($changes as &$change) {
                        $change = htmlspecialchars($change);
                    }
                    unset($change); // prevent future bugs
                    $message = sprintf(
                        'Редактирование названий автомобиля %s',
                        htmlspecialchars($this->car()->formatName($car, 'en')).
                        ( count($changes) ? '<p>'.implode('<br />', $changes).'</p>' : '')
                    );
                    $this->log($message, $car);
                }
                
                */
                
                $this->log(sprintf(
                    'Редактирование языковых названия, описания и полного описания автомобиля %s',
                    htmlspecialchars($this->car()->formatName($car, 'en'))
                ), $car);
                
                return $this->redirect()->toUrl($this->carModerUrl($car, false, 'name'));
            }
        }

        $model = new ViewModel([
            'car'  => $car,
            'form' => $form
        ]);

        return $model->setTerminal(true);
    }

    public function carParentSetTypeAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $parent = $carTable->find($this->params('parent_id'))->current();
        if (! $parent) {
            return $this->notFoundAction();
        }

        $carParentRow = $this->getCarParentTable()->fetchRow([
            'car_id = ?'    => $car->id,
            'parent_id = ?' => $parent->id
        ]);

        if (! $carParentRow) {
            return $this->notFoundAction();
        }

        $carParentRow->type = $this->params()->fromPost('type');
        $carParentRow->save();

        $cpcTable = new DbTable\Vehicle\ParentCache();
        $cpcTable->rebuildCache($car);

        return new JsonModel([
            'ok' => true
        ]);
    }

    public function carParentSetCatnameAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $parent = $carTable->find($this->params('parent_id'))->current();
        if (! $parent) {
            return $this->notFoundAction();
        }

        $carParentTable = $this->getCarParentTable();

        $carParentRow = $carParentTable->fetchRow([
            'car_id = ?'    => $car->id,
            'parent_id = ?' => $parent->id
        ]);

        if (! $carParentRow) {
            return $this->notFoundAction();
        }

        $ok = false;
        $messages = [];

        $data = $this->params()->fromPost();
        $takeCatnameFromName = ! isset($data['catname'])
                            || ! strlen($data['catname'])
                            || (! $carParentRow->manual_catname && ($data['catname'] == $carParentRow->car_id));
        if ($takeCatnameFromName && isset($data['name'])) {
            $data['catname'] = $data['name'];
        }

        $this->carParentForm->setData($data);
        if ($this->carParentForm->isValid()) {
            $values = $this->carParentForm->getData();

            $row = $carParentTable->fetchRow([
                'parent_id = ?' => $carParentRow->parent_id,
                'catname = ?'   => $values['catname'],
                'car_id <> ?'   => $carParentRow->car_id
            ]);

            if (! $row) {
                $nameIsEmpty = strlen($values['name']) == 0;

                if (! $nameIsEmpty) {
                    $carParentRow->name = $values['name'];
                } else {
                    $carParentRow->name = null;
                }

                $catnameIsEmpty = strlen($values['catname']) == 0 || $values['catname'] == '_';
                if (! $catnameIsEmpty) {
                    $carParentRow->catname = $values['catname'];
                    $carParentRow->manual_catname = 1;
                } else {
                    $carParentRow->catname = $carParentRow->car_id;
                    $carParentRow->manual_catname = 0;
                }

                $carParentRow->save();

                $ok = true;
            }
        } else {
            $messages = array_values($this->carParentForm->catname->getMessages());
        }

        $urls = [
            (int)$car->id => $this->carPublicUrls($car)
        ];

        $carParentTable = $this->getCarParentTable();

        $carParentRows = $carParentTable->fetchAll([
            'parent_id = ?' => $car->id
        ]);
        foreach ($carParentRows as $cpRow) {
            $carRow = $carTable->fetchRow([
                'id = ?' => $cpRow->car_id
            ]);
            if (! $carRow) {
                throw new Exception("Broken car parent link");
            }

            $urls[(int)$carRow->id] = $this->carPublicUrls($carRow);
        }

        return new JsonModel([
            'ok'         => $ok,
            'name'       => $carParentRow->name,
            'catname'    => $carParentRow->catname,
            'messages'   => $messages,
            'urls'       => $urls
        ]);
    }

    private function carSelectParentWalk(DbTable\Vehicle\Row $car, $itemTypeId)
    {
        $data = [
            'name'   => $car->getNameData($this->language()),
            'url'    => $this->url()->fromRoute('moder/cars/params', [
                'parent_id' => $car['id']
            ], [], true),
            'childs' => []
        ];

        $carTable = $this->catalogue()->getCarTable();
        $childRows = $carTable->fetchAll(
            $carTable->select(true)
                ->join('car_parent', 'cars.id = car_parent.car_id', null)
                ->where('car_parent.parent_id = ?', $car['id'])
                ->where('cars.is_group')
                ->where('cars.item_type_id IN (?)', $itemTypeId)
                ->order(array_merge(['car_parent.type'], $this->catalogue()->carsOrdering()))
        );
        foreach ($childRows as $childRow) {
            $data['childs'][] = $this->carSelectParentWalk($childRow, $itemTypeId);
        }

        return $data;
    }

    public function carSelectParentAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();
        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canMove = $this->canMove($car);
        if (! $canMove) {
            return $this->forbiddenAction();
        }

        $parent = $carTable->find($this->params('parent_id'))->current();

        if ($parent) {
            return $this->forward()->dispatch(self::class, [
                'action'    => 'add-parent',
                'car_id'    => $car->id,
                'parent_id' => $parent->id
            ]);
        }
        
        $tab = $this->params('tab', 'brands');
        
        $showBrandsTab = $car->item_type_id != DbTable\Item\Type::CATEGORY;
        
        if (!$showBrandsTab) {
            $tab = 'categories';
        }

        $brand = null;
        $brands = [];
        $cars = [];
        
        if ($tab == 'brands') {
            
            $brandTable = $this->getBrandTable();
            $brand = $brandTable->find($this->params('brand_id'))->current();

            if ($brand) {
                $rows = $carTable->fetchAll(
                    $carTable->select(true)
                        ->where('cars.item_type_id = ?', $car->item_type_id)
                        ->join('brand_item', 'cars.id = brand_item.car_id', null)
                        ->where('brand_item.brand_id = ?', $brand->id)
                        ->order(['cars.name', 'cars.body', 'cars.begin_year', 'cars.begin_model_year'])
                );
    
                foreach ($rows as $row) {
                    $cars[] = $this->carSelectParentWalk($row, $car->item_type_id);
                }
            } else {
                $brands = $brandTable->fetchAll(null, ['brands.position', 'brands.name']);
            }
            
        } elseif ($tab == 'categories') {
            
            $rows = $carTable->fetchAll(
                $carTable->select(true)
                    ->where('cars.item_type_id = ?', DbTable\Item\Type::CATEGORY)
                    ->joinLeft('car_parent', 'cars.id = car_parent.car_id', null)
                    ->where('car_parent.car_id IS NULL')
                    ->order(['cars.name', 'cars.body', 'cars.begin_year', 'cars.begin_model_year'])
            );
            
            
            if ($car->item_type_id == DbTable\Item\Type::CATEGORY) {
                $itemTypes = [DbTable\Item\Type::CATEGORY];
            } else {
                $itemTypes = [DbTable\Item\Type::CATEGORY]; // , DbTable\Item\Type::VEHICLE
            }
            
            foreach ($rows as $row) {
                $cars[] = $this->carSelectParentWalk($row, $itemTypes);
            }
            
        }

        return [
            'tab'           => $tab,
            'car'           => $car,
            'brand'         => $brand,
            'brands'        => $brands,
            'cars'          => $cars,
            'showBrandsTab' => $showBrandsTab
        ];
    }

    private function loadSpecs($table, $parentId, $deep = 0)
    {
        if ($parentId) {
            $filter = ['parent_id = ?' => $parentId];
        } else {
            $filter = ['parent_id is null'];
        }

        $result = [];
        foreach ($table->fetchAll($filter, 'short_name') as $row) {
            $result[$row->id] = str_repeat('...', $deep) . $row->short_name;
            $result = array_replace($result, $this->loadSpecs($table, $row->id, $deep + 1));
        }

        return $result;
    }

    public function organizeAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canMove = $this->canMove($car);
        if (! $canMove) {
            return $this->forbiddenAction();
        }

        $carParentTable = $this->getCarParentTable();
        $carTable = $this->catalogue()->getCarTable();

        $order = array_merge(['car_parent.type'], $this->catalogue()->carsOrdering());

        $carParentRows = $carParentTable->fetchAll(
            $carParentTable->select(true)
                ->join('cars', 'car_parent.car_id = cars.id', null)
                ->where('car_parent.parent_id = ?', $car->id)
                ->where('car_parent.type = ?', DbTable\Vehicle\ParentTable::TYPE_DEFAULT)
                ->order($order)
        );

        $childs = [];
        foreach ($carParentRows as $childRow) {
            $carRow = $carTable->find($childRow->car_id)->current();
            $childs[$carRow->id] = $this->car()->formatName($carRow, $this->language());
        }

        $specTable = new DbTable\Spec();
        $specOptions = $this->loadSpecs($specTable, null, 0);

        $db = $carTable->getAdapter();
        $avgSpecId = $db->fetchOne(
            $db->select()
                ->from($carTable->info('name'), 'AVG(spec_id)')
                ->join('car_parent', 'cars.id = car_parent.parent_id', null)
                ->where('car_parent.car_id = ?', $car->id)
        );
        $inheritedSpec = null;
        if ($avgSpecId) {
            $avgSpec = $specTable->find($avgSpecId)->current();
            if ($avgSpec) {
                $inheritedSpec = $avgSpec->short_name;
            }
        }

        $form = new CarOrganizeForm(null, [
            'itemType'           => $car->item_type_id,
            'language'           => $this->language(),
            'childOptions'       => $childs,
            'inheritedIsConcept' => $car->is_concept,
            'specOptions'        => array_replace(['' => '-'], $specOptions),
            'inheritedSpec'      => $inheritedSpec,
            'translator'         => $this->translator
        ]);

        $form->setAttribute('action', $this->url()->fromRoute('moder/cars/params', [], [], true));

        $data = $this->carToForm($car);
        $data['is_group'] = true;

        $vehicleType = new VehicleType();
        $data['vehicle_type_id'] = $vehicleType->getVehicleTypes($car->id);

        $form->populateValues($data);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->params()->fromPost());
            if ($form->isValid()) {
                $values = $form->getData();

                $values['is_group'] = true;

                $newCar = $carTable->createRow(
                    $this->prepareCarMetaToSave($values)
                );
                $newCar->item_type_id = $car->item_type_id;
                $newCar->save();

                $vehicleType->setVehicleTypes($newCar->id, (array)$values['vehicle_type_id']);

                $newCar->updateOrderCache();

                $cpcTable = new DbTable\Vehicle\ParentCache();
                $cpcTable->rebuildCache($newCar);

                $url = $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car',
                    'car_id' => $newCar->id
                ]);
                $this->log(sprintf(
                    'Создан новый автомобиль %s',
                    htmlspecialchars($this->car()->formatName($newCar, 'en'))
                ), $newCar);


                $carParentTable->addParent($newCar, $car);

                $message = sprintf(
                    '%s выбран как родительский автомобиль для %s',
                    htmlspecialchars($this->car()->formatName($car, 'en')),
                    htmlspecialchars($this->car()->formatName($newCar, 'en'))
                );
                $this->log($message, [$car, $newCar]);

                $carTable->updateInteritance($newCar);


                $childCarRows = $carTable->find($values['childs']);

                foreach ($childCarRows as $childCarRow) {
                    $carParentTable->addParent($childCarRow, $newCar);

                    $message = sprintf(
                        '%s выбран как родительский автомобиль для %s',
                        htmlspecialchars($this->car()->formatName($newCar, 'en')),
                        htmlspecialchars($this->car()->formatName($childCarRow, 'en'))
                    );
                    $this->log($message, [$newCar, $childCarRow]);

                    $carParentTable->removeParent($childCarRow, $car);
                    $message = sprintf(
                        '%s перестал быть родительским автомобилем для %s',
                        htmlspecialchars($this->car()->formatName($car, 'en')),
                        htmlspecialchars($this->car()->formatName($childCarRow, 'en'))
                    );
                    $this->log($message, [$car, $childCarRow]);

                    $carTable->updateInteritance($childCarRow);
                }

                $this->specificationsService->updateActualValues($newCar->id);

                $user = $this->user()->get();
                $ucsTable = new DbTable\User\CarSubscribe();
                $ucsTable->subscribe($user, $newCar);

                return $this->redirect()->toUrl($this->carModerUrl($car, false, 'catalogue'));
            }
        }

        return [
            'car'    => $car,
            //'childs' => $childs,
            'form'   => $form
        ];
    }

    private function prepareCarMetaToSave(array $values)
    {
        $endYear = (int)$values['end']['year'];

        $today = null;
        if ($endYear) {
            if ($endYear < date('Y')) {
                $today = 0;
            } else {
                $today = null;
            }
        } else {
            if (strlen($values['end']['today'])) {
                $today = $values['end']['today'] ? 1 : 0;
            } else {
                $today = null;
            }
        }

        if (isset($values['is_concept'])) {
            $isConcept = false;
            $isConceptInherit = false;
            if ($values['is_concept'] == 'inherited') {
                $isConceptInherit = true;
            } else {
                $isConcept = (bool)$values['is_concept'];
            }
        } else {
            $isConcept = false;
            $isConceptInherit = true;
        }

        $result = [
            'name'               => $values['name'],
            'catname'            => isset($values['catname']) && $values['catname'] ? $values['catname'] : null,
            'body'               => isset($values['body']) ? $values['body'] : '',
            'begin_year'         => $values['begin']['year'] ? $values['begin']['year'] : null,
            'begin_month'        => $values['begin']['month'] ? $values['begin']['month'] : null,
            'end_year'           => $endYear ? $endYear : null,
            'end_month'          => $values['end']['month'] ? $values['end']['month'] : null,
            'today'              => $today,
            'is_concept'         => $isConcept ? 1 : 0,
            'is_concept_inherit' => $isConceptInherit ? 1 : 0,
            'is_group'           => isset($values['is_group']) && $values['is_group'] ? 1 : 0,
            'begin_model_year'   => null,
            'end_model_year'     => null,
            'produced_exactly'   => 0
        ];
        
        if (array_key_exists('model_year', $values)) {
            $result['begin_model_year'] = $values['model_year']['begin'] ? $values['model_year']['begin'] : null;
            $result['end_model_year']   = $values['model_year']['end'] ? $values['model_year']['end'] : null;
        }
        
        if (array_key_exists('vehicle_type_id', $values)) {
            $result['vehicle_type_id'] = $values['vehicle_type_id'];
        }

        if (array_key_exists('spec_id', $values)) {
            $specId = null;
            $specInherit = false;
            if ($values['spec_id'] == 'inherited') {
                $specInherit = true;
            } else {
                $specId = (int)$values['spec_id'];
                if (! $specId) {
                    $specId = null;
                }
            }

            $result['spec_id'] = $specId;
            $result['spec_inherit'] = $specInherit ? 1 : 0;
        }

        if (array_key_exists('produced', $values)) {
            $result['produced'] = strlen($values['produced']['count']) ? (int)$values['produced']['count'] : null;
            $result['produced_exactly'] = $values['produced']['exactly'] ? 1 : 0;
        }

        return $result;
    }

    public function newAction()
    {
        if (! $this->user()->isAllowed('car', 'add')) {
            return $this->forbiddenAction();
        }

        $itemTypeId = (int)$this->params('item_type_id');
        switch ($itemTypeId) {
            case DbTable\Item\Type::VEHICLE:
            case DbTable\Item\Type::ENGINE:
                $isGroup = false;
                break;
            case DbTable\Item\Type::CATEGORY:
                $isGroup = true;
                break;
            default:
                return $this->notFoundAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $parentCar = $carTable->fetchRow([
            'id = ?'           => (int)$this->params('parent_id'),
            'item_type_id = ?' => $itemTypeId
        ]);

        $specTable = new DbTable\Spec();
        $specOptions = $this->loadSpecs($specTable, null, 0);

        $inheritedSpec = null;
        if ($parentCar) {
            if ($parentCar->spec_id) {
                $specRow = $specTable->find($parentCar->spec_id)->current();
                if ($specRow) {
                    $inheritedSpec = $specRow->short_name;
                }
            }
        }

        $form = new CarForm(null, [
            'itemType'           => $itemTypeId,
            'inheritedIsConcept' => $parentCar ? $parentCar->is_concept : null,
            'specOptions'        => array_replace(['' => '-'], $specOptions),
            'inheritedSpec'      => $inheritedSpec,
            'translator'         => $this->translator
        ]);
        $form->setAttribute('action', $this->url()->fromRoute('moder/cars/params', [], [], true));

        if ($this->getRequest()->isPost()) {
            $form->setData($this->params()->fromPost());
            if ($form->isValid()) {
                $values = $this->prepareCarMetaToSave($form->getData());
                
                $values['is_group'] = $isGroup ? 1 : 0;

                $car = $carTable->createRow($values);
                $car->item_type_id = $itemTypeId;
                $car->save();

                $vehicleType = new VehicleType();
                $vehicleType->setVehicleTypes($car->id, (array)$values['vehicle_type_id']);

                $car->updateOrderCache();

                $cpcTable = new DbTable\Vehicle\ParentCache();
                $cpcTable->rebuildCache($car);

                $vehicleType = new VehicleType();
                $vehicleType->refreshInheritanceFromParents($car->id);

                $namespace = new \Zend\Session\Container('Moder_Car');
                $namespace->lastCarId = $car->id;

                $url = $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car',
                    'car_id' => $car->id
                ]);
                $this->log(sprintf(
                    'Создан новый автомобиль %s',
                    htmlspecialchars($this->car()->formatName($car, 'en'))
                ), $car);

                $user = $this->user()->get();
                $ucsTable = new DbTable\User\CarSubscribe();
                $ucsTable->subscribe($user, $car);

                if ($parentCar) {
                    $this->getCarParentTable()->addParent($car, $parentCar);

                    $message = sprintf(
                        '%s выбран как родительский автомобиль для %s',
                        htmlspecialchars($this->car()->formatName($parentCar, 'en')),
                        htmlspecialchars($this->car()->formatName($car, 'en'))
                    );
                    $this->log($message, [$car, $parentCar]);
                }

                $carTable->updateInteritance($car);

                $this->specificationsService->updateInheritedValues($car->id);

                return $this->redirect()->toUrl($url);
            }
        }

        return [
            'parentCar' => $parentCar,
            'form'      => $form
        ];
    }

    private function pictureUrl(DbTable\Picture\Row $picture)
    {
        return $this->url()->fromRoute('moder/pictures/params', [
            'action'     => 'picture',
            'picture_id' => $picture->id
        ]);
    }

    public function organizePicturesAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $canMove = $this->canMove($car);
        if (! $canMove) {
            return $this->forbiddenAction();
        }

        $carParentTable = $this->getCarParentTable();
        $carTable = $this->catalogue()->getCarTable();
        $imageStorage = $this->imageStorage();

        $childs = [];
        $pictureTable = $this->catalogue()->getPictureTable();
        $rows = $pictureTable->fetchAll(
            $pictureTable->select(true)
                ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
                ->where('picture_item.item_id = ?', $car->id)
                ->order(['pictures.status', 'pictures.id'])
        );
        foreach ($rows as $row) {
            $request = DbTable\Picture\Row::buildFormatRequest($row->toArray());
            $imageInfo = $imageStorage->getFormatedImage($request, 'picture-thumb');
            if ($imageInfo) {
                $childs[$row->id] = $imageInfo->getSrc();
            }
        }

        $specTable = new DbTable\Spec();
        $specOptions = $this->loadSpecs($specTable, null, 0);

        $db = $carTable->getAdapter();
        $avgSpecId = $db->fetchOne(
            $db->select()
                ->from($carTable->info('name'), 'AVG(spec_id)')
                ->join('car_parent', 'cars.id = car_parent.parent_id', null)
                ->where('car_parent.car_id = ?', $car->id)
        );
        $inheritedSpec = null;
        if ($avgSpecId) {
            $avgSpec = $specTable->find($avgSpecId)->current();
            if ($avgSpec) {
                $inheritedSpec = $avgSpec->short_name;
            }
        }

        $form = new CarOrganizePicturesForm(null, [
            'language'           => $this->language(),
            'childOptions'       => $childs,
            'inheritedIsConcept' => $car->is_concept,
            'specOptions'        => array_replace(['' => '-'], $specOptions),
            'inheritedSpec'      => $inheritedSpec,
            'translator'         => $this->translator
        ]);

        $form->setAttribute('action', $this->url()->fromRoute('moder/cars/params', [], [], true));

        $data = $this->carToForm($car);
        $data['is_group'] = false;

        $vehicleType = new VehicleType();
        $data['vehicle_type_id'] = $vehicleType->getVehicleTypes($car->id);

        $form->populateValues($data);

        if ($this->getRequest()->isPost()) {
            $form->setData($this->params()->fromPost());
            if ($form->isValid()) {
                $values = $form->getData();

                $values['is_group'] = false;
                $values['produced_exactly'] = false;
                $values['description'] = '';

                $newCar = $carTable->createRow(
                    $this->prepareCarMetaToSave($values)
                );
                $newCar->item_type_id = $car->item_type_id;
                $newCar->save();

                $vehicleType->setVehicleTypes($newCar->id, (array)$values['vehicle_type_id']);

                $newCar->updateOrderCache();

                $cpcTable = new DbTable\Vehicle\ParentCache();
                $cpcTable->rebuildCache($newCar);

                $url = $this->url()->fromRoute('moder/cars/params', [
                    'action' => 'car',
                    'car_id' => $newCar->id
                ]);
                $this->log(sprintf(
                    'Создан новый автомобиль %s',
                    htmlspecialchars($this->car()->formatName($newCar, 'en'))
                ), $newCar);

                $car->is_group = 1;
                $car->save();

                $carParentTable->addParent($newCar, $car);

                $message = sprintf(
                    '%s выбран как родительский автомобиль для %s',
                    htmlspecialchars($this->car()->formatName($car, 'en')),
                    htmlspecialchars($this->car()->formatName($newCar, 'en'))
                );
                $this->log($message, [$car, $newCar]);

                $carTable->updateInteritance($newCar);


                $pictureRows = $pictureTable->find($values['childs']);

                foreach ($pictureRows as $pictureRow) {
                    $this->pictureItem->changePictureItem($pictureRow->id, $car->id, $newCar->id);

                    $this->imageStorage()->changeImageName($pictureRow->image_id, [
                        'pattern' => $pictureRow->getFileNamePattern(),
                    ]);

                    $this->log(sprintf(
                        'Картинка %s связана с автомобилем %s',
                        htmlspecialchars($pictureRow->id),
                        htmlspecialchars($this->car()->formatName($car, 'en'))
                    ), [$car, $pictureRow]);
                }

                $brandModel = new BrandModel();

                // old car cache
                $car->refreshPicturesCount();
                $brandModel->refreshPicturesCountByVehicle($car->id);

                // new car cache
                $newCar->refreshPicturesCount();
                $brandModel->refreshPicturesCountByVehicle($newCar->id);

                $this->specificationsService->updateActualValues($newCar->id);

                $user = $this->user()->get();
                $ucsTable = new DbTable\User\CarSubscribe();
                $ucsTable->subscribe($user, $newCar);

                return $this->redirect()->toUrl($this->carModerUrl($car, false, 'catalogue'));
            }
        }

        return [
            'car'    => $car,
            //'childs' => $childs,
            'form'   => $form
        ];
    }

    private function carMofificationsGroupModifications(DbTable\Vehicle\Row $car, $groupId)
    {
        $modModel = new Modification();
        $mTable = new DbTable\Modification();
        $db = $mTable->getAdapter();
        $carTable = $this->catalogue()->getCarTable();

        $language = $this->language();

        $select = $mTable->select(true)
            ->join('item_parent_cache', 'modification.car_id = item_parent_cache.parent_id', null)
            ->where('item_parent_cache.item_id = ?', $car->id)
            ->order('modification.name');

        if ($groupId) {
            $select->where('modification.group_id = ?', $groupId);
        } else {
            $select->where('modification.group_id IS NULL');
        }

        $modifications = [];
        foreach ($mTable->fetchAll($select) as $mRow) {
            $picturesCount = $db->fetchOne(
                $db->select()
                    ->from('modification_picture', 'count(1)')
                    ->where('modification_picture.modification_id = ?', $mRow->id)
                    ->join('pictures', 'modification_picture.picture_id = pictures.id', null)
                    ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
                    ->join('item_parent_cache', 'picture_item.item_id = item_parent_cache.item_id', null)
                    ->where('item_parent_cache.parent_id = ?', $car->id)
            );

            $isInherited = $mRow->car_id != $car->id;
            $inheritedFrom = null;

            if ($isInherited) {
                $carRow = $carTable->fetchRow(
                    $carTable->select(true)
                        ->join('item_parent_cache', 'cars.id = item_parent_cache.parent_id', null)
                        ->join('modification', 'cars.id = modification.car_id', null)
                        ->where('modification.id = ?', $mRow['id'])
                );

                if ($carRow) {
                    $inheritedFrom = [
                        'name' => $this->car()->formatName($carRow, $language),
                        'url'  => $this->carModerUrl($carRow)
                    ];
                }
            }

            $modifications[] = [
                'inherited'     => $isInherited,
                'inheritedFrom' => $inheritedFrom,
                'name'      => $mRow->name,
                'url'       => $this->url()->fromRoute('moder/modification/params', [
                    'action'          => 'edit',
                    'car_id'          => $car['id'],
                    'modification_id' => $mRow->id
                ], [], true),
                'count'     => $picturesCount,
                'canDelete' => ! $isInherited && $modModel->canDelete($mRow->id),
                'deleteUrl' => $this->url()->fromRoute('moder/modification/params', [
                    'action'     => 'delete',
                    'id'         => $mRow->id
                ], [], true)
            ];
        }

        return $modifications;
    }

    public function carModificationsAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $mgTable = new Modification\Group();

        $mgRows = $mgTable->fetchAll(
            $mgTable->select(true)
        );

        $groups = [];
        foreach ($mgRows as $mgRow) {
            $groups[] = [
                'name'          => $mgRow->name,
                'modifications' => $this->carMofificationsGroupModifications($car, $mgRow->id)
            ];
        }

        $groups[] = [
            'name'          => null,
            'modifications' => $this->carMofificationsGroupModifications($car, null),
        ];

        $model = new ViewModel([
            'car'    => $car,
            'groups' => $groups
        ]);
    }

    public function carModificationPicturesAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $carTable = $this->catalogue()->getCarTable();

        $car = $carTable->find($this->params('car_id'))->current();
        if (! $car) {
            return $this->notFoundAction();
        }

        $mTable = new DbTable\Modification();
        $mpTable = new Modification\Picture();
        $mgTable = new Modification\Group();
        $pictureTable = new DbTable\Picture();
        $db = $mpTable->getAdapter();
        $imageStorage = $this->imageStorage();
        $language = $this->language();


        $request = $this->getRequest();
        if ($request->isPost()) {
            $picture = (array)$this->params('picture', []);

            foreach ($picture as $pictureId => $modificationIds) {
                $pictureRow = $pictureTable->fetchRow(
                    $pictureTable->select(true)
                        ->where('pictures.id = ?', (int)$pictureId)
                        ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
                        ->join('item_parent_cache', 'picture_item.item_id = item_parent_cache.item_id', null)
                        ->where('item_parent_cache.parent_id = ?', $car->id)
                );

                if ($pictureRow) {
                    foreach ($modificationIds as &$modificationId) {
                        $modificationId = (int)$modificationId;

                        $mpRow = $mpTable->fetchRow([
                            'picture_id = ?'      => $pictureRow->id,
                            'modification_id = ?' => $modificationId
                        ]);
                        if (! $mpRow) {
                            $mpRow = $mpTable->createRow([
                                'picture_id'      => $pictureRow->id,
                                'modification_id' => $modificationId
                            ]);
                            $mpRow->save();
                        }
                    }
                    unset($modificationId); // prevent bugs

                    $select = $mpTable->select(true)
                        ->where('modification_picture.picture_id = ?', $pictureRow->id)
                        ->join('modification', 'modification_picture.modification_id = modification.id', null)
                        ->join('item_parent_cache', 'modification.car_id = item_parent_cache.parent_id', null)
                        ->where('item_parent_cache.item_id = ?', $car->id);

                    if ($modificationIds) {
                        $select->where('modification.id not in (?)', $modificationIds);
                    }

                    $mpRows = $mpTable->fetchAll($select);
                    foreach ($mpRows as $mpRow) {
                        $mpRow->delete();
                    }
                }
            }

            return $this->redirectToCar($car, 'modifications');
        }



        $pictures = [];

        $pictureRows = $pictureTable->fetchAll(
            $pictureTable->select(true)
                ->join('picture_item', 'pictures.id = picture_item.picture_id', null)
                ->join('item_parent_cache', 'picture_item.item_id = item_parent_cache.item_id', null)
                ->where('item_parent_cache.parent_id = ?', $car->id)
                ->order('pictures.id')
        );

        foreach ($pictureRows as $pictureRow) {
            $request = DbTable\Picture\Row::buildFormatRequest($pictureRow->toArray());
            $imageInfo = $imageStorage->getFormatedImage($request, 'picture-thumb');

            $modificationIds = $db->fetchCol(
                $db->select()
                ->from('modification_picture', 'modification_id')
                ->where('picture_id = ?', $pictureRow->id)
            );

            $pictures[] = [
                'id'              => $pictureRow->id,
                'name'            => $this->pic()->name($pictureRow, $language),
                'url'             => $this->pic()->href($pictureRow),
                'src'             => $imageInfo ? $imageInfo->getSrc() : null,
                'modificationIds' => $modificationIds
            ];
        }


        $mgRows = $mgTable->fetchAll(
            $mgTable->select(true)
        );

        $groups = [];
        foreach ($mgRows as $mgRow) {
            $mRows = $mTable->fetchAll(
                $mTable->select(true)
                ->where('modification.group_id = ?', $mgRow->id)
                ->join('item_parent_cache', 'modification.car_id = item_parent_cache.parent_id', null)
                ->where('item_parent_cache.item_id = ?', $car->id)
                ->order('modification.name')
            );

            $modifications = [];
            foreach ($mRows as $mRow) {
                $modifications[] = [
                    'id'     => $mRow->id,
                    'name'   => $mRow->name,
                ];
            }

            $groups[] = [
                'name'          => $mgRow->name,
                'modifications' => $modifications
            ];
        }

        $mRows = $mTable->fetchAll(
            $mTable->select(true)
            ->where('modification.group_id IS NULL')
            ->join('item_parent_cache', 'modification.car_id = item_parent_cache.parent_id', null)
            ->where('item_parent_cache.item_id = ?', $car->id)
            ->order('modification.name')
        );

        $modifications = [];
        foreach ($mRows as $mRow) {
            $modifications[] = [
                'id'   => $mRow->id,
                'name' => $mRow->name,
            ];
        }

        $groups[] = [
            'name'          => null,
            'modifications' => $modifications
        ];


        return [
            'pictures' => $pictures,
            'groups'   => $groups
        ];
    }
}
