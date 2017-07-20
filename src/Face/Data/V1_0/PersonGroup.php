<?php

namespace Ebizmarts\MsCognitiveService\Face\Data\V1_0;

use Ebizmarts\MsCognitiveService\Data\AbstractSimpleObject;

class PersonGroup extends AbstractSimpleObject
{
    const PERSON_GROUP_ID = 'personGroupId';
    const NAME = 'name';
    const USER_DATA = 'userData';

    public function getPersonGroupId()
    {
        return $this->_get(self::PERSON_GROUP_ID);
    }

    public function setPersonGroupId($personGroupId)
    {
        $this->setData(self::PERSON_GROUP_ID, $personGroupId);
    }

    public function getName()
    {
        return $this->_get(self::NAME);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    public function getUserData()
    {
        return $this->_get(self::USER_DATA);
    }

    public function setUserData($userData)
    {
        $this->setData(self::USER_DATA, $userData);
    }
}