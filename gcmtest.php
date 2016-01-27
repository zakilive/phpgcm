<?php

/*
author:Syed Ahmed Zaki
blog:www.zakilive.com
facebook.com/zakilivebuzz
app_idea:Mohammad Amir Hamza
*/
$api=$_GET['server'];
// API access key from Google API's Console
define( "API_ACCESS_KEY", "$api" );
$registrationIds = array( $_GET['id'] ); //it is getting registration id from the index page.

// prep the bundle.You can define the desired values from gcm library.I needed message and number only so it has defined here.
$msg = array
(
	'message' 	=> $_GET['mess'],
	'number'	=> $_GET['numb'],
);
//It is json passing
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg,
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
echo $result;