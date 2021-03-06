<?php

namespace Application\Model\DbTable\Picture;

use Autowp\Commons\Db\Table;

class ModerVote extends Table
{
    protected $_name = 'pictures_moder_votes';
    protected $_primary = ['picture_id', 'user_id'];

    protected $_referenceMap = [
        'User' => [
            'columns'       => ['user_id'],
            'refTableClass' => \Autowp\User\Model\DbTable\User::class,
            'refColumns'    => ['id']
        ],
        'Picture' => [
            'columns'       => ['picture_id'],
            'refTableClass' => \Application\Model\DbTable\Picture::class,
            'refColumns'    => ['id']
        ]
    ];
}
