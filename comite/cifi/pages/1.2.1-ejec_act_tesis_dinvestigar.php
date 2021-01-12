<?php
date_default_timezone_set ('America/Bogota');
utf8_decode(extract($_POST));	
require("../../connect_db.php");

$te=$id;
$fecha=date('Y-m-d');
date_default_timezone_set ('America/Bogota');
require("../../connect_db.php");
$id_tesis=$_POST['id_tesis'];

if($_FILES["archivo"]["size"]>10000000){
//echo "Solo se permiten archivos menores de 5MB";
echo "2";
}else{

$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo= $_FILES['archivo']['type'];
$tamano_archivo = $_FILES["archivo"]['size'];
$direccion_temporar = $_FILES['archivo']['tmp_name'];
	 $alma="./cifi";	
if($tipo_archivo=='application/pdf'){
    $nombre_archivo=$id_tesis.'.pdf';
    move_uploaded_file($_FILES['archivo']['tmp_name'],"$alma/$nombre_archivo");
  
}else{

$nombre_archivo=$id_tesis.'.doc';
move_uploaded_file($_FILES['archivo']['tmp_name'],"$alma/$nombre_archivo"); 
}


}
$act=$nombre_archivo;

	$sentencia="update cifi set   id_tesis='$id_tesis', carta='$carta', id_proyecto='$id_proyecto', actas='$actas' , certi_CIFI='$certi_CIFI', ponencia_fac='$ponencia_fac' , ponencia_nal='$ponencia_nal' , ponencia_int='$ponencia_int' , articulo='$articulo' , cap_libro='$cap_libro',fecha='$fecha',act='$act',oti='$oti' where id='$te' ";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$resent=mysqli_query($mysqli,$sentencia);


	if ($resent==null) {
		/*
		echo "Error de procesamiento no se han actualizado los datos";
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: dinvestigar.php");
		
		echo "<script>location.href='dinvestigar.php'</script>";
		*/
		echo "0";
	}else {
		/*
		echo '<script>alert("EDICION TERMINADA")</script> ';
		echo "<script>location.href='dinvestigar.php'</script>";
		*/
		echo "1";
	}

?>