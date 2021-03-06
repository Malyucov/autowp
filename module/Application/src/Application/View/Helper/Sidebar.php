<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHtmlElement;

use Autowp\Message\MessageService;

class Sidebar extends AbstractHtmlElement
{
    /**
     * @var MessageService
     */
    private $message;

    public function __construct(MessageService $message)
    {
        $this->message = $message;
    }

    public function __invoke()
    {
        $newPersonalMessages = null;
        if ($this->view->user()->logedIn()) {
            $count = $this->message->getNewCount($this->view->user()->get()->id);

            $newPersonalMessages = $count;
        }
        return $this->view->partial('application/sidebar-right', [
            'newPersonalMessages' => $newPersonalMessages
        ]);
    }
}
