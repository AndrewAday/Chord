<?php

require 'vendor/autoload.php';
require 'includes/error_handling.php';

// if (isset($_POST['token'])) {

	$api = new SpotifyWebAPI\SpotifyWebAPI();
	// $api->setAccessToken($accessToken);
	$api->setAccessToken("BQAifbDq7-urQbERBirCaiP3sFDMUI6fXjyRqxYlS4991aADHRT5mrf6D6RJSurbGPofXQu7y12rer5gBCW99-6IlRdz06s_etLPyoZbkiM5rGujRqy8iTUVl3-c7rcdUWvYve-4wefy0kiTza4TOa3g3eZfpKTvnCFKx3mGRYZkjVATtNCVZUeZxa_sAb4mHz6iOFz9eWIHXJRsYbQS8WZgLnnAP5mwEmnIZdQGcr39qlEx_mtEM4Yd5ys6FmGr7yyFwOwXE0D1c56Z-ZFx_5G_");

	$me = $api->me();
	print_r($me);
	
	echo '</br>';
	
	$playlists = $api->getUserPlaylists('username');

	print_r($playlists);

// } else {
// 	report_error('error', 'improper params', 'spotify_get_playlists');
// 	exit;
// }


?>