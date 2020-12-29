<!DOCTYPE html>



<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../Login/index.html");
}
$nombre_area=0;
$nombre_eje=0;

//require '2.1.1-ejec_act_tesis_coor.php';

?>


<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Generar Acta</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../LocalSources/css/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <link href="../../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
    <!-- -->



</head>
<style>
.white {
    color: white;
}
</style>

<body id="idCardAct" onload="getWidth()">

    <div class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white; padding-left: 10px">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                Editar Evaluación</h3>
            <!-- <div class="card-tools">
            </div> -->
        </div>
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
                } 
        ?>
        <?php
				require("../../connect_db.php");
                $query = $mysqli -> query ("SELECT * FROM ejes_tem where  id_eje='$id_eje'");
                while ($valores = mysqli_fetch_array($query)) {
				 utf8_decode($nombre_eje=$valores[1]);
                }
        ?>

        <div class="card-body">
            <form id="idFormActEval" autocomplete="off">
                <!-- action=" echo htmlspecialchars($_SERVER['PHP_SELF']) "
                method="post" -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Id. Documento</label>
                            <input type="text" class="form-control" name="id" value="<?php echo $id?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Id. Estudiante</label>
                            <input type="text" class="form-control" name="ID_estudiante"
                                value="<?php echo $ID_estudiante?>" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Id Estudiante 2:</label>
                            <input type="text" class="form-control" name="ID_estudiante1"
                                value="<?php echo $ID_estudiante1?>" readonly="readonly">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <div class="form-group">
                            <label>Opción de Grado</label>
                            <input type="text" class="form-control" name="id_estudiante2"
                                value="<?php echo $id_estudiante2?>" readonly="readonly">
                        </div>
                        <div class="alert alert-info" style="padding-left: 10px;">
                            <strong>Opcion de grado: </strong>Proyecto - 0, Semillero - 1, Curso - 2, Posgrado - 4,
                            Auxiliar - 3
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Titulo</label>
                            <textarea class="form-control" rows="4" name="titulo_tesis" cols="29"
                                placeholder="Escriba las disposiciones del comité para esta acta..."
                                aria-required="true"><?php echo $titulo_tesis?></textarea>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Director</label>
                            <select class="form-control" name="ID_directores">
                                <option value="<?php echo $ID_directores ?>"><?php echo $ID_directores ?></option>
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
            		            echo '<option value="'.$valores[user].'">'.$valores[user].' - Cant: '.$contador.'</option>';
                                }
                                ?>
                                <option value="No aplica">No aplica</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Aprobado por el director </label>
                            <select class="form-control" name="aprob_dir">
                                <option value="<?php echo $aprob_dir ?>"><?php echo $aprob_dir ?></option>
                                <option value="SI">Si</option>
                                <option value="NO">No</option>
                                <option value="No aplica">No aplica</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Evaluador 1</label>
                            <select class="form-control" name="jurado1">
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
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Evaluador 2</label>
                            <select class="form-control" name="jurado2">
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
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" name="ID_estado" class="form-control" value="<?php echo $ID_estado?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-12 pl-0 pr-0">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Historial / Observaciones</h3>
                            </div>
                            <div class="card-body pl-3 pr-3">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <strong>Propuesta:</strong>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" readonly="readonly" value="<?php 
                                        
                                        if(isset($Pobservaciones)) {
                                            echo "\n".$Pobservaciones;
                                        } else {
                                            echo "Sin observaciones previas";
                                        }
                                        ?>
                                        ">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <strong>Anteproyecto:</strong>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" readonly="readonly" value="<?php 
                                        
                                        if(isset($Aobservaciones)) {
                                            echo "\n".$Aobservaciones;
                                        } else {
                                            echo "Sin observaciones previas";
                                        }
                                        ?>
                                        ">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <strong>Proyecto:</strong>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" readonly="readonly" value="<?php 
                                        
                                        if(isset($Pyobservaciones)) {
                                            echo "\n".$Pyobservaciones;
                                        } else {
                                            echo "Sin observaciones previas";
                                        }
                                        ?>
                                        ">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <strong>Otros:</strong>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" readonly="readonly" value="<?php 
                                        
                                        if(isset($Oobservaciones)) {
                                            echo "\n".$Oobservaciones;
                                        } else {
                                            echo "Sin observaciones previas";
                                        }
                                        ?>
                                        ">
                                </div>
                                <script>
                                function getWidth() {
                                    var elements = document.getElementsByClassName("input-group-text");

                                   // console.log(elements.length);

                                    //  console.log(typeof(elements));
                                    //console.log(elemens[0].clientWidth);
                                    var anchos = [];
                                    for (var a = 0; a < elements.length; a++) {
                                        //  console.log(elements[a].clientWidth);
                                        anchos.push(elements[a].clientWidth);
                                    }
                                    var AnchoMayor = Math.max(...anchos);
                                    for (var b = 0; b < elements.length; b++) {
                                        //  console.log(elements[a].clientWidth);
                                        elements[b].style.width = AnchoMayor + "px";
                                        // anchos.push(elements[b].clientWidth);
                                    }
                                }
                                </script>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" rows="4" name="observaciones" cols="20"
                                            aria-required="true"><?php echo $observaciones?></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Línea de Investigación</label>
                            <select class="form-control" name="id_area">
                                <option value="<?php echo utf8_decode($id_area) ?>">
                                    <?php echo 'L&iacutenea ' .$id_area. ' : ' .$nombre_area ?>
                                </option>
                                <?php
                                 $query = $mysqli -> query ("SELECT * FROM area_inves where   programa='$programa' ORDER BY  id_area ASC ");
                                 while ($valores = mysqli_fetch_array($query)) {
                                 if($nombre_area==''){ $nombre_area=0;}
                                 echo '<option value="'.$valores[id_area].'">'.$valores[id_area].': '.$valores[nombre_area].'</option>';
                                 } ?>
                                <option value="No aplica">No aplica</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Ejé temático</label>
                            <select class="form-control" name="id_eje">
                                <option value="<?php echo utf8_decode($id_eje)?>">
                                    <?php echo 'Eje ' .$id_eje.': ' .$nombre_eje?></option>
                                <?php
                                 $query = $mysqli -> query ("SELECT * FROM ejes_tem where programa='$programa' ORDER BY  id_eje ASC ");
                                 while ($valores = mysqli_fetch_array($query)) {
                                    if($nombre_eje==''){ $nombre_eje=0;}
                                 echo '<option value="'.$valores[id_eje].'">Línea' .$valores[id_area]. ': Eje ' .$valores[id_eje].': ' .$valores[nombre_eje].'</option>';
                                 } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Archivo</label>
                            <input type="text" name="archivo" class="form-control" value="<?php echo $archivo?>"
                                readonly="readonly">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Entrega Propuesta</label>
                            <input type="date" name="fecha_propuesta" class="form-control"
                                value="<?php echo $fecha_propuesta?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Actualización / Aprobación Propuesta</label>
                            <input type="date" name="fecha_aprob_propuesta" class="form-control"
                                value="<?php echo $fecha_aprob_propuesta?>" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Entrega Anteproyecto (min 30, max 360 días)</label>
                            <?php
                                //$date = date('Y-m-d');
                                if(empty($fecha_ent_anteproyecto) || $fecha_ent_anteproyecto == "0000-00-00") {
                                    $date = date('Y-m-d');
                                } else {
                                    $date = $fecha_ent_anteproyecto;
                                }
                                $date_min = strtotime('+30 day', strtotime($date));
                                $date_min = date('Y-m-d', $date_min);

                                $date_max = strtotime('+360 day', strtotime($date));
                                $date_max = date('Y-m-d', $date_max);
                                
                            ?>
                            <input type="date" name="fecha_ent_anteproyecto" class="form-control" min="<?php
                                if(empty($fecha_ent_anteproyecto) || $fecha_ent_anteproyecto == "0000-00-00") {
                                    echo $date_min;
                                } else {
                                    echo $date;
                                }
                                ?>" max="<?php echo $date_max ?>" value="<?php echo $fecha_ent_anteproyecto?>">
                        </div>


                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha Entrega Proyecto (min 120, max 360 días)</label>
                            <?php
                                
                                if(empty($proyecto) || $proyecto == "0000-00-00") {
                                    $date = date('Y-m-d');
                                } else {
                                    $date = $proyecto;
                                }
                               // echo '<br>' . $date;
                                $date_min = strtotime('+120 day', strtotime($date));
                                $date_min = date('Y-m-d', $date_min);

                                $date_max = strtotime('+360 day', strtotime($date));
                                $date_max = date('Y-m-d', $date_max);
                                
                            ?>
                            <input type="date" name="proyecto" class="form-control" min="<?php 
                            if(empty($proyecto) || $proyecto == "0000-00-00") {
                                echo $date_min;
                                } else {
                                   echo $date;
                                } 
                            ?>" max="<?php echo $date_max ?>" value="<?php echo $proyecto?>">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Estado del Documento</label>
                            <div class="alert alert-info" style="padding-left: 10px;">
                                <strong>Estado inicial - </strong>(Por Evaluar), <strong>Cuando el documento se modifica
                                    -
                                </strong>(En proceso)
                            </div>
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
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nota: (Aplica para sustentación proyecto - Monografia)</label>
                            <input type="text" name="nota" class="form-control" value="<?php echo $nota?>">
                        </div>
                        <div class="alert alert-warning" style="padding-left: 10px;">
                            <strong>Señor Coordinador</strong>, los cambios en el registro serán notificados vía correo
                            electrónico automáticamente a los interesados
                        </div>
                    </div>

                </div>
                <div class="card-footer mt-3">
                    <button type="button" class="btn btn-danger float-right" onclick="history.back();">Volver</button>
                    <button id="idActualEval" type="submit" class="btn btn-primary float-right mr-2">Guardar</button>
                    <!--  -->
                    <div id="idSpinner" class="spinner-border text-danger" role="status" style="display: None;">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </form>
        </div>


    </div>
