<?php
// this file is created separate because in search term and user list we need the same code

while ($row = mysqli_fetch_assoc($sql)) {
    $you = "";
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if (mysqli_num_rows($query2) > 0) {
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        // adding you: text before msg if login id send msg
        $result = $you . $row2['message'];
    } else {
        $result = "No message available";
    }
    // triming message if word are more than 20
    (strlen($result) > 38) ? $msg = substr($result, 0, 38) . '...' : $msg = $result;

    // check user is online or offline
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
    $output .= "<a href='chat.php?user_id=" . $row['unique_id'] . "'>
                    <div class='content'>
                        <img src='php/images/" . $row['img'] . "' alt=''>
                        <div class='details'>
                            <span>" . $row['fname'] . " " . $row['lname'] . "</span>
                            <p>". $msg . "</p>
                        </div>
                    </div>
                    <div class='status-dot " . $offline . "'><i class='fas fa-circle'></i></div>
                </a>";
}
