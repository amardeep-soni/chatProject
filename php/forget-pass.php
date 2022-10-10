<?php
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);

if (!empty($email)) {
    // let's check users entered email and password matched to database any table row email and password
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if (mysqli_num_rows($sql) > 0) { // if users credentials matched
        $row = mysqli_fetch_assoc($sql);
        session_start();
        $_SESSION['email'] = $email; // this session variable to use email in another file
        $_SESSION['forgetPass'] = 'true'; // this session variable to only say that user is applying to forgetpass in verify email 

        echo "Found Email";
    } else {
        echo "Email is not found!";
    }
} else {
    echo "Input fields are required";
}
