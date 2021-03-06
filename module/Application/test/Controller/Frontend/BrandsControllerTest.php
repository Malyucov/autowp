<?php

namespace ApplicationTest\Controller\Frontend;

use Zend\Http\Header\Cookie;
use Zend\Http\Request;
use Application\Test\AbstractHttpControllerTestCase;

use Application\Controller\BrandsController;

class BrandsControllerTest extends AbstractHttpControllerTestCase
{
    protected $applicationConfigPath = __DIR__ . '/../../_files/application.config.php';

    public function testNewcars()
    {
        $brandId = 204;

        $this->getRequest()->getHeaders()->addHeader(Cookie::fromString('Cookie: remember=admin-token'));
        $this->dispatch('https://www.autowp.ru/moder/cars/new/item_type_id/1', Request::METHOD_POST, [
            'name' => 'Car for testNewcars'
        ]);

        $headers = $this->getResponse()->getHeaders();
        $uri = $headers->get('Location')->uri();
        $parts = explode('/', $uri->getPath());
        $carId = $parts[count($parts) - 1];

        // add to brand
        $this->reset();
        $this->getRequest()->getHeaders()->addHeader(Cookie::fromString('Cookie: remember=admin-token'));
        $this->dispatch('https://www.autowp.ru/moder/cars/add-parent/parent_id/'.$brandId.'/item_id/' . $carId, Request::METHOD_POST, [
            'name' => 'Test car'
        ]);

        // page
        $this->reset();
        $this->dispatch('https://www.autowp.ru/brands/newcars/' . $brandId, Request::METHOD_GET);

        $this->assertResponseStatusCode(200);
        $this->assertModuleName('application');
        $this->assertControllerName(BrandsController::class);
        $this->assertMatchedRouteName('brands/newcars');
        $this->assertActionName('newcars');

        $this->assertXpathQuery("//*[contains(text(), 'Car for testNewcars')]");
    }
}
