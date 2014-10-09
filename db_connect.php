<?php 

$mongo = new MongoClient("mongodb://localhost");

session_start(); 
if ($mongo) {	
   $_SESSION['connection'] = 'success';
   $db = $mongo->ladder;
   $players = $db->players;
} else {
   $_SESSION['connection'] = 'error, could not connect db';
}




?>