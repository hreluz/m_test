<?php

class CompleteRange
{
	public function build(Array $numbers)
	{
		$numbers = $this->checkAreIntegers($numbers);
		return $this->missingNumbers($numbers);
	}

	private function missingNumbers(Array $numbers, $index = 0)
	{
		sort($numbers);

		if($index == count($numbers) - 1)
			return $numbers;

		$actual_number = $numbers[$index];
		$next_number = $numbers[$index + 1];

		if($actual_number + 1 != $next_number ):
			$diff = $next_number - $actual_number;

			for ($i = 1  ; $i < $diff ; $i++)
				array_push($numbers, $i + $actual_number);
		else:
			$diff = 1;
		endif;
		
		return $this->missingNumbers($numbers, $index + $diff);
	}

	private function checkAreIntegers(Array $numbers)
	{
		for ($i=0; $i < count($numbers) ; $i++):
			$numbers[$i] = trim($numbers[$i]);

			if(!is_numeric($numbers[$i]))
				throw new Exception("Error, all numbers must be integers. '$numbers[$i]' is not an integer");

			$numbers[$i] = intval($numbers[$i]);
		endfor;

		return $numbers;
	}
}