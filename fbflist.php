<?php
session_start();
require_once('facebook/autoload.php');
$fb = new Facebook\Facebook([
  'app_id' => '133491504031573', // Replace {app-id} with your app id
  'app_secret' => '5522cc13eb0973becce08ae746dfc931',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://localhost/fbflist/fbflist.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

if(isset($_GET['code'])){
    $accessToken = $_GET['code'];


$response = $fb->get('/me?fields=id,name', $accessToken);

$user = $response->getGraphUser();

echo 'Name: ' . $user['name'];

}
?>