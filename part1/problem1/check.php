<?php
include 'ChangeString.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'):
	$changeString = new ChangeString();
	echo $changeString->build($_POST['string']);
endif;

