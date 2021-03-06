<?php

namespace Application\Model\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Application\Model\BrandNav as Model;

class BrandNavFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Model(
            $container->get('fastCache'),
            $container->get('MvcTranslator'),
            $container->get('HttpRouter')
        );
    }
}
