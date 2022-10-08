<?php
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    // let's check users entere email and password matched to database any table row email and password
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) { // if users credentials matched
        $row = mysqli_fetch_assoc($sql);

        if ($row['email_verify'] == 'true') { // if the user email is verifyed then only user can login

            // updating user status to active now and last_login to the currentTime+3 (extra 3 second) if user login is successfully

            $updatedTime = time() + 3;
            $status = ('Online now');
            $sql2 = mysqli_query($conn, "UPDATE users SET last_login = {$updatedTime}, status = '{$status}' WHERE unique_id = {$row['unique_id']}");

            if ($sql2) {
                session_start();
                $_SESSION['unique_id'] = $row['unique_id']; // using this session we used user unique_id in other php file
                echo "success";
            }
        } else { // if mail is not verifyed then start session and this this echo text will allow login js to redirect the user to verify email
            echo "not verifyed";
            session_start();
            $_SESSION['email'] = $email;
        }
    } else {
        echo "Email or Password is incorrect!";
    }
} else {
    echo "All input fields are required";
}
