<?php

require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username']) and isset($_POST['password'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];

	try {
		$user = $users->findOne(['username' => $username]);
		if ($user == null) {
			//Username does not exist, go ahead with the input
			$query = [
				'username' => $username,
				'password' => password_hash($password, PASSWORD_DEFAULT)
			];
			$users->insert($query);
			echo json_encode(['status' => 'success']);
		} else {
			//Username does exist, do not go ahead
			echo json_encode(['status' => 'username exists']);
			exit;
		}
	} catch (Exception $e) {
		report_error('error', $e->getMessage(), 'adding user');
		exit;
	}

} else {
	report_error('error', 'improper params', ' ');
	exit;  
}

?>
