<?php

require '../vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);

//Loading Slim ...
$app = new \Slim\App($c);

//Own config
require '../app/config.php';

//My Routes
require '../app/routes.php';
$app->run();

