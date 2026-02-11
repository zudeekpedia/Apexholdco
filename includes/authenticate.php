<?php 
ob_start();
session_start();  // Start session at the top 
require_once '../database/config.php';

// Check if an authorization code is passed via GET
if (isset($_GET['code'])) {
    // Authenticate using the code
    $googleClient->authenticate($_GET['code']);
    
    // Store the access token in the session
    $_SESSION['token'] = $googleClient->getAccessToken();
    
    // Redirect to the same page to prevent resubmission of the authorization code
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
    exit(); // Always exit after redirect
}

// If an access token is in the session, set it for the Google client
if (isset($_SESSION['token']) && $_SESSION['token']) {
    $googleClient->setAccessToken($_SESSION['token']);
}

// Check if the access token is valid
if ($googleClient->getAccessToken()) {
    // Try fetching user profile data from the Google OAuth API
    try {
        $gpUserProfile = $google_oauthV2->userinfo->get();
    } catch (Exception $e) {
        // Handle API errors
        echo 'Error fetching user info: ' . $e->getMessage();
        session_destroy(); // Destroy session if there's an error
        header("Location: ./"); // Redirect to the homepage or login
        exit();
    }
    
    // Store user profile data into variables
    $service = "google";
    $googleid = $gpUserProfile['id'] ?? '';
    $firstname = $gpUserProfile['given_name'] ?? '';
    $lastname = $gpUserProfile['family_name'] ?? '';
    $gender = $gpUserProfile['gender'] ?? '';
    $email = $gpUserProfile['email'] ?? '';
    //$locale = $gpUserProfile['locale'] ?? '';
    $picture = $gpUserProfile['picture'] ?? '';
    $url = $gpUserProfile['link'] ?? '';
    
    //Generate username for user 
    $username = !empty($firstname) ? strtolower($firstname) . rand(1000,9999) : 'user' . rand(1000,9999); //Generate a username

    // Check if user exists in the database
    $sql = "SELECT * FROM users WHERE googleid='$googleid'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Update existing user
        $conn->query("UPDATE users SET `firstname`='$firstname',`username`='$username', `lastname`='$lastname', `email`='$email', `gender`='$gender', `picture`='$picture', `google_url`='$url' WHERE `googleid`='$googleid'");
    } else {
        // Insert new user
        $conn->query("INSERT INTO users (`service_provider`, `username`, `googleid`, `firstname`, `lastname`, `email`, `gender`, `picture`, `google_url`) VALUES ('$service','$username', '$googleid', '$firstname', '$lastname', '$email', '$gender', '$picture', '$url')");
    }

    // Fetch user data from the database after insert/update
    $res = $conn->query($sql);
    $userData = $res->fetch_assoc();

    // Store user data in session
    $_SESSION['userData'] = $userData;
    $_SESSION['email'] = $email;
    $_SESSION['id'] = $userData['user_id'];
    
    // Redirect to the user's dashboard
    header("Location: ../user/dashboard?signedinfrom=google&name=$firstname $lastname ");
    exit();
    
} else {
    // If no token, redirect to the homepage or login page
    header("Location: /");
    exit();
}

