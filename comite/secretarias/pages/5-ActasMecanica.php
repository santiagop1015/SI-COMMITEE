<!DOCTYPE html>

<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../../Login/index.html");
}
	//@$buscart=$_POST['buscart'];
//	@$buscar=$_POST['buscar'];

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

 if ($arreglo[2]!='Jurado') {
	require("../../desconectar.php");
	header("Location:../../Login/index.html");
}
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Actas de Sistemas</title>
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
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
</head>

<body id="idCard" style="background-color: #f4f6f9;">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row md-2">
                <h1 id="Titulo">Actas Mecanica</h1>
            </div>
        </div>
    </section>


    <div class="card card-primary card-tabs">
        <div class="card-header p-0 pt-1" style="background-color:#B42A2A; color: white;">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                <?php
                        $raiz = "../../archivos";
                        $año = date("Y");
                       // $año = gettype($año);
                        $año = (int)$año;
                        // $año1 = $año - 1;
                        // $año2 = $año1 - 1;
                        // $año3 = $año2 - 1;
                        // $año4 = $año3 - 1;

                       // $val = $cont-5;

                        
                       for($cont = 0; $cont < 5; $cont++) {

                            
                              echo '<li class="nav-item">';
                              if($cont == 0) {
                                echo '<a class="nav-link active" id="custom-tabs-one-1-tab" data-toggle="pill"
                                href="#custom-tabs-one-1" role="tab" aria-controls="custom-tabs-one-1"
                                aria-selected="true">'. $año .'</a>'; 
                              } else if($cont == 1) {
                                echo '<a class="nav-link" id="custom-tabs-one-2-tab" data-toggle="pill"
                                href="#custom-tabs-one-2" role="tab" aria-controls="custom-tabs-one-2"
                                aria-selected="false">'. $año .'</a>';
                              }else if($cont == 2) {
                                echo '<a class="nav-link" id="custom-tabs-one-3-tab" data-toggle="pill"
                                href="#custom-tabs-one-3" role="tab" aria-controls="custom-tabs-one-3"
                                aria-selected="false">'. $año .'</a>';
                              } else if($cont == 3) {
                                echo '<a class="nav-link" id="custom-tabs-one-4-tab" data-toggle="pill"
                                href="#custom-tabs-one-4" role="tab" aria-controls="custom-tabs-one-4"
                                aria-selected="false">'. $año .'</a>';
                              } else if($cont == 4) {
                                echo '<a class="nav-link" id="custom-tabs-one-5-tab" data-toggle="pill"
                                href="#custom-tabs-one-5" role="tab" aria-controls="custom-tabs-one-5"
                                aria-selected="false">'. $año .'</a>';
                              }

                            $año = $año - 1;
                    }
                    ?>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
                <?php
                            require('../../connect_db.php');
                            $año = date("Y");
                       // $año = gettype($año);
                            $año = (int)$año;
                     for($cont = 0; $cont < 5; $cont++) {
                         
                        if($cont == 0) {
                         echo '<div class="tab-pane fade active show" id="custom-tabs-one-1" role="tabpanel"
                         aria-labelledby="custom-tabs-one-1-tab">';
                        } else if($cont == 1) {
                            echo '<div class="tab-pane fade" id="custom-tabs-one-2" role="tabpanel"
                            aria-labelledby="custom-tabs-one-2-tab">';
                        } else if($cont == 2) {
                            echo '<div class="tab-pane fade" id="custom-tabs-one-3" role="tabpanel"
                            aria-labelledby="custom-tabs-one-3-tab">';
                        } else if($cont == 3) {
                            echo '<div class="tab-pane fade" id="custom-tabs-one-4" role="tabpanel"
                            aria-labelledby="custom-tabs-one-4-tab">';
                        } else {
                            echo '<div class="tab-pane fade" id="custom-tabs-one-5" role="tabpanel"
                            aria-labelledby="custom-tabs-one-5-tab">';
                        }
                        
                        $sql = ("SELECT * FROM actas where programa='Mecanica' AND YEAR(fecha_inicial) = $año ORDER BY numero DESC");
                        $query = mysqli_query($mysqli, $sql);

                        echo '<table class="table table-bordered table-striped">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th class="text-center">Acta No.</th>';
                        echo '<th class="text-center">Fecha Publicacion</th>';
                        echo '<th class="text-center">Ver Acta</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                                            while ($arreglo = mysqli_fetch_array($query)) {
                                                echo "<tr>";
                                                echo "<td class='text-center'>$arreglo[1]</td>";
                                                echo "<td class='text-center'>$arreglo[4]</td>";
                                                //echo "<td bgcolor='797D7F' align='center'><a href='./pdf/veracta.php?numero=$arreglo[1]&programaa=$programa&idc=$pr' target='_blanck'><img src='images/pdf.png' width='40'  height='30' class='img-rounded'></td>";
                                                echo "<td class='text-center'><a class='btn btn-default btn-sm' href='$raiz/pdf/$arreglo[6]' target='_blank'><i class='nav-icon fa fa-file-pdf' style='color: red;'></i></td>";
                                                //echo "<td><a href='./pdf/veracta.php?numero=$arreglo[1]' target='_blank'><img src='images/pdf.png' width='50'  height='50' class='img-rounded'></td>";
                                                //echo "<td><a href='admin.php?id=$arreglo[0]&idborrar=2'><img src='images/eliminar.png' width='38'  height='38' class='img-rounded'/></a></td>";

                                                //echo "</tr>";

                                                echo "</tr>";
                                            }
                                            
                        echo '</tbody>';
                        echo '</table>';
                        echo '</div>'; 
                            $año = $año - 1;
                            }
                            
                            ?>
            </div>
        </div>
    </div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);

$(document).ready(function() {
    Height();

    $("#custom-tabs-one-tab").click(function() {
        setTimeout(() => {
            Height();
        }, 200);
    });
    //document.getElementsByClassName("example");
});

function Height(event) {
    var Card = document.getElementById("idCard");
    localStorage.setItem("height", Card.clientHeight);
}
</script>

</html>