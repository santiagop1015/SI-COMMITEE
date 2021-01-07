<?php

session_start();
date_default_timezone_set ('America/Bogota');
$from_user_id = $_SESSION['id'];

require("../../connect_db.php");

/*$data = array(
    ':to_user_id' => $_POST['to_user_id'],
    ':from_user_id' => $_SESSION['id'],
    ':chat_message' => $_POST['chat_message'],
    ':status' => '1'
);
*/

utf8_decode(extract($_POST));
$sql1 = ("INSERT INTO `chat_message`(`to_user_id`, `from_user_id`, `chat_message`, `status`) VALUES($to_user_id, $from_user_id, '$chat_message', 1)");

// INSERT INTO `chat_message`(`to_user_id`, `from_user_id`, `chat_message`, `status`) VALUES (1,5,'test',1)
mysqli_query($mysqli,$sql1);
//$resent=mysqli_query($mysqli,$sql1);

require("Messages.php");

echo fetch_user_chat_history($from_user_id, $to_user_id);









?>