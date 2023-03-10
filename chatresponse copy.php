<?php 

if (isset($_POST['user_message'])) {

    include 'dbcon.php';

    $user_msg = $_POST['user_message'];
    $sanitize_msg = mysqli_real_escape_string($conn,$user_msg);

    $chat_query = $conn->query("SELECT bot_reply FROM tbl_bots WHERE keywords LIKE '%$sanitize_msg%'");
    $check_reply = mysqli_num_rows($chat_query);

    if ($check_reply > 0) {
        $fetch_reply = mysqli_fetch_array($chat_query);
        $bot_msg = $fetch_reply['bot_reply'];
    }else{
        $bot_msg = "I'm sorry, I'm not quite sure what you're asking.";
    }
    echo $bot_msg;
}else{
    header('location: contacts.php');
}

?>