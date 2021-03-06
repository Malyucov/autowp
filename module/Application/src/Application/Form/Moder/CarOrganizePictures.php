<?php

namespace Application\Form\Moder;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

use Application\Model\DbTable;

class CarOrganizePictures extends Form implements InputFilterProviderInterface
{
    private $inheritedSpec = null;

    private $inheritedIsConcept = null;

    private $specOptions = [];

    private $childOptions = [];

    private $translator;

    private $language = 'en';

    /**
     * @var DbTable\Vehicle\Type
     */
    private $carTypeTable = null;

    private $itemType = null;

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        if (! is_null($this->inheritedSpec)) {
            $specOptions = ['inherited' => 'inherited (' . $this->inheritedSpec . ')'] + $this->specOptions;
        } else {
            $specOptions = ['inherited' => 'inherited'] + $this->specOptions;
        }

        $isConceptOptions = [
            '0' => 'moder/vehicle/is-concept/no',
            '1' => 'moder/vehicle/is-concept/yes',
        ];
        if (! is_null($this->inheritedIsConcept)) {
            $isConceptOptions = array_merge([
                'inherited' => $this->inheritedIsConcept
                    ? 'moder/vehicle/is-concept/inherited-yes'
                    : 'moder/vehicle/is-concept/inherited-no'
            ], $isConceptOptions);
        } else {
            $isConceptOptions = array_merge([
                'inherited' => 'moder/vehicle/is-concept/inherited'
            ], $isConceptOptions);
        }

        $elements = [
            [
                'name'    => 'name',
                'type'    => \Application\Form\Element\ItemName::class
            ],
            'full_name' => [
                'name'    => 'full_name',
                'type'    => \Application\Form\Element\ItemFullName::class,
            ],
            [
                'name'    => 'body',
                'type'    => \Application\Form\Element\ItemBody::class,
                'attributes' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'name'    => 'spec_id',
                'type'    => 'Select',
                'options' => [
                    'label'   => 'moder/vehicle/spec',
                    'options' => $specOptions,
                ],
                'attributes' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'name'    => 'vehicle_type_id',
                'type'    => 'Select',
                'options' => [
                    'label'   => 'moder/vehicle/type',
                    'options' => $this->getCarTypeOptions()
                ],
                'attributes' => [
                    'style'    => 'width: 30%',
                    'multiple' => true,
                    'size'     => 1
                ]
            ],
            [
                'name'    => 'model_year',
                'type'    => \Application\Form\Fieldset\ItemModelYears::class,
                'options' => [
                    'label' => 'moder/vehicle/model-years'
                ]
            ],
            [
                'name'    => 'begin',
                'type'    => \Application\Form\Fieldset\ItemBegin::class,
                'options' => [
                    'label'    => 'moder/vehicle/begin',
                    'language' => $this->language
                ]
            ],
            [
                'name'    => 'end',
                'type'    => \Application\Form\Fieldset\ItemEnd::class,
                'options' => [
                    'label'    => 'moder/vehicle/end',
                    'language' => $this->language
                ]
            ],
            [
                'name'    => 'produced',
                'type'    => \Application\Form\Fieldset\ItemProduced::class,
                'options' => [
                    'label' => 'moder/item/produced'
                ]
            ],
            [
                'name'    => 'is_concept',
                'type'    => 'Select',
                'options' => [
                    'label'   => 'moder/vehicle/concept',
                    'options' => $isConceptOptions
                ],
                'attributes' => [
                    'style' => 'width: 20%'
                ]
            ],
            [
                'name'    => 'is_group',
                'type'    => 'Checkbox',
                'options' => [
                    'label' => 'moder/vehicle/group'
                ],
                'attributes' => [
                    'readonly' => true,
                ]
            ],
            'lat' => [
                'type' => 'Text',
                'name' => 'lat',
                'options' => [
                    'label' => 'latitude'
                ],
                'attributes' => [
                    'id'        => 'lat',
                    'maxlength' => 20,
                    'size'      => 20,
                    'style'     => 'width: 20%'
                ],
            ],
            'lng' => [
                'type' => 'Text',
                'name' => 'lng',
                'options' => [
                    'label' => 'longtitude'
                ],
                'attributes' => [
                    'id'        => 'lng',
                    'maxlength' => 20,
                    'size'      => 20,
                    'style'     => 'width: 20%'
                ]
            ],
            [
                'name'    => 'childs',
                'type'    => \Application\Form\Element\PictureMultiCheckbox::class,
                'options' => [
                    'label'   => 'moder/vehicle/pictures/turbo-group-creator/pictures',
                    'options' => $this->childOptions,
                    'label_attributes' => [
                        'class' => 'btn btn-default',
                    ]
                ],
                'attributes' => [
                    'readonly' => true,
                ],
            ],
        ];

