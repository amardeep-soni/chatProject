<?php
session_start();
include_once "config.php";
$unique_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$unique_id}");
$output = "";


// fetching the users list
if (mysqli_num_rows($sql) == 1) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($sql) > 0) {
    include "data.php";
}
echo $output;