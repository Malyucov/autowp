<?php

namespace ApplicationTest\Form;

use Zend\Form\Form;
use Application\Test\AbstractHttpControllerTestCase;

class ModerCarOrganizeFormTest extends AbstractHttpControllerTestCase
{
    protected $applicationConfigPath = __DIR__ . '/../_files/application.config.php';

    public function testForm()
    {
        $serviceManager = $this->getApplicationServiceLocator();
        $form = $serviceManager->get('ModerCarOrganizeForm');

        $form->setData([]);
        $form->isValid();

        $this->assertInstanceOf(Form::class, $form);
    }
}
