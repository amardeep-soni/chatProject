<?php
include_once "config.php";
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
session_start();
$unique_id = $_SESSION['unique_id'];
$output = "";


$sql = mysqli_query($conn, "SELECT * FROM users WHERE (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') AND unique_id NOT LIKE '%{$unique_id}%'");

if (mysqli_num_rows($sql) > 0) {
    include "data.php";
} else {
    $output .= "No user found Related to your search term";
}
echo $output;
