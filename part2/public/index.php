<?php

require '../vendor/autoload.php';

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$config = new \Slim\Container($configuration);

//Loading Slim ...
$app = new \Slim\App($config);

//Own config
require '../app/config.php';

//Load helpers
require '../app/helpers.php';

//My Routes
require '../app/routes.php';

//Load App !
$app->run();

