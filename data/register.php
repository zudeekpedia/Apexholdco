<?php
ob_start();
session_start();
require_once "../includes/user.php"; // Assuming this includes your database connection logic
require 'Mailer.php'; // Include the Mailer class


if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $fullname = validate($_POST['name']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $confirmpass = validate($_POST['password_confirmation']);
    $username = strtolower(substr($fullname, 0, 3)) . substr($email, 0, strpos($email, '@')) . rand(100, 999);
    $username = validate($username);
    list($firstName, $lastName) = array_pad(explode(' ', $fullname, 2), 2, null);
    $firstName = validate($firstName);
    $lastName = validate($lastName);
    
    //get referral identity
    $referrer_id = $_GET['refid'] ?? null;

    if (empty($email)) {
        header("Location: ../register/?error=email");
        exit();
    } else if($pass !== $confirmpass){
        header("Location: ../register/?error=passdontmatch");
        exit();
    }else if (empty($pass)) {
        header("Location: ../register/?error=pass");
        exit();
    } else {
        // Check if email already exists
        $checkUser = getUserByEmail($email);

        if ($checkUser) {
            // Email already exists
            header("Location: ../register/?error=emailexists");
            exit();
        } else {
            // If email does not exist, proceed with registration
            //$hashedPass = password_hash($pass, PASSWORD_DEFAULT); // Securely hash the password
            $registerUser = register_user($username,$fullname,$firstName,$lastName,$email, $pass); // Assuming this function inserts user data

            if ($registerUser) {
                //login User 
                $user = loginUser($email,$pass);
                
                //create balance for new user
                $createwallet = createWallet($user['user_id']);
                
                //get this new user identity
                $new_user_id = $user['user_id'];
                
                //check if this user was referred by someone
                if($referrer_id){
                    $logreferral = create_referral($referrer_id,$new_user_id); // Assuming this function inserts user data
                }//else do nothing
                
                
                
                 // After user registration, generate a verification token
                $token = substr(str_shuffle('0123456789' . uniqid(rand(), true)), 0, 8); // Generate a random Unique 8-digit number
                // Store the token in the database along with the user information
                storeVerificationToken($email, $token); // Store toke successfully to user table 

                // Create the verification link
                $verificationLink = "https://apexholdco.com/data/verify.php?token=$token";
                $mailer = new Mailer(); // Create a new Mailer instance
                $subject = "Account verification - Apexholdco";
                $guyname = getFirstThreeWords($email);
                
                // Generate a verification code (optional)
                $code = rand(100000, 999999); // Example verification code

                // Email content
                $body = "
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <style>
                            /* Basic reset for email clients */
                            body, table, td {
                                margin: 0;
                                padding: 0;
                                font-family: Arial, sans-serif;
                            }
                        </style>
                    </head>
                    <body style='background: #f4f4f4; padding: 20px;'>
                    
                        <table role='presentation' width='100%' style='max-width: 600px; margin: auto; background: white; border-radius: 5px; border-collapse: collapse;'>
                            <tr>
                                <td style='text-align: center; padding: 20px; border-bottom: 1px solid #ccc;'>
                                    <img src='../assets/logo/streamo1.png' alt='Description' style='max-width: 100%; height: auto; border: none;'>
                                </td>
                            </tr>
                            <tr>
                                <td style='padding: 20px;'>
                                    <h1 style='font-size: 24px; margin-bottom: 10px;'>Hello $firstName $lastName,</h1>
                                    <p style='font-size: 16px; margin-bottom: 20px;'>Protect your account from intrusion and verify your email address - $email. To verify your account, click this button:</p>
                                    <a href='https://yourverificationlink.com' style='display: inline-block; font-weight: bold; color: #ffffff; background-color: #007bff; padding: 10px 15px; border-radius: 5px; text-decoration: none;'>VERIFY YOUR ACCOUNT</a>
                                </td>
                            </tr>
                        </table>
                    
                    </body>
                    </html>
                ";


                // Set the headers for HTML email
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8\r\n";
                $headers .= "From: no-reply@apexholdco.com\r\n";

                // Send the email
                if ($mailer->sendEmail($email, $subject, $body)) {
                    
                    // Store the verification code in session or database if needed
                    $_SESSION['verification_code'] = $code;

                    // Registration successful, redirect to a verification page or dashboard
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['id'] = $user['user_id']; // Make sure this is correct
                    $_SESSION['userData'] = $user;

                    header("Location: ../user/"); // Redirect to dashboard after email sent
                    exit();
                } else {
                    // Failed to send email
                    header("Location: ../register/?error=emailfailed");
                    exit();
                }
            } else {
                // Registration failed
                header("Location: ../register/?error=registrationfailed");
                exit();
            }
        }
    }

} else {
    header("Location: ../register/?error=noinput");
    exit();
}
?>
