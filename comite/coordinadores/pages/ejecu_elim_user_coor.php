<?php


utf8_decode(extract($_POST));	//extraer todos los valores del metodo post del formulario de actualizar
	require("../../connect_db.php");
	$te=$id;
        $sqlborrar="DELETE FROM login WHERE id='$te'";
			  $resent=mysqli_query($mysqli,$sqlborrar);
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo "Error de procesamiento no se han borrado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE BORRARON LOS DATOS")</script> ';
		header("location: ListadoEstudiantes.php");
		
		echo "<script>location.href='ListadoEstudiantes.php'</script>";
	}else {
		
		echo '<script>alert("EL USUARIO FUE BORRADO CON EXITO!")</script> ';
		
				
		echo "<script>location.href='ListadoEstudiantes.php'</script>";

		
	}
?>