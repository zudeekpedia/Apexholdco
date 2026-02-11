<?php
ob_start();
session_start();  // Start session at the top 


// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../data/functions.php';  // Include your function definitions
require_once '../data/auth.php';  // Include your authentication setup
// Include Guzzle Autoloader
require_once 'guzzle_autoload.php';
use GuzzleHttp\Client;  // Import Guzzle for HTTP requests


$redirect_uri = 'https://streamopay.com/includes/callback.php';  // Your redirect URI
$client = getGoogleClient($redirect_uri);  // Get the Google Client
// Define your Google API client ID and secret
$clientId = '1085910319569-m94t9le1u226l5u80mdj38nfs39biaav.apps.googleusercontent.com';
$clientSecret = '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';

// Add this function here
/*function fetchAccessTokenWithAuthCode($code, $clientId, $clientSecret, $redirect_uri) {
    $client = new Client();
    
    try {
        $response = $client->post('https://oauth2.googleapis.com/token', [
            'form_params' => [
                'code' => $code,
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'redirect_uri' => $redirectUri,
                'grant_type' => 'authorization_code'
            ]
        ]);
        
        $body = json_decode($response->getBody()->getContents(), true);
        
        if (isset($body['error'])) {
            throw new Exception('Error fetching access token: ' . $body['error_description']);
        }
        
        return $body;
    } catch (Exception $e) {
        throw new Exception('Error: ' . $e->getMessage());
    }
}*/


if (isset($_GET['code'])) {
    // Attempt to exchange the authorization code for an access token
    try {
        // Set Guzzle as the HTTP client in Google Client
        //$guzzleClient = new GuzzleHttp\Client(); // Create a new Guzzle HTTP client
        //$client->setHttpClient($guzzleClient);  // Set Guzzle as the HTTP client
        
        
        // Log the received authorization code for debugging
        error_log("Received authorization code: " . $_GET['code']);

        // Fetch the access token using the authorization code
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        
        // Log the fetched token for debugging
        error_log("Fetched token: " . json_encode($token));

        // Check if there was an error in fetching the token
        if (isset($token['error'])) {
            // Log the error details
            error_log("Error fetching token: " . $token['error_description']);
            throw new Exception('Error fetching access token: ' . $token['error']);
        }
        
        // Set the access token
        $client->setAccessToken($token['access_token']);

        // Log success for setting the access token
        error_log("Access token set successfully.");

        // Create the OAuth2 service
        $oauth2 = new Google\Service\Oauth2($client);
        $userInfo = $oauth2->userinfo->get(); // Get user info

        // Log the user info for debugging
        error_log("User info: " . json_encode($userInfo));

        // Check or create the user in the database
        $user = checkGoogleUser($userInfo);

        // Store user information in the session
        $_SESSION['email'] = $user['email'];  // Store user email
        $_SESSION['user_id'] = $user['id'];    // Store user ID

        // Log session information
        error_log("Session set for user: " . $_SESSION['email']);

        // Redirect to dashboard
        header('Location: ../user/dashboard.php');
        exit();
        
    } catch (Exception $e) {
        // Log the exception for further analysis
        error_log("Exception caught during OAuth process: " . $e->getMessage());

        // Handle any errors during the OAuth flow
        echo 'Error: ' . $e->getMessage();
        // Redirect to a failure page
        header("Location: ../user?failed");
        exit();
    }
} else {
    // If no code is provided, handle the error gracefully
    echo "Authorization failed.";
    // Log the missing code scenario
    error_log("Authorization failed: No code provided.");
    
    // Redirect to an appropriate error page or show a message
    header('Location: ../user?authorization=failed');
    exit();  // Always exit after header redirection
}
ob_end_flush();

?>
