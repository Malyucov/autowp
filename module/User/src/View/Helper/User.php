<?php

namespace Autowp\User\View\Helper;

use Zend\Authentication\AuthenticationService;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Exception\InvalidArgumentException;
use Zend\Permissions\Acl\Acl;

use Autowp\User\Model\DbTable\User\Row as UserRow;

use DateInterval;
use DateTime;
use DateTimeZone;

use Exception;

class User extends AbstractHelper
{
    private $userModel;

    private $users = [];

    private $user = null;

    /**
     * @var Acl
     */
    private $acl;

    public function __construct(Acl $acl)
    {
        $this->acl = $acl;
    }

    private function user($id)
    {
        if (! $id) {
            return null;
        }

        if (! isset($this->users[$id])) {
            if (! $this->userModel) {
                $this->userModel = new \Autowp\User\Model\DbTable\User();
            }
            $this->users[$id] = $this->userModel->find($id)->current();
        }

        return $this->users[$id];
    }

    public function __invoke($user = null)
    {
        if ($user === null) {
            $user = $this->getLogedInUser();
        }

        if (! $user instanceof UserRow) {
            $user = $this->user($user);
        }

        $this->user = $user;

        return $this;
    }

    /**
     * @return UserRow|bool
     */
    private function getLogedInUser()
    {
        $auth = new AuthenticationService();

        if (! $auth->hasIdentity()) {
            return false;
        }

        return $this->user($auth->getIdentity());
    }

    /**
     * @return bool
     */
    public function logedIn()
    {
        return (bool)$this->getLogedInUser();
    }

    /**
     * @return UserRow
     */
    public function get()
    {
        return $this->user;
    }

    public function __toString()
    {
        $result = '';

        try {
            $user = $this->user;

            if (! $user) {
                return '';
            }

            if ($user->deleted) {
                return '<span class="muted"><i class="fa fa-user"></i> ' .
                           $this->view->escapeHtml($this->view->translate('deleted-user')).
                       '</span>';
            }

            $url = $this->view->url('users/user', [
                'user_id' => $user->identity ? $user->identity : 'user' . $user->id
            ]);

            $classes = ['user'];
            if ($lastOnline = $user->getDateTime('last_online')) {
                $date = new DateTime();
                $date->sub(new DateInterval('P6M'));
                if ($date > $lastOnline) {
                    $classes[] = 'long-away';
                }
            } else {
                $classes[] = 'long-away';
            }

            if ($this->isAllowed('status', 'be-green')) {
                $classes[] = 'green-man';
            }

            $result =
                '<span class="'.implode(' ', $classes).'">' .
                    '<i class="fa fa-user"></i>&#xa0;' .
                    $this->view->htmlA($url, $user->getCompoundName()) .
                '</span>';
        } catch (Exception $e) {
            $result = $e->getMessage();

            print $e->getTraceAsString();
        }

        return $result;
    }

    public function avatar()
    {
        $user = $this->user;

        if (! $user) {
            return '';
        }

        if ($user->img) {
            $image = $this->view->img($user->img, [
                'format' => 'avatar',
            ])->__toString();

            if ($image) {
                return $image;
            }
        }

        if ($user->e_mail) {
            // gravatar
            return $this->view->gravatar($user->e_mail, [
                'img_size'    => 70,
                'default_img' => 'https://www.autowp.ru/_.gif'
            ])->__toString();
        }

        return '';
    }

    /**
     * @param  Zend_Acl_Resource_Interface|string $resource
     * @param  string                             $privilege
     * @return boolean
     */
    public function isAllowed($resource = null, $privilege = null)
    {
        return $this->user
            && $this->user->role
            && $this->acl->isAllowed($this->user->role, $resource, $privilege);
    }

    /**
     * @param  string $inherit
     * @return boolean
     */
    public function inheritsRole($inherit)
    {
        return $this->user
            && $this->user->role
            && $this->acl->inheritsRole($this->user->role, $inherit);
    }

    public function timezone()
    {
        return $this->user && $this->user->timezone
            ? $this->user->timezone
            : 'UTC';
    }

    public function humanTime(DateTime $time = null)
    {
        if ($time === null) {
            throw new InvalidArgumentException('Expected parameter $time was not provided.');
        }

        $tz = $this->timezone();

        $time->setTimezone(new DateTimeZone($tz));

        return $this->view->humanTime($time);
    }

    public function humanDate(DateTime $time = null)
    {
        if ($time === null) {
            throw new InvalidArgumentException('Expected parameter $time was not provided.');
        }

        $tz = $this->timezone();

        $time->setTimezone(new DateTimeZone($tz));

        return $this->view->humanDate($time);
    }
}
