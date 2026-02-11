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

// Helper function to generate a unique room ID in the format ssUBYL
function generateRoomId() {
    $prefix = "p2p";  // Fixed prefix "ss"
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';  // Uppercase letters
    $random_string = '';
    
    // Generate a 4-character random string
    for ($i = 0; $i < 5; $i++) {
        $random_string .= $letters[rand(0, strlen($letters) - 1)];
    }

    // Combine prefix with the random string
    return $prefix . $random_string;
}

// Function to get all tokens the user has and their balances
function getAllUserTokenBalances($user_id) {
    // Query to fetch distinct token symbols the user has in their transactions
    $query = "SELECT DISTINCT token_symbol FROM transactions WHERE user_id = ?";
    
    // Fetch the tokens
    $tokens = fetchData($query, [$user_id]);

    // Initialize an array to store the user's token balances
    $userBalances = [];

    // Loop through each token and calculate the balance
    foreach ($tokens as $token) {
        // For each token, get the balance
        $balance = getUserTokenBalance($user_id, $token['token_symbol']);
        
        // Store the balance for that token in the array
        $userBalances[$token['token_symbol']] = $balance;
    }

    // Return the array of token balances
    return $userBalances;
}

// Function to get the user's token balance for a specific token (sum deposits - withdrawals)
function getUserTokenBalance($user_id, $token_symbol) {
    // Query to sum the deposits and subtract the withdrawals for the specific user and token
    $query = "SELECT SUM(CASE 
                            WHEN transaction_type = 'deposit' THEN amount
                            WHEN transaction_type = 'withdrawal' THEN -amount
                            ELSE 0
                          END) AS total_balance
              FROM transactions
              WHERE user_id = ? AND token_symbol = ?";

    // Assuming fetchData is a function that executes the query and returns the result
    $result = fetchData($query, [$user_id, $token_symbol]);

    // Check if the query was successful and the result exists
if ($result !== false && isset($result['total_balance'])) {
    // Return the total balance or 0 if no result is found
    return $result['total_balance'] !== null ? $result['total_balance'] : 0;
} else {
    // Handle the case where the query fails or no result is found
    // You might want to log the error or handle it differently
    return 0; // Return 0 if no result or query failed
}
}

// Function to get the user's token balance for a specific token by token ID and token name, formatted as 0.0000
function getTokenBalance($token_id, $token_name, $user_id) {
    // Query to sum deposits and subtract withdrawals for the specific user and token
    $query = "SELECT COALESCE(SUM(CASE 
                            WHEN transaction_type = 'deposit' THEN amount
                            WHEN transaction_type = 'withdrawal' THEN -amount
                            ELSE 0
                          END), 0) AS total_balance
              FROM transactions
              WHERE user_id = ? AND token_id = ? AND token_name = ?";

    // Assuming fetchData is a function that executes the query and returns the result
    $result = fetchData($query, [$user_id, $token_id, $token_name]);

    // Check if the query was successful and the result exists
    if ($result !== false && isset($result['total_balance'])) {
        // Format the total balance to 4 decimal places
        $balance = $result['total_balance'];
        return number_format((float)$balance, 4, '.', '');
    } else {
        // Return "0.0000" if no result or query failed
        return '0.0000';
    }
}

function getPlanInvestment($plan_id, $plan_name, $user_id) {
    // We remove plan_name from the WHERE clause to avoid string mismatch errors
    $query = "SELECT SUM(amount) AS total_balance
              FROM investments
              WHERE user_id = ? AND plan_id = ? AND status = 'active'";

    // fetchData usually returns an array of rows
    $result = fetchData($query, [$user_id, $plan_id]);

    // 1. Check if result is an array
    // 2. Check index [0] (the first row)
    // 3. Check if total_balance is not null
    if (!empty($result) && isset($result[0]['total_balance'])) {
        $balance = $result[0]['total_balance'];
        return number_format((float)$balance, 4, '.', '');
    }

    return '0.0000';
}
// Function to get the user's earning balance
function getEarningsBalance( $user_id) {
    // Query to sum deposits and subtract withdrawals for the specific user and token
    $query = "SELECT COALESCE(SUM(amount), 0) AS earnings_balance
              FROM earnings
              WHERE user_id = ?";

    // Assuming fetchData is a function that executes the query and returns the result
    $result = fetchData($query, [$user_id]);

    // Check if the query was successful and the result exists
    if ($result !== false && isset($result['earnings_balance'])) {
        // Format the total balance to 4 decimal places
        $balance = $result['earnings_balance'];
        return number_format((float)$balance, 4, '.', '');
    } else {
        // Return "0.0000" if no result or query failed
        return '0.0000';
    }
}

