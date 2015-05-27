<?php

require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username']) and isset($_POST['token'])) {
	$token = $_POST['token']; 
	$username = $_POST['username'];

	$user = $users->findOne(['username' => $username]);
	$users->update($user, ['$set' => ['soundcloud_access_token' => $token]]);

	success();

} else {
	report_error('error', 'improper params', 'soundcloud_auth');
	exit;
}



?>