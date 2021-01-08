<?php 
require_once __DIR__ . '/../src/autoload.php';
$setup = new core\cURL;
$content = new core\getContent();

// You should set the configuration like below. You can custom your configuration 
$setup->setup([
    'url' => 'https://corona.wonosobokab.go.id/',
    'return_transfer' => true
]);

// You should send the data from class curl to class get content like this.
$app = $content->store($setup->connect());

// And then you will receive the response corresponding with the name of class above
echo $content->getText('alert alert-warning');