<?php
session_start(); // Start the session

// Set error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1); // In production, set this to 0

// Include the database connection and functions file
include_once $_SERVER['DOCUMENT_ROOT'] . '/includes/dashboard.php';

// Check if userData is set in the session to verify if the user is logged in
if (!isset($_SESSION['userData'])) {
    header('Location: ../../login'); // Redirect to login if not authenticated
    exit();
}

// Get user ID from session
$uID = $_SESSION['userData']['user_id'];

// Fetch user data from the database
$user = getUserById($uID);
$user = $user[0];

// Validate that $user is an array and not empty
if (!is_array($user) || empty($user)) {
    // Redirect to login or handle error if user data is not found
    header('Location: ../../login');
    exit();
}

if (!$user) {
    // Redirect to login if user data is not found or invalid
    header('Location: ../../login');
    exit();
}

// Access user data safely
$fullname = trim($user['firstname'] . ' ' . $user['lastname']);
$email = $user['email'] ?? 'no-email@example.com'; // Fallback if email is not set
$profilephoto = $user['picture'] ?? 'default.jpg'; // Fallback picture if not set

// Now you can use $fullname, $email, and $profilephoto as needed



//GET BALANCE DETAILS 
$availableBalance = getAvailableBalance($uID);
$totaldeposited = getTotalDeposited($uID);
$totalwithdrawn = getTotalWithdrawn($uID);
$totalearned = getTotalEarned($uID);
$totalinvested = getTotalinvested($uID);

$lastdeposit = getLastDeposit($uID);
$lastwithdrawal =  getLastWithdrawal($uID);

$alltransactions = getUserDeposits($uID)
?>