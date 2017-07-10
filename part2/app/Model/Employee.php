<?php

namespace App\Model;
use \Psr\Http\Message\ServerRequestInterface as Request;

class Employee
{
	private $data = [];
	private $searchable = ['name','email'];
	private $search = [];

	public function __construct()
	{
		$data = file_get_contents('../employees.json');
		$this->data = json_decode($data, true);
	}

	public function filterBySalary(Request $request)
	{
		//Get Min and Max, if they do not exist, set up default values
		$min = $request->getParam('s_min') && $request->getParam('s_min') >= 0 ? $request->getParam('s_min') : 0;
		$max = $request->getParam('s_max') && $request->getParam('s_max') >= 0 ? $request->getParam('s_max') : -1;
		$employees = [];

		foreach ($this->data as $employee):
			//Get Salary without dollar symbol, and without points in number
			$salary = floatval(str_replace(',', '', ltrim($employee['salary'],'$')));

			if($max > $min && $salary >= $min && $salary <= $max || $max == -1 && $salary >= $min)
				$employees[] = $employee;
		endforeach;
		
		return $employees;
	}


	public function get(Request $request)
	{
		$employees = $this->data;
		$this->getSearchParameters($request);

		if(!empty($this->search)):
			$employees_searched = [];

			foreach ($employees as $employee)
				if($this->isEmployeeInTheSearch($employee))
					$employees_searched[] = $employee;

			$employees = $employees_searched;
		endif;

		return $employees;
	}

	public function findBy($field_name, $field_value)
	{
		$employee = [];

		foreach ($this->data as $e):
			if($e[$field_name] == $field_value):
				$employee = $e;
				break;
			endif;
		endforeach;

		return $employee;
	}

	//Private Methods

	//Search if there are parameters GET, and if those are also in the searchable array
	private function getSearchParameters(Request $request)
	{
		$search_allow = [];
		$params = $request->getParams();

		foreach ($params as $key => $value):
			$key = strtolower($key);

			if(in_array($key, $this->searchable) && !empty(trim($value)))
				$search_allow[$key] = strtolower($value);
		endforeach;

		$this->search = $search_allow;
	}

	//Only the employee will be true if it fits all the search parameters
	private function isEmployeeInTheSearch(Array $employee)
	{
		$is_in_search = false;

		foreach ($this->search as $key => $value)
			if( strpos(strtolower($employee[$key]),$value) !== false  )
				$is_in_search = true;

		return $is_in_search;
	}

}