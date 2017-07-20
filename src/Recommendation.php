<?php

namespace Ebizmarts\MsCognitiveService;

use Ebizmarts\MsCognitiveService\Data\V4_0\Model;
use Ebizmarts\MsCognitiveService\Exception;

class Recommendation
{
    private $httpClient;

    /**
     * Recommendation constructor.
     * @param string $accountKey
     * @param string $baseUri
     */
    public function __construct($accountKey, $baseUri)
    {
        $this->httpClient = new \GuzzleHttp\Client(
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
     * @return array \Ebizmarts\MsCognitiveService\Data\V4_0\ModelInterface
     */
    public function getAllModels()
    {
        $response = $this->httpClient->request('GET', 'models');
        $contents = $response->getBody()->getContents();
        $models = \GuzzleHttp\json_decode($contents);

        $return = [];

        foreach($models->models as $model)
        {
            $return []= new \Ebizmarts\MsCognitiveService\Data\V4_0\Model(
                [
                    'id' => $model->id,
                    'name' => $model->name,
                    'description' => $model->description,
                    'created_datetime' => $model->createdDateTime,
                    'active_build_id' => $model->activeBuildId,
                    'catalog_display_name' => $model->catalogDisplayName,
                ]
            );
        }

        return $return;
    }

    public function uploadCatalogFile($modelId, $catalogName)
    {
        $this->httpClient->request('POST', "models/$modelId/catalog?catalogDisplayName=$catalogName");
    }
}