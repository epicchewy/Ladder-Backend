<?php

require_once('db_connect.php');

$cursor = $players->find();
foreach($cursor as $doc) {
	print_r(json_encode($doc));
	echo '<br>';
	echo '<br>';
		
}



//first change luke chui

?>