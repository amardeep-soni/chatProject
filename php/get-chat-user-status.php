<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");

    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        if ($row['last_login'] > time()) {
            echo "Online now";
        } else {
            $seconds = (time() - $row['last_login']) + 1;
            $s = $seconds % 60;
            $h = floor($seconds / 3600);
            $m = floor(($seconds / 60) % 60);
            $d = floor($seconds / 86400);
            $M = floor($seconds / 2592000);
            $Y = floor($seconds / 31536000);
            $active = "Active";
            if ($Y > 0) {
                echo "$active $Y year ago";
            } else if ($M > 0) {
                echo "$active $M months ago";
            } else if ($d > 0) {
                echo "$active $d days ago";
            } else if ($d > 0) {
                echo "$active $d days ago";
            } else if ($h > 0) {
                echo "$active $h hours ago";
            } else if ($m > 0) {
                echo "$active $m minute ago";
            } else {
                echo "Offline now";
            }
        }
    }
} else {
    header("../login.php");
}
