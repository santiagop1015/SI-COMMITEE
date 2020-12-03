<?php
session_start();

require("../../connect_db.php");
utf8_decode(extract($_POST));

echo var_dump($_POST);

$id = $_SESSION['id'];

//mysqli_query($mysqli,"UPDATE login set password='$Imagen',  where id='$id'");

?>