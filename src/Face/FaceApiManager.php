<?php

namespace Ebizmarts\MsCognitiveService\Face;

use Ebizmarts\MsCognitiveService\Face\Data\V1_0\Person;
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
     * List person groups and their information.
     *
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

    /**
     * Create a new person group with specified personGroupId, name and user-provided userData.
     *
     * @param Data\V1_0\PersonGroup $personGroupData
     * @return \Psr\Http\Message\ResponseInterface
     */
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
     * Delete an existing person group. Persisted face images of all people in the person group will also be deleted.
     *
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

    /**
     * Queue a person group training task, the training task may not be started immediately.
     *
     * @param string $id
     * @return \Psr\Http\Message\ResponseInterface
     */
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

    /**
     * Create a new person in a specified person group. A newly created person have no registered face,
     * you can call Person - Add a Person Face API to add faces to the person.
     *
     * @param Person $person
     * @param $personGroupId
     * @return Person
     */
    public function createPerson(Person $person, $personGroupId)
    {
        $body = [
            'json' => [
                'name' => $person->getName()
            ]
        ];

        $result = $this->httpClient->post("persongroups/$personGroupId/persons", $body);
        $contents = $result->getBody()->getContents();
        $createdPersonId = \GuzzleHttp\json_decode($contents)->personId;

        return new Person(['personId' => $createdPersonId]);
    }

    /**
     * List all persons in a person group, and retrieve person information
     * (including personId, name, userData and persistedFaceIds of registered faces of the person).
     *
     * @param string $personGroupId
     * @return array
     */
    public function getAllPersonsForPersonGroup($personGroupId)
    {
        $response = $this->httpClient->request('GET', "persongroups/$personGroupId/persons");
        $contents = $response->getBody()->getContents();
        $persons = \GuzzleHttp\json_decode($contents);

        $return = [];

        foreach($persons as $person)
        {
            $newPerson = new Person();
            $newPerson->setName($person->name);
            $newPerson->setPersonId($person->personId);
            $newPerson->setUserData($person->userData);
            $newPerson->setPersistedFaceIds($person->persistedFaceIds);

            $return []= $newPerson;
        }

        return $return;
    }

    /**
     * Add a representative face to a person for identification.
     * The input face is specified as an image with a targetFace rectangle.
     * It returns a persistedFaceId representing the added face and this persistedFaceId will not expire.
     * Note persistedFaceId is different from faceId which represents the detected face by Face - Detect.
     *
     */
    public function addFace()
    {

    }

    /**
     * Detect human faces in an image and returns face locations, and optionally with faceIds, landmarks, and attributes.
     */
    public function detectFace()
    {

    }

    /**
     * Verify whether two faces belong to a same person or whether one face belongs to a person.
     *
     */
    public function verifyFace()
    {

    }

}