<?php
if (isset($_POST['email']) and isset($_POST['facebook_id']) and isset($_POST['full_name']) and isset($_POST['first_name']) and isset($_POST['last_name']) and isset($_POST['profile_url']) and isset($_POST['access_token'])) {
	
	require_once 'includes/db_connect.php';
	require_once 'includes/error_handling.php'; 
	
	try {
		$user = $users->findOne(['email' => $_POST['email']]);
		//user not found, let's add to db
		if (!$user) {
			$query = [
				'email' => $_POST['email'],
				'facebook_id' => $_POST['facebook_id'],
				'full_name' => $_POST['full_name'],
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'profile_url' => $_POST['profile_url'],
				'access_token' => $_POST['access_token']
			];
			try {
				$users->insert($query);
				success();
				exit;
			} catch (Exception $e) {
				//TODO add stuff here
				exit;
			}
		} else {
		//user is found, let's update access token	
		//TODO add code for updating access token
			success();
			exit; 
		}
	} catch (Exception $e) {
		//TODO add stuff here
		exit;	
	}
} else {
	report_error('improper params', 'improper params', ' ');
	exit;  
}
	



?>