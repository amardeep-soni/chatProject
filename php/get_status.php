<?php
// whenever this file is called it will update the status of all the user depending on the condition

// in update_status.php we are updating the time of the last_login with 5 more seconds than current time

session_start();
include "config.php";
$unique_id = $_SESSION['unique_id'];
$currentTime = time();
$res = mysqli_query($conn, "select * from users");
while ($row = mysqli_fetch_assoc($res)) {
    if ($row['last_login'] > $currentTime) { // if the users record is greter than the current time means he is logged in and made his status to Active now
        $status = "Online now";
        $sql3 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
    } else { //if the users record is not greter than the current time means he is not logged in and made his status to Offline now
        $status = "Offline now";
        $sql3 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
    }
}