function getAvailableBalance($user_id) {
    $query = "SELECT balance FROM wallets WHERE user_id = ? LIMIT 1";
    $result = fetchData($query, [$user_id]);

    // 1. Check if the array is not empty
    if (!empty($result) && isset($result[0]['balance'])) {
        
        // 2. Access the first row [0] and the column ['balance']
        $val = $result[0]['balance'];

        return number_format((float)$val, 2, '.', '');
    }

    // Return 0 if user has no wallet record
    return '0.0000';
}

function getTotalWithdrawn($user_id) {
    // Define the query to count total users
    $query = "SELECT SUM(amount) AS total_withdrawn FROM transactions WHERE transaction_type = 'withdrawal' AND user_id = ?";
    
    // Fetch data
    $result = fetchData($query, [$user_id]);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_withdrawn'])) {
        return $result[0]['total_withdrawn'];
    } else {
        return 0.00; // Default to 0 if no users found or query fails
    }
}

function getTotalDeposited($user_id) {
    // Define the query to count total users
    $query = "SELECT SUM(amount) AS total_deposited FROM transactions WHERE transaction_type = 'deposit' AND status = 'completed' AND user_id = ?";
    
    // Fetch data
    $result = fetchData($query, [$user_id]);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_deposited'])) {
        return $result[0]['total_deposited'];
    } else {
        return 0.00; // Default to 0 if no users found or query fails
    }
}

function getUserDeposits($user_id) {
    // We specify 'deposit' to ensure we don't get withdrawals mixed in
    $query = "SELECT * FROM transactions WHERE user_id = ? ORDER BY id DESC LIMIT 10";
    
    $result = fetchData($query, [$user_id]);
    
    // Debugging step: if it's empty, let's make sure it's at least an empty array
    // so your foreach loop doesn't crash.
    return (is_array($result)) ? $result : [];
}

function getLastInvestments($user_id) {
    // We order by 'created_at' or 'id' DESC to get the most recent record
    // LIMIT 1 ensures we only get the single latest row
    $query = "SELECT * FROM investments WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
    
    // Fetch data
    $result = fetchData($query, [$user_id]);
    
    // Check if an investment was found
    if ($result && isset($result[0]['amount'])) {
        return $result[0]['amount']; // Returns the whole row as an associative array
    } else {
        return 0.00; // No investments found for this user
    }
}

function getLastWithdrawal($user_id) {
    // We order by 'created_at' or 'id' DESC to get the most recent record
    // LIMIT 1 ensures we only get the single latest row
    $query = "SELECT * FROM transactions WHERE user_id = ? AND transaction_type = 'withdrawal' ORDER BY created_at DESC LIMIT 1";
    
    // Fetch data
    $result = fetchData($query, [$user_id]);
    
    // Check if an investment was found
    if ($result && isset($result[0]['amount'])) {
        return $result[0]['amount']; // Returns the whole row as an associative array
    } else {
        return 0.00; // No investments found for this user
    }
}

function getLastDeposit($user_id) {
    // We order by 'created_at' or 'id' DESC to get the most recent record
    // LIMIT 1 ensures we only get the single latest row
    $query = "SELECT * FROM transactions WHERE user_id = ? AND transaction_type = 'deposit' ORDER BY created_at DESC LIMIT 1";
    
    // Fetch data
    $result = fetchData($query, [$user_id]);
    
    // Check if an investment was found
    if ($result && isset($result[0]['amount'])) {
        return $result[0]['amount']; // Returns the whole row as an associative array
    } else {
        return 'N/A'; // No investments found for this user
    }
}

function getTotalEarned($user_id) {
    // Define the query to count total users
    $query = "SELECT SUM(amount) AS total_earned FROM transactions WHERE transaction_type = 'earning' AND user_id = ?";
    
    // Fetch data
    $result = fetchData($query, [$user_id]);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_earned'])) {
        return $result[0]['total_earned'];
    } else {
        return 0.00; // Default to 0 if no users found or query fails
    }
}

