<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.html");
}/*elseif ($_SESSION['rol']==2) {
	header("Location:index2.php");
}*/
$pr=$_SESSION['id'];
?>
<html lang="en">
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
<body data-offset="40" background="images/fondotot.jpg" style="background-attachment: fixed">
<div class="well well-small">
<?php
	require("../../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
				$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 utf8_decode($programa=$arreglo[11]);
}
	?>

<div class="card card-danger pt-2 pb-2 pl-2 p">
              <div class="card-header" style="background:#343a40;">
                <h3 class="card-title"> Eliminar usuario</h3>
              </div>
              <div class="card-body">

              <div class="alert alert-warning" role="alert">
                  ¿Está seguro que quiere borrar el usuario con la siguiente información?
              </div>

				<?php
					extract($_GET);
					require("../../connect_db.php");
					$sql="SELECT * FROM login WHERE id=$id";
					$ressql=mysqli_query($mysqli,$sql);
					while ($row=mysqli_fetch_row ($ressql)){
							$id=$row[0];
							$cedula=$row[1];
							$TipoUsuario=$row[2];
							$user=$row[3];
							$email=$row[4];
							//$pasadmin=$row[5];
							$pasdir=$row[9];
							//$pasjur=$row[7];
							//$pascor=$row[8];
							//$pass=$row[9];
							$telefono=$row[10];
							$programa=$row[11];
							$fechadenacimiento=$row[12];
							
								}

					?>

              <div >
				<?php $fecha=date("Y-m-d");?>
      			<form  autocomplete="off" action="ejecu_elim_user_coor.php" method="post">
                  <div class="row">

                  <div class="col-3">
                        <label>Id:</label>
                        <input type="text"  class="form-control" name="id" value= "<?php echo $id ?>" readonly="readonly">
                  </div>

				  <div class="col-3">
                        <label>Cedula:</label>
                        <input type="text"  class="form-control" name="cedula" value="<?php echo $cedula?>"readonly="readonly">
                  </div>

                  <div class="col-6">
						<label>Nombre: </label>
						<input type="text"  class="form-control" name="user" value="<?php echo $user?>" readonly="readonly">
				  </div>
				  
				  <div class="col-6">
						<label>Usuario: </label>
						<input type="text"  class="form-control" name="email" value="<?php echo $email?>" readonly="readonly">
				  </div>
				  
				  <div class="col-6">
						<label>Password: </label>
						<input type="text"  class="form-control" name="pasdir" value="<?php echo $pasdir?>"readonly="readonly">
				  </div>
				  
				  <div class="col-6">
						<label>Tipo de Usuario : </label>
						<input type="text"  class="form-control" name="TipoUsuario" value="<?php echo $TipoUsuario?>" readonly="readonly">
				  </div>
				  
				  <div class="col-6">
						<label>Telefono: </label>
						<input type="text"  class="form-control" name="telefono" value="<?php echo $telefono?>"readonly="readonly">
				  </div>
				  
				  <div class="col-6">
						<label>Programa: </label>
						<input type="text"  class="form-control" name="programa" value="<?php echo $programa?>" readonly="readonly">
				  </div>
				  
				  <div class="col-6">
						<label>Fecha de Nacimiento: </label>
						<input type="date"  class="form-control" name="fechadenacimiento" value="<?php echo $fechadenacimiento?>"readonly="readonly">
                  </div>

					<div class="col-12 pt-2">
						<input type="submit" value="Borrar" class="btn btn-dark"> 
						<input type="button" class="btn btn-dark" value="Volver" name="volver" onclick="history.back()">
					</div>

                 </div>    

                
            </form>
            </div>
                
               
              </div>

</div>





  </body>
</html>

