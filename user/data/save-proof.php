<?php
session_start();
require_once 'data.php';  // Include the database connection

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitize and validate the inputs
    $transactionhash = filter_var($_POST['comment'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $transaction_id = $_POST['transactionid'];
    
    // Validate the Transaction hash (ensure it's not empty)
    if (empty($transactionhash)) {
        echo "Error: Transaction Hash is required.";
        exit;
    }

    // Validate and handle the file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Check file extension
        if (!in_array($file_ext, $allowed_extensions)) {
            echo "Error: Only JPG, JPEG, and PNG files are allowed.";
            exit;
        }

        // Check file size (max 2MB)
        if ($file_size > 2 * 1024 * 1024) {
            echo "Error: File size must be under 2MB.";
            exit;
        }

        // Generate a unique name for the uploaded image to avoid conflicts
        $upload_dir = 'uploads/proof/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);  // Create the directory if it doesn't exist
        }

        $new_file_name = uniqid('proof_') . '.' . $file_ext;
        $file_path = $upload_dir . $new_file_name;

        // Move the uploaded file to the desired directory
        if (!move_uploaded_file($file_tmp, $file_path)) {
            echo "Error: Failed to upload the image.";
            exit;
        }
    } else {
        echo "Error: Please upload a proof of payment image.";
        exit;
    }

    // Get the user ID (assuming it's stored in the session)
    $user_id = $uID;  // Adjust to match your session management

    // Insert the proof data into the database (assuming you have a `proofs` table)
    try {
        $action = saveProof($uID, $transaction_id, $transactionhash, $file_path);

        // Check if the insertion was successful
        if ($action) {
            header("Location: ../upload-proof/$transaction_id?successmessage='Proof of payment saved successfully'");
            exit;
        } else {
            echo "Error: Failed to save the proof.";
        }
    } catch (PDOException $e) {
        // Catch any errors during the database interaction
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Error: Invalid request method.";
}


?>
