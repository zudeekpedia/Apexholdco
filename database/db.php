<?php
// Database connection function
/*function connectDB() {
    $servername = "wghp3";  // Your server
    $username = "streamop_streamop"; // Database username
    $password = "@zudeek042"; // Database password
    $dbname = "streamop_streamo";   // Database name

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null;
    }
}*/

//Database Configuration
$servername = 'localhost'; //Database host (usually 'localhost')
$dbname = 'u991635078_apexholdco'; //Name of your database 
$dbuser = 'u991635078_apexholdco'; //Database username
$dbhash = 'uSe:L&e6*'; //Database password

$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbuser, $dbhash);
?>