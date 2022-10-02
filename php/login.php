<?php
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    // let's check users entere email and password matched to database any table row email and password
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) { // if users credentials matched
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php file
        echo "success";
    } else {
        echo "Email or Password is incorrect!";
    }
} else {
    echo "All input fields are required";
}
