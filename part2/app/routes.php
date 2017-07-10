<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/hello/{name}', function (Request $request, Response $response) {

    return $this->view->render($response, 'hello.php', [
        'name' =>  $request->getAttribute('name')
    ]);
    
});