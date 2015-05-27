<?php 

require 'vendor/autoload.php';
require 'php-soundcloud/Services/Soundcloud.php';
require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username'])) {
	
	$username = $_POST['username'];
	
	$user = $users->findOne(['username' => $username]);
	$access_token = $user['soundcloud_access_token'];

	$client = new Services_Soundcloud('c30dae074d60ef264d9940a2d7354b33', 'ca7ee5c12c56dd196cd618958bc32302');
	$client->setAccessToken($access_token);

	$soundcloud_user = json_decode($client->get('me'));
	$souncloud_id = $soundcloud_user->id;
	
	$favorites = $client->get('users/' . $souncloud_id . '/favorites');	

	echo $favorites;

} else {
	report_error('error', 'improper params', 'soundcloud_get_favorites');
	exit;
}


?>