function getTotalInvested($user_id) {
    // Define the query to count total users
    $query = "SELECT SUM(amount) AS total_invested FROM investments WHERE  user_id = ?";
    
    // Fetch data
    $result = fetchData($query, [$user_id]);
    
    // Check if 'total_users' exists in the result
    if ($result && isset($result[0]['total_invested'])) {
        return $result[0]['total_invested'];
    } else {
        return 0.00; // Default to 0 if no users found or query fails
    }
}
/* Get user token balance from transactions table
function getUserTokenBalance($user_id, $token_symbol) {
    $query = "SELECT SUM(CASE WHEN transaction_type = 'deposit' THEN amount ELSE -amount END) AS total_balance 
              FROM transactions 
              WHERE user_id = ? AND token_symbol = ?";
    $result = fetchData($query, [$user_id, $token_symbol]); 
    return $result[0]['total_balance'] ? $result[0]['total_balance'] : 0;
}*/

// Function to check if the user has enough tokens for the trade
function checkUserBalance($user_id, $token_symbol, $amount) {
    $current_balance = getUserTokenBalance($user_id, $token_symbol);
    
    // Check if the user has enough tokens (balance should be >= amount)
    if ($current_balance >= $amount) {
        return true;  // Enough tokens
    } else {
        return false; // Not enough tokens
    }
}

function getAllTokens() {
    $query = "SELECT * FROM tokens";
    $result = fetchData($query);
    
    // Ensure that fetchData returns all rows, not just one
    return $result ?: []; // Return an empty array if no tokens found
}

//get all plans
function getAllPlans() {
    $query = "SELECT * FROM plans";
    $result = fetchData($query);
    
    // Ensure that fetchData returns all rows, not just one
    return $result ?: []; // Return an empty array if no tokens found
}

//get plans
function getPlan($plan_id) {
    $query = "SELECT * FROM plans WHERE id = ?";
    $result = fetchData($query, [$plan_id]);
    return $result; // Return the first user found or null
}

// Function to update user token balance in the user_balances table
function updateUserTokenBalance($user_id, $token_symbol, $amount, $transaction_type) {
    global $db;

    // Fetch the user's current balance for the given token symbol
    $check_query = "SELECT balance FROM user_balances WHERE user_id = ? AND token_symbol = ?";
    $existing_balance = fetchData($check_query, [$user_id, $token_symbol]);

    if ($existing_balance) {
        // If the balance exists, update the balance based on the transaction type
        if ($transaction_type === 'withdrawal') {
            // For withdrawal, we subtract the amount from the balance
            $new_balance = $existing_balance[0]['balance'] - abs($amount);
        } else {
            // For deposit, we add the amount to the balance
            $new_balance = $existing_balance[0]['balance'] + abs($amount);
        }

        // Update the balance in the user_balances table
        $update_query = "UPDATE user_balances SET balance = ? WHERE user_id = ? AND token_symbol = ?";
        executeQuery($update_query, [$new_balance, $user_id, $token_symbol]);
    } else {
        // If no balance record exists for the user and token, insert a new record
        $insert_query = "INSERT INTO user_balances (user_id, token_symbol, balance) 
                         VALUES (?, ?, ?)";
        executeQuery($insert_query, [$user_id, $token_symbol, $amount]);
    }

    // Log the transaction in the transactions table (for record-keeping)
    $transaction_type_label = ($amount < 0) ? 'withdrawal' : 'deposit';
    $transaction_query = "INSERT INTO transactions (user_id, token_symbol, amount, transaction_type) 
                          VALUES (?, ?, ?, ?)";
    executeQuery($transaction_query, [$user_id, $token_symbol, abs($amount), $transaction_type_label]);
}

