<?php

date_default_timezone_set ('America/Bogota');
extract($_POST);	
require("../../connect_db.php");
$te=$id;
$fecha=date('Y-m-d');
if($aprob_dir=='NO'){
	mysqli_query($mysqli,"INSERT INTO no_aprobados VALUES('','$ID_directores','$titulo_tesis','$fecha')");
} else {
    mysqli_query($mysqli,"INSERT INTO aprobados VALUES('','$ID_directores','$titulo_tesis','$fecha')");
}
	
	$sentencia="update tesis set ID_estudiante='$ID_estudiante', proyecto='$proyecto', titulo_tesis='$titulo_tesis', aprob_dir='$aprob_dir', ID_directores='$ID_directores' , ID_estado='$ID_estado', observaciones='$observaciones' , archivo='$archivo' , fecha_propuesta='$fecha_propuesta' , fecha_aprob_propuesta='$fecha_aprob_propuesta' , fecha_ent_anteproyecto='$fecha_ent_anteproyecto',jurado1='$jurado1',jurado2='$jurado2' where ID_tesis='$te' ";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);


	if ($resent==null) {
		echo 0;
		//echo "Error de procesamiento no se han actualizado los datos";
		//echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		//header("location: ../director.php");
		
		//echo "<script>location.href='../director.php'</script>";
	}else {
		echo 1;
	/*	echo '<script>alert("EDICION TERMINADA")</script> ';
		
		echo "<script>
		
		//location.href='../director.php'


opener.location.reload();
		window.close();
		</script>";
		*/

		
	}


                         