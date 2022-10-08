<?php
session_start(); // starts the session to get the mail which is set in verify email page
$email = $_SESSION['email'];
$code = rand(1000, 9999);
$to_email = $email;
$subject = "Verify Your Account";
$message = "Thanks for signing up
                    $email
            Use the below code to verify your account
                    $code
";
$headers = "From:amardeep10as@gmail.com";
if (mail($to_email, $subject, $message, $headers)) { // if mail is send successflly send the random generated code to the database
    include "config.php";
    $sql = mysqli_query($conn, "UPDATE `users` SET `code` = '{$code}' WHERE `users`.`email` = '{$email}'");
    echo "success";
} else {
    echo "Email sending failed... ";
}
