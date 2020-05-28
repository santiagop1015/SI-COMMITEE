<!DOCTYPE html>

<?php


session_start();
	@$buscart=$_POST['buscart'];
	@$buscar=$_POST['buscar'];

date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../../connect_db.php");
$sql=("SELECT * FROM login where id='$pr'");
$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
utf8_decode($programa=$arreglo[11]);
$coordir=$arreglo[4];
$passd=$arreglo[8];

if ($arreglo[2]!='Coordinador') {
require("desconectar.php");
header("Location:index.html");
}
}


?>

<html>
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
</html>

<div class="card card-danger pt-2 pb-2 pl-2 p" >
              <div class="card-header" style="background:#343a40;">
            <h3 class="card-title">Documentos Auxiliares de Investigación</h3>
        </div>
        <div class="card-body">

            <form autocomplete="off">
                <div class="col-6" >
                <div class="form-group">
                    <label>Buscar por titulo:</label>
                    <div class="input-group mb-3" >
                    <div class="input-group-prepend">
                        <input type="submit" value="Buscar" class="btn btn-dark"> 
                    </div>
                        <input type="text" class="form-control"  name="buscar" value="<?php echo $buscar?>">
                    </div>
                </div>
                </div>
            </form>

            <div class="row">
            
            <?php
            $total=0;
            //ToDo: Delete query
            // $sql=("SELECT * FROM tesis limit 10");

            $sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscar%' and programa='$programa' and ID_Estudiante2=3 and (ID_estado='Entrega Monografia' or ID_estado='Entrega Propuesta' or ID_estado='Correccion Propuesta' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto' or ID_estado='Entrega Anteproyecto' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");
            $query=mysqli_query($mysqli,$sql);
            $certi_CIFI = ""; //ToDo            
                ?>
                
                <table class="table table-bordered  table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Título</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Disposiciones</th>
                        <th scope="col">CIFI</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <?php 
                    echo "<tbody>";
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						$ID_tesis=$arreglo[0];

					/*	$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
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
					}else {
							$alma="./otros";	
						}	
						echo "<tr>";
				    	echo "<td>$arreglo[3]</td>";
				    	echo "<td>$arreglo[6]</td>";
                        echo "<td>$arreglo[7]</td>";
                        echo "<td>$certi_CIFI</td>";
				    	echo "<td> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='../images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</tbody></table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
						
			?>

            </div>
        </div>
    <!-- /.card-body -->
    </div>