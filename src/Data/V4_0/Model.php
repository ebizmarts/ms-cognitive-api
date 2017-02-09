<?php
/**
 * Created by PhpStorm.
 * User: pablo
 * Date: 2/2/17
 * Time: 6:59 PM
 */

namespace Ebizmarts\MsCognitiveService\Data\V4_0;

use Ebizmarts\MsCognitiveService\Data\AbstractSimpleObject;

class Model extends AbstractSimpleObject implements ModelInterface
{
    public function getId()
    {
        return $this->_get(self::ID);
    }

    public function setId($id)
    {
        $this->setData(self::ID, $id);
    }

    public function getName()
    {
        return $this->_get(self::NAME);
    }

    public function setName($name)
    {
        $this->setData(self::NAME, $name);
    }

    public function getDescription()
    {
        return $this->_get(self::DESC);
    }

    public function setDescription($description)
    {
        $this->setData(self::DESC, $description);
    }

    public function getCreatedDateTime()
    {
        return $this->_get(self::CREATED_AT);
    }

    public function setCreatedDateTime($date)
    {
        $this->setData(self::CREATED_AT, $date);
    }

    public function getActiveBuildId()
    {
        return $this->_get(self::ACTIVE_BUILD_ID);
    }

    public function setActiveBuildId($id)
    {
        $this->setData(self::ACTIVE_BUILD_ID, $id);
    }

    public function getCatalogDisplayName()
    {
        return $this->_get(self::CATALOG_DISPLAY_NAME);
    }

    public function setCatalogDisplayName($name)
    {
        $this->setData(self::CATALOG_DISPLAY_NAME, $name);
    }
}