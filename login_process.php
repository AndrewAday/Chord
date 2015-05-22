<?php

require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username']) and isset($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];

	try {
		$user = $users->findOne(['username'] => $username);
		if ($user != null) {
			//User found, do comparison
			if (password_verify($password, $user['password'])) {
				echo json_encode(['status' => 'success']);
				exit;
			} else {
				//Wrong password
				echo json_encode(['status' => 'wrong password']);
				exit;
			}
		} else {
			//User not in db
			echo json_encode(['status' => 'username not found']);
			exit;
		}
	} catch (Exception $e) {
		report_error('error', $e->getMessage(), 'finding user');
		exit;
	}
} else {
	report_error('error', 'improper params', ' ');
	exit;  
}

?>