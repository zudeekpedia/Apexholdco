<?php
session_start();
require_once 'data.php';  // Include your database connection

//Get active investments 
$investments = getActiveInvestments();

if(!$investments) {
    echo 'there is no investment';
    exit; //nothing to process
     
}

foreach ($investments as $inv){
    $investment_id = $inv['id'];
    $user_id = $inv['user_id'];
    $amount = $inv['amount'];
    $roi_percent = $inv['roi_percent'];
    $end_date = strtotime($inv['end_date']);
    
     echo 'there is no investment';
    
    //1. Skip if investment already expired 
    if(time() > $end_date){
        //update investment
        $updateinvestment = updateInvestments($investment_id,'completed');
        echo 'this transaction has expired';
        continue;
        
    }
    
    //2. Prevent double profit for same day
    $alreadyPaid = earningAlreadyPaid($investment_id);
    
    if(!empty($alreadyPaid)){
        echo 'this user has been already paid';
        continue;
        
    }
    
    //3. Calculate daily profit
    $daily_profit = ($amount * $roi_percent) / 100;
    
    //4. Insert earnings record 
    $createEarnings = createEarnings($user_id, $investment_id, $daily_profit);
    
    //5. Credit Wallet
    $creditWallet = creditWallet($daily_profit, $user_id);
    
    //6. Log TransactionL
    $transaction_id = generateTransactionId();
    $createProfit = createProfit($user_id, $daily_profit, $transaction_id);
    
    //if done
    
    echo ' i am done';
}

// Function to generate a unique transaction ID (e.g., TXNSGO67PMK)
function generateTransactionId() {
    $prefix = 'APEXEARN.TXN';
    $randomString = strtoupper(bin2hex(random_bytes(5)));  // Generate a random string (10 characters)
    return $prefix . $randomString;
}

// Log the run
$log = "[" . date('Y-m-d H:i:s') . ' - ' . date('M d Y H:i:s A') . "] Cron ran successfully.\n";
file_put_contents(__DIR__ . '/cron_log.txt', $log, FILE_APPEND);
?>