// Function to create a new trade
/*function createTrade($user_id, $role, $token_symbol_send, $amount_send, $token_symbol_receive, $amount_receive, $buyer_email, $seller_email, $fee_payer) {
    // Check if the user has enough tokens based on their role
    if ($role == 'buyer') {
        // Buyer must have enough tokens to send
        if (!checkUserBalance($user_id, $token_symbol_send, $amount_send)) {
            return "Insufficient balance to send tokens.";
        }
    } elseif ($role == 'seller') {
        // Seller must have enough tokens to receive (based on what they're offering)
        if (!checkUserBalance($user_id, $token_symbol_receive, $amount_receive)) {
            return "Seller has insufficient balance to complete trade.";
        }
    }

    // Generate unique trade room ID (e.g., p2ptradetech followed by a random string)
    $room_id = "p2p" . strtoupper(bin2hex(random_bytes(6))); // Generate a unique 6 character room ID

    // Apply the 2% exchange fee
    $exchange_fee = 2.00;  // 2% fee (can be dynamic)

    // Insert trade into the database
    $query = "INSERT INTO p2p_trades (room_id, user_id, buyer_email, seller_email, buyer_currency, buyer_amount, seller_currency, seller_amount, fee_payer, exchange_fee, status, created_at, updated_at)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'pending', ?, ?)";
    
    // Prepare the timestamps (current UNIX time)
    $created_at = time();
    $updated_at = time();
    
    // Execute the query to insert the trade record
    $params = [
        $room_id, $user_id, $buyer_email, $seller_email, 
        $token_symbol_send, $amount_send, $token_symbol_receive, 
        $amount_receive, $fee_payer, $exchange_fee, 
        $created_at, $updated_at
    ];
    
    // Assuming executeQuery is a function to safely execute the query
    $result = executeQuery($query, $params);
    
    // If query executed successfully, deduct the trade amounts from the user's balances
    if ($result) {
        // Deduct the tokens based on buyer and seller roles
        if ($role == 'buyer') {
            // Deduct tokens from the buyer's balance
            deductUserBalance($user_id, $token_symbol_send, $amount_send);
            // Optionally deduct the exchange fee if buyer pays it
            if ($fee_payer == 'buyer' || $fee_payer == 'split') {
                $fee_amount = $amount_send * ($exchange_fee / 100);
                deductUserBalance($user_id, $token_symbol_send, $fee_amount);
            }
        } elseif ($role == 'seller') {
            // Deduct tokens from the seller's balance (tokens they are offering to the buyer)
            deductUserBalance($user_id, $token_symbol_receive, $amount_receive);
            // Optionally deduct the exchange fee if seller pays it
            if ($fee_payer == 'seller' || $fee_payer == 'split') {
                $fee_amount = $amount_receive * ($exchange_fee / 100);
                deductUserBalance($user_id, $token_symbol_receive, $fee_amount);
            }
        }

        return "Trade created successfully. Room ID: $room_id";
    } else {
        return "Error creating trade.";
    }
}*/
function createTrade(
    $user_email,
    $user_id,
    $role,
    $token_send,
    $amount_send,
    $token_receive,
    $amount_receive,
    $buyer_email,
    $seller_email,
    $fee_payer
) {
    try {
        // Global database connection
        global $db;

        // Define the exchange fee percentage (5%)
        $exchange_fee = 0.05;

        // Initialize buyer and seller data based on role
        if ($role === 'buyer') {
            $buyer_id = $user_id;
            $seller_id = null; // Assuming seller ID is null unless fetched elsewhere
        } elseif ($role === 'seller') {
            $seller_id = $user_id;
            $buyer_id = null; // Assuming buyer ID is null unless fetched elsewhere
        } else {
            throw new Exception("Invalid role provided.");
        }

        // Generate a unique room ID
        $room_id = "p2p" . strtoupper(substr(md5(uniqid()), 0, 5)); // Example: p2pABCDE

        // Insert trade data into the database
        $query = "INSERT INTO p2p_trades (
                    room_id, user_id, buyer_id, seller_id, 
                    buyer_email, seller_email, 
                    buyer_currency, buyer_amount, 
                    seller_currency, seller_amount, 
                    fee_payer, exchange_fee, status, 
                    created_at, updated_at
                  ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Set timestamps
        $created_at = date("Y-m-d H:i:s");
        $updated_at = $created_at;

        // Execute the query
        $result = executeQuery($query, [
            $room_id,
            $user_id,
            $buyer_id,
            $seller_id,
            $buyer_email,
            $seller_email,
            $token_send,
            $amount_send,
            $token_receive,
            $amount_receive,
            $fee_payer,
            $exchange_fee,
            'pending',
            $created_at,
            $updated_at
        ]);

        if (!$result) {
            throw new Exception("Failed to insert trade data.");
        }

        // Return room_id on success
        return ['success' => true, 'room_id' => $room_id];

    } catch (Exception $e) {
        // Log the error and return failure message
        error_log("Trade creation failed: " . $e->getMessage());
        return ['success' => false, 'error' => $e->getMessage()];
    }
}


