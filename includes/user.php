<?php
//Database Configuration
include '../database/db.php';
include '../database/conn.php';

// ================= USER MANAGEMENT =========================


function getFirstThreeWords($string) {
    // Split the string into an array of words
    $words = explode(' ', $string);
    
    // Get the first three words
    $firstThreeWords = array_slice($words, 0, 3);
    
    // Join them back into a string
    return implode(' ', $firstThreeWords);
}

//Store new user verification tokens 
function storeVerificationToken($email, $token) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE users SET tokens = ? WHERE email = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$token, $email]);
}

function getUserByToken($token) {
    $query = "SELECT * FROM users WHERE tokens = ?";
    $result = fetchData($query, [$token]);
    return $result; // Return the first user found or null
}


//Register a new user 
function register_user($username, $fullname, $firstname, $lastname, $email, $password){
	$hashed_password = password_hash($password, PASSWORD_BCRYPT);// Hash the password
	$query = "INSERT INTO users (username, fullname, firstname, lastname, email, password, email_verified, created_at) VALUES (?,?,?,?,?,?,?,?)";
	return executeQuery($query, [$username,$fullname, $firstname, $lastname, $email, $hashed_password, 0, time()]);
}

//Create wallet for registered new user 
function createWallet($user_id){
	$query = "INSERT INTO wallets (user_id, balance, updated) VALUES (?,?,?)";
	return executeQuery($query, [$user_id, 0 , time()]);
}

//Register a new user 
function create_referral($referrer_id, $referred_id){
	$query = "INSERT INTO referrals (referrer_id, referred_id, created_at) VALUES (?,?,?)";
	return executeQuery($query, [$referrer_id,$referred_id, time()]);
}

// Login user
function loginUser($email, $password) {
    $user = getUserByEmail($email); // Fetch user data by email
    if ($user) {
        if (isset($user['password']) && password_verify($password, $user['password'])) {
            return $user; // Return the user data if login is successful
        } else {
            error_log("Password mismatch for user: $email");
        }
    } else {
        error_log("No user found for email: $email");
    }
    return false; // Return false if no user found or password does not match
}


//Store new user verification tokens 
function verifyUserEmail($email) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE users SET email_verified = ? WHERE email = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, ['1', $email]);
}


function getUserByEmail($email) {
    $query = "SELECT user_id, email, password FROM users WHERE email = ?";
    $result = fetchData($query, [$email]);
    return $result ? $result[0] : null; // Return the first user found or null
}

function sendEmail($to, $subject, $templateFile, $data = []) {
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8\r\n";
    $headers .= "From: no-reply@example.com\r\n";

    ob_start();
    include $templateFile; // Load the email template
    $message = ob_get_clean();

    mail($to, $subject, $message, $headers);
}





//Delete user by user_id
function delete_user($user_id){
	$query = "DELETE FROM users WHERE user_id = ?";
	return deleteData($query, [$user_id]);
}

//Fetch user details by user_id
function get_user($user_id){
	$query = "SELECT * FROM users WHERE user_id = ?";
	return fetchData($query, [$user_id]);
}

/*Get user by email a new user 
function getUserByEmail($email){
	$query = "SELECT * FROM users WHERE email = ?";
	return fetchData($query, [$email]);
}*/

?>