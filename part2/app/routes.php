<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\EmployeesController;

//Hello 

$app->get('/hello/{name}', function (Request $request, Response $response) {

    return $this->view->render($response, 'hello.php', [
        'name' =>  $request->getAttribute('name')
    ]);
    
});


//Get employees list
$app->get('/employees', function (Request $request, Response $response) {
	$data = (new EmployeesController)->index($request);   
	return view($this, $data['view'],$data['data']);
});


//Get employee detail
$app->get('/employees/{id}', function (Request $request, Response $response) {
	$data = (new EmployeesController)->show($request->getAttribute('id'));   
	return view($this, $data['view'],$data['data']);
});