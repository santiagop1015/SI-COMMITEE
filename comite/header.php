<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
if (@!$_SESSION['user']) {
    header("Location:../index.html");
}
require("connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);
while ($arreglo = mysqli_fetch_array($query)) {
    $tipoUser = $arreglo[2];
} 
?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#B42A2A; color: white;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars white"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <!-- Alerts Student -->
        <?php
    if($tipoUser == "Estudiante") {
    ?>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-bell white"></i>
                <span id="IdNumberofAlerts" class="badge badge-danger navbar-badge">3</span>
            </a>
            <?php
            $outAlerts;
            $count_rows = 0;
            $querytesis = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr");
            while ($arregloIdTesistoEval = mysqli_fetch_array($querytesis)) {
                //$contador=$contador+1;
                  //var_dump($arregloIdTesistoEval);
                $Id_tesistoEval = $arregloIdTesistoEval[0];
               // echo "SELECT * FROM evaluacion where Id_tesis=$Id_tesistoEval";
               //$queryevaluacion = $mysqli->query("SELECT * FROM evaluacion where Id_tesis=$Id_tesistoEval"); 1-1927-1926-1950
               $queryevaluacion = $mysqli->query("SELECT * FROM evaluacion where Id_tesis=$Id_tesistoEval and (concepto != 0 or concepto != '')");
               while ($arregloEval = mysqli_fetch_array($queryevaluacion)) {
                //$contador=$contador+1;
                //  var_dump($valores);
                $concepto = $arregloEval[13];
                $fecha_evaluacion = $arregloEval[16];
                $outAlerts = '<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <a href="../archivos/pdf/vereval.php?id='.$Id_tesistoEval.'" class="dropdown-item" target="_blank">
                    <!-- Message Start -->
                    <div class="media" title="'.$arregloIdTesistoEval[3].'">

                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Evaluacion Realizada
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">'.substr($arregloIdTesistoEval[3], 0, 30).'...'.'</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>'.$fecha_evaluacion.'</p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
            </div>';

            $count_rows = $count_rows + 1;
              }
            }

        echo '<script>
          document.getElementById("IdNumberofAlerts").innerHTML = "'.$count_rows.'";
        </script>';
           // $queryevaluacion = $mysqli->query("SELECT * FROM evaluacion where Id_tesis=$Id_tesistoEval");
           
           //$output .=
           /* while ($arregloConcept = mysqli_fetch_array($queryevaluacion)) {
                //$contador=$contador+1;
                //  var_dump($valores);
                //$concepto = $arregloConcept[14];
                //var_dump($arregloConcept);
               /* if(strpos($concepto, 'aprobado')){
                    echo "encontrado aprobado";
                }*/
                
          //  }
          echo $outAlerts;
            ?>
            
        </li>


        <?php    
    }
    ?>
        <!-- Close Alerts Student -->
        <!-- Messages Dropdown Menu -->
        <li class="nav-item">
            <a id="idAnclaIconHelp" class="nav-link" data-toggle="modal" data-target="#IdButtonHelp">
                <i id="idIconClassHelp" class="far fa-question-circle white"></i>
            </a>
            <script>
            window.addEventListener('load', iniciar, false);

            function iniciar() {
                var AnclaHelp = document.getElementById("idAnclaIconHelp");
                AnclaHelp.addEventListener('mouseover', overHelp, false);
                AnclaHelp.addEventListener('mouseout', outHelp, false);
            }

            function overHelp() {
                var IconHelp = document.getElementById('idIconClassHelp');
                IconHelp.className = "fas fa-question-circle white";
            }

            function outHelp() {
                var IconHelp = document.getElementById('idIconClassHelp');
                IconHelp.className = "far fa-question-circle white";
            }
            </script>
        </li>
        <li class="nav-item">
            <a id="idChatIcon" class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i id="idIconClassChat" class="far fa-comments white"></i>
            </a>
            <script>
            $(document).on("click", "#idChatIcon", function() {
                var iconChatBar = document.getElementById("idIconClassChat");
                if (iconChatBar.className == "far fa-comments white") {
                    iconChatBar.className = "fas fa-comments white";
                } else {
                    iconChatBar.className = "far fa-comments white";
                }
            });
            </script>
        </li>
        <li class="nav-item dropdown">
            <a id="idAnclaIconLogout" class="nav-link" data-toggle="modal" data-target="#idModalLogout">
                <i id="idIconLogout" class="fas fa-door-closed white"></i>
            </a>
            <script>
            window.addEventListener('load', iniciar, false);

            function iniciar() {
                var AnclaLogout = document.getElementById('idAnclaIconLogout');
                AnclaLogout.addEventListener('mouseover', overLogout, false);
                AnclaLogout.addEventListener('mouseout', outLogout, false);
            }

            function overLogout() {
                var IconLogout = document.getElementById('idIconLogout');
                IconLogout.className = "fas fa-door-open white";
            }

            function outLogout() {
                var IconLogout = document.getElementById('idIconLogout');
                IconLogout.className = "fas fa-door-closed white";
            }
            </script>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Modal cerrar sesion -->
<div class="modal fade" id="idModalLogout" tabindex="-1" role="dialog" aria-labelledby="idModalLogoutTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">¿Seguro que quieres salir?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-success"
                    onclick="window.location.href='../desconectar.php'">Si</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal cerrar sesion-->

<!-- Modal Help -->
<div class="modal fade" id="IdButtonHelp" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Ayuda</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="container-fluid" style="background-color: #f4f6f9; padding: 15px 15px 15px 15px;">
                <div class="row">
                    <div class="col-md-6">
                        <div class="callout callout-info" style="border-left-color: #B42A2A;">
                            Este es un recurso para estar informado de lo que esta sucediendo en el
                            comite, por favor solo comentarios académicos
                        </div>
                        <div class="card card-warning">
                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                <h5 class="card-title">Envíenos un comentario!</h5>
                            </div>

                            <div class="card-body">
                                <form id="idFormComen">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <?php
                                                        $hoy = date("Y-m-d");;
                                                        ?>
                                            <div class="form-group">
                                                <label>Fecha</label>
                                                <input type="text" name="fecha" class="form-control"
                                                    value="<?php echo $hoy; ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Usuario</label>
                                                <input type="text" name="user" class="form-control"
                                                    placeholder="Nombre Estudiante.."
                                                    value="<?php echo utf8_decode($_SESSION['user']); ?>"
                                                    readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <!-- text input -->
                                            <div class="form-group">
                                                <label>Carrera</label>
                                                <input type="text" name="programa" class="form-control"
                                                    placeholder="Nombre Estudiante.."
                                                    value="<?php echo utf8_decode($programa); ?>" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <!-- text input -->
                                            <div class="form-group">

                                                <textarea id="idTextAreaComen" class="form-control" rows="6"
                                                    name="comen" cols="29" placeholder="Escriba su comentario"
                                                    aria-required="true"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-footer">
                                        <!--  <button type="submit" class="btn btn-default"
                                                    name="enviar">Enviar</button>
                                                    -->
                                        <div id="idBoxComen" class="alert alert-danger alert-dismissible mt-6"
                                            style="Display: None;">
                                            <h5>
                                                <i id="idIConBoxComen" class="icon fas fa-ban"></i>
                                                Alerta
                                            </h5>
                                            <p id="idMessageComen"></p>

                                        </div>
                                        <button id="idButtonEnviarComen" type="submit"
                                            class="btn btn-primary float-right">Enviar Comentario</button>
                                    </div>

                                </form>
                                <script>
                                $(document).ready(function() {
                                    enviarComen();
                                });
                                var enviarComen = function() {
                                    $("#idButtonEnviarComen").on("click", function(e) {
                                        e.preventDefault();
                                        //alert("123");
                                        var pharafComen = document.getElementById("idMessageComen");
                                        var BoxComen = document.getElementById("idBoxComen");
                                        var iconBoxComen = document.getElementById("idIConBoxComen");
                                        var paqueteDeDatos = new FormData();
                                        var other_data = $("#idFormComen").serializeArray();

                                        $.each(other_data, function(key, input) {
                                            paqueteDeDatos.append(input.name, input.value);
                                        });

                                        // console.log(other_data);
                                        //other_data.

                                        if (other_data[3].value.length <= 0) {
                                            //   alert("Comentario vacio");
                                            pharafComen.innerHTML = "Ingrese un comentario";
                                            BoxComen.style.display = "Block";
                                            BoxComen.className =
                                                "alert alert-danger alert-dismissible mt-6";
                                            iconBoxComen.className = "icon fas fa-ban";
                                        } else {
                                            $.ajax({
                                                type: "POST",
                                                contentType: false,
                                                processData: false,
                                                cache: false,
                                                url: "enviarmsgcoor.php",
                                                data: paqueteDeDatos,
                                            }).done(function(info) {
                                                //console.log(info);

                                                if (info == 1) {
                                                    pharafComen.innerHTML =
                                                        "Comentario Registrado Correctamente";
                                                    BoxComen.style.display = "Block";
                                                    BoxComen.className =
                                                        "alert alert-success alert-dismissible";
                                                    iconBoxComen.className = "icon fas fa-check";
                                                    document.getElementById("idTextAreaComen")
                                                        .value = "";
                                                } else {
                                                    pharafComen.innerHTML = info;
                                                    BoxComen.style.display = "Block";
                                                    BoxComen.className =
                                                        "alert alert-danger alert-dismissible";
                                                    iconBoxComen.className = "icon fas fa-ban";
                                                    pharafComen.innerHTML =
                                                        "No fue posible registrar su comentario, por favor contacte al administrador del sistema";
                                                }
                                            });
                                        }
                                    });
                                };
                                </script>

                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="callout callout-info" style="border-left-color: #B42A2A;">
                            Para solicitudes y/o casos especiales, por favor enviar correo
                            electronico
                            al comite de su programa, para ayuda con el SI-COMMITTEE, envie un
                            correo a
                            pabloe.carrenoh@unilibre.edu.co
                        </div>
                        <div class="card card-warning">
                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                <h5 class="card-title">Documentos</h5>
                            </div>
                            <div class="card-body">



                                Documentos: <br><br>
                                <li>
                                    <a href="../modelo/Reglamento.pdf" style="color: blue;" target="_blanck">Reglamento
                                        v3.0</a>
                                </li>
                                <h5 class="mt-2">Antes de marzo de 2019</h5>
                                <li>
                                    <a href="../modelo/reglamento-grados-ingenieria-2019.pdf" style="color: blue;"
                                        target="_blanck">Reglamento
                                        v4.0 2019</a>
                                </li>
                                <h5 class="mt-2">A partir de marzo de 2019</h5>
                                <li>
                                    <a href="../modelo/propuesta.docx" style="color: blue;" target="_blanck">Formato
                                        presentacion Propuesta</a>
                                </li>
                                <li>
                                    <a href="../modelo/guia_anteproyecto.pdf" style="color: blue;" target="_blanck">Guia
                                        Elaboracion Anteproyecto</a>
                                </li>
                                <li>
                                    <a href="../modelo/guia_documento.pdf" style="color: blue;" target="_blanck">Guia
                                        Elaboracion documento Final</a>
                                </li>
                                <li>
                                    <a href="../modelo/rubrica-poster.docx" style="color: blue;"
                                        target="_blanck">Rubrica
                                        - Presentación de Póster</a>
                                </li>




                                <!-- /.box -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-warning">
                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                <h5 class="card-title">Documentacion</h5>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <!--<iframe
                                        src="https://docs.google.com/viewer?url=http://sicomite.unilibre.edu.co/committeees.pdf&embedded=true"
                                        width="100%" height="600" style="border: none;"></iframe> -->
                                    <a href="../modelo/committeees.pdf" style="color: blue;"
                                        target="_blanck">Descargar..</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-warning">
                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                <h5 class="card-title">Información General</h5>
                            </div>
                            <div class="card-body">
                                <center>
                                    <h5><b>Comite de proyectos de grado</b></h5>

                                    <br>
                                    <b>Ambiental-Industrial-Mecanica-Sistemas</b>
                                    <br>
                                    Espacio creado para el manejo y colaboración de Proyectos de
                                    grado
                                    <br>
                                    en la
                                    Facultad de Ingeniería de la Universidad Libre

                                </center>


                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-warning">
                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                <h5 class="card-title">Contacto</h5>
                            </div>
                            <div class="card-body">
                                <center>
                                    <b>Ing. Pablo E. Carreño H.</b>
                                    <br>
                                    Webmaster
                                    <br>
                                    pabloe.carreno@unilibre.edu.co
                                    <br>
                                    Programa Ingenieria de Sistemas
                                    <br>
                                    <b>Director:</b>
                                    Mauricio Alonso

                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card">
                            <div class="card-header" style="background-color: #B42A2A; color: white">
                                <h5 class="card-title">Diseño y programación</h5>
                            </div>
                            <div class="card-body">
                                <center>
                                    Ing. Pablo E. Carreño H.
                                    <br>
                                    Ing. Mauricio A. Alonso M.
                                    <br>
                                    Ing. Fabian Blanco G.
                                    <br>
                                    Ing. Fredys A. Simanca H.
                                    <br>
                                    Ing. Santiago Patiño Hernández
                                    <br>
                                    Ing. Victor Cuellar
                                </center>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Help -->