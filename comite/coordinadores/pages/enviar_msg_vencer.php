
<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.html");
}/*elseif ($_SESSION['rol']==2) {
	header("Location:index2.php");
}*/
$usuario=$_SESSION['user'];
extract($_GET);
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

  

     
</head>
<body>


<div class="card card-danger pt-2 pb-2 pl-2 p">
              <div class="card-header" style="background:#343a40;">
                <h3 class="card-title"> Enviar Mensaje a Usuario</h3>
              </div>
              <div class="card-body">

              <div>
                    <?php
                        require("../../connect_db.php");
                        $sql=("SELECT * FROM login where id=$ID_estudiante and programa='$programa' ");
                        $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                            $Correo=$arreglo[4];
                            $estu=$arreglo[3];
                        }
                    ?>
      			<form action="enviarmsgusuvencer.php" method="post">
                  <div class="row">

                  <div class="col-6">
                        <label>De:</label>
                        <input type="text" class="form-control" id="INombre" name="Nombre" value="<?php echo 'Comité proyectos '.$programa;?>" readonly="readonly">
                  </div>

                  <div class="col-6">
                        <label>Para: </label>
                        <input type="text" class="form-control" id="ICorreo" name="Correo" value="<?php echo $Correo;?>" readonly="readonly">
                  </div>

                <div class="col-12">
                        <label>Disposiciones</label>
                        <textarea rows="4" cols="50" class="form-control" id="IMensaje" name="Mensaje"  readonly="readonly">Notificación para <?php echo $estu;?></textarea>
                </div>
                <div class="col-12">
                        <label><b>Señor coordinador este mensaje es una notificacion de recordatorio de vencimiento del documento registrado, por parte del estudiante en mención. <br> Haga clic en Enviar para hacer efectiva la notificación... </b></label>
                </div>

                <div class="col-12 pt-2">
						<input type="submit" value="Enviar" class="btn btn-dark"> 
						<input type="button" class="btn btn-dark" value="Volver" name="volver" onclick="history.back()">
					</div>

               <br>

                 </div>    

                
            </form>
            </div>
                
               
              </div>

</div>


