<!DOCTYPE html>
<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works
//session_cache_limiter('public'); // works too

session_start();
if(@!$_SESSION['user']) {
    header("Location: .../../../index.html");
}
// document.referrer;
@$buscar=$_POST['buscar'];

//$corr=$_SESSION['user'];
date_default_timezone_set('America/Bogota');
$fecha = date("d-m-Y H:i:s");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
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
    
    if ($arreglo[2] != 'Secretaria') {
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
    <link rel="stylesheet" href="../../LocalSources/css/ionicons/ionicons.min.css">

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
    <link href="../../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">


</head>
<style>
.white {
    color: white;
}
</style>
<script src="../../LocalSources/js/jQuery/3.5.1/jquery.min.js"></script>
<script>
/*
// No hace falta llamar a la funcion cuando el documento este listo ya ue se llama cuando el body cambia su tamaño
// Se cammbio por que no se estaba reconociendo la funcion sino despues de que el documento se encutrara listo
$(document).ready(function() {
    Height();
});
*/
</script>

<body id="idCard" style="background-color: #f4f6f9;">

    <!-- Start Content-wrapper -->


    <section class="content">
        <div class="card card-default">
            <div class="card-header" style="background-color:#B42A2A;color: white;">
                <!--   <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Registrar Usuario"><i
                        class="fa fa-plus-circle white"
                        onclick="window.location.href='6-RegistrarUsuarios.php'"></i></button> -->
                <div class="card-tools">
                    <?php
if(!$_GET) {
    header('Location:?pagina=1&user=Estudiante');
} 
//var_dump($_POST);
//echo $_GET['user'];

                            //echo $tipousuario;
                            if($_POST && !$_POST['tipousuario']) {
                                header('Location:?pagina=1&user='.$tipousuario);
                            }
                            


                ?>

                    <form id="idFormBusqueda" autocomplete="off" method="post">
                        <div class="input-group input-group-sm">

                            <select value="<?php 
                            if($_POST) {
                                $tipousuario = $_POST['tipousuario'];
                            } else if($_GET['user']){
                                $tipousuario = $_GET['user'];
                            }
                            
                            echo $tipousuario;
                        
                            
                            
                                ?>
                                " class="form-control" name="tipousuario">
                                <!-- <option <?php //if($tipousuario == "Coordinador") echo 'selected'  ?> value="Coordinador">
                                    Coordinador</option> -->
                                <option <?php if($tipousuario == "Estudiante") echo 'selected'  ?> value="Estudiante">
                                    Estudiante</option>
                            </select>


                            <input type="text" name="buscar" class="form-control float-right" value="<?php 
                        if (@$_POST['buscar']) {
                            echo $buscar;
                        } else {
                          echo '';
                        }
                        ?>" placeholder="Escriba Nombre">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default" onclick="Height();"><i
                                        class="fas fa-search"></i></button>
                                <button type="button" class="btn btn-default"><i class="fas fa-sync-alt"
                                        onclick="location.reload();"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row d-flex align-items-stretch">
                    <?php
                     $total=0;
                    
                     $estudiantes_x_pagina = 9;
                     if($_POST){
                         //echo "1";
                         $iniciar = 0;
                     } else {
                        $iniciar = ($_GET['pagina']-1)*$estudiantes_x_pagina;
                     }
                     //$iniciar = ($_GET['pagina']-1)*$estudiantes_x_pagina;


                 if (@$_POST['buscar']) {
                     $limpio = preg_replace('([^A-Za-z0-9])', '', $buscar);
                        $sql=("SELECT * FROM login where user like '%$limpio%' and tipoUsuario='$tipousuario'
                        ORDER BY Id DESC");
                     
                  /*   $sql=("SELECT * FROM login where user like '%$limpio%' and programa='$programa' and tipoUsuario='$tipousuario'
                 ORDER BY Id DESC"); */
                 } else {
                /*  $sql=("SELECT * FROM login where programa='$programa' and tipoUsuario='$tipousuario'
                 ORDER BY Id DESC LIMIT $iniciar,$estudiantes_x_pagina"); */
                    $sql=("SELECT * FROM login where tipoUsuario='$tipousuario'
                 ORDER BY Id DESC LIMIT $iniciar,$estudiantes_x_pagina");
                 }

                 $query=mysqli_query($mysqli,$sql);
         
                 while($arreglo=mysqli_fetch_array($query)){
                     
                 $Id = $arreglo[0];
                 $Cedula = $arreglo[1];
                 $TipoUsuario = $arreglo[2];
                 $Nombre = $arreglo[3];
                 $Correo=$arreglo[4];
                 $Telefono=$arreglo[10];
                 $Programa=$arreglo[11];
                 $FechaN=$arreglo[12];
                 $foto = $arreglo[14];

        echo ' 
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                   <div class="card bg-light">';

        echo '<div class="card-header text-muted border-bottom-0">
               <strong>Id: </strong>'. $Id . '
            </div>';

        

            echo '<div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>'. $Nombre . '</b></h2>
                        <p class="text-muted text-sm" style="margin-bottom: 1px"><b>' . $TipoUsuario .'</b></p>
                        <p class="text-muted text-sm"><b>Cedula: </b>' . $Cedula .'</p>
            
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fa fa-graduation-cap"></i></span><strong>Programa:</strong>
                            '. $Programa .'
                            </li>
                            <li class="small"><span class="fa-li"><i class="fa fa-envelope"></i></span><strong>Correo:</strong>
                            '. $Correo .'
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                <strong>Telefono:</strong> '. $Telefono .'</li>
                                <li class="small"><span class="fa-li"><i class="fa fa-calendar"></i></span>
                                <strong>Fec. Nacimiento:</strong> '. $FechaN .'</li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">';
                    if(empty($foto)) {
                      echo '<img src="../dist/img/avatar-user.jpg" alt="" class="img-circle img-fluid">';
                    } else {
                      echo '<img src="data:image/jpg;base64,'.base64_encode($foto).'" alt="" class="img-circle img-fluid">';
                    }

                echo '
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="2.2-enviar_msg_coor.php?Correo='.$arreglo[4].'&programa='.$Programa.'" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                    </a>
                    <a href="3-estado_est.php?est='.$arreglo[0].'" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> 
                    </a>
                </div>
            </div>';
        



            echo '
        </div>
    </div>';
    }
                 ?>
                </div>

                <?php
        if (@$_POST['buscar']) {
            $limpio = preg_replace('([^A-Za-z0-9])', '', $buscar);

            $sql2=("SELECT * FROM login where user like '%$limpio%' and tipoUsuario='$tipousuario'
                ORDER BY Id DESC");
             

          /*  $sql2=("SELECT * FROM login where user like '%$limpio%' and programa='$programa' and tipoUsuario='$tipousuario'
                ORDER BY Id DESC"); */
        } else {
        /*    $sql2=("SELECT * FROM login where programa='$programa' and tipoUsuario='$tipousuario'
                ORDER BY Id DESC"); */
                    $sql2=("SELECT * FROM login where tipoUsuario='$tipousuario'
                    ORDER BY Id DESC");
        }

        $query2=mysqli_query($mysqli,$sql2);
        while($arreglo2=mysqli_fetch_array($query2)){
            $total=$total+1;
        }

        if($total === 0) {
             echo '<h2>Sin resultados</h2>';
          /*   echo '<iframe src="../../404.html" width="100%"
             style="border: none;" frameborder="0" scrolling="no"
             onload="Height()" height="100%"></iframe>';
             */
        }
        ?>
                <?php
        $paginas = $total/$estudiantes_x_pagina;
        $paginas = ceil($paginas);
        ?>

                <div class="card-footer">
                    <nav aria-label="Contacts Page Navigation">
                        <ul class="pagination justify-content-center m-0">
                            <li class="page-item
                        <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
                                <a class="page-link"
                                    href="?pagina=<?php echo $_GET['pagina']-1 ?>&user=<?php echo $tipousuario ?>">
                                    Anterior
                                </a>
                            </li>
                            <?php for($i=0;$i<$paginas;$i++): ?>
                            <li class="page-item
                        <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
                                <a class="page-link" href="?pagina=<?php echo $i+1; ?>&user=<?php echo $tipousuario ?>">
                                    <?php echo $i+1; ?>
                                </a>
                            </li>
                            <?php endfor ?>
                            <li class="page-item
                        <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">
                                <a class="page-link"
                                    href="?pagina=<?php echo $_GET['pagina']+1 ?>&user=<?php echo $tipousuario ?>">Siguiente</a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </section>

    <!-- End Content-wrapper -->
</body>

<script>
$(document).ready(function() {
    //Height();
    window.addEventListener('resize', function(event) {
        // do stuff here
        Height();
    });
});

function Height(event) {
    //var card = document.getElementById("idCard");
    //localStorage.setItem("height", card.clientHeight);
    window.parent.ReloadsFrames("non-reaload");
}

$(document).on("click", ".page-link", function() {
    Height();
});
</script>



</html>