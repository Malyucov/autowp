<?php

class Project_Controller_Action_Helper_Car
    extends Zend_Controller_Action_Helper_Abstract
{
    protected $_perspectiveCache = array();

    /**
     * @var Car_Language
     */
    protected $_carLangTable;

    /**
     * @var Twins
     */
    protected $_twins;

    protected function _getCarLanguageTable()
    {
        return $this->_carLangTable
            ? $this->_carLangTable
            : $this->_carLangTable = new Car_Language();
    }

    /**
     * @return Twins
     */
    protected function _getTwins()
    {
        return $this->_twins
            ? $this->_twins
            : $this->_twins = new Twins();
    }

    /**
     * @return Project_Controller_Action_Helper_Car
     */
    public function direct()
    {
        return $this;
    }

    /**
     * @param Cars_Row $car
     */
    protected function _totalPictures(Cars_Row $car, $onlyExactly)
    {
        $pictureTable = $this->_getPictureTable();
        $pictureTableAdapter = $pictureTable->getAdapter();

        $select = $pictureTableAdapter->select()
            ->from($pictureTable->info('name'), new Zend_Db_Expr('COUNT(1)'))
            ->where('pictures.type = ?', Picture::CAR_TYPE_ID)
            ->where('pictures.status IN (?)', array(Picture::STATUS_NEW, Picture::STATUS_ACCEPTED));

        if ($onlyExactly) {
            $select
                ->where('pictures.car_id = ?', $car->id);
        } else {
            $select
                ->join('car_parent_cache', 'pictures.car_id = car_parent_cache.car_id', null)
                ->where('car_parent_cache.parent_id = ?', $car->id);
        }

        return $pictureTableAdapter->fetchOne($select);
    }

    /**
     * @param Cars_Row $car
     * @return array
     */
    protected function _twinsGroups(Cars_Row $car)
    {
        $urlHelper = $this->getActionController()->getHelper('Url');

        $twinsGroups = array();

        foreach ($this->_getTwins()->getCarGroups($car->id) as $twinsGroup) {
            $twinsGroups[] = array(
                'url' => $urlHelper->url(array(
                    'module'         => 'default',
                    'controller'     => 'twins',
                    'action'         => 'group',
                    'twins_group_id' => $twinsGroup['id']
                ), 'twins', true),
            );
        }

        return $twinsGroups;
    }

    public function listData($cars, array $options = array())
    {
        $type                 = isset($options['type']) ? $options['type'] : null;
        $disableTitle         = isset($options['disableTitle']) && $options['disableTitle'];
        $disableDescription   = isset($options['disableDescription']) && $options['disableDescription'];
        $disableDetailsLink   = isset($options['disableDetailsLink']) && $options['disableDetailsLink'];
        $detailsUrl           = isset($options['detailsUrl']) && $options['detailsUrl'] ? $options['detailsUrl'] : null;
        $allPicturesUrl       = isset($options['allPicturesUrl']) && $options['allPicturesUrl'] ? $options['allPicturesUrl'] : null;
        $typeUrl              = isset($options['typeUrl']) && $options['typeUrl'] ? $options['typeUrl'] : null;
        $specificationsUrl    = isset($options['specificationsUrl']) && $options['specificationsUrl'] ? $options['specificationsUrl'] : null;
        $onlyExactlyPictures  = isset($options['onlyExactlyPictures']) && $options['onlyExactlyPictures'] ? $options['onlyExactlyPictures'] : null;
        $hideEmpty            = isset($options['hideEmpty']) && $options['hideEmpty'];
        $disableTwins         = isset($options['disableTwins']) && $options['disableTwins'];
        $disableLargePictures = isset($options['disableLargePictures']) && $options['disableLargePictures'];
        $disableSpecs         = isset($options['disableSpecs']) && $options['disableSpecs'];
        $disableCategories    = isset($options['disableCategories']) && $options['disableCategories'];
        $picturesDateSort     = isset($options['picturesDateSort']) && $options['picturesDateSort'];

        $controller = $this->getActionController();
        $urlHelper = $controller->getHelper('Url');
        $userHelper = $controller->getHelper('User')->direct();
        $aclHelper = $controller->getHelper('Acl')->direct();

        $user = $userHelper->get();
        $specEditor = $userHelper->isAllowed('specifications', 'edit');
        $isCarModer = $userHelper->logedIn() && $aclHelper->inheritsRole($user->role, 'cars-moder');
        $language = $controller->getHelper('Language')->direct();
        $catalogue = $controller->getHelper('catalogue')->direct();

        $designProjectTable = new Design_Projects();
        $pictureTable = $this->_getPictureTable();
        $categoryLanguageTable = new Category_Language();
        $carParentTable = new Car_Parent();
        $carParentAdapter = $carParentTable->getAdapter();
        $brandTable = new Brands();
        $brandCarTable = new Brand_Car();
        $categoryTable = new Category();

        $specService = new Application_Service_Specifications();


        $items = array();
        foreach ($cars as $car) {

            if ($onlyExactlyPictures) {
                $oep = $onlyExactlyPictures($car);
            } else {
                $oep = false;
            }

            $totalPictures = $this->_totalPictures($car, $oep);

            $designProjectData = false;
            $designProject = $designProjectTable->fetchRow(
                $designProjectTable->select(true)
                    ->join('cars', 'design_projects.id = cars.design_project_id', null)
                    ->join('car_parent_cache', 'cars.id = car_parent_cache.parent_id', null)
                    ->where('car_parent_cache.car_id = ?', $car->id)
                    ->limit(1)
            );
            if ($designProject) {
                $brand = $designProject->findParentBrands();
                if ($brand) {
                    $designProjectData = array(
                        'brandName' => $brand->caption,
                        'url'       => $urlHelper->url(array(
                            'action'                 => 'design-project',
                            'brand_catname'          => $brand->folder,
                            'design_project_catname' => $designProject->catname
                        ), 'catalogue', true)
                    );
                }
            }

            $categories = array();
            if (!$disableCategories) {
                $categoryRows = $categoryTable->fetchAll(
                    $categoryTable->select(true)
                        ->join('category_car', 'category.id = category_car.category_id', null)
                        ->join('car_parent_cache', 'category_car.car_id = car_parent_cache.parent_id', null)
                        ->where('car_parent_cache.car_id = ?', $car->id)
                        ->group('category.id')
                );
                foreach ($categoryRows as $category) {
                    $langRow = $categoryLanguageTable->fetchRow(array(
                        'language = ?'    => $language,
                        'category_id = ?' => $category->id
                    ));
                    $categories[] = array(
                        'name' => $langRow ? $langRow['name'] : $category['name'],
                        'url'  => $urlHelper->url(array(
                            'controller'       => 'category',
                            'action'           => 'category',
                            'category_catname' => $category['catname'],
                        ), 'category', true),
                    );
                }
            }

            $useLargeFormat = $totalPictures > 30 && !$disableLargePictures;

            $g = $this->_getPerspectiveGroupIds($useLargeFormat ? 5 : 4);

            $pictureRows = $this->_getOrientedPictureList(
                $car, $g, $oep, $type, $picturesDateSort
            );
            $pictures = array();
            foreach ($pictureRows as $pictureRow) {
                if ($pictureRow) {
                    $picture = array(
                        'row'  => $pictureRow,
                        'name' => $pictureRow->getCaption(array(
                            'language' => $language
                        ))
                    );
                } else {
                    $picture = false;
                }

                $pictures[] = $picture;
            }

            if ($hideEmpty) {
                $hasPictures = false;
                foreach ($pictures as $picture) {
                    if ($picture) {
                        $hasPictures = true;
                        break;
                    }
                }

                if (!$hasPictures) {
                    continue;
                }
            }

            $hasHtml = (bool)$car->html;

            $specsLinks = array();
            if (!$disableSpecs) {
                if ($specificationsUrl) {
                    $url = $specificationsUrl($car);
                    if ($url) {
                        $specsLinks[] = array(
                            'name' => null,
                            'url'  => $url
                        );
                    }
                } else {

                    if ($specService->hasSpecs(1, $car->id)) {
                        foreach ($catalogue->cataloguePaths($car) as $path) {
                            $specsLinks[] = array(
                                'name' => null,
                                'url'  => $urlHelper->url(array(
                                    'module'        => 'default',
                                    'controller'    => 'catalogue',
                                    'action'        => 'brand-car-specifications',
                                    'brand_catname' => $path['brand_catname'],
                                    'car_catname'   => $path['car_catname'],
                                    'path'          => $path['path']
                                ), 'catalogue', true)
                            );
                            break;
                        }
                    }
                }
            }

            $childsCount = (int)$carParentAdapter->fetchOne(
                $carParentAdapter->select()
                    ->from($carParentTable->info('name'), new Zend_Db_Expr('count(1)'))
                    ->where('parent_id = ?', $car->id)
            );

            $carLangRow = $this->_getCarLanguageTable()->fetchRow(array(
                'car_id = ?'   => $car->id,
                'language = ?' => $language
            ));

            $item = array(
                'id'               => $car->id,
                'row'              => $car,
                'name'             => $car->caption,
                'langName'         => $carLangRow ? $carLangRow->name : null,
                'produced'         => $car->produced,
                'produced_exactly' => $car->produced_exactly,
                'designProject'    => $designProjectData,
                'totalPictures'    => $totalPictures,
                'categories'       => $categories,
                'pictures'         => $pictures,
                'hasHtml'          => $hasHtml,
                'hasChilds'        => $childsCount > 0,
                'childsCount'      => $childsCount,
                'specsLinks'       => $specsLinks,
                'largeFormat'      => $useLargeFormat
            );

            if (!$disableTwins) {
                $item['twinsGroups'] = $this->_twinsGroups($car);
            }

            if (count($item['pictures']) < $item['totalPictures']) {

                if ($allPicturesUrl) {

                    $item['allPicturesUrl'] = $allPicturesUrl($car);

                } else {

                    $brandCars = $car->findBrands_Cars();
                    if (count($brandCars) > 0) {
                        foreach ($brandCars as $brandCar) {
                            $brand = $brandCar->findParentBrands();
                            if ($brandCar->catname) {
                                $item['allPicturesUrl'] = $urlHelper->url(array(
                                    'module'        => 'default',
                                    'controller'    => 'catalogue',
                                    'action'        => 'brand-car-pictures',
                                    'brand_catname' => $brand->folder,
                                    'car_catname'   => $brandCar->catname
                                ), 'catalogue', true);
                            } else {
                                $item['allPicturesUrl'] = $urlHelper->url(array(
                                    'module'        => 'default',
                                    'controller'    => 'catalogue',
                                    'action'        => 'car-pictures',
                                    'brand_catname' => $brand->folder,
                                    'car_id'        => $car->id
                                ), 'catalogue', true);
                            }
                            break;
                        }
                    }
                }
            }

            if (!$disableDetailsLink && ($hasHtml || $childsCount > 0)) {
                $url = null;

                if ($detailsUrl) {

                    $url = $detailsUrl($car);

                } else {

                    $brandCarRows = $brandCarTable->fetchAll(array(
                        'car_id = ?' => $car->id
                    ));
                    foreach ($brandCarRows as $brandCarRow) {
                        $brand = $brandTable->find($brandCarRow->brand_id)->current();
                        if ($brand) {
                            if ($brandCarRow->catname) {
                                $url = $urlHelper->url(array(
                                    'module'        => 'default',
                                    'controller'    => 'catalogue',
                                    'action'        => 'brand-car',
                                    'brand_catname' => $brand->folder,
                                    'car_catname'   => $brandCarRow->catname
                                ), 'catalogue', true);
                            } else {
                                $url = $urlHelper->url(array(
                                    'module'        => 'default',
                                    'controller'    => 'catalogue',
                                    'action'        => 'car',
                                    'brand_catname' => $brand->folder,
                                    'car_id'        => $car->id
                                ), 'catalogue', true);
                            }
                        }
                        break;
                    }
                }

                if ($url) {
                    $item['details'] = array(
                        'url' => $url
                    );
                }
            }

            if (!$disableDescription) {
                $item['description'] = $car->description;
            }

            if ($specEditor) {
                $item['specEditorUrl'] = $urlHelper->url(array(
                    'module'     => 'default',
                    'controller' => 'cars',
                    'action'     => 'car-specifications-editor',
                    'car_id'     => $car->id
                ), 'default', true);
            }

            if ($isCarModer) {
                $item['moderUrl'] = $urlHelper->url(array(
                    'module'     => 'moder',
                    'controller' => 'cars',
                    'action'     => 'car',
                    'car_id'     => $car->id
                ), 'default', true);
            }

            if ($typeUrl) {
                $tuningCount = $carParentAdapter->fetchOne(
                    $carParentAdapter->select()
                        ->from($carParentTable->info('name'), 'count(1)')
                        ->where('parent_id = ?', $car->id)
                        ->where('type = ?', Car_Parent::TYPE_TUNING)
                );
                if ($tuningCount) {
                    $item['tuning'] = array(
                        'count' => $tuningCount,
                        'url'   => $typeUrl($car, Car_Parent::TYPE_TUNING)
                    );
                }

                $sportCount = $carParentAdapter->fetchOne(
                    $carParentAdapter->select()
                        ->from($carParentTable->info('name'), 'count(1)')
                        ->where('parent_id = ?', $car->id)
                        ->where('type = ?', Car_Parent::TYPE_SPORT)
                );
                if ($sportCount) {
                    $item['sport'] = array(
                        'count' => $sportCount,
                        'url'   => $typeUrl($car, Car_Parent::TYPE_SPORT)
                    );
                }
            }

            $items[] = $item;
        }

        return array(
            'specEditor'         => $specEditor,
            'isCarModer'         => $isCarModer,
            'disableDescription' => $disableDescription,
            'disableDetailsLink' => $disableDetailsLink,
            'disableTitle'       => $disableTitle,
            'items'              => $items,
        );
    }

    protected function _getPictureTable()
    {
        return $this->getActionController()->getHelper('Catalogue')->direct()->getPictureTable();
    }

    protected function _getPerspectiveGroupIds($pageId)
    {
        if (!isset($this->_perspectiveCache[$pageId])) {
            $perspectivesGroups = new Perspectives_Groups();
            $db = $perspectivesGroups->getAdapter();
            $this->_perspectiveCache[$pageId] = $db->fetchCol(
                $db->select()
                    ->from($perspectivesGroups->info('name'), 'id')
                    ->where('page_id = ?', $pageId)
                    ->order('position')
            );
        }

        return $this->_perspectiveCache[$pageId];
    }

    protected function _fetchPicture($car, array $options)
    {
        $defaults = array(
            'onlyExactlyPictures' => false,
            'perspectiveGroup'    => false,
            'allowModifications'  => false,
            'type'                => null,
            'exclude'             => array(),
            'dateSort'            => false
        );
        $options = array_merge($defaults, $options);

        $picturesOrder = array(
            'pictures.width DESC', 'pictures.height DESC'
        );

        $pictureTable = $this->_getPictureTable();

        $select = $pictureTable->select(true)
            ->where('pictures.type = ?', Picture::CAR_TYPE_ID)
            ->where('pictures.status IN (?)', array(Picture::STATUS_ACCEPTED, Picture::STATUS_NEW))
            ->limit(1);

        $order = array();

        if ($options['perspectiveGroup']) {
            $select
                ->join(array('mp' => 'perspectives_groups_perspectives'), 'pictures.perspective_id=mp.perspective_id', null)
                ->where('mp.group_id = ?', $options['perspectiveGroup']);

            $order[] = 'mp.position';
        }

        if ($options['onlyExactlyPictures']) {

            $select->where('pictures.car_id = ?', $car->id);

        } else {

            $select
                ->join('car_parent_cache', 'pictures.car_id = car_parent_cache.car_id', null)
                ->join('cars', 'pictures.car_id = cars.id', null)
                ->where('car_parent_cache.parent_id = ?', $car->id);

            if (!$options['allowModifications']) {
                $select->where('not cars.is_concept');

                if (isset($options['type'])) {
                    switch ($options['type']) {
                        case Car_Parent::TYPE_DEFAULT:
                            $select
                                ->where('not car_parent_cache.sport')
                                ->where('not car_parent_cache.tuning');
                            break;
                    }
                }
            }

            if (isset($options['type'])) {
                switch ($options['type']) {
                    case Car_Parent::TYPE_DEFAULT:
                        if ($options['allowModifications']) { // prevent double
                            $select
                                ->where('not car_parent_cache.sport')
                                ->where('not car_parent_cache.tuning');
                        }
                        break;
                    case Car_Parent::TYPE_TUNING:
                        $select->where('car_parent_cache.tuning');
                        break;
                    case Car_Parent::TYPE_SPORT:
                        $select->where('car_parent_cache.sport');
                        break;
                }
            }
        }

        if ($options['exclude']) {
            $select->where('pictures.id not in (?)', $options['exclude']);
        }

        if ($options['dateSort']) {
            $select->join(array('picture_car' => 'cars'), 'cars.id = picture_car.id', null);
            $order = array_merge($order, array('picture_car.begin_order_cache', 'picture_car.end_order_cache'));
        } else {
            $order = array_merge($order, $picturesOrder);
        }

        $select->order($order);

        return $pictureTable->fetchRow($select);
    }

    protected function _getOrientedPictureList($car,
        array $perspective_group_ids, $onlyExactlyPictures, $type, $dateSort)
    {
        $pictures = array();
        $usedIds = array();

        foreach ($perspective_group_ids as $groupId) {
            $picture = $this->_fetchPicture($car, array(
                'onlyExactlyPictures' => $onlyExactlyPictures,
                'perspectiveGroup'    => $groupId,
                'allowModifications'  => false,
                'type'                => $type,
                'exclude'             => $usedIds,
                'dateSort'            => $dateSort
            ));

            if (!$picture) {
                $picture = $this->_fetchPicture($car, array(
                    'onlyExactlyPictures' => $onlyExactlyPictures,
                    'perspectiveGroup'    => $groupId,
                    'allowModifications'  => true,
                    'type'                => $type,
                    'exclude'             => $usedIds,
                    'dateSort'            => $dateSort
                ));
            }

            if ($picture) {
                $pictures[] = $picture;
                $usedIds[] = $picture->id;
            } else {
                $pictures[] = null;
            }
        }

        foreach (array(false, true) as $allowModification) {
            foreach ($pictures as $key => $picture) {
                if (!$picture) {
                    $pic = $this->_fetchPicture($car, array(
                        'onlyExactlyPictures' => $onlyExactlyPictures,
                        'allowModifications'  => $allowModification,
                        'type'                => $type,
                        'exclude'             => $usedIds,
                        'dateSort'            => $dateSort
                    ));

                    if ($pic) {
                        $pictures[$key] = $pic;
                        $usedIds[] = $pic->id;
                    } else {
                        break;
                    }
                }
            }
        }

        return $pictures;
    }
}