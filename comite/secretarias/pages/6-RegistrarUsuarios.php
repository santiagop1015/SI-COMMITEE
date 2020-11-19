<!DOCTYPE html>
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too

session_start();
if(@!$_SESSION['user']) {
    header("Location: .../../../index.html");
}

date_default_timezone_set('America/Bogota');
$pr = $_SESSION['id'];
$tipousuario = 'Estudiante';
extract($_GET);
require("../../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);

while ($arreglo = mysqli_fetch_array($query)) {
  //  utf8_decode($programa='Sistemas'); actualizacion #2
  utf8_decode($programa=$arreglo[11]);

    $coordir=$arreglo[4];
    $passd=$arreglo[8];
    
    if ($arreglo[2] != 'Jurado') {
        require("../../desconectar.php");
        header("Location:../../../index.html");
    }
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Secretaria</title>
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
    <!-- -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

</head>
<style>
.white {
    color: white;
}
</style>

<body id="idCard" style="background-color: #f4f6f9;" onresize="location.reload();">

    <!-- Start Content-wrapper -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row md-2">
                <h1 id="Titulo">Registrar Usuario</h1>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-default">
            <div class="card-header" style="background-color:#B42A2A;color: white;">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                 </h3>
            </div>
            <div class="card-body">
                <div class="row d-flex align-items-stretch">
                    
                </div>

                <div class="card-footer">
                    
                </div>

            </div>
        </div>
    </section>

    <!-- End Content-wrapper -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    Height();
});

function Height(event) {
    var card = document.getElementById("idCard");
    localStorage.setItem("height", card.clientHeight);
}
</script>


</html>