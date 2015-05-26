<?php

require_once 'includes/db_connect.php';
require_once 'includes/error_handling.php';

if (isset($_POST['username'])) {

	$username = $_POST['username'];
	$user = $users->findOne(['username' => $username]);

	$playlists = $user['playlists'];

	echo json_encode($playlists);

} else {
	report_error('error', 'improper params', 'chord_get_playlists');
	exit;
}

?>