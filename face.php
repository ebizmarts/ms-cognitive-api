<?php

require_once "vendor/autoload.php";

$accountKey = "44eb2ad6c05e49b7bdd0401efde9b8de";
$baseUri    = "https://westus.api.cognitive.microsoft.com/face/v1.0/";

$class = new \Ebizmarts\MsCognitiveService\Face\PersonGroup($accountKey, $baseUri);

$personGroups = $class->getAllGroups();

var_dump($personGroups);