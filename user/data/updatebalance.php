<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/user/data/data.php';

// Function to update user token balances based on transactions
function updateUserBalances() {
    global $db;

    // Step 1: Get all unique users and their associated token symbols
    $query = "SELECT DISTINCT user_id, token_symbol FROM transactions";
    $stmt = $db->query($query);
    $users_tokens = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Step 2: For each user-token combination, calculate the balance
    foreach ($users_tokens as $row) {
        $user_id = $row['user_id'];
        $token_symbol = $row['token_symbol'];

        // Calculate the total balance for the user and token
        $balance_query = "SELECT SUM(amount) AS total_balance
                          FROM transactions
                          WHERE user_id = ? AND token_symbol = ?";
        $balance_stmt = $db->prepare($balance_query);
        $balance_stmt->execute([$uID, $token_symbol]);
        $balance_result = $balance_stmt->fetch(PDO::FETCH_ASSOC);
        $total_balance = $balance_result['total_balance'] ?: 0; // Default to 0 if no result

        // Step 3: Update the user_balances table
        // Check if the user already has a balance entry for the token
        $check_balance_query = "SELECT * FROM user_balances WHERE user_id = ? AND token_symbol = ?";
        $check_balance_stmt = $db->prepare($check_balance_query);
        $check_balance_stmt->execute([$uID, $token_symbol]);
        $existing_balance = $check_balance_stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_balance) {
            // Update the balance if it already exists
            $update_balance_query = "UPDATE user_balances
                                     SET balance = ?
                                     WHERE user_id = ? AND token_symbol = ?";
            $update_balance_stmt = $db->prepare($update_balance_query);
            $update_balance_stmt->execute([$total_balance, $user_id, $token_symbol]);
        } else {
            // Insert a new entry if no existing balance
            $insert_balance_query = "INSERT INTO user_balances (user_id, token_symbol, balance)
                                     VALUES (?, ?, ?)";
            $insert_balance_stmt = $db->prepare($insert_balance_query);
            $insert_balance_stmt->execute([$uID, $token_symbol, $total_balance]);
        }
    }
}

// Step 4: Call the function to update balances
updateUserBalances();

echo "User balances updated successfully.";
?>
