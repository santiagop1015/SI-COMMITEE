<?php


extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
	require("../../connect_db.php");
	
        $sentencia="update login set cedula='$cedula',user='$user', email='$email', pasdir='$pasdir',  tipousuario='$TipoUsuario', telefono='$telefono', programa='$programa', fechadenacimiento='$fechadenacimiento' where id='$id' ";

	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		echo "Error de procesamiento no se han actualizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
        header("location: ../director.php");
        
		echo "<script>location.href='index.html'</script>";
	}else {
		echo '<script>alert("EDICION TERMINADA")</script> ';
        session_destroy();
        header("location: ../director.php");
		//echo "<script>location.href='index.html'</script>";

		
	}
?>