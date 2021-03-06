<?php

namespace ApplicationTest\Controller;

use Application\Test\AbstractHttpControllerTestCase;

class EnvTest extends AbstractHttpControllerTestCase
{
    protected $applicationConfigPath = __DIR__ . '/_files/application.config.php';

    public function testDbTimezone()
    {
        $db = $this->getApplication()->getServiceManager()->get(\Zend\Db\Adapter\AdapterInterface::class);

        $timezone = $db->query('select @@session.time_zone as timezone', \Zend\Db\Adapter\Adapter::QUERY_MODE_EXECUTE);
        $timezone = $timezone->current();

        $this->assertEquals('UTC', $timezone['timezone']);

        $zf1db = $this->getApplication()->getServiceManager()->get(\Zend_Db_Adapter_Abstract::class);

        $timezone = $zf1db->fetchOne('select @@session.time_zone as timezone');

        $this->assertEquals('UTC', $timezone);
    }
}
