<?php

namespace App\Controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
use App\Model\Employee;

class EmployeesController {

	public function index(Request $request)
	{
		$employees = (new Employee)->get($request);

	    return [
	    	'view' => 'employees/index.php',
	    	'data' => [
	    		'employees' => $employees
	    	]
	    ];
	}

}