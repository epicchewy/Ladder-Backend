<?php
	header("content-type: application/json");
	require_once('db_connect.php');

	$name = $_GET['summoner_name'];
	
		
	$query = array("summoner_name" => $name); 
	

	$result = $players->findOne($query);

	if ($result) {
		$rtnjsonobj->player = $result;
	} else {
		$rtnjsonobj->player = "error not found";
	}
	

	$rtnjsonobj->message = "Success, dawg!";

	echo $_GET['callback']. '('. json_encode($rtnjsonobj) . ')';


?>