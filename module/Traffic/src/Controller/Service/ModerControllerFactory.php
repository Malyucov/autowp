<?php

namespace Autowp\Traffic\Controller\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Autowp\Traffic\Controller\ModerController;

class ModerControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ModerController(
            $container->get(\Autowp\Traffic\TrafficControl::class)
        );
    }
}
