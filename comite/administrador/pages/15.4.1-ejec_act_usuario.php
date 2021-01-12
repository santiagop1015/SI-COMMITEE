<?php

extract($_POST);	//extraer todos los valores del metodo post del formulario de actualizar
require("../../connect_db.php");

$user=$_POST['user'];
$email=$_POST['email'];
$password= $_POST['password'];
$tipousuario=$_POST['tipousuario'];
$telefono=$_POST['telefono'];
$programa=$_POST['programa'];
$fechadenacimiento= $_POST['fechadenacimiento'];
$cedula=$_POST['cedula'];
if($tipousuario == "Director") {
	$area=$_POST['area'];
} else {
	$area=0;
}

$queryEmail = $mysqli -> query ("SELECT * FROM login where id=$id");

while ($resultado = mysqli_fetch_array($queryEmail)) {
$emailAnterior = $resultado[4];
$cedulaAnterior = $resultado[1];
}

if($emailAnterior == $email && $cedulaAnterior == $cedula) {
	$check_mail = 0;
} else {

if($emailAnterior == $email && $cedulaAnterior !== $cedula) {
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE Cedula='$cedula'");
} else if($emailAnterior !== $email && $cedulaAnterior == $cedula) {
$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$email'");
} else if($emailAnterior == $email && $cedulaAnterior == $cedula) {
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$email' or Cedula='$cedula'");
}
$check_mail=mysqli_num_rows($checkemail);

}

/*
$passest = "";
$pasadmin= "";
$pasdir= "";
$pasjur= "";
$pascor= "";


	if($tipousuario == 'Estudiante')//Creacion para Estudiante
	{
		$passest = $password;
		$pasadmin= "";
		$pasdir= "";
		$pasjur= "";
		$pascor= "";
	}
	else if($tipousuario == 'Director')//Creacion para director
	{
		$passest = "";
		$pasadmin= "";
		$pasdir= $password;
		$pasjur= "";
		$pascor= "";
	}
	else if($tipousuario == 'Coordinador')//Creacion para Coordinador
	{
		$passest = "";
		$pasadmin= "";
		$pasdir= "";
		$pasjur= "";
		$pascor= $password;
	}
	else if($tipousuario == 'Jurado')//Creacion para secreteari@
	{
		$passest = "";
		$pasadmin= "";
		$pasdir= "";
		$pasjur= $password;
		$pascor= "";
	} else if($tipousuario == 'Secretaria') {
		$passest = $password;
		$pasadmin= "";
		$pasdir= "";
		$pasjur= "";
		$pascor= "";
	}
	*/

	if($password==$password || $password==$cedula){
		if($check_mail>0){
			echo 2;
		} else {

			if($tipousuario == "Administrador") {
				$sentencia="update login set cedula='$cedula',user='$user', email='$email',pasadmin='$password',pasdir='',pasjur='',pascor='', password='', tipousuario='$tipousuario', telefono='$telefono', programa='$programa', fechadenacimiento='$fechadenacimiento', area='$area' where id='$id' ";
			} else if($tipousuario == "Director") {
				$sentencia="update login set cedula='$cedula',user='$user', email='$email',pasadmin='',pasdir='$password',pasjur='',pascor='', password='', tipousuario='$tipousuario', telefono='$telefono', programa='$programa', fechadenacimiento='$fechadenacimiento', area='$area' where id='$id' ";
			} else if($tipousuario == "Jurado") {
				$sentencia="update login set cedula='$cedula',user='$user', email='$email',pasadmin='',pasdir='',pasjur='$password',pascor='', password='', tipousuario='$tipousuario', telefono='$telefono', programa='$programa', fechadenacimiento='$fechadenacimiento', area='$area' where id='$id' ";
			} else if($tipousuario == "Coordinador") {
				$sentencia="update login set cedula='$cedula',user='$user', email='$email',pasadmin='',pasdir='',pasjur='',pascor='$password', password='', tipousuario='$tipousuario', telefono='$telefono', programa='$programa', fechadenacimiento='$fechadenacimiento', area='$area' where id='$id' ";
			} else {
				$sentencia="update login set cedula='$cedula',user='$user', email='$email',pasadmin='',pasdir='',pasjur='',pascor='', password='$password', tipousuario='$tipousuario', telefono='$telefono', programa='$programa', fechadenacimiento='$fechadenacimiento', area='$area' where id='$id' ";
			}

			$resent=mysqli_query($mysqli,$sentencia);
	

	        if ($resent==null) {
                echo 0;
	        //	echo "Error de procesamiento no se han actualizado los datos";
	        	//echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
	        	//header("location: Delay.php?error");
        
	        //	$mensajeRespuesta = 'Error de procesamiento no se han actualizado los datos';
	        //	header("location:Delayed.php?error&msg=$mensajeRespuesta");
        
	        	//echo "<script>location.href='Delayed.php?error'</script>";
	        }else {
            //	echo '<script>alert("EDICION TERMINADA")</script> ';
            echo 1;
            // echo "Datos actualizados Correctamente";
           
	        //$mensajeRespuesta = 'Datos actualizados Correctamente';
	        //header("location:Delayed.php?exito&msg=$mensajeRespuesta");
        
	        //	echo "<script>location.href='Delayed.php?exito'</script>";
			}
			
			}
			
	        } else {
	        	echo 3;
	        }


	//$sentencia="update login set cedula='$cedula',user='$user', email='$email',pasdir='$pasdir',pasjur='$pasjur',pascor='$pascor', password='$passest', tipousuario='$tipousuario', telefono='$telefono', programa='$programa', fechadenacimiento='$fechadenacimiento', area='$area' where id='$id' ";

	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	
	?>