<?php

namespace Autowp\Forums;

use Zend\ModuleManager\Feature;

class Module implements
    Feature\AutoloaderProviderInterface,
    Feature\ConfigProviderInterface
{
    /**
     * @return array
     */
    public function getConfig()
    {
        $provider = new ConfigProvider();
        return [
            'controllers'     => $provider->getControllersConfig(),
            'forms'           => $provider->getFormsConfig(),
            'router'          => $provider->getRouterConfig(),
            'service_manager' => $provider->getDependencyConfig(),
            'translator'      => $provider->getTranslatorConfig()
        ];
    }

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src',
                ],
            ],
        ];
    }
}
