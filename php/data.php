<?php
// this file is created separate because in search term and user list we need the same code

while ($row = mysqli_fetch_assoc($sql)) {
    $you = "";
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if (mysqli_num_rows($query2) > 0) {
        $result = $row2['message'];
        // adding you: text before msg if login id send msg
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    } else {
        $result = "No message available";
    }
    // triming message if word are more than 20
    (strlen($result) > 28) ? $msg = substr($result, 0, 28) . '...' : $msg = $result;


    $output .= "<a href='chat.php?user_id=" . $row['unique_id'] . "'>
                    <div class='content'>
                        <img src='php/images/" . $row['img'] . "' alt=''>
                        <div class='details'>
                            <span>" . $row['fname'] . " " . $row['lname'] . "</span>
                            <p>" . $you . $msg . "</p>
                        </div>
                    </div>
                    <div class='status-dot'><i class='fas fa-circle'></i></div>
                </a>";
}
