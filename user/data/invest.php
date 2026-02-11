<?php
session_start();
require_once 'data.php';  // Include your database connection and helpers

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Sanitize and validate inputs
    $plan_id = $_POST['plan_id']; // The plan selected by the user
    $amount  = floatval($_POST['amount']); // The amount to invest

    if ($amount <= 0) {
        header("Location: https://www.apexholdco.com/user/invest?errormessage='invalidamount'");
        die("Invalid Amount");
    }

    // 2. Fetch plan
    $plan = getPlan($plan_id);
    $plan = $plan[0];

    // 3. Validate Amount Against Plan
    if ($amount < $plan['min_deposit']) {
        header("Location: https://www.apexholdco.com/user/invest?errormessage='amountisbelowminimumdeposit'");
        die("Amount below minimum deposit");
    }

    if ($plan['max_deposit'] > 0 && $amount > $plan['max_deposit']) {
        header("Location: https://www.apexholdco.com/user/invest?errormessage='amountexceedsmaxdeposit'");
        die("Amount exceeds maximum deposit");
    }

    // 3a. Fetch available deposits (FIFO)
    $deposits = getAvailableDepositsFIFO($uID); // Returns deposits with 'available_amount'

    $total_available = 0;
    foreach ($deposits as $dep) {
        $total_available += $dep['available_amount'];
    }

    if ($total_available < $amount) {
        header("Location: https://www.apexholdco.com/user/invest?errormessage='insufficientdepositedfunds'");
        die("Insufficient deposited funds");
    }

    // 4. Check Wallet Balance (if needed)
    $balance = userAccountBalance($uID);
    if ($balance < $amount) {
        header("Location: https://www.apexholdco.com/user/invest?errormessage='insufficientfunds-$balance'");
        die("Insufficient funds in wallet");
    }

    // 5. Calculations
    $roi_percent = floatval($plan['roi_percent']);
    $duration    = floatval($plan['duration_days']);
    $daily_profit = ($amount * $roi_percent) / 100;
    $total_profit = $daily_profit * $duration;

    $start_date = date('Y-m-d');
    $end_date   = date('Y-m-d', strtotime("+$duration days"));

    // 6. Generate a unique transaction ID for this investment
    $transaction_id = generateTransactionId();

    // 7. Log investment transaction (debit)
    $logtransaction = createTransaction(
        $uID,
        'investment',
        $amount,
        "Investment in {$plan['name']}",
        $transaction_id
    );

    if (!$logtransaction) {
        die("Failed to log investment transaction");
    }

    // 8. Deduct from wallet (if you want to)
    $debitwallet = debitWallet( $amount, $uID);

    // 9. Create investment record
    $createInvestment = createInvestment(
        $uID,
        $plan_id,
        $transaction_id,
        $plan['name'],
        $amount,
        $roi_percent,
        $duration,
        $start_date,
        $end_date,
        $total_profit,
        'active'
    );

    if (!$createInvestment) {
        die("Failed to create investment");
    }

    // 10. FIFO - allocate deposits to this investment
    $remaining = $amount;
    foreach ($deposits as $dep) {

        if ($remaining <= 0) break;

        $consume = min($dep['available_amount'], $remaining);

        // Log which deposit funds this investment
        $linkSource = linkInvestmentSource(
            $transaction_id,        // investment transaction ID
            $dep['deposit_transaction_id'], // deposit transaction ID
            $consume
        );

        if (!$linkSource) {
            die("Failed to link deposit to investment");
        }

        $remaining -= $consume;
    }

    if ($remaining > 0) {
        die("Investment funding incomplete");
    }

    // 11. Redirect to confirmation page
    header("Location: https://www.apexholdco.com/user/invest/{$transaction_id}");
    exit();

} else {
    echo "Error: Invalid request method.";
}

// Generate a unique transaction ID
function generateTransactionId() {
    $prefix = 'APEXTXN';
    $randomString = strtoupper(bin2hex(random_bytes(5)));
    return $prefix . $randomString;
}
?>