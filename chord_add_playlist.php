<?php

require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username']) and isset($_POST['playlist_id'])) {

	$username = $_POST['username'];
	$playlist = $_POST['playlist_id'];

	$user = $users->findOne(['username' => $username]);

	try {
		$users->update($user, ['$set' => [$playlist => []]]);
		success();
		exit;
	} catch (Exception $e) {
		report_error('error', $e->getMessage(), 'chord_add_playlist');
		exit;
	}
	
} else {
	report_error('error', 'improper params', 'chord_add_playlists');
	exit;
}

?>