        $pointFields = in_array($this->itemType, [
            DbTable\Item\Type::FACTORY,
            DbTable\Item\Type::MUSEUM
        ]);
        if (! $pointFields) {
            unset($elements['lat'], $elements['lng']);
        }

        if ($this->itemType != DbTable\Item\Type::BRAND) {
            unset($elements['full_name']);
        }

        if (! in_array($this->itemType, [DbTable\Item\Type::CATEGORY, DbTable\Item\Type::BRAND])) {
            unset($elements['catname']);
        }

        if (! in_array($this->itemType, [DbTable\Item\Type::VEHICLE, DbTable\Item\Type::TWINS])) {
            unset($elements['vehicle_type_id']);
        }

        if (! in_array($this->itemType, [DbTable\Item\Type::VEHICLE, DbTable\Item\Type::ENGINE])) {
            unset($elements['is_group']);
            unset($elements['is_concept']);
            unset($elements['produced']);
            unset($elements['model_year']);
            unset($elements['spec_id']);
            unset($elements['body']);
        }

        foreach ($elements as $element) {
            $this->add($element);
        }

        $this->prepareElement($this);

        $this->setAttribute('method', 'post');
    }

    public function setInheritedIsConcept($value)
    {
        $this->inheritedIsConcept = $value === null ? null : (bool)$value;

        return $this;
    }

    /**
     * Set options for a fieldset. Accepted options are:
     * - use_as_base_fieldset: is this fieldset use as the base fieldset?
     *
     * @param  array|Traversable $options
     * @return Element|ElementInterface
     * @throws Exception\InvalidArgumentException
     */
    public function setOptions($options)
    {
        if (isset($options['inheritedSpec'])) {
            $this->inheritedSpec = $options['inheritedSpec'];
            unset($options['inheritedSpec']);
        }

        if (isset($options['inheritedIsConcept'])) {
            $this->setInheritedIsConcept($options['inheritedIsConcept']);
            unset($options['inheritedIsConcept']);
        }

        if (isset($options['specOptions'])) {
            $this->specOptions = $options['specOptions'];
            unset($options['specOptions']);
        }

        if (isset($options['itemType'])) {
            $this->itemType = $options['itemType'];
            unset($options['itemType']);
        }

        if (isset($options['childOptions'])) {
            $this->childOptions = $options['childOptions'];
            unset($options['childOptions']);
        }

        $this->translator = $options['translator'];
        unset($options['translator']);

        parent::setOptions($options);

        return $this;
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'name' => [
                'required' => true
            ],
            'body' => [
                'required' => false
            ],
            'spec_id' => [
                'required' => false
            ],
            'vehicle_type_id' => [
                'required' => false
            ],
            'is_concept' => [
                'required' => false
            ],
            'is_group' => [
                'required' => false
            ],
            'childs' => [
                'required' => true
            ]
        ];
    }

    /**
     * @return DbTable\Vehicle\Type
     */
    private function getCarTypeTable()
    {
        return $this->carTypeTable
            ? $this->carTypeTable
            : $this->carTypeTable = new DbTable\Vehicle\Type();
    }

    private function getCarTypeOptions($parentId = null)
    {
        if ($parentId) {
            $filter = [
                'parent_id = ?' => $parentId
            ];
        } else {
            $filter = 'parent_id is null';
        }

        $rows = $this->getCarTypeTable()->fetchAll($filter, 'position');
        $result = [];
        foreach ($rows as $row) {
            $result[$row->id] = $row->name;

            foreach ($this->getCarTypeOptions($row->id) as $key => $value) {
                $result[$key] = '...' . $this->translator->translate($value);
            }
        }

        return $result;
    }
}
