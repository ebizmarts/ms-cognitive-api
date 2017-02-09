<?php

namespace Ebizmarts\MsCognitiveService\Data\V4_0;

interface ModelInterface
{
    const ID                   = 'id';
    const NAME                 = 'name';
    const DESC                 = 'description';
    const CREATED_AT           = 'created_datetime';
    const ACTIVE_BUILD_ID      = 'active_build_id';
    const CATALOG_DISPLAY_NAME = 'catalog_display_name';

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $id
     * @return void
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $name
     * @return void
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     * @return void
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getCreatedDateTime();

    /**
     * @param string $date
     * @return void
     */
    public function setCreatedDateTime($date);

    /**
     * @return int
     */
    public function getActiveBuildId();

    /**
     * @param int $id
     * @return void
     */
    public function setActiveBuildId($id);

    /**
     * @return string
     */
    public function getCatalogDisplayName();

    /**
     * @param string $name
     * @return void
     */
    public function setCatalogDisplayName($name);

}