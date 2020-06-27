<?php
date_default_timezone_set ('America/Bogota');
extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
require("../../connect_db.php");
$fecha_eval= date("Y-m-d H:i:s");

$te=$id;
// var_dump(extract($_POST));



	$sentencia="update evaluacion1 set ID_tesis='$ID_tesis', forprob='$forprob', justificacion='$justificacion', objetivos='$objetivos', marcoref='$marcoref' , metodologia='$metodologia', crono='$crono' , presupuesto='$presupuesto' , biblio='$biblio' , ciber='$ciber' , claridad='$claridad',evidencia='$evidencia',concepto='$concepto',observaciones='$observaciones',jurado='$user',fecha_eval='$fecha_eval' where id='$te' ";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);


	if ($resent==null) {
		echo 0;
		//echo "Error de procesamiento no se han actualizado los datos";
		//echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		//header("location: director.php");
		//
		//echo "<script>
		//
		////location.href='../director.php'
        //opener.location.reload();
		//window.close();
		//
		//</script>";
	}else {
		echo 1;
		//echo '<script>alert("EDICION TERMINADA")</script> ';
		//
		//echo "<script>
		////location.href='../director.php'
//
        //opener.location.reload();
		//window.close();
		//
		//</script>";

		
	}

      ?>