<?php

require_once "vendor/autoload.php";

$accountKey = "6773ac854304473da7a6170f5fd992e4";
$baseUri    = "https://westus.api.cognitive.microsoft.com/recommendations/v4.0/";

$class = new \Ebizmarts\MsCognitiveService\Recommendation($accountKey, $baseUri);

$models = $class->getAllModels();

foreach ($models as $_m) {
    var_dump($_m->getName());
}

var_dump( $models );