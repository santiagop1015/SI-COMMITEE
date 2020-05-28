<!DOCTYPE html>

<?php
session_start();
	
	@$buscar=$_POST['buscar'];
if (!$_SESSION['user']) {
	header("Location:index.php");
}
$coor=$_SESSION['user'];
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


<div class="card card-danger pt-2 pb-2 pl-2 p"  style="width: 1408px;">
        <div class="card-header" style="background:#343a40;">
            <h3 class="card-title"> Estudiantes</h3>
        </div>
        <div class="card-body">
            
        <form  autocomplete="off">
                    <div class="col-6" >
                    <div class="form-group">
                        <label>Buscar por nombre:</label>
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

                    $sql=("SELECT * FROM login where  user like '%$buscar%'  and programa='$programa' and tipoUsuario='Estudiante' ORDER BY  Id DESC");
                    $query=mysqli_query($mysqli,$sql);

                ?>
                
                <table class="table table-bordered  table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Tipo Usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Programa</th>
                        <th scope="col">Fc Nacimiento</th>
                        <th scope="col">Borrar</th>
                        <th scope="col">Msg</th>
                        <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <?php 
                    echo "<tbody>";
				 while($arreglo=mysqli_fetch_array($query)){
				 	$Correo=$arreglo[4];
				  	echo "<tr>";
				    	echo "<td>$arreglo[0]</td>";
				    	echo "<td>$arreglo[1]</td>";
				    	echo "<td>$arreglo[2]</td>";
				    	echo "<td>$arreglo[3]</td>";
				    	echo "<td>".utf8_decode("$arreglo[4]")."</td>";
				    	echo "<td>$arreglo[10]</td>";
				    	echo "<td>$arreglo[11]</td>";
                        echo "<td>$arreglo[12]</td>";
                        /*echo "<td><a href='actualizarusercoor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";*/
 						echo "<td><a href='elim_user_coorp.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						echo "<td><a href='enviar_msg_coor.php?Correo=$arreglo[4]&programa=$programa'><img src='../images/msg.png' width='30'  height='30' class='img-rounded'</td>";
 						echo "<td><a href='estado_est.php?est=$arreglo[0]'><img src='../images/user.png' width='30'  height='30' class='img-rounded'</td>";
						echo "</tr>";
						$total=$total+1;
				}
                echo "</tbody></table>"; 
			
			?>
            </div>
        </div>
    <!-- /.card-body -->
</div>