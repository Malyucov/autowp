<?php

namespace Application\Model\Referer;

use Autowp\Commons\Db\Table;

class Whitelist extends Table
{
    protected $_name = 'referer_whitelist';
    protected $_primary = ['host'];

    public function containsHost($host)
    {
        return (bool)$this->fetchRow([
            'host = ?' => (string)$host
        ]);
    }

    public function containsUrl($url)
    {
        $host = @parse_url($url, PHP_URL_HOST);
        if ($host) {
            return $this->containsHost($host);
        }

        return false;
    }
}
