<?php

namespace Ebizmarts\MsCognitiveService\Face;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup as PersonGroupData;
use GuzzleHttp\Client;

class PersonGroup
{
    private $httpClient;

    /**
     * Recommendation constructor.
     * @param string $accountKey
     * @param string $baseUri
     */
    public function __construct($accountKey, $baseUri)
    {
        $this->httpClient = new Client(
            [
                "base_uri" => $baseUri,
                "headers"  => [
                    "Ocp-Apim-Subscription-Key" => $accountKey,
                    "Content-Type" => "application/json; charset=utf-8"
                ]
            ]
        );
    }

    /**
     * @return array \Ebizmarts\MsCognitiveService\Face\Data\V1_0\PersonGroup
     */
    public function getAllGroups()
    {
        $response = $this->httpClient->request('GET', 'persongroups');
        $contents = $response->getBody()->getContents();
        $groups = \GuzzleHttp\json_decode($contents);

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

    public function create(PersonGroupData $personGroup)
    {
        $body = [
            'json' => [
                'name' => $personGroup->getName(),
                'userData' => $personGroup->getUserData()
            ]
        ];

        $putUri = 'persongroups/' . $personGroup->getPersonGroupId();

        $result = $this->httpClient->put($putUri, $body);

        return $result;
    }
}