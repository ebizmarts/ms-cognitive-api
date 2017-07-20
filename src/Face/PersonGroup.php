<?php

namespace Ebizmarts\MsCognitiveService\Face;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup as PersonGroupData;

class PersonGroup
{
    /**
     * @return array \Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup
     */
    public function getAllGroups($groups)
    {
        $return = [];

        foreach($groups as $model)
        {
            $return []= new PersonGroupData(
                [
                    'personGroupId' => $model->personGroupId,
                    'name' => $model->name,
                    'userData' => $model->userData
                ]
            );
        }

        return $return;
    }
}