<!DOCTYPE html>

<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../../index.html");
}
    //@$buscart=$_POST['buscart'];
    

	@$buscar=$_POST['buscar'];

date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
$usuario=$_SESSION['user'];
extract($_GET);
require("../../connect_db.php");
$sql=("SELECT * FROM login where id='$pr'");
$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
utf8_decode($programa=$arreglo[11]);
$coordir=$arreglo[4];
$passd=$arreglo[8];

 if ($arreglo[2]!='Decanatura') {
	require("../../desconectar.php");
	header("Location:../../../index.html");
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
    <link rel="stylesheet" href="../../LocalSources/css/ionicons/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
    <!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
    <link href="../../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>

    <script src="../../LocalSources/js/jQuery/3.5.1/jquery.min.js"></script>

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
                            <?php
                            if(!$_GET) {
                                header('Location:?programa=Sistemas');
                            } else {
                            $estadistic_program = $_GET['programa'];
                            }
                            ?>
<?php

                        $contadorp=0;
                        $sql=("SELECT * FROM login WHERE programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorp++;
                        
                        }
                        $contadorpro=0;
                        $sql=("SELECT * FROM tesis where ID_estado='Entrega Proyecto' and programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorpro++;
                        
                        }
                        $contadorante=0;
                        $sql=("SELECT * FROM tesis where ID_estado='Entrega Anteproyecto' and programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorante++;
                        
                        }
                        $contadorprop=0;
                        $sql=("SELECT * FROM tesis where ID_estado='Entrega Propuesta' and programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorprop++;
                        
                        }
                        $contadorprot=0;
                        $sql=("SELECT * FROM tesis where ID_estado='Entrega Proyecto' and nota>0 and programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadorprot++;
                        
                        }
                        $contadorse=0;$contadorset=0;
                        $sql=("SELECT * FROM tesis where id_estudiante2=1 and nota>0 and programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                          $nota=$arreglo[20];
                          if($nota>0){
                            $contadorset++;
                          }
                        $contadorse++;
                        
                        }
                        $contadoraux=0;
                        $sql=("SELECT * FROM tesis where id_estudiante2=3 and nota>0 and programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $contadoraux++;
                        
                        }
                        $evaluardoc=0;
                                $sql=("SELECT * FROM tesis  where (terminado=0 or terminado=6) and observaciones='Por definir' and (aprob_dir='SI' or ID_directores='No aplica' or ID_directores='Por definir') and programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                                while($arreglo=mysqli_fetch_array($query)){
                                $evaluardoc++;
                        
                        }
                        $totaldoc=0;
                        $sql=("SELECT * FROM tesis WHERE programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $totaldoc++;
                        
                        }
                        $totalactas=0;
                        $sql=("SELECT * FROM actas WHERE programa = '$estadistic_program'");
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $totalactas++;
                        
                        }
                        $totalvb=0;
                        $sql=("SELECT * FROM tesis  where aprob_dir='' and ID_directores!='No aplica' and programa = '$estadistic_program'" );
                                $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $totalvb++;
                        
                        }
                        $entradast=0;
                        $ff=date('Y-m-d');
                        $fi=date('Y-m-d',strtotime($ff.'- 3 month'));
                        $sql=("SELECT * FROM entradas where fecha between '$fi' and '$ff'");
                        $query=mysqli_query($mysqli,$sql);
                        while($arreglo=mysqli_fetch_array($query)){
                        $entradast++;
                        
                        }
                        $aux=0;
                        $totald=($contadorprop+$contadorante+$contadorpro)
                        ?>

                            
                            <select class="form-control mb-3" onchange="OnSelectedProgram(this)" value="<?php 
                            echo $estadistic_program;
                                ?>
                                ">
                                <?php
                                    $sql=("SELECT distinct programa FROM programas ORDER BY id DESC");
                                     $query=mysqli_query($mysqli,$sql);
                                     while($arreglo=mysqli_fetch_array($query)){
                                   // echo '<option>'.$arreglo[0].'</option>';
                        
                                    echo '<option value="'.$arreglo[0].'"';
                                    if($estadistic_program == $arreglo[0]){
                                        echo 'selected';
                                    }
                                    echo '>'.$arreglo[0].'</option>';
                                   
                                }
                                ?>
                            </select>

                            <script>
                            function OnSelectedProgram(param) {
                                var select = param;

                                //console.log(select);
                                console.log(select.value);
                                window.location.href='?programa='+select.value;
                            }
                            </script>
                            <div class="row">


                                <div class="col-lg-3 col-6">
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?php echo $contadorp ?></h3>
                                            <p>Usuarios Registrados</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal"
                                            data-target="#usuariosRegistradosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box  bg-success">
                                        <div class="inner">
                                            <h3><?php echo $contadorpro ?></h3>
                                            <p>Proyectos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#proyectosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?php echo $contadorante ?></h3>

                                            <p>Anteproyectos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal"
                                            data-target="#anteproyectosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box  bg-success">
                                        <div class="inner">
                                            <h3><?php echo $contadorprop ?></h3>

                                            <p>Propuestas</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#propuestasModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3><?php echo $totaldoc ?></h3>

                                            <p>Total de Documentos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#documentosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php echo $contadorprot ?></h3>

                                            <p>Proyectos</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal"
                                            data-target="#proyectostermModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php echo $contadorset?></h3>

                                            <p>Semilleros</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#semillerosModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?php echo $aux ?></h3>

                                            <p>Auxiliares de Inv</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a class="small-box-footer" data-toggle="modal" data-target="#auxiliaresModal">
                                            Más información
                                            <i class="fas fa-arrow-circle-right"></i>
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <!-- Modals container -->
                            <div class="modal fade" id="usuariosRegistradosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-warning">
                                        <div class="modal-body">
                                            La cantidad corresponde a todos lo usuarios registrados desde julio de
                                            2016...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="proyectosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-success">
                                        <div class="modal-body">
                                            Estos proyectos son los que estan actualmente en proceso...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="anteproyectosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-success">
                                        <div class="modal-body">
                                            Estos Anteproyectos son los que estan actualmente en proceso...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="propuestasModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-success">
                                        <div class="modal-body">
                                            Estas propuestas son las que estan actualmente en proceso...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="documentosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-danger">
                                        <div class="modal-body">
                                            Corresponde a todos los documentos procesados desde julio de 2016...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="proyectostermModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-info">
                                        <div class="modal-body">
                                            Estos proyectos son los que estan terminados...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="semillerosModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-info">
                                        <div class="modal-body">
                                            Proyectos inscritos con opcion de grado por semillero...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="auxiliaresModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-info">
                                        <div class="modal-body">
                                            Estudiantes con opcion de grado auxiliares investigacion...
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End modals container -->

                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box shadow-sm">
                                        <span class="info-box-icon bg-info elevation-1"><i
                                                class="fas fa-cog"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Documentos por Evaluar...</span>
                                            <span class="info-box-number">
                                                <?php echo $evaluardoc ?>
                                                <small>A hoy</small>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3 shadow-sm">
                                        <span class="info-box-icon bg-danger elevation-1"><i
                                                class="fas fa-thumbs-up"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Actas</span>
                                            <span class="info-box-number"><?php echo $totalactas ?><small>
                                                    Publicadas</small></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                                <div class="clearfix hidden-md-up"></div>

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3 shadow-sm">
                                        <span class="info-box-icon bg-success elevation-1"><i
                                                class="fas fa-shopping-cart"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Documentos por VoBo</span>
                                            <span class="info-box-number"><?php echo $totalvb ?><small> A
                                                    hoy</small></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>

                                <div class="col-12 col-sm-6 col-md-3">
                                    <div class="info-box mb-3 shadow-sm">
                                        <span class="info-box-icon bg-warning elevation-1"><i
                                                class="fas fa-users"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text">Visitas</span>
                                            <span class="info-box-number"><?php echo $entradast?><small> Ultimo
                                                    mes</small></span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                            </div>
  
    
</body>


<script>
//window.addEventListener("storage", Evaluar);
$(document).ready(function() {
    //Evaluar();
    window.addEventListener('resize', function(event) {
        // do stuff here
        Evaluar();
    });
});

function Evaluar(event) {
    //var card = document.getElementById("idCard");
    // console.log(card.clientHeight);
    //localStorage.setItem("evaluar", card.clientHeight);
    //  console.log(card.clientHeight);
    window.parent.ReloadsFrames("non-reaload");
    //var elmnt = document.getElementById("idHeader");
    // card.scrollIntoView();
}
</script>

</html>