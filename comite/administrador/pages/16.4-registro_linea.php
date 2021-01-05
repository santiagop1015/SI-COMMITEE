<?php
    date_default_timezone_set ('America/Bogota');
	utf8_decode(extract($_POST));
	$nombre_area=$_POST['nombre_area'];
    $programa=$_POST['programa'];
    
    require("../../connect_db.php");

    mysqli_query($mysqli,"INSERT INTO area_inves VALUES('','$nombre_area','$programa')");

    echo "1";