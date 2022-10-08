<?php
session_start();
include_once "config.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND email_verify = 'true'"); // don't fetch user who is currently logged in and the users whose mail is not verifyed
$output = "";


// fetching the users list
if (mysqli_num_rows($sql) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($sql) > 0) {
    include "data.php";
}
echo $output;