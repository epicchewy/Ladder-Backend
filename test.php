<?php 
	error_reporting(E_ALL | E_STRICT);
    ini_set("display_errors", true);

	require_once('db_connect.php');

	$range = 1.0/60.0;
	
	
	$latitude = 37.870322478606;
	$longitude = -122.25162030335;
	$radius = 1.0;
	
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
	
	/*
$query = array(
				'$and' => array(
					'longitude' => array(
							'$lte' => ($longitude + $range),
							'$gte' => ($longitude - $range)
						),
					'latitude' => array(
							'$lte' => ($latitude + $range),
							'$gte' => ($latitude - $range)
					)
				)
	);
*/
	
	
	/* $code = new MongoCode("db.players.find({$and : [{'longitude' : {$lte : -122.25, $gte :-122.26}}, {'latitude' : {$lte : 37.88, $gte:37.87 }}]})"); */
	
/* 	$code = new MongoCode("db.players.find()"); */
	
/* 	$response = $db->execute($code); */
/* 	print_r($response); */
	
	
	
/* 	$query = array('longitude' => array('$lte' => 0)); */

	$cursor = $players->find();
/* 	$cursor = $players->find(); */
	$i = 0;
/* 	print_r($cursor); */
	//store all in rtnjsonobj
	$temp = array();
	foreach($cursor as $doc) {
		$doc_long = $doc['longitude'];
		$doc_lat = $doc['latitude'];
		if (($doc_long <= $longitude + $range and $doc_long >= $longitude - $range) and ($doc_lat <= $latitude + $range and $doc_lat >= $latitude - $range)) {
			$temp[$i] = $doc; 
			$i++;
		}
	}
	print_r($temp);
	





?>