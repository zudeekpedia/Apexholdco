<?php
ob_start();
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


##### DB Configuration #####
require_once 'db.php';

##### Google App Configuration #####
$googleappid = "1085910319569-m94t9le1u226l5u80mdj38nfs39biaav.apps.googleusercontent.com"; 
$googleappsecret = "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"; 
// $redirectURL = "http://localhost:81/LoginwithGoogle/authenticate.php"; 
$redirectURL = "https://www.streamopay.com/includes/authenticate.php"; 

##### Create connection #####
$conn = new mysqli($servername, $username, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
##### Required Library #####
include_once '../data/googleauth/src/Google/Google_Client.php';
include_once '../data/googleauth/src/Google/contrib/Google_Oauth2Service.php';

$googleClient = new Google_Client();
$googleClient->setApplicationName('Login to StreamoPay.com');
$googleClient->setClientId($googleappid);
$googleClient->setClientSecret($googleappsecret);
$googleClient->setRedirectUri($redirectURL);
// Set scopes using setScopes (instead of addScope)
$googleClient->setScopes([
    "https://www.googleapis.com/auth/userinfo.email",
    "https://www.googleapis.com/auth/userinfo.profile"
]);
$google_oauthV2 = new Google_Oauth2Service($googleClient);

?>