//Create deposit for a user 
function createDeposit($uID, $currency_symbol, $amount, $currency, $payment_gateway, $coin_id, $transaction_id) {
    // Ensure the amount is formatted correctly to fit into the decimal(15,2) field
    $amount = number_format((float)$amount, 2, '.', ''); // Ensures two decimal places for the amount
    
    // Prepare the SQL query to insert the deposit into the database
    $query = "INSERT INTO transactions (user_id, transaction_id, transaction_type, currency_symbol, amount, currency, payment_gateway, token_id, direction, status, description, created_at, updated_at)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Validate inputs
    if (empty($uID) || empty($currency_symbol) || empty($amount) || empty($currency) || empty($payment_gateway) || empty($coin_id) || empty($transaction_id)) {
        error_log("Missing parameters: uID: $uID, amount: $currency_symbol . $amount, currency: $currency, payment_gatway: $payment_gateway, coin_id: $coin_id, transaction_id: $transaction_id");
        return false;
    }

    // Description field
    $description = "$uID deposited: $transaction_id";
    
    // Get the current timestamp for both created_at and updated_at
    $currentTimestamp = time();

    // Execute the query
    $result = executeQuery($query, [
        $uID, 
        $transaction_id, 
        'deposit', 
         $currency_symbol,
        $amount, // The correctly formatted amount
        $currency, 
        $payment_gateway, 
        $coin_id, 
        'credit', 
        'pending', 
        $description, 
        $currentTimestamp, // created_at
        $currentTimestamp  // updated_at (same as created_at initially)
    ]);
    
    // Log any errors
    if ($result === false) {
        error_log("Failed to create deposit for user ID: $uID, transaction ID: $transaction_id. Query: $query");
    }

    return $result;
}

//Log an earning in transaction
function createProfit($uID, $amount, $transaction_id) {
    // Ensure the amount is formatted correctly to fit into the decimal(15,2) field
    $amount = number_format((float)$amount, 2, '.', ''); // Ensures two decimal places for the amount
    
    // Prepare the SQL query to insert the deposit into the database
    $query = "INSERT INTO transactions (user_id, transaction_id, transaction_type, currency_symbol, amount, currency, payment_gateway, direction, status, description, created_at, updated_at)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Validate inputs
    if (empty($uID) || empty($amount) || empty($transaction_id)) {
        error_log("Missing parameters: uID: $uID, amount: '$' . $amount, transaction_id: $transaction_id");
        return false;
    }

    // Description field
    $description = "+$$amount from investment payout";
    
    // Get the current timestamp for both created_at and updated_at
    $currentTimestamp = time();

    // Execute the query
    $result = executeQuery($query, [
        $uID, 
        $transaction_id, 
        'earning', 
         '$',
        $amount, // The correctly formatted amount
        'USD', 
        'earnings', 
        'credit', 
        'completed', 
        $description, 
        $currentTimestamp, // created_at
        $currentTimestamp  // updated_at (same as created_at initially)
    ]);
    
    // Log any errors
    if ($result === false) {
        error_log("Failed to create deposit for user ID: $uID, transaction ID: $transaction_id. Query: $query");
    }

    return $result;
}

//Create transaction for a user 
function createTransaction($uID, $transaction_type,$amount, $description, $transaction_id) {
    // Ensure the amount is formatted correctly to fit into the decimal(15,2) field
    
    // Prepare the SQL query to insert the deposit into the database
    $query = "INSERT INTO transactions (user_id, transaction_id, transaction_type, currency_symbol, amount, currency, direction, status, description, created_at, updated_at)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    // Validate inputs
    if (empty($uID) || empty($amount) || empty($transaction_id)) {
        error_log("Missing parameters: uID: $uID, amount: $amount, transaction_id: $transaction_id");
        return false;
    }
    
    // Get the current timestamp for both created_at and updated_at
    $currentTimestamp = time();

    // Execute the query
    $result = executeQuery($query, [
        $uID, 
        $transaction_id, 
        $transaction_type, 
         '$',
        $amount, // The correctly formatted amount
        'USD',
        'debit', 
        'completed', 
        $description, 
        $currentTimestamp, // created_at
        $currentTimestamp  // updated_at (same as created_at initially)
    ]);
    
    // Log any errors
    if ($result === false) {
        error_log("Failed to create deposit for user ID: $uID, transaction ID: $transaction_id. Query: $query");
    }

    return $result;
}

