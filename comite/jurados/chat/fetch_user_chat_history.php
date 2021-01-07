<?php

session_start();

require("Messages.php");

utf8_decode(extract($_POST));

$from_user_id = $_SESSION['id'];

echo fetch_user_chat_history($from_user_id, $to_user_id);


require("../../connect_db.php");

$sqlUpdate = ("UPDATE `chat_message` SET status = 0 WHERE `from_user_id` = $to_user_id and `to_user_id` = $from_user_id and status = 1");
mysqli_query($mysqli,$sqlUpdate);


?>