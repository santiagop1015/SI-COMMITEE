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

    if ($arreglo[2] != 'Postgrado') {
        require("../desconectar.php");
        header("Location:../../index.html");
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Profile</title>
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

    <?php include "../header.php" ?>


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
                        //$posicion_espacio = strpos($usuario, " ");
                        //$usuario=substr($usuario,0,$posicion_espacio);
                        $recortarUsuario = explode(' ',$usuario);
                        echo $recortarUsuario[0];?>
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
                                <a href="postgrado.php" class="nav-link">
                                    <i class="nav-icon fa fa-arrow-left white"></i>
                                    <p class="white">
                                        Volver
                                    </p>
                                </a>
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
        <footer id="footer" class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b><?php echo date('Y')?></b>
            </div>
            <strong>
                Copyright © <a href="../../index.html">SI-COMMITEE</a> 2020-2021</strong>
        </footer>




        <?php include 'chat.php'; ?>

    </div>
    <!-- ./wrapper -->


</body>


<script type="text/javascript" src="chat/chat.js"></script>


</html>