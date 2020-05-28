<!DOCTYPE html>

<?php


//session_destroy();
session_start();
	@$buscart=$_POST['buscart'];
	@$buscar=$_POST['buscar'];

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
 $coordir=$arreglo[4];
 $passd=$arreglo[8];

 if ($arreglo[2]!='Coordinador') {
	require("../desconectar.php");
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

  

     
</head>



<body>


<div class="card card-danger pt-2 pb-2 pl-2 p">
              <div class="card-header" style="background:#343a40;">
                <h3 class="card-title"> Generar actas de Comite</h3>
              </div>
              <div class="card-body">

              <div id="cpestana1">
				<?php $fecha=date("Y-m-d");?>
                <label>Espacio para la generación - Acta del Comité, por favor seleccione las fechas inicial y final correspondientes para su Acta.</label>
      			<form action="generalminutes.php" method="post">
                  <div class="row">

                  <div class="col-2">
                        <label>Fecha Actual:</label>
                        <input  type="date"  class="form-control" name="fecha" class="fecha" value="<?php echo $fecha;?>" readonly="readonly">
                  </div>

                  <div class="col-2">
                        <label>Fecha Inicial: </label>
                        <input type="date"  class="form-control"  name="fi" class="fi" placeholder=" AAAA-MM-DD" required>
                  </div>

                  <div class="col-2">
                        <label>Fecha Final:</label>
                        <input type="date"  class="form-control"  name="ff" class="ff" placeholder=" AAAA-MM-DD" required>
                  </div>
                
                <div class="col-2">
                        <label>Programa</label>
                        <input type="text"  class="form-control" name="programa" class="programa" value="<?php echo $programa;?>" readonly="readonly"> 
                </div>

                <div class="col-1">
                        <label style="color:#FFFFFF">Id</label>
                        <input type="text"   class="form-control"  name="idc" class="idc" value="<?php echo $pr;?>" readonly="readonly"> <br>
                </div>

                <div class="col-12">
                        <label>Disposiciones</label>
                        <TEXTAREA name="disposiciones" class="form-control" placeholder="Escriba las disposiciones del comité para esta acta..." required></TEXTAREA><br><br>
                </div>

                <div class="col-12">
                    <input type="submit" value="Generar Acta" class="btn btn-dark"> 
                </div>

               <br>

                 </div>    

                
            </form>
            </div>
                
               
              </div>

</div>

        


</body>
    </html>