<?php

/*
|--------------------------------------------------------------------------
| Instagram
|--------------------------------------------------------------------------
|
| Instagram client details
|
*/

$config['instagram_client_name']	= 'onenightonly';
$config['instagram_client_id']		= 'b49e8a6406194c5ab31add12f652ab45';
$config['instagram_client_secret']	= '5c67cbf5c789473bb405162a7bbadffb';
$config['instagram_callback_url']	= 'http://onenightonly.armani.com';
$config['instagram_website']		= 'http://onenightonly.armani.com';
$config['instagram_description']	= 'An app to pull in a stream of photos onto the website';

// There was issues with some servers not being able to retrieve the data through https
// If you have this problem set the following to FALSE 
// See https://github.com/ianckc/CodeIgniter-Instagram-Library/issues/5 for a discussion on this
$config['instagram_ssl_verify']		= TRUE;