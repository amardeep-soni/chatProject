<?php
// whenever this file is called it will update the database of logged user to existing second + 3 more seconds
session_start();
include_once "config.php";
$unique_id = $_SESSION['unique_id'];

$updatedTime = time() + 3;
$res = mysqli_query($conn, "UPDATE users SET last_login = {$updatedTime} WHERE unique_id = {$unique_id}");
