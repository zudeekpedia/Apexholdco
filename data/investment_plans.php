<?php

$investment_plans = [
    "beginner" => [
        "name" => "Beginner Plan",
        "min" => 100,
        "max" => 4999,
        "roi" => 3, //percent
        "referral" => 5,
        "duration" => 5 //days
    ],
    
    "premium" => [
        "name" => "Premium Plan",
        "min" => 5000,
        "max" => 9999,
        "roi" => 5,  
        "referral" => 10,
        "duration" => 8
    ],
    
    "premium" => [
        "name" => "Ultimate Plan",
        "min" => 10000,
        "max" => 999999999999999,  //Unlimited
        "roi" => 10,  
        "referral" => 10,
        "duration" => 10
    ]
];

?>