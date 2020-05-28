<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.php");
}
date_default_timezone_set ('America/Bogota');
		extract($_GET);
//$est=$_SESSION['id'];
require("../../connect_db.php");
$nota=0;
                $sql=("SELECT * FROM login where id='$est'");
				$query=mysqli_query($mysqli,$sql);
				while($arreglo=mysqli_fetch_array($query)){
				 $programa=$arreglo[11];
				 $fecha=date("d-m-Y H:i:s");
				 $user=$arreglo[3];
				}

				$sql=("SELECT * FROM tesis where ID_estudiante='$est' and nota>0");
				$query=mysqli_query($mysqli,$sql);
				while($arreglo1=mysqli_fetch_array($query)){
				 $nota=$arreglo1[20];
				 
				}
				if($nota>0)
				{
					$Estadoest='Graduado';
				}else{
					$Estadoest='En proceso';
				}
?>
<html lang="es">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<head>



<div class="card card-danger pt-2 pb-2 pl-2 p" >
              <div class="card-header" style="background:#343a40;">
                <h3 class="card-title">  Estado Actual de <?php echo $user?> : <?php echo $Estadoest?></h3>
              </div>
              <div class="card-body">

                <div class="row">
                   
                <?php
        $total=0;

				$sql=("SELECT * FROM tesis where ID_estudiante='$est' or ID_estudiante1='$est'");
                $query=mysqli_query($mysqli,$sql);
                
                ?> 
                    
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Título Documento</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Disposiciones</th>
                            <th scope="col">Archivo</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">CIFI</th>
                            </tr>
                        </thead>

					<?php 
					echo "<tbody>";
					while($arreglo=mysqli_fetch_array($query)){
							 	$ID_tesis=$arreglo[0];
								$id_estudiante2=$arreglo[18];
								/*$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
								$query=mysqli_query($mysqli,$sql);
								while($arreglo1=mysqli_fetch_array($query)){
								 $certi_CIFI=$arreglo1[5];
								}*/
					if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
						 $alma="./propuestas";
					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
					{
						 $alma="./anteproyectos";
					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
					{
						 $alma="./proyectos";
					}else if($arreglo[6]=="Certificado de Notas")
					{
						 $alma="./certinotas";
					}else if($arreglo[6]=="Certificado terminacion Materias")
					{
						 $alma="./certimat";
					}else if($arreglo[6]=="Prorroga")
					{
						 $alma="./prorrogas";
					}else {
						 $alma="./otros";	
					}

					
				if($id_estudiante2==1 or $id_estudiante2==3)
				{
				
				  	echo "<tr>";
				    	echo "<td>$arreglo[3]</td>";
				    	//echo "<td>$arreglo[5]</td>";
				    	echo "<td>$arreglo[6]</td>";
				    	echo "<td>$arreglo[7]</td>";
				    	echo "<td><a href=$alma/$arreglo[8]>$arreglo[8]</a></td>";
				    	echo "<td>$arreglo[9]</td>";
				    	echo "<td>En Proceso </td>";
                       /* echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";
                        echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]'><img src='images/pdf.png' width='20'  height='20'  class='img-rounded'></td>";*/
					echo "</tr>";
				}else{
					echo "<tr>";
				    	echo "<td>$arreglo[3]</td>";
				    	//echo "<td>$arreglo[5]</td>";
				    	echo "<td>$arreglo[6]</td>";
				    	echo "<td>$arreglo[7]</td>";
				    	echo "<td><a href=$alma/$arreglo[8]>$arreglo[8]</a></td>";
				    	echo "<td>$arreglo[9]</td>";
				    	echo "<td>No Aplica </td>";
                        /*echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";
                        echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]'><img src='images/pdf.png' width='20'  height='20'  class='img-rounded'></td>";*/
					echo "</tr>";
					
				}	

				}
				echo "</tbody></table>";
			?>

                </div>
              </div>
              <!-- /.card-body -->
            </div>

</body>
</html>