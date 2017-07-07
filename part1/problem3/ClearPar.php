<?php
class ClearPar
{
	public function build(String $parenthesis)
	{
		$parenthesis = $this->cleanString($parenthesis);
		return implode($this->deleteUnnecessaryParenthesis($parenthesis));
	}

	private function deleteUnnecessaryParenthesis(Array $parenthesis, $new_parenthesis = [])
	{
		if(empty($parenthesis))
			return $new_parenthesis;

		$data = $this->deleteLastParenthesis($parenthesis, $new_parenthesis);
		return $this->deleteUnnecessaryParenthesis($data['parenthesis'], $data['new_parenthesis']);
	}

	private function deleteLastParenthesis(Array $parenthesis, Array $new_parenthesis)
	{
		$indexes = $this->findIndexesParenthesis($parenthesis);
		$index1 = $indexes['index1'];
		$index2 = $indexes['index2'];
		$parenthesis_found = $indexes['parenthesis_found'];

		//If '()' was founded we save it on the $new_parenthesis and unset index2
		if($parenthesis_found):
			$new_parenthesis[$index1] = '(';
			$new_parenthesis[$index2] = ')';
			unset($parenthesis[$index2]);
		endif;

		//Unset the index of the last '(' founded, in case it was not founded, set the array empty because there is not more to search
		if($index1 >= 0 )
			unset($parenthesis[$index1]);
		else
			$parenthesis = [];

		ksort($new_parenthesis);

		return [
			'parenthesis' => $parenthesis,
			'new_parenthesis' => $new_parenthesis
		];
		
	}

	private function findIndexesParenthesis(Array $parenthesis)
	{
		$index1 = -999;
		$index2 = -999;
		$getIndex2 = false;

		//Get the key of the last '(', and the next key after that
		foreach ($parenthesis as $key => $value):
			if($getIndex2):
				$getIndex2 = false;
				$index2 = $key;
			endif;

			if($parenthesis[$key] ==  '('):
				$index1 = $key;
				$getIndex2 = true;
			endif;
		endforeach;

		return [
			'index1' => $index1,
			'index2' => $index2,
			'parenthesis_found' => $index1 >= 0 && $index2 > $index1 && isset($parenthesis[$index2]) && $parenthesis[$index2] == ')' 
		];
	}

	private function cleanString(String $parenthesis)
	{
		$clean_string = '';

		for ($i=0; $i < strlen($parenthesis) ; $i++)
			if($parenthesis[$i] == '(' ||  $parenthesis[$i] == ')')
				$clean_string .= $parenthesis[$i];

		return str_split($clean_string);
	}
}