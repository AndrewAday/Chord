<?php

require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username']) and isset($_POST['token'])) {
	$username = $_POST['username'];
	$token = $_POST['token'];

	try {
		$user = $users->findOne(['username' => $username]);
		if ($user != null) {
			try {
				$users->update($user, ['$set' => ['spotify_auth' => $token]]);
				success();
			} catch (Exception $e) {
				report_error('error', $e->getMessage(), 'spotify_auth');
				exit;
			}
		} else {
			report_error('error', 'user not found', 'spotify_auth');
			exit; 
		}
	} catch (Exception $e) {
		report_error('error', $e->getMessage(), 'spotify_auth');
		exit;
	}

} else {
	report_error('error', 'improper params', 'spotify_auth');
	exit;
}

?>