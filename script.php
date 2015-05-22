<?php
 // receive data from app's http request
header('Content-Type: application/json');

// write data from my android app to a text file

echo json_encode(['value' => $data,
					'status' => 'joy has big d'
				]);
 
?>