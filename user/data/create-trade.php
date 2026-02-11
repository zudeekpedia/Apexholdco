<?php
session_start();
require_once 'data.php'; // Include database functions

// Ensure the form data is submitted correctly
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize inputs
    $buyer_email = filter_var($_POST['buyer_email'], FILTER_SANITIZE_EMAIL);
    $seller_email = filter_var($_POST['seller_email'], FILTER_SANITIZE_EMAIL);
    $token_send = $_POST['sender_token']; // Token to be sent by the buyer
    $token_receive = $_POST['receiver_token']; // Token to be received by the seller
    $amount_send = floatval($_POST['buyer_amount']); // Amount of tokens to send
    $amount_receive = floatval($_POST['seller_amount']); // Amount of tokens to receive
    $role = $_POST['user_role']; // User role (buyer or seller)
    //$split_fee = isset($_POST['split_fee']) ? $_POST['split_fee'] : 'no'; // Whether the fee is split or not
    $feepayer = $_POST['fee_split']; // Who pays the fee (buyer/seller/equal)

    // Validate required fields
    if (empty($buyer_email) || empty($seller_email) || empty($amount_send) || empty($amount_receive)) {
        die("Error: All fields are required.");
    }

    // Assign buyer and seller emails dynamically based on the role
    if ($role === 'buyer') {
        $trade_buyer_email = $email;  // The current user is the buyer
        $trade_seller_email = $seller_email;  // The seller's email comes from the form
    } else {
        $trade_buyer_email = $buyer_email;  // The buyer's email comes from the form
        $trade_seller_email = $email;  // The current user is the seller
    }
    
    if($token_send === $token_receive){
        // Redirect to the trade room page
        header("Location: https://p2ptradetech.io/user/create-trade?errormessage=notwotokens");
    }
    
    if($buyer_email === $seller_email){
        // Redirect to the trade room page
        header("Location: https://p2ptradetech.io/user/create-trade?errormessage=buyerandselleremailcantmatch");
    }

    // Call the createTrade function
$tradeResult = createTrade($email, $uID, $role, $token_send, $amount_send, $token_receive, $amount_receive, $trade_buyer_email, $trade_seller_email, $feepayer);

// Check if trade creation was successful
if ($tradeResult['success']) {
    $room_id = $tradeResult['room_id'];

    // Redirect to the trade room page
    header("Location: https://p2ptradetech.io/user/view-room/{$room_id}");
    exit();
} else {
    // Handle trade creation failure
    $errorMessage = $tradeResult['error'];
    header("Location: ../create-trade?errormessage=" . urlencode($errorMessage));
    exit();
}

    
   
} else {
    echo "Error: Invalid request method.";
}
?>
