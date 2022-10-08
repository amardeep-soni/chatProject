<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$code = mysqli_real_escape_string($conn, $_POST['code']);

if (!empty($email) && !empty($code)) { // if the email and code is not empty
    if ($email == $_SESSION['email']) { // if the entered email is not same as email stored in session
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) { // if the email is find from the database
            $row = mysqli_fetch_assoc($sql);
            if ($code == $row['code']) { // if that email code and the entered code is same then (user is verifyed so update the email_verify field to true and destroy the session as you created to use email)
                $sql2 = mysqli_query($conn, "UPDATE `users` SET `email_verify` = 'true' WHERE `email` = '{$row['email']}'");
                echo "success";
                session_destroy();
            } else { // if the code is not matched to db code
                echo "$code code is not matched. Please Enter Correct Code";
            }
        }
    } else {
        echo "$email - This is not the email from which you siggned up!";
    }
} else { // if email and code is empty
    echo "All input field are required!";
}
