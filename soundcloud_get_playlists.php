<?php 

// error_reporting(E_ALL | E_STRICT);
//     ini_set("display_errors", true);

require 'vendor/autoload.php';
require 'php-soundcloud/Services/Soundcloud.php';
require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username'])) {
	
	$username = $_POST['username'];
	// $username = "";
	$user = $users->findOne(['username' => $username]);
	$access_token = $user['soundcloud_access_token'];
	// $access_token = "1-131075-155055189-cbb4df746fe9d";

	$client = new Services_Soundcloud('c30dae074d60ef264d9940a2d7354b33', 'ca7ee5c12c56dd196cd618958bc32302');
	$client->setAccessToken($access_token);

	$soundcloud_user = json_decode($client->get('me'));
	$souncloud_id = $soundcloud_user->id;

	$playlists = json_decode($client->get('users/' . $souncloud_id . '/playlists'));
	$favorites = json_decode($client->get('users/' . $souncloud_id . '/favorites'));

	$ret = [];
	$ret['playlists'] = $playlists;
	$ret['favorites'] = $favorites;

	echo json_encode($ret);

	// print_r($client->get('users/' . $souncloud_id . '/playlists'));
	// echo '</br>';
	// echo '</br>';
	// print_r($client->get('users/' . $souncloud_id . '/tracks'));
	// echo '</br>';
	// echo '</br>';
	// print_r($client->get('users/' . $souncloud_id . '/favorites'));




} else {
	report_error('error', 'improper params', 'soundcloud_get_playlists');
	exit;
}


?>