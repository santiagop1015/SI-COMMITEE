<!DOCTYPE html>

<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../index.html");
}
    //@$buscart=$_POST['buscart'];
    

	@$buscar=$_POST['buscar'];

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
	header("Location:../../index.html");
}
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Profesores</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>
    .nav-pills .nav-link {
        color: black;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: #fff;
        background-color: #10707f;
    }

    .nav-pills .nav-link:not(.active):hover {
        color: #10707f;
    }
    </style>
</head>

<body id="idCard" style="background-color: #f4f6f9;">
    <div class="btn-group w-100 mb-2">
        <a id="idAnclaReg" class="btn btn-info" href="javascript:onClickManejo(0)"> Registrar Información </a>
        <a id="idAnclaRep" class="btn btn-info" href="javascript:onClickManejo(1)"> Generar Reportes </a>
        <a id="idAnclaAct" class="btn btn-info" href="javascript:onClickManejo(2)"> Act. Mis Datos </a>
        <a id="idAnclaDirJur" class="btn btn-info" href="javascript:onClickManejo(3)"> Dir/Jur </a>
    </div>
    <script>
    function onClickManejo(value, ancla) {
        switch (value) {
            case 0:
                document.getElementById("idAnclaReg").classList.add("active");
                document.getElementById("idAnclaRep").classList.remove("active");
                document.getElementById("idAnclaAct").classList.remove("active");
                document.getElementById("idAnclaDirJur").classList.remove("active");

                document.getElementById("IdDivRegistrarInfo").classList.remove("d-none");
                document.getElementById("IdDivGenerarReportes").classList.add("d-none");
                document.getElementById("IdDivActDatos").classList.add("d-none");
                document.getElementById("IdDivDirJur").classList.add("d-none");
                break;
            case 1:
                document.getElementById("idAnclaReg").classList.remove("active");
                document.getElementById("idAnclaRep").classList.add("active");
                document.getElementById("idAnclaAct").classList.remove("active");
                document.getElementById("idAnclaDirJur").classList.remove("active");

                document.getElementById("IdDivRegistrarInfo").classList.add("d-none");
                document.getElementById("IdDivGenerarReportes").classList.remove("d-none");
                document.getElementById("IdDivActDatos").classList.add("d-none");
                document.getElementById("IdDivDirJur").classList.add("d-none");
                break;
            case 2:
                document.getElementById("idAnclaReg").classList.remove("active");
                document.getElementById("idAnclaRep").classList.remove("active");
                document.getElementById("idAnclaAct").classList.add("active");
                document.getElementById("idAnclaDirJur").classList.remove("active");

                document.getElementById("IdDivRegistrarInfo").classList.add("d-none");
                document.getElementById("IdDivGenerarReportes").classList.add("d-none");
                document.getElementById("IdDivActDatos").classList.remove("d-none");
                document.getElementById("IdDivDirJur").classList.add("d-none");
                break;
            case 3:
                document.getElementById("idAnclaReg").classList.remove("active");
                document.getElementById("idAnclaRep").classList.remove("active");
                document.getElementById("idAnclaAct").classList.remove("active");
                document.getElementById("idAnclaDirJur").classList.add("active");

                document.getElementById("IdDivRegistrarInfo").classList.add("d-none");
                document.getElementById("IdDivGenerarReportes").classList.add("d-none");
                document.getElementById("IdDivActDatos").classList.add("d-none");
                document.getElementById("IdDivDirJur").classList.remove("d-none");
                break;
            default:
                1

                break;
        }
        Evaluar();

    }
    </script>
    <div id="IdDivRegistrarInfo" class="mt-2 d-none">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="#tabEstudiante" data-toggle="tab">
                                    <i class="fas fa-user-graduate"></i> Estudiante
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabProfesor" data-toggle="tab">
                                    <i class="fas fa-chalkboard-teacher"></i> Profesor
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabAsistente" data-toggle="tab">
                                    <i class="fas fa-user-tie"></i> Asistente
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabLinea" data-toggle="tab">
                                    <i class="fas fa-flask"></i> Linea Investigación
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabEje" data-toggle="tab">
                                    <i class="fab fa-buffer"></i> Eje Tematico
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <div class="tab-pane" id="tabEstudiante">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Estudiante</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="maximize">
                                        <i class="fas fa-expand"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tabProfesor">
                        <input value="Profesor" />
                    </div>
                    <div class="tab-pane" id="tabAsistente">
                        <input value="Asistente" />
                    </div>
                    <div class="tab-pane" id="tabLinea">
                        <input value="Linea" />
                    </div>
                    <div class="tab-pane" id="tabEje">
                        <input value="Eje" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="IdDivGenerarReportes" class="mt-2 d-none">
        <input value="Generar reportes" />
    </div>
    <div id="IdDivActDatos" class="mt-2 d-none">
        <input value="Actualizar datos" />
    </div>
    <div id="IdDivDirJur" class="mt-2 d-none">
        <input value="Div/Jur" />
    </div>
</body>


<script>
//window.addEventListener("storage", Evaluar);
$(document).ready(function() {
    Evaluar();
    window.addEventListener('resize', function(event) {
        // do stuff here
        Evaluar();
    });
});

function Evaluar(event) {
    var card = document.getElementById("idCard");
    // console.log(card.clientHeight);
    localStorage.setItem("evaluar", card.clientHeight);
    //  console.log(card.clientHeight);

    //var elmnt = document.getElementById("idHeader");
    // card.scrollIntoView();
}
</script>

</html>