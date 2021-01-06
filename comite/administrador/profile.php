<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../../index.html");
}
date_default_timezone_set('America/Bogota');
$pr = $_SESSION['id'];
$est = $_SESSION['id'];

require("../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);


while ($arreglo = mysqli_fetch_array($query)) {
    //var_dump($arreglo);
    $id = $arreglo[0];
    $cedula = $arreglo[1];
    $correo = $arreglo[4];
    $password = $arreglo[7];
    $tipoUsuario = $arreglo[2];
    $telefono = $arreglo[10];
    $programa = $arreglo[11];
    $fechaNacimiento = $arreglo[12];

    $nombre = $arreglo[3];
    
    $fecha = date("d-m-Y H:i:s");

    $foto = $arreglo[14];

    if ($arreglo[2] != 'Administrador') {
        require("../desconectar.php");
        header("Location:../../index.html");
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Secretaria</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>


    <!-- Ayuda -- CSS -->
    <script rel="stylesheet" src="dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="dist/css/Help/font-awesome.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/Help/_all-skins.min.css">


</head>
<style>
.white {
    color: white;
}
</style>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->
<script src="../LocalSources/js/jQuery/2.0.3/jquery.min.js"></script>
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<script src="../LocalSources/js/bootstrap.min.js"></script>

<script>

</script>


<body class="hold-transition sidebar-mini">

    <div class="loader"></div>
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light"
            style="background-color:#B42A2A; color: white;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars white"></i></a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
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
                    <a id="idChatIcon" class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"
                        role="button">
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
                                                            value="<?php echo utf8_decode($programa); ?>"
                                                            readonly="readonly">
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
                                                var iconBoxComen = document.getElementById(
                                                    "idIConBoxComen");
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
                                                        //  console.log(info);

                                                        if (info == 1) {
                                                            pharafComen.innerHTML =
                                                                "Comentario Registrado Correctamente";
                                                            BoxComen.style.display = "Block";
                                                            BoxComen.className =
                                                                "alert alert-success alert-dismissible";
                                                            iconBoxComen.className =
                                                                "icon fas fa-check";
                                                            document.getElementById(
                                                                "idTextAreaComen").value = "";
                                                        } else {
                                                            pharaf.innerHTML = info;
                                                            cardMessages.style.display = "Block";
                                                            cardMessages.className =
                                                                "alert alert-danger alert-dismissible";
                                                            iconBox.className = "icon fas fa-ban";
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
                                            <a href="../modelo/Reglamento.pdf" style="color: blue;"
                                                target="_blanck">Reglamento v3.0</a>
                                        </li>
                                        <h5 class="mt-2">Antes de marzo de 2019</h5>
                                        <li>
                                            <a href="../modelo/reglamento-grados-ingenieria-2019.pdf"
                                                style="color: blue;" target="_blanck">Reglamento
                                                v4.0 2019</a>
                                        </li>
                                        <h5 class="mt-2">A partir de marzo de 2019</h5>
                                        <li>
                                            <a href="../modelo/propuesta.docx" style="color: blue;"
                                                target="_blanck">Formato
                                                presentacion Propuesta</a>
                                        </li>
                                        <li>
                                            <a href="../modelo/guia_anteproyecto.pdf" style="color: blue;"
                                                target="_blanck">Guia
                                                Elaboracion Anteproyecto</a>
                                        </li>
                                        <li>
                                            <a href="../modelo/guia_documento.pdf" style="color: blue;"
                                                target="_blanck">Guia
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
                                            <iframe
                                                src="https://docs.google.com/viewer?url=http://sicomite.unilibre.edu.co/committeees.pdf&embedded=true"
                                                width="100%" height="600" style="border: none;"></iframe>

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


        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #343a40; color: white">
            <!-- Brand Logo -->
            <a href="../../index.html" class="brand-link" style="background-color: #343a40; color: white">
                <img src="dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">SI-COMMITEE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="background-color: #343a40; color: white">
                <!-- Sidebar user (optional) -->
                <div class="user-panel pt-3 pb-3 pb-3 d-flex" style="background: rgb(180, 42, 42);">
                    <div class="image">
                        <?php
                    if(empty($foto)) {
                      echo '<img src="dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">';
                    } else {
                    echo '<img src="data:image/jpg;base64,'.base64_encode($foto).'" class="img-circle elevation-2" alt="User Image">';
                    }
                    ?>

                    </div>

                    <div class="info">
                        <a href="#" class="d-block" style="color: white;">
                            <?php 
                        $usuario = $_SESSION['user'];
                        $posicion_espacio = strpos($usuario, " ");
                        $usuario=substr($usuario,0,$posicion_espacio);
                        echo $usuario;?>
                        </a>
                    </div>

                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <div id="pestanas">
                        <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                            <li class="nav-item">
                                <a class="nav-link active">
                                    <i class="nav-icon fa fa-arrow-left white"></i>
                                    <p class="white">
                                        Volver
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview" style="display: none;">
                                    <li class="nav-item">
                                        <a href='javascript:toAdministrador();' class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Administrador</p>
                                        </a>
                                    </li>
                                    <script>
                                    function toAdministrador() {
                                        localStorage.removeItem("number");
                                        location.replace("administrador.php");
                                    }
                                    </script>
                                    <li class="nav-item">
                                        <a href='javascript:toDirectJur();' class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Dir/Jur</p>
                                        </a>
                                    </li>
                                    <script>
                                    function toDirectJur() {
                                        localStorage.removeItem("number");
                                        location.replace("directorcoord.php");
                                    }
                                    </script>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 id="Text">Perfil
                                <i id="idIconEdit" class="fas fa-pencil-alt ml-2"></i>
                                <script>
                                $(document).on("click", "#idIconEdit", function() {
                                    var IconEdit = document.getElementById("idIconEdit");
                                    if (IconEdit.className == "fas fa-pencil-alt ml-2") {
                                        IconEdit.className = "fas fa-save ml-2";
                                        Edit(true);
                                    } else if (IconEdit.className == "fas fa-save ml-2") {
                                        /*IconEdit.className = "fas fa-pencil-alt ml-2";
                                        Edit(false); */
                                        Save();
                                    }
                                });
                                </script>
                                <i id="idIconCancel" class="fas fa-times ml-2 d-none"></i>
                                <script>
                                $(document).on("click", "#idIconCancel", function() {
                                    var IconEdit = document.getElementById("idIconCancel");
                                    Cancel();
                                });
                                </script>
                            </h1>
                        </div>

                    </div>

                </div>

            </section>


            <section class="content">
                <!--   <div class="row">
                        <div class="col-12"> -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <!-- <img id="IdImgPerfil" class="profile-user-img img-fluid img-circle"
                                            src="dist/img/avatar-user.jpg" alt="User profile picture"> -->
                                        <?php
                                        if(empty($foto)) {
                                            ?>
                                        <img id="IdImgPerfil" class="profile-user-img img-fluid img-circle"
                                            src="dist/img/avatar-user.jpg" alt="User profile picture">
                                        <?php
                                        } else {
                                            ?>
                                        <img id="IdImgPerfil" class="profile-user-img img-fluid img-circle"
                                            src="data:image/jpg;base64,<?php echo base64_encode($foto); ?>"
                                            alt="User profile picture">
                                        <?php
                                        }
                                        ?>
                                        <i id="IconEditPerfil" class="fas fa-pencil-alt ml-2 d-none"
                                            style="position: absolute;"></i>

                                        <!-- Editar -->
                                        <!--<img id="IdImgEdit" class="profile-user-img img-fluid img-circle d-none"
                                            src="dist/img/addimage.jpg" alt="User profile picture"> -->
                                        <!-- End Edit image    -->
                                    </div>
                                    <script>
                                    window.addEventListener('load', iniciar, false);

                                    function iniciar() {
                                        var imagenPerfil = document.getElementById('IdImgPerfil');
                                        imagenPerfil.addEventListener('mouseover', over, false);
                                        imagenPerfil.addEventListener('mouseout', out, false);
                                        //var imagenEditar = document.getElementById('IdImgEdit');
                                        //imagenEditar.addEventListener('mouseout', out, false);
                                    }

                                    function over() {
                                        //document.getElementById("IdImgPerfil").classList.add("d-none");
                                        // document.getElementById("IdImgEdit").classList.remove("d-none");
                                        document.getElementById("IconEditPerfil").classList.remove("d-none");
                                    }

                                    function out() {
                                        //document.getElementById("IdImgPerfil").classList.remove("d-none");
                                        //document.getElementById("IdImgEdit").classList.add("d-none");
                                        document.getElementById("IconEditPerfil").classList.add("d-none");
                                    }


                                    $(document).on("click", "#IdImgPerfil", function() {
                                        document.getElementById("idButtonModalActImgPerfil").click();
                                    });
                                    </script>

                                    <button id="idButtonModalActImgPerfil" type="button" class="btn btn-primary d-none"
                                        data-toggle="modal" data-target="#ModalSubirCambiarImagenPerfil"></button>

                                    <!-- Modal Edit Image Profile -->
                                    <div class="modal fade" id="ModalSubirCambiarImagenPerfil" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Subir foto de
                                                        perfil</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form id="formUploadImg" action="profile/save_img.php" method="POST"
                                                    enctype="multipart/form-data">
                                                    <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Seleccione imagen</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" name="Imagen"
                                                                        class="custom-file-input" id="idInputImgUpload"
                                                                        accept="image/png,image/jpeg">
                                                                    <label class="custom-file-label"
                                                                        for="exampleInputFile"
                                                                        id="IdLabelInputImgUpload">Choose file</label>
                                                                    <script>
                                                                    // idInputImgUpload
                                                                    var InputImgUpload = document.getElementById(
                                                                        "idInputImgUpload");
                                                                    var LabelInputImgUpload = document.getElementById(
                                                                        "IdLabelInputImgUpload");

                                                                    InputImgUpload.onchange = function(e) {
                                                                        //alert("Onchanger");
                                                                        var file = $("#idInputImgUpload").prop(
                                                                            "files")[0];
                                                                        var fileName = file.name;
                                                                        // console.log(document.getElementById("idInputImgUpload").value);
                                                                        LabelInputImgUpload.innerHTML = fileName;

                                                                        //var imageType = /image.*/;

                                                                        //console.log(file.type);

                                                                        if (file.type.match("image/png") || file
                                                                            .type.match("image/jpeg")) {
                                                                            //alert("File supported!");
                                                                            document.getElementById(
                                                                                    "idMessageFileNotSupported")
                                                                                .classList.add("d-none");


                                                                            document.getElementById(
                                                                                    "idButtonUploadImage")
                                                                                .disabled = false;

                                                                        } else {
                                                                            //alert("File not supported!");
                                                                            document.getElementById(
                                                                                    "idMessageFileNotSupported")
                                                                                .classList.remove("d-none");

                                                                            document.getElementById(
                                                                                    "idButtonUploadImage")
                                                                                .disabled = true;

                                                                        }
                                                                    };
                                                                    </script>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <p>Solo se admiten archivos .png, .jpg y .jpeg</p>
                                                        <p>Tamaño maximo 40 MB (238 x 250 pixeles)</p>
                                                        <div id="idMessageFileNotSupported"
                                                            class="alert alert-danger mb-1 d-none" role="alert">
                                                            Archivo no soportado
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="idButtonUploadImage" type="submit"
                                                            class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </form>
                                                <script>



                                                </script>

                                            </div>
                                        </div>
                                    </div>

                                    <h3 class="profile-username text-center"><?php echo $nombre; ?></h3>

                                    <p class="text-muted text-center">
                                        <?php echo $tipoUsuario ?>
                                    </p>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->


                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div id="AlertProblemActInfo" class="alert alert-danger mb-3 d-none" role="alert">
                                <h5><i class="icon fas fa-ban"></i> Alerta!</h5>
                                No se logro actualizar la informacion, Intentelo mas tarde (De persistir el error
                                contacte al Adminitrador del SI-COMMITEE)
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Información Actual</h3>
                                </div>
                                <!-- /.card-header -->
                                <script>
                                function Edit(event) {
                                    document.getElementById("idIconCancel").classList.remove("d-none");
                                    var PassLabel = document.getElementById("PassLabel");
                                    var PassInput = document.getElementById("PassInput");
                                    var TelILabel = document.getElementById("TelLabel");
                                    var TelInput = document.getElementById("TelInput");
                                    var FechaNacLabel = document.getElementById("FechaNacLabel");
                                    var FechaNacInput = document.getElementById("FechaNacInput");

                                    if (event) {
                                        PassLabel.classList.add("d-none");
                                        PassInput.classList.remove("d-none");
                                        TelILabel.classList.add("d-none");
                                        TelInput.classList.remove("d-none");
                                        FechaNacLabel.classList.remove("d-none");
                                        FechaNacInput.classList.remove("d-none");
                                    }
                                }

                                function Cancel() {
                                    var IconEdit = document.getElementById("idIconEdit");
                                    IconEdit.className = "fas fa-pencil-alt ml-2";
                                    document.getElementById("idIconCancel").classList.add("d-none");

                                    var PassLabel = document.getElementById("PassLabel");
                                    var PassInput = document.getElementById("PassInput");
                                    var TelILabel = document.getElementById("TelLabel");
                                    var TelInput = document.getElementById("TelInput");
                                    var FechaNacLabel = document.getElementById("FechaNacLabel");
                                    var FechaNacInput = document.getElementById("FechaNacInput");

                                    PassLabel.classList.remove("d-none");
                                    PassInput.classList.add("d-none");
                                    TelILabel.classList.remove("d-none");
                                    TelInput.classList.add("d-none");
                                    FechaNacLabel.classList.remove("d-none");
                                    FechaNacInput.classList.add("d-none");
                                }

                                function Save() {
                                    var PassInput = document.getElementById("PassInput");
                                    var TelInput = document.getElementById("TelInput");
                                    var FechaNacInput = document.getElementById("FechaNacInput");

                                    var Data = [];
                                    var DataPass = {};
                                    var DataTel = {};
                                    var DataFec = {};
                                    DataPass.name = "password";
                                    DataPass.value = PassInput.value;
                                    Data.push(DataPass);

                                    DataTel.name = "telefono";
                                    DataTel.value = TelInput.value;
                                    Data.push(DataTel);

                                    DataFec.name = "fecha nacimiento";
                                    DataFec.value = FechaNacInput.value;
                                    Data.push(DataFec);

                                    /*
                                        Data.push(PassInput.value);
                                        Data.push(TelInput.value);
                                        Data.push(FechaNacInput.value);
                                                                        */
                                    //console.log(Data);

                                    /*var IconEdit = document.getElementById("idIconEdit");
                                    IconEdit.className = "fas fa-pencil-alt ml-2";
                                                document.getElementById("idIconCancel").classList.add(
                                                    "d-none");
                                                    */

                                    var AlertProblemActData = document.getElementById("AlertProblemActInfo");

                                    $.ajax({
                                        type: "POST",
                                        url: "profile/save_data.php",
                                        data: Data,
                                        success: function(data) {
                                            console.log(data);
                                            if (data == "1") {
                                                location.reload();
                                            } else {
                                                AlertProblemActData.classList.remove("d-none");
                                            }
                                        }
                                    });

                                    //--------------------


                                }
                                </script>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-book mr-1"></i> Id</strong>
                                            <p class="text-muted mb-0">
                                                <?php echo $id; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-book mr-1"></i> Cedula</strong>
                                            <p class="text-muted mb-0">
                                                <?php echo $cedula; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-book mr-1"></i> Usuario</strong>
                                            <p class="text-muted mb-0">
                                                <?php echo $correo; ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-book mr-1"></i> Password</strong>
                                            <p id="PassLabel" class="text-muted mb-0">
                                                <?php echo $password; ?>
                                            </p>
                                            <input id="PassInput" class="form-control d-none"
                                                value="<?php echo $password; ?>" />
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-book mr-1"></i> Telefono</strong>
                                            <p id="TelLabel" class="text-muted mb-0">
                                                <?php echo $telefono; ?>
                                            </p>
                                            <input id="TelInput" type="number" class="form-control d-none"
                                                value="<?php echo $telefono; ?>" />
                                        </div>
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-book mr-1"></i> Programa</strong>
                                            <p class="text-muted mb-0">
                                                <?php echo $programa; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <strong><i class="fas fa-book mr-1"></i> Fecha de Nacimiento</strong>
                                            <p id="FechaNacLabel" class="text-muted mb-0">
                                                <?php echo $fechaNacimiento; ?>
                                            </p>
                                            <input id="FechaNacInput" type="date" class="form-control d-none"
                                                value="<?php echo $fechaNacimiento; ?>" />
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>


            </section>

        </div>


        <!-- /.content -->

        <!-- /.content-wrapper -->

        <!-- Footer -->
        <?php include '../footer.php'; ?>
        <!-- /. Footer -->




        <?php include 'chat.php'; ?>

    </div>
    <!-- ./wrapper -->


</body>


<script type="text/javascript" src="chat/chat.js"></script>


</html>