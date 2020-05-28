<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
	header("Location:index.html");
}
$nombre_area=0;
$nombre_eje=0;
?>
<html lang="es">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
<body>
<div class="well well-small">

 <div class="contenedor">

        <body >
        <div >
            <div>

<?php
		extract($_GET);
		require("../../connect_db.php");
		$sql="SELECT * FROM tesis WHERE ID_tesis=$id";
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){

		    	$ID_tesis=$row[0];
		    	$ID_estudiante=$row[1];
				$ID_estudiante1=$row[15];
		    	$proyecto=$row[2];
		    	utf8_decode($titulo_tesis=$row[3]);
		    	$aprob_dir=$row[4];
		    	utf8_decode($ID_directores=$row[5]);
		    	utf8_decode($ID_estado=$row[6]);
                utf8_decode($observaciones=$row[7]);
		    	$archivo=$row[8];
		    	$fecha_propuesta=$row[9];
		    	$fecha_aprob_propuesta=$row[10];
                $fecha_ent_anteproyecto=$row[11];
				$programa=$row[12];
				utf8_decode($jurado1=$row[13]);
				utf8_decode($jurado2=$row[14]);
				$id_area=$row[16];
				$id_eje=$row[17];
				$id_estudiante2=$row[18];
				$terminado=$row[19];
				$nota=$row[20];
				
                    }
 
		 ?>
								<?php
								require("../../connect_db.php");
                                $query = $mysqli -> query ("SELECT * FROM area_inves where id_area='$id_area' ");
                                while ($valores = mysqli_fetch_array($query)) {
                                utf8_decode($nombre_area=$valores[1]);
                                } ?>
								 <?php
								 		require("../../connect_db.php");
                                 $query = $mysqli -> query ("SELECT * FROM ejes_tem where  id_eje='$id_eje'");
                                 while ($valores = mysqli_fetch_array($query)) {
									 utf8_decode($nombre_eje=$valores[1]);
                                 }
								 
								 

                                  ?>


<div class="card card-danger pt-2 pb-2 pl-2 p">
              <div class="card-header" style="background:#343a40;">
                <h3 class="card-title"> Eliminar Documento</h3>
              </div>
              <div class="card-body">

              <div class="alert alert-warning" role="alert">
                  ¿Está seguro que quiere borrar el documento con la siguiente información?
              </div>

            

              <div >
				<?php $fecha=date("Y-m-d");?>
      			<form  autocomplete="off" action="ejec_eli_tesis_coor.php" method="post">
                  <div class="row">

                  <div class="col-2">
                        <label>Id Documento:</label>
                        <input  type="text"  class="form-control" name="id" class="id" value="<?php echo $id;?>" readonly="readonly">
                  </div>

				  <div class="col-2">
                        <label>Id Estudiante:</label>
                        <input  type="text"  class="form-control" name="ID_estudiante" value="<?php echo $ID_estudiante;?>" readonly="readonly">
                  </div>

                  <div class="col-2">
						<label>Id Estudiante 2: </label>
						<input type="number"class="form-control"  name="ID_estudiante1" value="<?php echo $ID_estudiante1?>"   readonly="readonly" >
                  </div>

				  <div class="col-12">
						<label>Titulo</label>
						<TEXTAREA class="form-control" NAME="titulo_tesis"   rows="3" class='input'  readonly="readonly"><?php echo $titulo_tesis?></TEXTAREA>
                 </div>

                 <div class="col-6">
						<label>Director: </label>
						<input type="text"class="form-control"  name="ID_directores" value="<?php echo $ID_directores?>"   readonly="readonly" >
                  </div>

                  <div class="col-6">
						<label>Aprobado por el Director: </label>
						<input type="text" class="form-control"  name="aprob_dir" value="<?php echo $aprob_dir?>"   readonly="readonly" >
                  </div>


                  <div class="col-6">
                        <label>Evaludaor 1: </label>
						<input type="text" class="form-control"  name="jurado1" value="<?php echo $jurado1?>"   readonly="readonly" >
                  </div>

                  <div class="col-6">
                        <label>Evaludaor 2: </label>
						<input type="text" class="form-control"  name="jurado2" value="<?php echo $jurado2?>"   readonly="readonly" >
                  </div>

                  <div class="col-12">
                        <label>Observaciones:</label>
                        <textarea readonly="readonly"   class="form-control" name="observaciones" id="observaciones"  rows="2" readonly="readonly"><?php echo $observaciones?></textarea>
                 </div>

                  <div class="col-6">
                        <label>Línea de Investigación</label>
						<input type="test"class="form-control"  name="nombre_area" value="<?php echo $nombre_area?>"   readonly="readonly" >
                  </div>

                  <div class="col-6">
                        <label>Eje Temático</label>
						<input type="test"class="form-control"  name="nombre_eje" value="<?php echo $nombre_eje?>"   readonly="readonly" >
                  </div>
				  
				  <div class="col-6">
                        <label>Fecha entrega propuesta:</label>
                        <input  readonly="readonly" type="date"  class="form-control" name="fecha_propuesta" id="fecha_propuesta" value="<?php echo $fecha_propuesta;?>">
                  </div>

				  <div class="col-6">
                        <label>Fecha actualización / aprobación propuesta:</label>
                        <input  readonly="readonly" type="date"  class="form-control" name="fecha_aprob_propuesta" id="fecha_aprob_propuesta" value="<?php echo $fecha_aprob_propuesta;?>">
                  </div>

				  <div class="col-6">
                        <label>Fecha entrega Anteproyecto: <small>(Mín 30, max 360 días)</small></label>
                        <input  readonly="readonly" type="date"  class="form-control" name="fecha_ent_anteproyecto" id="fecha_ent_anteproyecto" value="<?php echo $fecha_ent_anteproyecto;?>">
                  </div>

				  <div class="col-6">
                        <label>Fecha entrega proyecto:<small>(Mín 120, max 360 días)</small></label>
                        <input  readonly="readonly" type="date"  class="form-control" name="proyecto" id="proyecto" value="<?php echo $proyecto;?>">
                  </div>

                  <div class="col-6">
                        <label>Estado</label>
                        <input  readonly="readonly" type="test"  class="form-control" name="ID_estado" id="ID_estado" value="<?php echo $ID_estado;?>">
                  </div>


				  <div class="col-6">
                        <label>Nota: <small>(Aplica para sustentación proyecto - Monografía)</small></label>
                        <input readonly="readonly"  type="text"  class="form-control" name="nota" value="<?php echo $nota;?>">
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

