<?php
include 'ClearPar.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'):
	$clearPar = new ClearPar();
	echo  $clearPar->build($_POST['parenthesis']);
endif;

