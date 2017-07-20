<?php

namespace Ebizmarts\MsCognitiveService\Face\Data\V1_0;

use Ebizmarts\MsCognitiveService\Data\AbstractSimpleObject;

class Person extends AbstractSimpleObject
{
    const PERSON_ID = 'personId';
    const NAME = 'name';
    const USER_DATA = 'userData';
    const PERSISTED_FACE_IDS = 'persistedFaceIds';

    /**
     * @return string
     */
    public function getPersonId()
    {
        return $this->_get(self::PERSON_ID);
    }

    /**
     * @param string $personId
     */
    public function setPersonId($personId)
    {
        $this->setData(self::PERSON_ID, $personId);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    /**
     * @return string
     */
    public function getUserData()
    {
        return $this->_get(self::USER_DATA);
    }

    /**
     * @param string $userData
     */
    public function setUserData($userData)
    {
        $this->setData(self::USER_DATA, $userData);
    }

    /**
     * @return array
     */
    public function getPersistedFaceIds()
    {
        return $this->_get(self::PERSISTED_FACE_IDS);
    }

    /**
     * @param array $faceIds
     */
    public function setPersistedFaceIds($faceIds)
    {
        $this->setData(self::PERSISTED_FACE_IDS, $faceIds);
    }
}