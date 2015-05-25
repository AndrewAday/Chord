<?php

require 'vendor/autoload.php';
require 'includes/error_handling.php';

if (isset($_POST['token'])) {
	$accessToken = $_POST['token'];
	$api = new SpotifyWebAPI\SpotifyWebAPI();
	$api->setAccessToken($accessToken);
	// $api->setAccessToken("BQD0Nhr6Ol2TfGKXFw2L3KkbwcYY2Y35S-AvFRVhTBF4Qaq8MyIKkyVPeqskam6igUKwTSoHJLH_TYLOj4CHzoAv6O0R68SkmSnWQGp8VhATGZcQ4aWcHVyFOFpBGEhG2cT6zm4cexOuDnzMAWO5UzE0OTRiwFw8nMfntvqc6-wzz3JDuAuC0FHGuw4LHTiiz1Bh3nl0li1rfpZafaZwpDzrj5u75-fLyOfnQaVsUDOx_69XO-19SQgiY-BT23_bCt3blN4RTEiIPDiY4w-D4Kpy");

	$me = $api->me();
	echo json_encode($me);
	
	// $playlists = $api->getUserPlaylists('1234086604');


} else {
	report_error('error', 'improper params', 'spotify_get_playlists');
	exit;
}


?>
