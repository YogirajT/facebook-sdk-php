<?php
	require "main.php";
	
	$helper = $fb->getRedirectLoginHelper();
	try {
	  	$accessToken = $helper->getAccessToken();
	} catch(Facebook\Exceptions\FacebookSDKException $e) {
	  	echo $e->getMessage();
	  	exit;
	}
	 
	$_SESSION['token'] = $accessToken;
	  	header('Location: index.php');
	  	
	} elseif ($helper->getError()) {
	 	echo "Sorry, You cannot use the app without these permissions. Go back to <a href = 'index.php'>home</a>.";
	  	exit;
	}
		
?>