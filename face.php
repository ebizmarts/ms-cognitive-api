<?php

require_once "vendor/autoload.php";

$accountKey = "***REMOVED***";
$baseUri    = "https://westus.api.cognitive.microsoft.com/face/v1.0/";

$class = new \Ebizmarts\MsCognitiveService\Face\PersonGroup($accountKey, $baseUri);

$personGroups = $class->getAllGroups();

var_dump($personGroups);