//Create investment for a user
function createInvestment($uID, $plan_id, $transaction_id, $plan_name, $amount, $roi_percent, $duration, $start_date, $end_date, $total_profit,$status) {
    // Ensure the amount is formatted correctly to fit into the decimal(15,2) field
    $amount = number_format((float)$amount, 2, '.', ''); // Ensures two decimal places for the amount
    
    // Prepare the SQL query to insert the deposit into the database
    $query = "INSERT INTO investments (user_id, plan_id, transaction_id, plan_name, amount, roi_percent, duration_days, start_date, end_date, total_profit, status, created_at)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)";
    
    // Validate inputs
    if (empty($uID) || empty($amount) || empty($transaction_id)) {
        error_log("Missing parameters: uID: $uID, amount: $amount, transaction_id: $transaction_id");
        return false;
    }
    
    // Get the current timestamp for both created_at and updated_at
    $currentTimestamp = time();

    // Execute the query
    $result = executeQuery($query, [
        $uID, 
        $plan_id, 
        $transaction_id,
        $plan_name, 
        $amount, // The correctly formatted amount
        $roi_percent,
        $duration, 
        $start_date, 
        $end_date,
        $total_profit,
        $status,
        $currentTimestamp, // created_at
    ]);
    
    // Log any errors
    if ($result === false) {
        error_log("Failed to create deposit for user ID: $uID, transaction ID: $transaction_id. Query: $query");
    }

    return $result;
}

/// UPDATE WALLET BALANCE
//Store new user verification tokens 
function creditWallet($amount, $user_id) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE wallets SET balance = balance + ? WHERE user_id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$amount, $user_id]);
}

function debitWallet($amount, $user_id) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE wallets SET balance = balance - ? WHERE user_id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$amount, $user_id]);
}

//GET ACCOUNT BALANCE 

function userAccountBalance($user_id) {
    // We order by 'created_at' or 'id' DESC to get the most recent record
    // LIMIT 1 ensures we only get the single latest row
    $query = "SELECT * FROM wallets WHERE user_id = ?";
    
    // Fetch data
    $result = fetchData($query, [$user_id]);
    
    // Check if an investment was found
    if ($result && isset($result[0]['balance'])) {
        return $result[0]['balance']; // Returns the whole row as an associative array
    } else {
        return 0.00; // No investments found for this user
    }
}

/* 
GET AVAILABLE DEPOSITS (FIRST IN, FIRST OUT)[FIFO]
function getAvailableDepositsFIFO($user_id) {
    $query = "SELECT t.transaction_id AS deposit_transaction_id, t.amount AS deposit_amount, COALESCE(SUM(src.amount_used),0) AS unused_amount,(t.amount - COALESCE(SUM(src.amount_used),0)) AS available_amount FROM transactions t LEFT JOIN investment_sources src ON src.deposit_transaction_id = t.id WHERE t.user_id = ? AND t.transaction_type = 'deposit' AND t.status = 'completed' GROUP BY t.id HAVING available_amount  > 0 ORDER BY t.created_at ASC";
    $result = fetchData($query, [$user_id]);
    
    // Ensure that fetchData returns all rows, not just one
    return $result ?: []; // Return an empty array if no tokens found
}*/

function getAvailableDepositsFIFO($user_id) {
    // We use a subquery or a cleaner GROUP BY to ensure accuracy
    $query = "SELECT 
                t.id,
                t.transaction_id AS deposit_transaction_id, 
                t.amount AS deposit_amount, 
                (t.amount - COALESCE((SELECT SUM(amount_used) FROM investment_sources WHERE deposit_transaction_id = t.id), 0)) AS available_amount 
              FROM transactions t 
              WHERE t.user_id = ? 
                AND t.transaction_type = 'deposit' 
                AND t.status = 'completed' 
              HAVING available_amount > 0 
              ORDER BY t.created_at ASC";
              
    $result = fetchData($query, [$user_id]);
    
    // Safety check: ensure we always return a list of rows
    return (is_array($result)) ? $result : []; 
}



// GET ALL ACTIVE INVESTMENTS
function getActiveInvestments() {
    $query = "SELECT * FROM investments WHERE status = ?";
    $result = fetchData($query, ['active']);
    return $result; // Return the first user found or null
}

//If earnings has already been paid for the day 
function earningAlreadyPaid($investment_id) {
    $query = "SELECT * FROM earnings WHERE investment_id = ? AND DATE(created_at) = CURDATE()";
    $result = fetchData($query, [$investment_id]);
    return $result; // Return the first user found or null
}

