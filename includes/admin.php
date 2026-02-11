<?php
//Database Configuration
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/db.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/database/conn.php";

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
    $query = "UPDATE admins SET tokens = ? WHERE email = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$token, $email]);
}

function getUserByToken($token) {
    $query = "SELECT * FROM admins WHERE tokens = ?";
    $result = fetchData($query, [$token]);
    return $result; // Return the first user found or null
}


//Register a new admin 
function register_admin($adminname, $fullname, $firstname, $lastname, $email, $password){
	$hashed_password = password_hash($password, PASSWORD_BCRYPT);// Hash the password
	$query = "INSERT INTO admins (adminname, fullname, firstname, lastname, email, password, created_at) VALUES (?,?,?,?,?,?,?)";
	return executeQuery($query, [$adminname,$fullname, $firstname, $lastname, $email, $hashed_password, time()]);
}

// Login admin
function loginAdmin($email, $password) {
    $admin = getAdminByEmail($email); // Fetch user data by email
    if ($admin) {
        if (isset($admin['password']) && password_verify($password, $admin['password'])) {
            return $admin; // Return the user data if login is successful
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
    $query = "UPDATE admins SET email_verified = ? WHERE email = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, ['1', $email]);
}


function getAdminByEmail($email) {
    $query = "SELECT admin_id, email, password FROM admins WHERE email = ?";
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
	$query = "DELETE FROM admins WHERE user_id = ?";
	return deleteData($query, [$user_id]);
}

//Fetch user details by user_id
function get_user($user_id){
	$query = "SELECT * FROM admins WHERE user_id = ?";
	return fetchData($query, [$user_id]);
}

/*Get user by email a new user 
function getUserByEmail($email){
	$query = "SELECT * FROM users WHERE email = ?";
	return fetchData($query, [$email]);
}*/

?>