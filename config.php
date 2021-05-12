<?php

//config.php
//start session on web page
// session_start();
//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('644285469675-0vrh91pug2rifi6gfq7snoio0f2r726b.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('5nTxdHSACqMMQj62NOUQUEtq');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('https://thestoryadda.com');

//
$google_client->addScope('email');

$google_client->addScope('profile');
// $google_client->addScope('https://www.googleapis.com/auth/user.gender.read');

 



?>