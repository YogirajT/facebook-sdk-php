<?php
	require "Facebook/autoload.php";
	session_start();
	$fb = new Facebook\Facebook([
	  'app_id'                => '1984171928574968',
	  'app_secret'            => '450b7b6b250ce71a6142a3f1be2f39db',
	  'default_graph_version' => 'v2.11',
	]);
?>