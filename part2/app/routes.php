<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use App\Controllers\EmployeesController;

//Redirect


$app->get('/', function (Request $request, Response $response) {
	return $response->withRedirect('/employees');
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

//Api service employee Filter by salary
$app->get('/api/employees', function (Request $request, Response $response) {
	return  (new EmployeesController)->service($request);   
});