<?php
    date_default_timezone_set ('America/Bogota');
	utf8_decode(extract($_POST));
	$nombre_eje=$_POST['nombre_eje'];
	$id_area=$_POST['id_area'];
	$programa=$_POST['programa'];

	require("../../connect_db.php");

				
mysqli_query($mysqli,"INSERT INTO ejes_tem VALUES('','$nombre_eje','$id_area','$programa')");

echo "1";