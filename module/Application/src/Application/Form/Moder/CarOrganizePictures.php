<?php

namespace Application\Form\Moder;

use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;

use Application\Model\DbTable\Vehicle\Type as VehicleType;

class CarOrganizePictures extends Form implements InputFilterProviderInterface
{
    private $inheritedCarType = null;

    private $inheritedSpec = null;

    private $inheritedIsConcept = null;

    private $specOptions = [];

    private $childOptions = [];

    private $translator;

    private $language = 'en';

    /**
     * @var VehicleType
     */
    private $carTypeTable = null;

    public function __construct($name = null, $options = [])
    {
        parent::__construct($name, $options);

        //$this->setWrapElements(true);

        $carTypeOptions = $this->getCarTypeOptions();

        $carTypeOptions = ['' => '-'] + $carTypeOptions;

        if (!is_null($this->inheritedCarType)) {

            $carType = $this->getCarTypeTable()->find($this->inheritedCarType)->current();
            $carTypeName = $carType ? $this->translator->translate($carType->name) : '-';

            $carTypeOptions = ['inherited' => 'inherited (' . $carTypeName . ')'] + $carTypeOptions;
        } else {
            $carTypeOptions = ['inherited' => 'inherited'] + $carTypeOptions;
        }

        if (!is_null($this->inheritedSpec)) {
            $specOptions = ['inherited' => 'inherited (' . $this->inheritedSpec . ')'] + $this->specOptions;
        } else {
            $specOptions = ['inherited' => 'inherited'] + $this->specOptions;
        }

        $isConceptOptions = [
            '0' => 'moder/vehicle/is-concept/no',
            '1' => 'moder/vehicle/is-concept/yes',
        ];
        if (!is_null($this->inheritedIsConcept)) {
            $isConceptOptions = array_merge([
                'inherited' => $this->inheritedIsConcept ? 'moder/vehicle/is-concept/inherited-yes': 'moder/vehicle/is-concept/inherited-no'
            ], $isConceptOptions);
        } else {
            $isConceptOptions = array_merge([
                'inherited' => 'moder/vehicle/is-concept/inherited'
            ], $isConceptOptions);
        }

        $elements = [
            [
                'name'    => 'name',
                'type'    => \Application\Form\Element\CarName::class
            ],
            [
                'name'    => 'body',
                'type'    => \Application\Form\Element\CarBody::class,
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
                'name'    => 'car_type_id',
                'type'    => 'Select',
                'options' => [
                    'label'   => 'moder/vehicle/type',
                    'options' => $carTypeOptions
                ],
                'attributes' => [
                    'style' => 'width: 30%'
                ]
            ],
            [
                'name'    => 'model_year',
                'type'    => \Application\Form\Fieldset\CarModelYears::class,
                'options' => [
                    'label' => 'moder/vehicle/model-years'
                ]
            ],
            [
                'name'    => 'begin',
                'type'    => \Application\Form\Fieldset\CarBegin::class,
                'options' => [
                    'label'    => 'moder/vehicle/begin',
                    'language' => $this->language
                ]
            ],
            [
                'name'    => 'end',
                'type'    => \Application\Form\Fieldset\CarEnd::class,
                'options' => [
                    'label'    => 'moder/vehicle/end',
                    'language' => $this->language
                ]
            ],
            [
                'name'    => 'produced',
                'type'    => \Application\Form\Fieldset\CarProduced::class,
                'options' => [
                    'label' => 'moder/vehicle/produced'
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
        if (isset($options['inheritedCarType'])) {
            $this->inheritedCarType = $options['inheritedCarType'];
            unset($options['inheritedCarType']);
        }

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
            'car_type_id' => [
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
     * @return VehicleType
     */
    private function getCarTypeTable()
    {
        return $this->carTypeTable
            ? $this->carTypeTable
            : $this->carTypeTable = new VehicleType();
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