</body>
<script src="../../LocalSources/js/jQuery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);
$(document).ready(function() {
    onSendHeight();
    onSubmitActualizar();
    localStorage.setItem("Mensaje2", null);
});

function onSendHeight(event) {
    var card = document.getElementById("idCardAct");
    //console.log(card.clientHeight);
    localStorage.setItem("evaluar", card.clientHeight);
}

var onSubmitActualizar = function() {
    $("#idFormActEval").on("submit", function(e) {
        e.preventDefault();
        $('#idActualEval').attr("disabled", true);
        //$("#idSpinner").css("display") = 'Block';
        //document.getElementById("idSpinner").display = "Block";
        document.getElementById("idSpinner").style.display = "block";
        //alert('evento submit');

        // ejec_act_tesis_coor

        var other_data = $("#idFormActEval").serializeArray();
        var paqueteDeDatos = new FormData();

        $.each(other_data, function(key, input) {
            paqueteDeDatos.append(input.name, input.value);
        });

        //console.log(other_data);
        //console.log(paqueteDeDatos);

        $.ajax({
            type: "POST",
            contentType: false,
            processData: false,
            cache: false,
            url: "2.1.1-ejec_act_tesis_coor.php",
            data: paqueteDeDatos,
        }).done(function(info) {
            console.log(info);
            if (info === "1") {
                localStorage.setItem("Mensaje2", 1);
                localStorage.setItem("Mensaje2-Title", "Actualizar Evaluación");
                localStorage.setItem("Mensaje2-Message", "Datos actualizados correctamente");
            } else {
                localStorage.setItem("Mensaje2", 0);
                localStorage.setItem("Mensaje2-Title", "Actualizar Evaluación");
                localStorage.setItem("Mensaje2-Message",
                    "Error en el procesamiento, no se actualizaron los datos");
            }
            document.getElementById("idSpinner").style.display = "none";
        });


        /*

                                    $(document).ready(function() {
                                        ActualizarProyect();
                                    });


                                    var ActualizarProyect = function() {
                                        $('#idButtonActualizar').on("click", function(e) {
                                            e.preventDefault();

                                            var other_data = $("#idFormEdit").serializeArray();

                                            var paqueteDeDatos = new FormData();

                                            $.each(other_data, function(key, input) {
                                                paqueteDeDatos.append(input.name, input.value);
                                            });

                                            var Box = document.getElementById("idBox");
                                            var iconBox = document.getElementById("idIConBox");

                                            $.ajax({
                                                type: "POST",
                                                contentType: false,
                                                processData: false,
                                                cache: false,
                                                url: "ejecu_act_tesisdir.php",
                                                data: paqueteDeDatos,
                                            }).done(function(info) {
                                                console.log(info);
                                                if (info === "1") {
                                                    Box.style.display = 'Block';
                                                    Box.className =
                                                        "alert alert-success alert-dismissible";
                                                    iconBox.className = "icon fas fa-check";
                                                    iconBox.innerHTML = "   Edición Completada";
                                                    $('#idButtonActualizar').prop('disabled', true);
                                                } else {
                                                    Box.style.display = 'Block';
                                                    Box.className =
                                                        "alert alert-danger alert-dismissible";
                                                    iconBox.className = "icon fas fa-ban";
                                                    iconBox.innerHTML =
                                                        "   Error en el procesamiento, no se actualizaron los datos";
                                                    $('#idButtonActualizar').prop('disabled',
                                                        false);
                                                }
                                            });

                                        })
                                    }
                                    


        */




    });
}
</script>
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>




</html>