<?php 
require_once __DIR__ . '/src/autoload.php';

$setup = new core\cURL;
$setup->setup([
    'url' => 'https://www.google.comd',
    'return_transfer' => true
]);
print_r($setup->connect());