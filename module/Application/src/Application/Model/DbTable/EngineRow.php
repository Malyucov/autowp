<?php

namespace Application\Model\DbTable;

use Application\Db\Table\Row;

use Application\Model\DbTable\Vehicle;

class EngineRow extends Row
{
    public function getRelatedCarGroupId(array $options = [])
    {
        $defaults = [
            'groupJoinLimit' => null
        ];
        $options = array_merge($defaults, $options);

        $carTable = new Vehicle();

        $db = $this->getTable()->getAdapter();

        $carIds = $db->fetchCol(
            $db->select()
                ->from('cars', 'id')
                ->join('engine_parent_cache', 'cars.engine_id = engine_parent_cache.engine_id', null)
                ->where('engine_parent_cache.parent_id = ?', $this->id)
        );

        $vectors = [];
        foreach ($carIds as $carId) {
            $parentIds = $db->fetchCol(
                $db->select()
                    ->from('item_parent_cache', 'parent_id')
                    ->where('item_id = ?', $carId)
                    ->where('item_id <> parent_id')
                    ->order('diff desc')
            );

            // remove parents
            foreach ($parentIds as $parentId) {
                $index = array_search($parentId, $carIds);
                if ($index !== false) {
                    unset($carIds[$index]);
                }
            }

            $vector = $parentIds;
            $vector[] = $carId;

            $vectors[] = $vector;
        }

        if ($options['groupJoinLimit'] && count($carIds) <= $options['groupJoinLimit']) {
            return $carIds;
        }


        do {
            // look for same root

            $matched = false;
            for ($i = 0; ($i < count($vectors) - 1) && ! $matched; $i++) {
                for ($j = $i + 1; $j < count($vectors) && ! $matched; $j++) {
                    if ($vectors[$i][0] == $vectors[$j][0]) {
                        $matched = true;
                        // matched root
                        $newVector = [];
                        $length = min(count($vectors[$i]), count($vectors[$j]));
                        for ($k = 0; $k < $length && $vectors[$i][$k] == $vectors[$j][$k]; $k++) {
                            $newVector[] = $vectors[$i][$k];
                        }
                        $vectors[$i] = $newVector;
                        array_splice($vectors, $j, 1);
                    }
                }
            }
        } while ($matched);

        $resultIds = [];
        foreach ($vectors as $vector) {
            $resultIds[] = $vector[count($vector) - 1];
        }

        return $resultIds;
    }
}