//creating and insert earnings for user whose investment has matured
function createEarnings($uID, $investment_id, $amount) {
    // Insert the request into the database
    $query = "INSERT INTO earnings (user_id, investment_id, amount, created_at)
              VALUES (?, ?, ?, ?)";
    
    // Execute the query with the values
    return executeQuery($query, [$uID, $investment_id, $amount, time()]);
}

//Create investment source 
function linkInvestmentSource($transaction_id, $deposit_transaction_id, $amount) {
    // Insert the request into the database
    $query = "INSERT INTO investment_sources (investment_id, deposit_transaction_id, amount_used, created_at)
              VALUES (?, ?, ?,?)";
    
    // Execute the query with the values
    return executeQuery($query, [$transaction_id, $deposit_transaction_id, $amount, time()]);
}


//Update investments
function updateInvestments($investment_id,$status) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE investments SET status = ? WHERE id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$status, $investment_id]);
}


//Store new user verification tokens 
function updateOrderStatus($email, $token) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE deposits SET status = ? WHERE order_id = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$token, $email]);
}





//Store new user verification tokens 
function storeVerificationToken($email, $token) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE users SET verification_tokens = ? WHERE email = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, [$token, $email]);
}

function getTransactionsById($transaction_id,$uID) {
    $query = "SELECT * FROM transactions WHERE transaction_id = ? AND user_id = ?";
    $result = fetchData($query, [$transaction_id,$uID]);
    return $result; // Return the first user found or null
}




function getUserTransactions($uID) {
    $query = "SELECT * FROM transactions WHERE  user_id = ?";
    $result = fetchData($query, [$uID]);
    return $result; // Return the first user found or null
}

function UserRecentTransaction($uID) {
    // Query to get the most recent transaction by user_id
    $query = "SELECT * FROM transactions WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
    
    // Fetch the result (this will now return only one row)
    $result = fetchData($query, [$uID]);

    // Return the result or null if no transaction found
    return $result ? $result : null;  // If no result, return null
}

function UserRecentTrade($uID) {
    // Update the query to order by the timestamp in descending order and limit to 1 result
    $query = "SELECT * FROM p2p_trades WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
    
    // Fetch the result (most recent transaction)
    $result = fetchData($query, [$uID]);
    
    // Return the result (either the most recent transaction or null if no result)
    return $result ? $result[0] : null; // Assuming fetchData returns an array of results
}

function getUserById($uID) {
    $query = "SELECT * FROM users WHERE user_id = ?";
    $result = fetchData($query, [$uID]);
    return $result; // Return the first user found or null
}
function getUserIdByEmail($email) {
    $query = "SELECT * FROM users WHERE email = ?";
    $result = fetchData($query, [$email]);
    return $result; // Return the first user found or null
}

function getCoinNameById($id) {
    $query = "SELECT * FROM tokens WHERE token_id = ?";
    $result = fetchData($query, [$id]);
    return $result; // Return the first user found or null
}




//Store new user verification tokens 
function verifyUserEmail($email) {
    // Prepare the SQL statement to update the user record with the verification token
    $query = "UPDATE users SET email_verified = ? WHERE email = ?";
    
    // Execute the query with the token, expiry time, and email
    return executeQuery($query, ['1', $email]);
}

// Function to insert proof into the database
function saveProof($user_id, $transaction_id, $transactionhash, $file_path) {
    // Ensure that the columns 'transaction_hash' and 'proof' exist in the 'transactions' table
    // Ensure that 'updated_at' is present and tracking the timestamp of when the proof was added
    $query = "UPDATE transactions 
              SET transaction_hash = ?, proof = ?, updated_at = ? 
              WHERE user_id = ? AND transaction_id = ?";

    // Execute the query with the values
    return executeQuery($query, [$transactionhash, $file_path, time(), $user_id, $transaction_id]);
}

// Function to insert proof into the database
function requestCurrency($uID, $cryptoName, $cryptoSymbol, $network, $contractAddress) {
    // Insert the request into the database
    $query = "INSERT INTO requested_currency (user_id, name, symbol, network, contract_address, created_at)
              VALUES (?, ?, ?, ?, ?, ?)";
    
    // Use date format compatible with DATETIME or TIMESTAMP columns
    $createdAt = date("Y-m-d H:i:s");
    
    // Execute the query with the values
    return executeQuery($query, [$uID, $cryptoName, $cryptoSymbol, $network, $contractAddress, time()]);
}
?>