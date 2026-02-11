<?php

//Function to connect to the database
/*function connectDB(){
	global $servername, $db, $user, $password; 
	// Try to connect to the database using PDO
	try{
		$conn = new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $user, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set PDO error mode to exception
		return $conn;
	}catch (PDOException $e){
		// Log error instead of displaying in production
		error_log("Database connection failed: " . $e->getMessage(), 0);
		die("Database connection failed.");
	}
} */

function connectDB() {
    global $servername, $dbname, $dbuser, $dbhash;

    // Check if the variables are not arrays
    if (is_array($servername) || is_array($dbname) || is_array($dbuser) || is_array($dbhash)) {
        die("Error: One or more database connection parameters are arrays. Please check your configuration.");
         
    }

    // Try to connect to the database using PDO
    try {
        // Make sure the connection string is correct and parameters are passed properly
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbuser, $dbhash);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set PDO error mode to exception
        return $conn;
    } catch (PDOException $e) {
        // Log the error message instead of showing it to the user in production
        error_log("Database connection failed: " . $e->getMessage(), 0);
        die("Database connection failed.");
    }
    
   
}

//General function to execute any query data (INSERT, UPDATE, DELETE)
function executeQuery($query, $params){
	try{
		$conn = connectDB();
		$stmt = $conn->prepare($query);
		$stmt->execute($params);
		$affectedRows = $stmt->rowCount(); // Get number of affected rows
		$conn = null; // Close the connection
		return $affectedRows;
	} catch (PDOException $e){
		error_log("Query failed: " . $e->getMessage(), 0);
		return false;
	}
}

//General function to select data (SELECT)
function fetchData($query, $params = []){
	try{
		$conn = connectDB();
		$stmt = $conn->prepare($query);
		$stmt->execute($params);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$conn = null; // Close the connection
		return $data;
	} catch (PDOException $e){
		error_log("Select query failed: " . $e->getMessage(), 0);
		return false;
	}
}

// General function to select data (SELECT)
function fetchOneData($query, $params = []){
    try{
        $conn = connectDB();
        $stmt = $conn->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);  // Fetch a single row instead of all rows
        $conn = null; // Close the connection
        return $data;  // Return the single row, or null if no results
    } catch (PDOException $e){
        error_log("Select query failed: " . $e->getMessage(), 0);
        return false;
    }
}
?>