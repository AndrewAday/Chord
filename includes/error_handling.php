<?php

function report_error($status, $error, $location) {
	echo json_encode([
			'status' => $status,
			'error' => $error,
			'location' => $location
		]);
}

function success() {
	echo json_encode([
		'status' => 'success'
	]); 
}

?>