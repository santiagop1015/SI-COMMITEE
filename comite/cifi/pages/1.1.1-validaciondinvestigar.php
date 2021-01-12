<?php
session_start();

if (@!$_SESSION['user']) {
    header("Location:../../../index.html");
}
$user=$_SESSION['id'];
$pr=$_SESSION['id'];

require("../../connect_db.php");
$sql=("SELECT * FROM login where id='$pr'");
$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 $ced=$arreglo[1];
}       
date_default_timezone_set ('America/Bogota');
//require("connect_db.php");
$id_tesis=$_POST['id_tesis'];;

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

	
				
mysqli_query($mysqli,"insert into cifi(id_tesis, carta,id_proyecto,certi_CIFI, ponencia_fac,ponencia_nal, ponencia_int,  articulo, cap_libro, fecha, act, oti ) values
('$_REQUEST[id_tesis]','$_REQUEST[carta]','$_REQUEST[id_proyecto]','$_REQUEST[certi_CIFI]','$_REQUEST[ponencia_fac]', '$_REQUEST[ponencia_nal]', '$_REQUEST[ponencia_int]', '$_REQUEST[articulo]', '$_REQUEST[cap_libro]', '$_REQUEST[fecha]','$act','$_REQUEST[oti]')") 
or die("Problemas en el select".mysqli_error($mysqli));



mysqli_close($mysqli);
//echo '<script language="javascript">alert("Registro exitoso...");</script>';
echo "1";

//header('Location: dinvestigar.php');
?>