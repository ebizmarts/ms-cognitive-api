<?php

namespace Ebizmarts\MsCognitiveService\Face;

use GuzzleHttp\Client;

class FaceApiManager
{
    /** @var string */
    private $apiKey = "44eb2ad6c05e49b7bdd0401efde9b8de";

    /** @var string */
    private $baseUri = "https://westus.api.cognitive.microsoft.com/face/v1.0/";

    /** @var Client */
    private $httpClient;

    /**
     * FaceApiManager constructor.
     */
    public function __construct()
    {
        $this->httpClient = new Client(
            [
                "base_uri" => $this->baseUri,
                "headers"  => [
                    "Ocp-Apim-Subscription-Key" => $this->apiKey,
                    "Content-Type" => "application/json; charset=utf-8"
                ]
            ]
        );
    }

    /**
     * @return array \Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup
     */
    public function getAllPersonGroups()
    {
        $response = $this->httpClient->request('GET', 'persongroups');
        $contents = $response->getBody()->getContents();
        $groups = \GuzzleHttp\json_decode($contents);

        $personGroup = new PersonGroup();
        return $personGroup->getAllGroups($groups);
    }

    public function createPersonGroup(\Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup $personGroupData)
    {
        $body = [
            'json' => [
                'name' => $personGroupData->getName(),
                'userData' => $personGroupData->getUserData()
            ]
        ];

        $putUri = 'persongroups/' . $personGroupData->getPersonGroupId();

        $result = $this->httpClient->put($putUri, $body);

        return $result;
    }

    /**
     * @param string $id
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function deletePersonGroup($id)
    {
        $body = [
            'json' => [
                'personGroupId' => $id
            ]
        ];

        $result = $this->httpClient->delete("persongroups/$id", $body);

        return $result;
    }

    public function trainPersonGroup($id)
    {
        $body = [
            'json' => [
                'personGroupId' => $id
            ]
        ];

        $result = $this->httpClient->post("persongroups/$id/train", $body);

        return $result;
    }

}