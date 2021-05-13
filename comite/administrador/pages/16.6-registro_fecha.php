<?php
    date_default_timezone_set ('America/Bogota');
	utf8_decode(extract($_POST));
	$fecha=$_POST['fecha'];
    /*if(isset($_POST['id'])) {
      $id=$_POST['id'];
    }*/
    $action=$_POST['action'];
    $programa=$_POST['programa'];


	require("../../connect_db.php");

    $query = $mysqli -> query ("SELECT * FROM fechascom WHERE programa='$programa'");
    $exist = false;
    while ($valores = mysqli_fetch_array($query)) {
        $exist = true;
    }
    if($exist) {
        mysqli_query($mysqli,"UPDATE fechascom SET fechas='$fecha' WHERE programa='$programa'");
        //$sentencia = "update fechascom set fechas=".$fecha." where id_user='$id_user' ";
    } else {
        mysqli_query($mysqli,"INSERT INTO fechascom VALUES('','$fecha','$programa')");
    }

				


echo "1";
//echo "update fechascom set fechas=".$fecha." where programa=".$programa;