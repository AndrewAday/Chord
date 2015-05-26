<?php

require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username']) and isset($_POST['playlist_id']) and isset($_POST['track_id']) and isset($_POST['type'])) {

	$username = $_POST['username'];
	$playlist = $_POST['playlist_id'];
	$track = $_POST['track_id'];
	$type = $_POST['type'];

	$user = $users->findOne(['username' => $username]);

	$track_update = [
		'type' => $type,
		'id' => $track
	];

	try {
		$users->update($user, ['$addToSet' => [$playlist => $track_update]]);
		success();
		exit;
	} catch (Exception $e) {
		report_error('error', $e->getMessage(), 'chord_update_playlist');
		exit;
	}

} else {
	report_error('error', 'improper params', 'chord_update_playlist');
	exit;
}

?>