<?php

namespace Application\Model;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql;
use Zend\Db\TableGateway\TableGateway;

use Application\Model\DbTable;

class UserPicture
{
    public function __construct(Adapter $adapter)
    {
        $this->pictureTable = new TableGateway('pictures', $adapter);
        $this->userTable = new TableGateway('users', $adapter);
    }

    public function refreshAllPicturesCount()
    {
        $select = new Sql\Select($this->pictureTable->getTable());
        $select->columns([
            'owner_id',
            'count' => new Sql\Expression('count(1)')
        ])
            ->where(['status' => DbTable\Picture::STATUS_ACCEPTED])
            ->group(['owner_id']);

        $userIds = [];
        foreach ($this->pictureTable->selectWith($select) as $row) {
            $userIds[] = $row['owner_id'];
            $this->userTable->update([
                'pictures_total' => $row['count']
            ], [
                'id' => $row['owner_id']
            ]);
        }

        $filter = [];
        if ($userIds) {
            $filter = [
                new Sql\Predicate\NotIn('id', $userIds)
            ];
        }

        $this->userTable->update([
            'pictures_total' => 0
        ], $filter);
    }

    public function refreshPicturesCount($userId)
    {
        $select = new Sql\Select($this->pictureTable->getTable());
        $select->columns(['count' => new Sql\Expression('count(1)')])
            ->where([
                'owner_id' => $userId,
                'status'   => DbTable\Picture::STATUS_ACCEPTED
            ]);

        $row = $this->pictureTable->selectWith($select)->current();

        $this->userTable->update([
            'pictures_total' => $row ? $row['count'] : 0
        ], [
            'id' => (int)$userId
        ]);
    }

    public function incrementUploads($userId)
    {
        $this->userTable->update([
            'pictures_added' => new Sql\Expression('pictures_added+1')
        ], [
            'id' => (int)$userId
        ]);
    }
}
