<?php

$mongo = new MongoClient("mongodb://localhost");

if ($mongo) {	
   $db = $mongo->Chord;
   $users = $db->users;
} else {
   echo json_encode(['status' => 'mongo connection error']);
   exit; 
}


?> 
