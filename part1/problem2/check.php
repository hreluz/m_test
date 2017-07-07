<?php
include 'CompleteRange.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'):
	$completeRange = new CompleteRange();
	
	//Convert string to array
	$numbers = explode(",", $_POST['numbers']);
	$new_numbers =  $completeRange->build($numbers);

	//Convert array to string
	echo implode(",", $new_numbers);
endif;

