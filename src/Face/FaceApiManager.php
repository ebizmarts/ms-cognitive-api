<?php

namespace Ebizmarts\MsCognitiveService\Face;

class FaceApiManager
{
    /** @var string */
    private $apiKey = "***REMOVED***";

    /** @var string */
    private $baseUri = "https://westus.api.cognitive.microsoft.com/face/v1.0/";

    /**
     * @return array \Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup
     */
    public function getAllPersonGroups()
    {
        $personGroup = new PersonGroup($this->apiKey, $this->baseUri);

        return $personGroup->getAllGroups();
    }

}