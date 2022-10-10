<?php
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // if email is valid
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) { // if email exist
            $row = mysqli_fetch_assoc($sql);
            // set new password
            $sql2 = mysqli_query($conn, "UPDATE `users` SET `email_verify` = 'true', `password` = '{$password}' WHERE `email` = '{$row['email']}'");
            echo "success";
        }
    } else {
        echo "$email - This is not a valid email";
    }
} else {
    echo "All input field are required!";
}
