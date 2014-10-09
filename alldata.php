<?php
	header("content-type: application/json");
	require_once('db_connect.php');



	$i = 0; 		

	$cursor = $players->find();

	foreach($cursor as $doc) {
		$rtnjsonobj->$i = $doc;
		$i++;
	}
	
	$rtnjsonobj->message = "Success, dawg!";

	echo $_GET['callback']. '('. json_encode($rtnjsonobj) . ')';

?>