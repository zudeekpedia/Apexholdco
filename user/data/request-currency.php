<?php
session_start();
require_once 'data.php';  // Include your database connection

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize form inputs
    $network = trim($_POST['network']);
    $contractAddress = trim($_POST['contract-address']);
    $cryptoName = trim($_POST['crypto-name']);
    $cryptoSymbol = trim($_POST['crypto-symbol']);

    // Validate inputs
    if (empty($network) || empty($contractAddress) || empty($cryptoName) || empty($cryptoSymbol)) {
        // Redirect back with an error message if inputs are empty
        header("Location: {$urlPath}?error=Please+fill+all+fields");
        exit;
    }

    // Further validation (e.g., checking length, format, contract address)
    if (strlen($cryptoSymbol) > 6 || !preg_match('/^[A-Za-z0-9]+$/', $contractAddress)) {
        header("Location: {$urlPath}?error=Invalid+input+format");
        exit;
    }

    try {
        // Insert request into database
         $action = requestCurrency($uID, $cryptoName, $cryptoSymbol, $network, $contractAddress);

        // Check if the insertion was successful
        if ($action) {
            header("Location: ../request-coin/$transaction_id?successmessage='Proof of payment saved successfully'");
            exit;
        } else {
            echo "Error: Failed to add the coin.";
        }
    } catch (PDOException $e) {
        // Log the error and redirect back with a failure message
        error_log("Request submission failed: " . $e->getMessage(), 0);
        header("Location: ../request-coin/$transaction_id?errormessage='Coin Not Added'");
    }
} else {
    // Redirect if not accessed via POST
    header("Location: /");  // Adjust to a suitable error page or homepage
    exit;
}
?>
