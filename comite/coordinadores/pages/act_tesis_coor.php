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

		 //ojo
		 $sql="SELECT * FROM tesis WHERE ID_estudiante=$ID_estudiante";
		 $ressql=mysqli_query($mysqli,$sql);
		 while ($row=mysqli_fetch_row ($ressql)){
					 utf8_decode($ID_estado=$row[6]);
			 
				 if($ID_estado=='Entrega Propuesta' or $ID_estado=='Correccion Propuesta'){
					 utf8_decode($Pobservaciones=$row[7]);
				 }
				 if($ID_estado=='Entrega Anteproyecto'){
					 utf8_decode($Aobservaciones=$row[7]);
				 }
				 if($ID_estado=='Entrega Proyecto'){
					 utf8_decode($Pyobservaciones=$row[7]);
				 }else{
 
					 utf8_decode($Oobservaciones=$row[7]);
				 }
					  
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
                <h3 class="card-title"> Actualizar Documento</h3>
              </div>
              <div class="card-body">

              <div >
				<?php $fecha=date("Y-m-d");?>
      			<form  autocomplete="off" action="ejec_act_tesis_coor.php" method="post">
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
						<input type="number"class="form-control"  name="ID_estudiante1" value="<?php echo $ID_estudiante1?>"   >
                  </div>

				  <div class="col-2">
                        <label>Opción de grado: </label>
                        <select   class="form-control" name="id_estudiante2" class="id_estudiante2"  value="<?php echo $id_estudiante2?>">
							<option value="0"> Semillero </option>
							<option value="1"> Curso </option>
							<option value="2"> Posgrado </option>
							<option value="3"> Auxiliar </option>
						</select>
                  </div>


				  <div class="col-12">
						<label>Titulo</label>
						<TEXTAREA class="form-control" NAME="titulo_tesis"   rows="3" class='input'><?php echo $titulo_tesis?></TEXTAREA>
                 </div>

				 <div class="col-6">
                        <label>Director: </label>
                        <select class="form-control"  name="ID_directores" id="ID_directores">
							<option value="<?php echo $ID_directores?>"><font color="black"><?php echo $ID_directores?></font></option><font color="black">
							<?php
								require("../../connect_db.php"); 
								$dir="Director";
								$coor="Coordinador";   
								$query = $mysqli -> query ("SELECT * FROM login where (TipoUsuario='$dir' or tipoUsuario='$coor' or tipoUsuario='Cifi')  ORDER BY  user asc");
								while ($valores = mysqli_fetch_array($query)) {

								if (valores[user]!=''){
									$contador=0;
									$query1 = $mysqli -> query ("SELECT * FROM tesis where terminado!=2 and ID_directores='$valores[user]'");
									while ($valores1 = mysqli_fetch_array($query1)) {
									$contador=$contador+1;
									}
								}
								echo '<option value="'.$valores[user].'"><font color="black">'.$valores[user].' - Cant: '.$contador.'</font></option>';
							}
							?></font>
							<option value="No aplica">No aplica</option>
						</select>
                  </div>

				  <div class="col-6">
                        <label>Aprobado por el Director: </label>
                        <select class="form-control"  name="aprob_dir" id="aprob_dir"> 
                                <option value="<?php echo $aprob_dir?>"><?php echo $aprob_dir?></option>
                                <option value="SI">Si</option>
                                <option value="NO">No</option>
                                <option value="No aplica">No aplica</option>
                        </select>
                  </div>

				  <div class="col-6">
                        <label>Evaludaor 1: </label>
                        <select class="form-control" name="jurado1" id="jurado1"> 
                                 <option value="<?php echo $jurado1?>"><?php echo $jurado1?></option>
                                 <?php
		                         utf8_decode($dir="Director");
                                 $query = $mysqli -> query ("SELECT * FROM login where (TipoUsuario='$dir' or tipoUsuario='$coor' or tipoUsuario='Cifi')  ORDER BY   user asc ");
                                 while ($valores = mysqli_fetch_array($query)) {
									 if (valores[user]!=''){
										$contador1=0;
										$query1 = $mysqli -> query ("SELECT * FROM tesis where terminado!=2 and (jurado1='$valores[user]' or jurado2='$valores[user]')");
										while ($valores1 = mysqli_fetch_array($query1)) {
										$contador1=$contador1+1;
										}
									}
									 
									 
                                 echo '<option value="'.$valores[user].'">'.$valores[user].' - Cant: '.$contador1.'</option>';
                                 } ?>
                        </select>
                  </div>

				  <div class="col-6">
                        <label>Evaludaor 2: </label>
                        <select class="form-control" name="jurado2" id="jurado2" > 
                                 <option value="<?php echo $jurado2?>"><?php echo $jurado2?></option>
                                 <?php
		                         utf8_decode($dir="Director");
                                 $query = $mysqli -> query ("SELECT * FROM login where (TipoUsuario='$dir' or tipoUsuario='$coor' or tipoUsuario='Cifi')  ORDER BY  user asc ");
                                 while ($valores = mysqli_fetch_array($query)) {
									 if (valores[user]!=''){
										$contador2=0;
										$query1 = $mysqli -> query ("SELECT * FROM tesis where terminado!=2 and (jurado1='$valores[user]' or jurado2='$valores[user]')");
										while ($valores1 = mysqli_fetch_array($query1)) {
										$contador2=$contador2+1;
										}
									}
                                 echo '<option value="'.$valores[user].'">'.$valores[user].' - Cant: '.$contador2.'</option>';
                                 } ?>
                        </select>
                  </div>

				  <div class="col-6">
                        <label>Tipo:</label>
						<input type="text" class="form-control" name="ID_estado" value="<?php echo $ID_estado?>" readonly="readonly">
                  </div>

				  <div class="col-2">
                        <label>Archivo:</label>
                        <input  type="text"  class="form-control" name="archivo" class="archivo" value="<?php echo $archivo;?>" readonly="readonly">
                  </div>

				  <div class="col-12 pt-2" style="text-align:center">
                        <label><b>Historial/Observaciones</b></label>
                  </div>

				  <div class="col-12">
                        <label>De la Propuesta:</label>
                        <textarea class="form-control" name="Pobservaciones" id="Pobservaciones"  rows="2" readonly="readonly"><?php echo $Pobservaciones?></textarea>
                 </div>

				 <div class="col-12">
                        <label>Del Anteproyecto:</label>
                        <textarea class="form-control" name="Aobservaciones" id="Aobservaciones"  rows="2" readonly="readonly"><?php echo $Aobservaciones?></textarea>
                 </div>

				 <div class="col-12">
                        <label>Del Proyecto:</label>
                        <textarea class="form-control" name="Pyobservaciones" id="Pyobservaciones"  rows="2" readonly="readonly"><?php echo $Pyobservaciones?></textarea>
                 </div>

				 <div class="col-12">
                        <label>Otro:</label>
                        <textarea class="form-control" name="Oobservaciones" id="Oobservaciones"  rows="2" readonly="readonly"><?php echo $Oobservaciones?></textarea>
                 </div>

				 <div class="col-6">
                        <label>Línea de Investigación</label>
                        <select name="id_area" class="form-control"> 
                                 <option value="<?php echo utf8_decode($id_area)?>"><?php echo 'L&iacutenea ' .$id_area. ' : ' .$nombre_area?></option>
                                 <?php
                                 $query = $mysqli -> query ("SELECT * FROM area_inves where   programa='$programa' ORDER BY  id_area ASC ");
                                 while ($valores = mysqli_fetch_array($query)) {
                                 if($nombre_area==''){ $nombre_area=0;}
                                 echo '<option value="'.$valores[id_area].'">'.$valores[id_area].': '.$valores[nombre_area].'</option>';
                                 } ?>
                        </select>
                  </div>

				  <div class="col-6">
                        <label>Eje Temático</label>
                        <select name="id_eje" class="form-control" 
                                 <option value="<?php echo utf8_decode($id_eje)?>"><?php echo 'Eje ' .$id_eje.': ' .$nombre_eje?></option>
                                 <?php
                                 $query = $mysqli -> query ("SELECT * FROM ejes_tem where programa='$programa' ORDER BY  id_eje ASC ");
                                 while ($valores = mysqli_fetch_array($query)) {
                                    if($nombre_eje==''){ $nombre_eje=0;}
                                 echo '<option value="'.$valores[id_eje].'">Línea' .$valores[id_area]. ': Eje ' .$valores[id_eje].': ' .$valores[nombre_eje].'</option>';
                                 } ?>
                        </select>
                  </div>

				  
				  <div class="col-6">
                        <label>Fecha entrega propuesta:</label>
                        <input  type="date"  class="form-control" name="fecha_propuesta" id="fecha_propuesta" value="<?php echo $fecha_propuesta;?>">
                  </div>

				  <div class="col-6">
                        <label>Fecha actualización / aprobación propuesta:</label>
                        <input  type="date"  class="form-control" name="fecha_aprob_propuesta" id="fecha_aprob_propuesta" value="<?php echo $fecha_aprob_propuesta;?>">
                  </div>

				  <div class="col-6">
                        <label>Fecha entrega Anteproyecto: <small>(Mín 30, max 360 días)</small></label>
                        <input  type="date"  class="form-control" name="fecha_ent_anteproyecto" id="fecha_ent_anteproyecto" value="<?php echo $fecha_ent_anteproyecto;?>">
                  </div>

				  <div class="col-6">
                        <label>Fecha entrega proyecto:<small>(Mín 120, max 360 días)</small></label>
                        <input  type="date"  class="form-control" name="proyecto" id="proyecto" value="<?php echo $proyecto;?>">
                  </div>

				  <div class="col-6"> <?php $estab="0";?>
                        <label>Estado inicial: <small>Por Evaluar </small> Cuando el documento se modifica: <small>En Proceso</small></label>
                        <?php
									require("../../connect_db.php"); 
									
				          			$query = $mysqli -> query ("SELECT * FROM estado where id_estado='$terminado'");
				          			while ($valores = mysqli_fetch_array($query)) {
										
				          				$estab=$valores[1];
										if($estab=='0')
										{
											$estab='Por procesar';
										}
				          		}
				        		?>
						<select class="form-control" name="terminado" required> 
								<option></option>
						        <option value="<?php echo $terminado?>"><?php echo $estab?></option>
				        		<?php
									require("../../connect_db.php"); 
				          			$query = $mysqli -> query ("SELECT * FROM estado ORDER BY  id_estado DESC");
				          			while ($valores = mysqli_fetch_array($query)) {
				            		echo '<option value="'.$valores[id_estado].'">'.$valores[nombree].'</option>';
				          		}
				        		?>
				  				<option value="0">No aplica</option>

						</select>
                  </div>

				  <div class="col-6">
                        <label>Nota: <small>(Aplica para sustentación proyecto - Monografía)</small></label>
                        <input  type="text"  class="form-control" name="nota" value="<?php echo $nota;?>">
                  </div>


				  <div class="col-12 pt-2">
                        <label>Señor Coordinador, los cambios en el registro serán notificados vía correo electrónico automáticamente a los interesados</label>
                  </div>

					<div class="col-12 pt-2">
						<input type="submit" value="Guardar" class="btn btn-dark"> 
						<input type="button" class="btn btn-dark" value="Volver" name="volver" onclick="history.back()">
					</div>


                 </div>    

                
            </form>
            </div>
                
               
              </div>

</div>





  </body>
</html>

