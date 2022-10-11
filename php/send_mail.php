<?php
session_start(); // starts the session to get the mail which is set in verify email page
$email = $_SESSION['email'];
$code = rand(1000, 9999);
$to_email = $email;

$headers = "From: Amardeep Chat App ";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

if (!isset($_SESSION['forgetPass'])) {
    $subject = "Account Creation Verification";

    $message = "
    <div style='display: flex; justify-content: center; align-items: center; flex-direction: column; font-family: cursive;'>
        <div style='width: 400px; padding: 20px;'>
            <div style='display: flex; justify-content: space-between; align-items: center;'>
                <h2 style='color: rgb(28, 107, 243); margin: 5px 30px 5px 0px;'>Amardeep Chat App</h2>
                <a href='http://localhost/chatproject/' style='padding: 15px; border: 1px solid black; text-decoration: none; color: black;'>Go to Website</a>
            </div>
            <hr>
            <h2>Complete Registration</h2>
            <p>Please enter this confirmation code in the window where you started creating your account:</p>
            <br>
            <div style='background:rgb(233,233,233);padding:24px 120px; font-size: 30px; font-weight: bold; letter-spacing: 2px; color: rgb(28, 107, 243); text-align: center;'>" . $code . "</div>
            <br>
            <p>If you didn't create an account in Amardeep Chat App, Please ignore this message.</p>
        </div>
    </div>";
} else {
    $subject = "Forget Password Verification";

    $message = "
    <div style='display: flex; justify-content: center; align-items: center; flex-direction: column; font-family: cursive;'>
        <div style='width: 480px; padding: 20px;'>
            <div style='display: flex; justify-content: space-between; align-items: center;'>
                <h2 style='color: rgb(28, 107, 243); margin: 5px 30px 5px 0px;'>Amardeep Chat App</h2>
                <a href='http://localhost/chatproject/' style='padding: 15px; border: 1px solid black; text-decoration: none; color: black;'>Go to Website</a>
            </div>
            <hr>
            <h2>Forget Password</h2>
            <p>Please enter this confirmation code in the window where you started Forgeting your Password:</p>
            <br>
            <div style='background:rgb(233,233,233);padding:24px 120px; font-size: 30px; font-weight: bold; letter-spacing: 2px; color: rgb(28, 107, 243); text-align: center;'>" . $code . "</div>
            <br>
            <p>If you didn't apply for Forget Password in Amardeep Chat App, <strong>Please ignore this message.</strong></p>
        </div>
    </div>";
}

if (mail($to_email, $subject, $message, $headers)) { // if mail is send successflly send the random generated code to the database
    include "config.php";
    $sql = mysqli_query($conn, "UPDATE `users` SET `code` = '{$code}', `email_verify` = 'false'  WHERE `users`.`email` = '{$email}'");
    echo "success";
} else {
    echo "Email sending failed... ";
}
