<?php
    require "main.php";

    if(isset($_SESSION['token'])){
        $data = array('message' => $_POST['message'],'source' => $fb->fileToUpload($_POST['photo']));
        $res = $fb->post('/me/photos', $data, $_SESSION['token']);
    }

    	$fb->setDefaultAccessToken($_SESSION['token']);
		$response = $fb->get('/me?fields=email,name');
		$usernode = $response->getGraphUser();

		//echo 'Name: '.$usernode->getName().'<br>';
		//echo 'UserId: '.$usernode->getId().'<br>';
		//echo 'Email: '.$usernode->getProperty('email').'<br>';

		$image = 'https://graph.facebook.com/'.$usernode->getId().'/picture?width=200';
		echo "Picture<br>";
		echo "<img src='$image'/><br>";
?>