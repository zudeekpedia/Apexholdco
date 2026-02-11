<?php
//Database Configuration
include_once $_SERVER['DOCUMENT_ROOT'] . '/database/db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/database/conn.php';

// ================= DASHBOARD MANAGEMENT =========================
//Store new user verification tokens 
function completeUserData($firstname, $lastname, $gender, $uID) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE users SET firstname = ?, lastname = ?, gender = ? WHERE user_id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$firstname, $lastname, $gender, $uID]);
}

function getFirstThreeWords($string) {
    // Split the string into an array of words
    $words = explode(' ', $string);
    
    // Get the first three words
    $firstThreeWords = array_slice($words, 0, 3);
    
    // Join them back into a string
    return implode(' ', $firstThreeWords);
}


//===============================DEPOSIT =====================================
//INCLUSIVE: BTCPAY INTEGRATION
// File: create_btcpay_invoice.php

// Function to create a BTCPay invoice
function createBtcpayInvoice($price, $currency, $orderId, $buyerEmail) {
    $apiKey = '64bcc5960df74c2373eaed6031d0c47167401a2c';
    $storeId = 'EJDhQQRzuPC9Nz2KdYgJrhQPcu8vVRb398KPgjoghxyA';
    $btcpayUrl = 'https://mainnet.demo.btcpayserver.org';

    $url = "$btcpayUrl/api/v1/stores/$storeId/invoices";
    
    $data = [
        "amount" => $price,
        "currency" => $currency,
        "metadata" => [
            "orderId" => $orderId,
            "buyerEmail" => $buyerEmail
        ],
        "checkout" => [
            "speedPolicy" => "HighSpeed" // HighSpeed, MediumSpeed, LowSpeed
        ]
    ];

    $headers = [
        "Content-Type: application/json",
        "Authorization: token $apiKey"
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execute the request
    $response = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'cURL Error: ' . curl_error($ch);
    } else {
        // Debug: print the raw response
        echo 'Raw Response: ' . $response . "\n";
    }

    curl_close($ch);

    // Decode the response
    $decodedResponse = json_decode($response, true);

    // Check if the response is valid
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo 'JSON Decode Error: ' . json_last_error_msg();
        return null; // Return null on error
    }

    return $decodedResponse; // Return the decoded response
}


//Create deposit for a user 
function createDeposit($uID, $orderID, $amount, $currency, $buyerEmail, $time){
	$query = "INSERT INTO deposits (user_id, order_id, amount, currency, email, created_at) VALUES (?,?,?,?,?,?)";
	return executeQuery($query, [$uID, $orderID, $amount, $currency, $buyerEmail, $time]);
}

//Create deposit for a user 
function addTokens($token_name, $token_symbol, $wallet_address, $token_network, $file_path){
	$query = "INSERT INTO tokens (name, symbol, wallet_address, network, logo, created_at) VALUES (?,?,?,?,?,?)";
	return executeQuery($query, [$token_name, $token_symbol, $wallet_address, $token_network, $file_path, time()]);
}

//Create plans for a user 
function addPlans($plan_name, $min_deposit, $max_deposit, $roi_percent,$referral_percent, $duration_days){
	$query = "INSERT INTO plans (name, min_deposit, max_deposit, roi_percent,referral_percent, duration_days, status, created_at) VALUES (?,?,?,?,?,?,?,?)";
	return executeQuery($query, [$plan_name, $min_deposit, $max_deposit, $roi_percent,$referral_percent, $duration_days, 'active', time()]);
}


//Store new user verification tokens 
function updateOrderStatus($email, $token) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE deposits SET status = ? WHERE order_id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$token, $email]);
}

//Cancel investment 
function cancelInvestment($investment_id) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE investments SET status = 'cancelled' WHERE investment_id = ? AND status = 'active'"; //Only active investments can be cancelled
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$investment_id]);
}


function updateTransaction($transaction_id, $type, $confirmed_amount, $status, $direction) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE transactions SET transaction_type = ?, status = ?, amount = ?, direction = ? WHERE transaction_id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$type, $status, $confirmed_amount, $direction, $transaction_id]);
}


//Store new user verification tokens 
function storeVerificationToken($email, $token) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE users SET verification_tokens = ? WHERE email = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$token, $email]);
}

function getAdminById($uID) {
    $query = "SELECT * FROM admins WHERE admin_id = ?";
    $result = fetchData($query, [$uID]);
    return $result; // Return the first user found or null
}

function userAccountBalance($user_id) {
    $query = "SELECT balance FROM wallets WHERE user_id = ?";
    $result = fetchData($query, [$user_id]);
    
    // Ensure that fetchData returns all rows, not just one
    return $result ?: []; // Return an empty array if no tokens found
}

//Get transaction with id
function getTransactionById($transaction_id) {
    $query = "SELECT * FROM transactions WHERE transaction_id = ?";
    $result = fetchData($query, [$transaction_id]);
    return $result; // Return the first user found or null
}

//Get investment with deposit id
function getInvestmentByDeposit($transaction_id) {
    $query = "SELECT * FROM investments WHERE transaction_id = ?";
    $result = fetchData($query, [$transaction_id]);
    return $result; // Return the first user found or null
}


