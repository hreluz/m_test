<?php

namespace App\Controllers;
use \Psr\Http\Message\ServerRequestInterface as Request;
use App\Model\Employee;
use SimpleXMLElement;

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

	public function show($id)
	{
		return [
			'view' => 'employees/detail.php',
			'data' => [
				'employee' => (new Employee)->findBy('id',$id)
			]
		];
	}

	public function service(Request $request)
	{
		$employees = (new Employee)->filterBySalary($request);

		//Serve JSON && XML
		if($request->getParam('type') && $request->getParam('type') == 'json'):
			$employees = json_encode($employees);
		else:
			// creating object of SimpleXMLElement
			$xml_data = new SimpleXMLElement('<?xml version="1.0"?><data></data>');

			// function call to convert array to xml
			array_to_xml($employees,$xml_data);

			$employees = $xml_data->asXML();
		endif;

		echo $employees;
	}
}