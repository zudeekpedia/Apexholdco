<?
//Database Configuration
include 'db.php';
include 'conn.php';

// ================= USER MANAGEMENT =========================

//Register a new user 
function register_user($username, $password){
	$hashed_password = password_hash($password, PASSWORD_BCRYPT);// Hash the password
	$query = "INSERT INTO users (username, password) VALUES (?,?)";
	return executeQuery($query, [$username, $hashed_password]);
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

//Get user by email a new user 
function getUserByEmail($email){
	$query = "INSERT INTO users (email) VALUES (?)";
	return executeQuery($query, [$email]);
}




?>