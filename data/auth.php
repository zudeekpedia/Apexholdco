<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'googleapi/Client.php';  // Include Google Client library
//require_once 'googleapi/Service/Oauth2.php'; // OAuth2 service
require_once 'googleapi/Auth/GetUniverseDomainInterface.php';

function getGoogleClient($redirect_uri) {
    $client = new Google\Client();
    $client->setClientId('m94t9le1u226l5u80mdj38nfs39biaav'); // Replace with your Google Client ID
    $client->setClientSecret('g1SwTvKN_vEIYrNP3jHXPy70kycv'); // Replace with your Google Client Secret
    $client->setRedirectUri($redirect_uri);
    $client->addScope('https://www.googleapis.com/auth/userinfo.email');
    $client->addScope('https://www.googleapis.com/auth/userinfo.profile');
    return $client;
}

// Function to check Google user or create a new account
function checkGoogleUser($userInfo) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM users WHERE google_id = ?");
    $stmt->execute([$userInfo['id']]);
    $user = $stmt->fetch();
    
    if (!$user) {
        // Register the new Google user
        $stmt = $pdo->prepare("INSERT INTO users (email, google_id) VALUES (?, ?)");
        $stmt->execute([$userInfo['email'], $userInfo['id']]);
        $user = getUserByEmail($userInfo['email']);
    }
    return $user;
}
?>