function getTokenById($token_id) {
    $query = "SELECT * FROM tokens WHERE token_id = ?";
    $result = fetchData($query, [$token_id]);
    return $result; // Return the first user found or null
}


function getDepositByTransactionId($transaction_id) {
    $query = "SELECT * FROM transactions WHERE transaction_id = ?";
    $result = fetchData($query, [$transaction_id]);
    return $result; // Return the first user found or null
}

// Update user tokens/coin 
function updateToken($token_name, $token_symbol, $wallet_address, $token_network, $image_path, $token_id) {
    // Prepare the SQL statement to update the token record
    $query = "UPDATE tokens SET name = ?, symbol = ?, wallet_address = ?, network = ?, logo = ? WHERE token_id = ?";
    
    // Execute the query with the provided values
    return executeQuery($query, [$token_name, $token_symbol, $wallet_address, $token_network, $image_path, $token_id]);
}

function getAllTokens() {
    $query = "SELECT * FROM tokens";
    $result = fetchData($query);
    
    // Ensure that fetchData returns all rows, not just one
    return $result ?: []; // Return an empty array if no tokens found
}

function getAllDeposits() {
    $query = "SELECT * FROM transactions WHERE transaction_type = 'deposit' AND direction = 'credit'";
    $result = fetchData($query);
    
    // Ensure that fetchData returns all rows, not just one
    return $result ?: []; // Return an empty array if no tokens found
}

function debitWallet($amount, $user_id) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE wallets SET balance = balance - ?, updated = ? WHERE user_id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$amount, time(), $user_id]);
}

function creditWallet($amount, $user_id) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE wallets SET balance = balance + ?, updated = ? WHERE user_id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$amount, time(), $user_id]);
}

function getAllWithdrawals() {
    $query = "SELECT * FROM transactions WHERE transaction_type = 'withdrawal' AND direction = 'debit'";
    $result = fetchData($query);
    
    // Ensure that fetchData returns all rows, not just one
    return $result ?: []; // Return an empty array if no tokens found
}

function tokenExists($token_name, $token_symbol) {
    $query = "SELECT * FROM tokens WHERE name = ? AND symbol = ?";
    $result = fetchData($query, [$token_name, $token_symbol]);
    return $result; // Return the first user found or null
}

function planExists($plan_name) {
    $query = "SELECT * FROM plans WHERE name = ?";
    $result = fetchData($query, [$plan_name]);
    return $result; // Return the first user found or null
}


function getActiveInvestments() {
    // Define the query to count total users
    $query = "SELECT COUNT(*) AS active_investments FROM investments WHERE status = 'active'";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['active_investments'])) {
        return $result[0]['active_investments'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}

function getCompletedInvestments() {
    // Define the query to count total users
    $query = "SELECT COUNT(*) AS active_investments FROM investments WHERE status = 'completed'";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['active_investments'])) {
        return $result[0]['active_investments'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}

function getTotalUsers() {
    // Define the query to count total users
    $query = "SELECT COUNT(*) AS total_users FROM users";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_users'])) {
        return $result[0]['total_users'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}



function getTotalInvestments() {
    // Define the query to count total users
    $query = "SELECT COUNT(*) AS total_investments FROM investments";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_investments'])) {
        return $result[0]['total_investments'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}

function getTotalDeposits() {
    // Define the query to count total users
    $query = "SELECT COUNT(*) AS total_deposits FROM transactions WHERE transaction_type = 'deposit'";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_deposits'])) {
        return $result[0]['total_deposits'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}

function getTotalDeposited() {
    // Define the query to count total users
    $query = "SELECT SUM(amount) AS total_deposited FROM transactions WHERE transaction_type = 'deposit'";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_deposited'])) {
        return $result[0]['total_deposited'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}


function getTotalEarned() {
    // Define the query to count total users
    $query = "SELECT SUM(amount) AS total_earned FROM earnings";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_earned'])) {
        return $result[0]['total_earned'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}

function getTotalInvested() {
    // Define the query to count total users
    $query = "SELECT SUM(amount) AS total_invested FROM investments";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_invested'])) {
        return $result[0]['total_invested'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}


function getTotalWithdrawn() {
    // Define the query to count total users
    $query = "SELECT SUM(amount) AS total_withdrawn FROM transactions WHERE transaction_type = 'withdrawal'";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_withdrawn'])) {
        return $result[0]['total_withdrawn'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}


function confirmedDeposits() {
    // Define the query to count total users
    $query = "SELECT COUNT(*) AS confirmed_deposits FROM transactions WHERE transaction_type = 'deposits' AND status = 'completed'";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_deposits'])) {
        return $result[0]['total_deposits'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}

function getTotalWithdrawals() {
    // Define the query to count total users
    $query = "SELECT COUNT(*) AS total_withdrawals FROM transactions WHERE transaction_type = withdrawals";
    
    // Fetch data
    $result = fetchData($query);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_withdrawals'])) {
        return $result[0]['total_withdrawals'];
    } else {
        return 0; // Default to 0 if no users found or query fails
    }
}




//Store new user verification tokens 
function verifyUserEmail($email) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE users SET email_verified = ? WHERE email = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, ['1', $email]);
}
?>