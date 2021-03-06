<?php

namespace Application\Controller\Frontend;

use Zend\Mvc\Controller\AbstractActionController;

use Application\Model\CarOfDay;

use DateTime;
use DateTimeZone;

class YandexController extends AbstractActionController
{
    const DATE_FORMAT = 'Y-m-d';

    private $secret;

    private $price;

    /**
     * @var CarOfDay
     */
    private $itemOfDay;

    public function __construct(array $config, CarOfDay $itemOfDay)
    {
        $this->secret = $config['secret'];
        $this->price = $config['price'];
        $this->itemOfDay = $itemOfDay;
    }

    private function isAvailableDate(DateTime $date)
    {
        $result = false;

        $dateStr = $date->format(self::DATE_FORMAT);

        $nextDates = $this->itemOfDay->getNextDates();
        foreach ($nextDates as $nextDate) {
            if ($nextDate['date']->format(self::DATE_FORMAT) === $dateStr) {
                $result = $nextDate['free'];
                break;
            }
        }

        return $result;
    }

    public function informingAction()
    {
        $request = $this->getRequest();

        if (! $request->isPost()) {
            print '1';
            exit;
            return $this->forbiddenAction();
        }

        $fields = ['notification_type', 'operation_id', 'amount', 'currency',
            'datetime', 'sender', 'codepro', 'notification_secret', 'label'];

        $str = [];
        foreach ($fields as $field) {
            if ($field == 'notification_secret') {
                $str[] = $this->secret;
            } else {
                $str[] = (string)$this->params()->fromPost($field);
            }
        }
        $str = implode('&', $str);

        $sha1Hash = (string)$this->params()->fromPost('sha1_hash');

        if (sha1($str) !== $sha1Hash) {
            print '2';
            exit;
            return $this->forbiddenAction();
        }

        $currency = $this->params()->fromPost('currency');
        if ($currency != 643) {
            print '3';
            exit;
            return $this->forbiddenAction();
        }

        $withdrawAmount = (float)$this->params()->fromPost('withdraw_amount');
        if ($withdrawAmount < $this->price) {
            print '4';
            exit;
            return $this->forbiddenAction();
        }

        $label = (string)$this->params()->fromPost('label');
        if (! preg_match('|^vod/([0-9]{4}-[0-9]{2}-[0-9]{2})/([0-9]+)/([0-9]+)$|isu', $label, $matches)) {
            print '5';
            exit;
            return $this->forbiddenAction();
        }

        $timezone = new DateTimeZone('UTC');
        $dateTime = DateTime::createFromFormat(self::DATE_FORMAT, $matches[1], $timezone);
        if (! $dateTime) {
            print '6';
            exit;
            return $this->forbiddenAction();
        }

        if (! $this->isAvailableDate($dateTime)) {
            print '7';
            exit;
            return $this->forbiddenAction();
        }

        $itemId = (int)$matches[2];
        $userId = (int)$matches[3];

        if (! $itemId) {
            print '8';
            exit;
            return $this->forbiddenAction();
        }

        $unaccepted = $this->params()->fromPost('unaccepted') === 'true';
        if ($unaccepted) {
            print '9';
            exit;
            return $this->forbiddenAction();
        }

        $success = $this->itemOfDay->setItemOfDay($dateTime, $itemId, $userId);
        if (! $success) {
            print '10';
            exit;
            return $this->forbiddenAction();
        }

        return $this->getResponse()->setStatusCode(200);
    }
}
