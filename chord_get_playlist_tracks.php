<?php

require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username']) and isset($_POST['playlist_id'])) {
	$username = $_POST['username'];
	$playlist = $_POST['playlist_id'];

	$user = $users->findOne(['username' => $username]);

	$tracks = $user[$playlist];

	echo json_encode($tracks);


} else {
	report_error('error', 'improper params', 'chord_get_playlist_tracks');
	exit;
}


?>