<?php

namespace Application;

use Zend_Cache_Manager;

return [
    'cachemanager' => [
        'fast' => [
            'frontend' => [
                'name' => 'Core',
                'customFrontendNaming' => 0,
                'options' => [
                    'lifetime' => 1800,
                    'automatic_serialization' => true
                ]
            ],
            'backend' => [
                'name' => 'black-hole'
            ]
        ]
    ],
    'caches' => [
        'fastCache' => [
            'adapter' => [
                'name'     =>'blackHole',
                'lifetime' => 180,
            ],
        ],
        'longCache' => [
            'adapter' => [
                'name'     =>'blackHole',
                'lifetime' => 600
            ],
        ],
        'localeCache' => [
            'adapter' => [
                'name'     =>'blackHole',
                'lifetime' => 600
            ],
        ],
        'sessionCache' => [
            'adapter' => [
                'name'     =>'blackHole',
                'lifetime' => 864000
            ],
        ],
    ],
    'service_manager' => [
        'factories' => [
            Zend_Cache_Manager::class => Service\ZF1CacheManagerFactory::class,
        ]
    ]
];
