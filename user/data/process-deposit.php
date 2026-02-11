<?php
session_start();
require_once 'data.php';  // Include your database connection

// Ensure the form data is submitted correctly
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize and validate inputs
    $coin_id = $_POST['currency_id']; // The coin selected by the user
    $amount = floatval($_POST['amount']); // The amount to be deposited
    
    // Validate the amount (ensure it is greater than zero)
    if ($amount <= 0) {
        echo "Invalid amount. Please enter a valid deposit amount.";
        exit;
    }
    
    //the default currency is United States Dollars
    $currency = 'USD';
    
    #default currency symbol is the United States Dollar Sign - $
    $currency_symbol = '$';
    
    //Get crypto payment gatway with coin id
    $payment_gateway = getCoinNameById($coin_id);
    $payment_gateway = $payment_gateway[0];
    if(isset($payment_gateway['symbol'])){
        $payment_gateway = $payment_gateway['symbol'];
    }else{
        header("Location: https://www.apexholdco.com/user/deposit?errormessage=$payment_gateway");
    }
    
    
    

    // Generate a unique transaction ID for this deposit
    $transaction_id = generateTransactionId();

    // Assume the user ID is stored in the session
    $user_id = $uID;  // Replace with actual session management logic
    
    $action = createDeposit($uID, $currency_symbol, $amount, $currency, $payment_gateway, $coin_id, $transaction_id);

    // Check if the insert was successful
    if ($action) {
        // Redirect to the payment confirmation page
        header("Location: https://www.apexholdco.com/user/payment/{$transaction_id}");
        exit();
    } else {
        // If the insert fails, return an error message
        header("Location: https://www.apexholdco.com/user/deposit?error=unable to create the deposit");
        echo "Error: Unable to create the deposit. Please try again.";
    }

} else {
    echo "Error: Invalid request method.";
}

// Function to generate a unique transaction ID (e.g., TXNSGO67PMK)
function generateTransactionId() {
    $prefix = 'APEXTXN';
    $randomString = strtoupper(bin2hex(random_bytes(5)));  // Generate a random string (10 characters)
    return $prefix . $randomString;
}
?>
