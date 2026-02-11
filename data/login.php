<?php
ob_start();
session_start();  // Start session at the top 
require_once "../includes/user.php";


if (isset($_POST['email']) && isset($_POST['password'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($email)) {
        header("Location: ../login/?error=email");
        exit();
    } else if (empty($pass)) {
        header("Location: ../login/?error=pass");
        exit();
    } else {
        // Call loginUser function
        $user = loginUser($email, $pass);

        if ($user) {
            // User found and password is correct
            $_SESSION['userData'] = $user;
            $_SESSION['email'] = $user['email'];
            $_SESSION['id'] = $user['user_id'];
            header("Location: ../user");
            exit();
        } else {
            // User does not exist or password is incorrect
            header("Location: ../login/?error=userdoesnotexist");
            exit();
        }
    }
} else {
    header("Location: ../login/?error=noaccount");
    exit();
}
ob_end_flush();
?>