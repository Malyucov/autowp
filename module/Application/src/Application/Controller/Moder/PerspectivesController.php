<?php

namespace Application\Controller\Moder;

use Zend\Mvc\Controller\AbstractActionController;

use Application\Model\DbTable\Perspective;
use Application\Model\DbTable\Perspective\Group as PerspectiveGroup;
use Application\Model\DbTable\Perspective\GroupPerspective as PerspectiveGroupPerspective;
use Application\Model\DbTable\Perspective\Page as PerspectivePage;

class PerspectivesController extends AbstractActionController
{
    public function indexAction()
    {
        if (! $this->user()->inheritsRole('moder')) {
            return $this->forbiddenAction();
        }

        $prspModel = new Perspective();
        $prspGroupsModel = new PerspectiveGroup();
        $prspGroupsPrspModel = new PerspectiveGroupPerspective();
        $prspPagesModel = new PerspectivePage();

        $data = [];
        foreach ($prspPagesModel->fetchAll(null, 'id') as $page) {
            $groups = [];

            $groupRows = $prspGroupsModel->fetchAll([
                'page_id = ?' => $page->id
            ], 'position');
            foreach ($groupRows as $groupRow) {
                $perspectives = [];

                $perspectiveRows = $prspModel->fetchAll(
                    $prspModel->select(true)
                        ->join(
                            'perspectives_groups_perspectives',
                            'perspectives.id = perspectives_groups_perspectives.perspective_id',
                            null
                        )
                        ->where('perspectives_groups_perspectives.group_id = ?', $groupRow->id)
                        ->order('perspectives_groups_perspectives.position')
                );
                foreach ($perspectiveRows as $perspectiveRow) {
                    $perspectives[] = [
                        'id'   => $perspectiveRow->id,
                        'name' => $perspectiveRow->name
                    ];
                }

                $groups[] = [
                    'id'           => $groupRow->id,
                    'name'         => $groupRow->name,
                    'perspectives' => $perspectives
                ];
            }

            $data[] = [
                'id'    => $page->id,
                'name'  => $page->name,
                'groups' => $groups
            ];
        }

        return [
            'pages' => $data
        ];
    }
}
