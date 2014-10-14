<?php
	header("content-type: application/json");
	require_once('db_connect.php');

	$rtnjsonobj->playerdata = $_GET['playerData'];
	

	
		

	$player_data = $_GET['playerData'];
	$summoner_name = $player_data['name'];
	
	$result = $players->findOne(array(
				"summoner_name" => $summoner_name
			));
	
	if ($result) {
		$rtnjsonobj->message = "User already exists, not inserted";

	echo $_GET['callback']. '('. json_encode($rtnjsonobj) . ')';
	exit;

	} else {
	
	
	$rank = $player_data['rank'];
	$mainRole = $player_data['mainRole'];
	$favChamp = $player_data['favChamp'];
	$age = $player_data['age'];
	$grade = $player_data['grade'];
	$school = $player_data['school'];
	
	
	$long = (float) $player_data['longitude'];
	$lat = (float) $player_data['latitude'];

	$email = $player_data['email'];
	
	$query = array("summoner_name" => $summoner_name, "rank" => $rank, "mainRole" => $mainRole, "favChamp" => $favChamp, "age" => $age, "grade" => $grade, "school" => $school, "longitude" => $long, "latitude" => $lat, "email" => $email); 
	

	$players->insert($query);
	
	$rtnjsonobj->message = "Successfully inserted!";

	echo $_GET['callback']. '('. json_encode($rtnjsonobj) . 	')';	
	
	
	}

?>