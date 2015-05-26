<?php 

require 'vendor/autoload.php';
require_once 'includes/error_handling.php';

if (isset($_POST['token']) and isset($_POST['playlist_id'])) {
	$accessToken = $_POST['token'];
	$playlistID = $_POST['playlist_id'];

	$api = new SpotifyWebAPI\SpotifyWebAPI();
	$api->setAccessToken($accessToken);

	$me = $api->me();
	$username = $me->id;

	$playlist = $api->getUserPlaylist($username, $playlistID);

	$playlist_name = $playlist->name;

	$playlistTracks = $api->getUserPlaylistTracks($username, $playlistID);

	$playlistTracks->playlist_name = $playlist_name;

	echo json_encode($playlistTracks);

} else {
	report_error('error', 'improper params', 'spotify_get_playlist_tracks');
}




?>