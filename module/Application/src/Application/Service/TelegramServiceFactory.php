<?php

namespace Application\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Application\Service\TelegramService;

class TelegramServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');
        return new TelegramService(
            $config['telegram'],
            $container->get('HttpRouter'),
            $container->get(\Application\HostManager::class),
            $container
        );
    }
}
