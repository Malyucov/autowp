<?php

namespace ApplicationTest\Form;

use Zend\Form\Form;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class ModerCarFormTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        $this->setApplicationConfig(include __DIR__ . '/../_files/application.config.php');

        parent::setUp();
    }

    public function testForm()
    {
        $serviceManager = $this->getApplicationServiceLocator();
        $form = $serviceManager->build('ModerCarForm');

        $form->setData([]);
        $form->isValid();

        $this->assertInstanceOf(Form::class, $form);
    }
}
