<?php

$dateq = '2026-08-03';
$firstdate = date('d-m-Y');
$seconddate = date('Y-m-d');
$firststrtodate = strtotime($firstdate);
$secondstrtodate = strtotime($seconddate);

if($firststrtodate === $secondstrtodate){
    echo ' the two dates match';
    echo $firststrtodate;
    echo ' '. $secondstrtodate;
}

if($firstdate === $seconddate){
    echo ' these dates match';
}


// Log the run
$log = "[" . date('Y-m-d H:i:s') . ' - ' . date('M d Y H:i:s A') . "] Cron ran successfully.\n";
file_put_contents(__DIR__ . '/cron_log.txt', $log, FILE_APPEND);

echo "This file is located in: " . __DIR__;
?>