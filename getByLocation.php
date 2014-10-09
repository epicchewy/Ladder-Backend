<?php
	header("content-type: application/json");
	require_once('db_connect.php');

	$range = 1.0/60.0;
	
	
	$longitude = $_GET['longitude'];
	$latitude = $_GET['latitude'];
	$radius = $_GET['radius'];
	
	$range *= $radius;
	
/* 	$range = 1;  */
	
		
	/*
$query = array(
		'$and' => array(
			array('$and' => array(
				array('longitude' => 
					array('$lte' => $longitude + $range)),
				array('longitude' =>
					array('$gte' => $longitude - $range))
					)),
			array('$and' => array(
				array('latitude' => 
					array('$lte' => $latitude + $range)),
				array('latitude' =>
					array('$gte' => $latitude - $range))
				)
			)
		)
	); 
*/
	
	

/* 	$cursor = $players->find($query); */
	$cursor = $players->find();
	$i = 0;
	//store all in rtnjsonobj
	foreach($cursor as $doc) {
		$doc_long = $doc['longitude'];
		$doc_lat = $doc['latitude'];
		if (($doc_long <= $longitude + $range and $doc_long >= $longitude - $range) and ($doc_lat <= $latitude + $range and $doc_lat >= $latitude - $range)) {
			$rtnjsonobj->$i = $doc;
			$i++;
		}
	}
	
	$rtnjsonobj->message = "These are the people in your radius!";

	echo $_GET['callback']. '('. json_encode($rtnjsonobj) . ')';


?>