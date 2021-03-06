<?php

namespace Application\Model\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class DbTablePictureFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new \Application\Model\DbTable\Picture([
            'imageStorage' => $container->get(\Autowp\Image\Storage::class)
        ]);
    }
}
