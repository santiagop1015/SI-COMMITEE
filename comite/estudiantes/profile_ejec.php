<?php
session_start();

require("../connect_db.php");

$Imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));



$id = $_SESSION['id'];
mysqli_query($mysqli,"UPDATE login set foto='$Imagen' where id='$id'");
header("location:profile.php");

?>