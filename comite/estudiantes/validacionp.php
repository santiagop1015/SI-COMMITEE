<html>
<?php
session_start();

if (@!$_SESSION['user']) {
    header("Location:index.php");
}/*elseif ($_SESSION['rol']==2) {
    header("Location:index2.php");
}*/
$user=$_SESSION['id'];
$pr=$_SESSION['id'];
?>

<head>
    <meta charset="utf-8">
    <title>Fullscreen Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

</head>

<body bgcolor="gray">
    <?php 
            require("../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
                $query=mysqli_query($mysqli,$sql);
                while($arreglo=mysqli_fetch_array($query)){
                                            $ced=$arreglo[1];
                                          }       
     ?>
    <?php
date_default_timezone_set ('America/Bogota');
$conexion = $mysqli;
if($_FILES["archivo"]["size"]>10000000){
echo "Solo se permiten archivos menores de 5MB";
}else{
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo= $_FILES['archivo']['type'];
$tamano_archivo = $_FILES["archivo"]['size'];
$direccion_temporar = $_FILES['archivo']['tmp_name'];
$Observaciones="Por definir";
$ID_directores=$_POST['ID_directores'];
$id_estudiante2=$_POST['id_estudiante2'];
$fecha_propuesta= $_POST['fecha_propuesta'];
$fecha_aprob_propuesta= $_POST['fecha_aprob_propuesta'];
$terminado=6;
$carp= $_POST['ID_estado'];
if($carp=="Entrega Propuesta" or $carp=="Correccion Propuesta"){
    	 $alma="./propuestas";
    	 $nombre_archivo=$ced.'.pdf';
     }
        else if($carp=="Entrega Anteproyecto" or $carp=="Correccion Anteproyecto")
        {
        	 $alma="./anteproyectos";
        	 $nombre_archivo=$ced.'.pdf';
        }else if($carp=="Entrega Proyecto" or $carp=="Correccion Proyecto")
        {
        	 $alma="./proyectos";
        	 $nombre_archivo=$ced.'.pdf';
        }
        else if($carp=="Certificado de Notas")
        {
        	 $alma="./certinotas";
        	 $nombre_archivo=$ced.'.pdf';
        }else if($carp=="Certificado terminacion Materias")
        {
        	 $alma="./certimat";
        	 $nombre_archivo=$ced.'.pdf';
        }else if($carp=="Prorroga")
        {
        	 $alma="./prorrogas";
        	 $nombre_archivo=$ced.'.pdf';
        }else {
        	 $alma="./otros";	
        	 $nombre_archivo=$nombre_archivo;
        }




if($tipo_archivo=='application/pdf'){
    //$nombre_archivo=$ced.'.pdf';
    move_uploaded_file($_FILES['archivo']['tmp_name'],"$alma/$nombre_archivo");
   
}else{

//$nombre_archivo=$ced.'.doc';
move_uploaded_file($_FILES['archivo']['tmp_name'],"$alma/$nombre_archivo"); 
}


}

mysqli_query($conexion,"insert into tesis(Titulo_tesis, ID_estudiante,ID_estado,archivo, Observaciones,fecha_propuesta,fecha_aprob_propuesta, ID_directores,  programa, ID_estudiante1, id_estudiante2, terminado ) values
('$_REQUEST[Titulo_tesis]','$_REQUEST[ID_estudiante]','$_REQUEST[ID_estado]','$nombre_archivo ','$Observaciones ', '$fecha_propuesta', '$fecha_aprob_propuesta', '$ID_directores', '$_REQUEST[programa]', '$_REQUEST[ID_estudiante1]', $id_estudiante2, '$_REQUEST[terminado]')") 
or die("Problemas en el select".mysqli_error($conexion));



mysqli_close($conexion);
echo '<script language="javascript">alert("Registro exitoso...");</script>';
//echo "Registro exitoso...";
header('Location: estudiante.php');
?>






</body>
</form>
</font>
</td>

</body>

</html>