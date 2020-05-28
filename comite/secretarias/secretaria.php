<!DOCTYPE html>
<?php
session_start();

@$buscart=$_POST['buscart'];
@$buscar=$_POST['buscar'];

if (@!$_SESSION['user']) {
    header("Location:../Login/index.html");
}
$coorr=$_SESSION['user'];
date_default_timezone_set('America/Bogota');
$fecha = date("d-m-Y H:i:s");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr = $_SESSION['id'];
$tipousuario = 'Estudiante';
extract($_GET);
require("../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);

while ($arreglo = mysqli_fetch_array($query)) {
  //utf8_decode($programa=$arreglo[11]);
  utf8_decode($programa='Sistemas');

  $coordir=$arreglo[4];
  $passd=$arreglo[8];

    if ($arreglo[2] != 'Jurado') {
        require("../desconectar.php");
        header("Location:../Login/index.html");
    }
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Asistente/Secretari@</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="dist/img/unilibre-logo.png" type="image/png">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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


    <link rel="stylesheet" href="css/frag.css">


    <!-- Ayuda -- CSS -->
    <script rel="stylesheet" src="dist/css/Help/bootstrap.min.css"></script>
    <link rel="stylesheet" href="dist/css/Help/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/Help/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/Help/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/Help/_all-skins.min.css">


    <!---->
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>

    <script type="text/javascript" src="js/cambiarPestanna.js"></script>
    <script type="text/javascript" src="js/EditarTesis.js"></script>




</head>
<style>
    .white {
        color: white;
    }
</style>

<?php
   if($programa=='Sistemas')  {
  if (isset($pes) && $pes <= 3) {
      echo '<body onload="javascript:cambiarPestanna(pestanas,pestana' . $pes . ',3);Nombres('. $pes .');" class="hold-transition sidebar-mini">';
} else {
  echo '<body onload="javascript:cambiarPestanna(pestanas,pestana1, 3);Nombres(1);" class="hold-transition sidebar-mini">';
}

} else if($programa=='Ambiental' || $programa=='Mecanica') {
  if (isset($pes) && $pes < 3) {
      echo '<body onload="javascript:cambiarPestanna(pestanas,pestana' . $pes . ',2);Nombres('. $pes .');" class="hold-transition sidebar-mini">';
    } else {
    echo '<body onload="javascript:cambiarPestanna(pestanas,pestana1, 2);Nombres(1);" class="hold-transition sidebar-mini">';
  }
}
?>

    <div class="loader"></div>
    <!--Formulario Start-->


    <!--FormularioEnd-->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color:#B42A2A; color: white;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars white"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="" href="../desconectar.php" style="color: white">Cerrar
                        Sesión</i></a>
                </li>

                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link" style="color: white">Home</a>
                </li> -->

            </ul>

            <!-- SEARCH FORM -->
            <!--<form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            -->

            <!-- Right navbar links -->
            <!--<ul class="navbar-nav ml-auto">-->
            <!-- Messages Dropdown Menu -->

            <!--<li class="nav-item">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="../desconectar.php" class="nav-link" style="color: white">Cerrar Sesión</a>
            </li>
            </li>
            </ul>-->
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #B42A2A; color: white">
            <!-- Brand Logo -->
            <a href="../../index.html" class="brand-link" style="background-color: #343a40; color: white">
                <img src="dist/img/unilibre-logo.png" alt="Unilibre Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SI-COMMITEE</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="background-color: #B42A2A; color: white">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="color: white;"><?php echo $_SESSION['user']  ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <div id="pestanas">
                        <ul id="listas" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->



                            <li id="pestana1" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana1);Nombres(1);Recargar(1);' class="nav-link">
                                    <i class="nav-icon fa fa-user-md white"></i>
                                    <p class="white">
                                        Usuarios
                                    </p>
                                </a>
                            </li>

                            <?php
                            if($programa=='Sistemas'){
                            ?>

                            <li id="pestana2" class="nav-item">
                                <a href='javascript:cambiarPestanna(pestanas,pestana2, 3);Nombres(2);Recargar(2);' class="nav-link">
                                    <i class="nav-icon fa fa-edit white"></i>
                                    <p id="Menu2" class="white">
                                        Actas Sistemas
                                    </p>
                                </a>
                            </li>
                            <li id="pestana3" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana3, 3);Nombres(3);Recargar(3);" class="nav-link">
                                    <i class="nav-icon fas fa-copy white"></i>
                                    <p id="Menu3" class="white">
                                        Actas Industrial
                                    </p>
                                </a>
                            </li>
                            <?php
                            } else if($programa=='Ambiental'){
                            ?>
                            <li id="pestana2" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana2, 2);Nombres(2);Recargar(2);" class="nav-link">
                                    <i class="nav-icon fas fa-copy white"></i>
                                    <p id="Menu2" class="white">
                                        Actas Ambiental
                                    </p>
                                </a>
                            </li>
                            <?php
                         } else if($programa=='Mecanica'){
                            ?>
                            <li id="pestana2" class="nav-item">
                                <a href="javascript:cambiarPestanna(pestanas,pestana2, 2);Nombres(2);Recargar(2);" class="nav-link">
                                    <i class="nav-icon fas fa-copy white"></i>
                                    <p id="Menu2" class="white">
                                        Actas Mecanica
                                    </p>
                                </a>
                            </li>
                            <?php
                          }
                             ?>
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
                            <h1 id="Text">Monografías/Poster para Evaluar</h1>
                        </div>

                    </div>
                </div>
                <!-- /.container-fluid -->
            </section>



            <section class="content">
                <!--  <div class="row">
                        <div class="col-12"> -->
                <div id="contenidopestanas">
                    <!--Empieza pestana1-->
                    <div id="cpestana1">
                        <!--Start-->
                        <div class="card card-warning">


                            <div class="card-body">

                              <form  autocomplete="off">
                                  <div class="row">
                                    <div class="col-4">
                                            <label>Tipo de Usuario: </label>
                                            <select  value="<?php echo $tipousuario?>" class="form-control" name="tipousuario">
                                                     <option value="<?php echo $tipousuario?>"><?php echo $tipousuario?></option>
                                                     <option value="Coordinador">Coordinador</option>
                                                     <option value="Estudiante">Estudiante</option>
                                                     <option value="Director">Profesor</option>
                    				                 <option value="Jurado">Secretari@</option>
                                            </select>
                                     </div>

                                     <div class="col-4" >
                                     <div class="form-group">
                                         <label>Buscar por nombre:</label>
                                         <div class="input-group mb-3" >
                                             <input type="text" class="form-control"  placeholder="Escribe el Nombre" name="buscar" value="<?php echo $buscar?>">
                                             <div class="input-group-prepend">
                                             <input type="submit" value="Buscar" class="btn btn-dark">
                                             </div>
                                         </div>
                                     </div>
                                     </div>
                                     <div class="col-6" >
                                       <?php
                                       $direccion_registrar_usuario = '"pages/registrar_usuario.php?"';
                                       $complemento_registrar_usuario = '""';
                                       $img_registrar_usuario = "<img src='images/agregaruser.png' width='30'  height='30' class='img-rounded'>";
                                       //echo "<button onclick='CenterWindow($direccion_registrar_usuario, $complemento_registrar_usuario, 800, 650)'>$img_registrar_usuario</button>";

                                       echo "<a href='javascript:CenterWindow($direccion_registrar_usuario, $complemento_registrar_usuario, 800, 650)'> <div class='form-group'><label style='color:#000000'>Registrar Usuario</label>$img_registrar_usuario</div></a>";

                                        ?>
                                     <!--<a href='RegistrarUsuarioForm.php'>

                                     <div class="form-group">
                                         <label style="color:#000000">Registrar Usuario</label>
                                         <img src='images/agregaruser.png' width='30'  height='30' class='img-rounded'>
                                     </div>
                                   </a>-->
                                     </div>
                                  </div>
                              </form>
                              <?php
                                      $total=0;
                                      $sql=("SELECT * FROM login where  user like '%$buscar%'  and programa='$programa' and tipoUsuario='$tipousuario' ORDER BY  Id DESC");
                                      $query=mysqli_query($mysqli,$sql);
                              ?>

                                <div class="box">


                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-bordered  table-striped">
                                            <thead>

                                                <tr>
                                                  <th scope="col">Id</th>
                                                  <th scope="col">Cedula</th>
                                                  <th scope="col">Tipo Usuario</th>
                                                  <th scope="col">Nombre</th>
                                                  <th scope="col">Usuario</th>
                                                  <th scope="col">Telefono</th>
                                                  <th scope="col">Programa</th>
                                                  <th scope="col">Fc Nacimiento</th>
                                                  <th scope="col">Editar</th>
                                                  <th scope="col">Msg</th>
                                                  <th scope="col">Estado</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                              <?php
                                              echo "<tbody>";
                                   while($arreglo=mysqli_fetch_array($query)){
                                    $Correo=$arreglo[4];
                                      echo "<tr>";
                                        echo "<td>$arreglo[0]</td>";
                                        echo "<td>$arreglo[1]</td>";
                                        echo "<td>$arreglo[2]</td>";
                                        echo "<td>$arreglo[3]</td>";
                                        echo "<td>".utf8_decode("$arreglo[4]")."</td>";
                                        echo "<td>$arreglo[10]</td>";
                                        echo "<td>$arreglo[11]</td>";
                                                  echo "<td>$arreglo[12]</td>";
                                                  /*echo "<td><a href='actualizarusercoor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";*/
                                                  //
                                                  $direccion_act_usuario = '"pages/act_usuario.php?"';
                                                  $complemento_act_usuario = '"userid=';
                                                  $parametro_act_usuario = $arreglo[0] . '"';
                                                  $img_act_usuario = "<img src='images/actualizar.png' width='30'  height='30' class='img-rounded'>";

                                                  echo "<td><button onclick='CenterWindow($direccion_act_usuario, $complemento_act_usuario$parametro_act_usuario, 800, 650)'>$img_act_usuario</button></td>";
                                                  //
                                      //echo "<td><a href='ActualizarUsuarioForm.php?userid=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'/></a></td>";
                                      //
                                      $direccion_enviar_msg = '"pages/enviar_msg_jur.php?"';
                                      $complemento_Correo = '"Correo=' . $arreglo[4];
                                      $complemento_Programa = '&programa=' . $programa . '"';
                                      $img_enviar_msg = "<img src='images/msg.png' width='30'  height='30' class='img-rounded'>";

                                      echo "<td><button onclick='CenterWindow($direccion_enviar_msg, $complemento_Correo$complemento_Programa, 800, 650)'>$img_enviar_msg</button></td>";
                                      //
                                      //echo "<td><a href='enviar_msg_jur.php?Correo=$arreglo[4]&programa=$programa'><img src='images/msg.png' width='30'  height='30' class='img-rounded'</td>";
                                      //
                                      $direccion_estado_est = '"pages/estado_est.php?"';
                                      $complemento_estado_est = '"est=';
                                      $parametro_estado_est = $arreglo[0] . '"';
                                      $img_act_usuario = "<img src='images/user.png' width='30'  height='30' class='img-rounded'>";

                                      echo "<td><button onclick='CenterWindow($direccion_estado_est, $complemento_estado_est$parametro_estado_est, 800, 650)'>$img_act_usuario</button></td>";
                                      //
                                      //echo "<td><a href='estado_est.php?est=$arreglo[0]'><img src='images/user.png' width='30'  height='30' class='img-rounded'</td>";
                                      echo "</tr>";
                                      $total=$total+1;
                                  }
                                ?>
                                            </tbody>
                                        </table>
                                        <?php echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>"; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                        <!--End-->
                    </div>
                    <!--termina pestana1-->

                    <?php
                    if($programa=='Sistemas'){
                    ?>
                    <div id="cpestana2">
                        <!--Start-->
                        <div class="card card-warning">

                            <div class="card-body">

                                <?php

                                $total=0;
                                //ToDo: Delete query
                                // $sql=("SELECT * FROM tesis limit 10");
                                $sql=("SELECT * FROM actas where programa='Sistemas' ORDER BY  numero desc");
                                $query=mysqli_query($mysqli,$sql);
                                //var_dump($query);
                                ?>

                                <div class="box">

                                    <div class="box-body table-responsive no-padding">
                                        <table class="table table-bordered  table-striped">
                                            <thead>

                                                <tr>
                                                  <th scope="col">Acta No.</th>
                                                  <th scope="col">Fecha Publicación</th>
                                                  <th scope="col">Ver Acta</th>
                                                    <!--<th>Editar</th>  -->
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php
                                                $total1 = 0;
                                                while($arreglo=mysqli_fetch_array($query)){
                                       						$titu=$arreglo[3];
                                       						$ID_tesis=$arreglo[0];

                                                  if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
                                                   $alma="./propuestas";
                                                }else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
                                                {
                                                   $alma="./anteproyectos";
                                                }else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
                                                {
                                                   $alma="./proyectos";
                                                }else {
                                                    $alma="./otros";
                                                  }
                                                  echo "<tr>";
                                                    echo "<td>$arreglo[1]</td>";
                                                    echo "<td>$arreglo[4]</td>";
                                                              echo "<td><a href='pdf/$arreglo[6]' target='_blank'><img src='images/pdf.png' width='30'  height='30' class='img-rounded'></td>";

                                                  echo "</tr>";
                                                  $total++;
                                                  }
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>"; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>


                            </div>
                        </div>
                        <!--End-->
                    </div>
                    <!--Termina pestana2-->
                    <!--Empieza pestana3-->
                    <div id="cpestana3">

                      <div class="card card-warning">

                          <div class="card-body">
                              <?php
                              $total=0;
                              //ToDo: Delete query
                              // $sql=("SELECT * FROM tesis limit 10");
                              $sql=("SELECT * FROM actas where programa='Industrial' ORDER BY numero desc");
                              $query=mysqli_query($mysqli,$sql);
                              //var_dump($query);
                              ?>

                              <div class="box">

                                  <div class="box-body table-responsive no-padding">
                                      <table class="table table-bordered  table-striped">
                                          <thead>

                                              <tr>
                                                <th scope="col">Acta No.</th>
                                                <th scope="col">Fecha Publicación</th>
                                                <th scope="col">Ver Acta</th>
                                                  <!--<th>Editar</th>  -->
                                              </tr>
                                          </thead>

                                          <tbody>

                                              <?php
                                              $total1 = 0;
                                              while($arreglo=mysqli_fetch_array($query)){
                                                $titu=$arreglo[3];
                                                $ID_tesis=$arreglo[0];

                                                if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
                                                 $alma="./propuestas";
                                              }else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
                                              {
                                                 $alma="./anteproyectos";
                                              }else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
                                              {
                                                 $alma="./proyectos";
                                              }else {
                                                  $alma="./otros";
                                                }
                                                echo "<tr>";
                                                  echo "<td>$arreglo[1]</td>";
                                                  echo "<td>$arreglo[4]</td>";
                                                            echo "<td><a href='pdf/$arreglo[6]' target='_blank'><img src='images/pdf.png' width='30'  height='30' class='img-rounded'></td>";

                                                echo "</tr>";
                                                $total++;
                                                }
                                              ?>
                                          </tbody>
                                      </table>
                                      <?php echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>"; ?>
                                  </div>
                                  <!-- /.box-body -->
                              </div>
                          </div>
                      </div>

                    </div>
                    <!--Termina pestana3-->
                    <?php
                    } else if($programa=='Ambiental'){
                    ?>
                    <div id="cpestana2">
                        <!--Start-->
                        <div class="card card-warning">
                            <div class="card-body">
                                <?php

                                $total=0;
                                //ToDo: Delete query
                                // $sql=("SELECT * FROM tesis limit 10");
                                $sql=("SELECT * FROM actas where programa='Ambiental' ORDER BY  numero desc");
                                $query=mysqli_query($mysqli,$sql);
                                //var_dump($query);
                                ?>

                                <div class="box">

                                    <div class="table table-bordered  table-striped">
                                        <table class="table table-bordered  table-striped">
                                            <thead>

                                                <tr>
                                                  <th scope="col">Acta No.</th>
                                                  <th scope="col">Fecha Publicación</th>
                                                  <th scope="col">Ver Acta</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total1 = 0;
                                                while($arreglo=mysqli_fetch_array($query)){
                                       						$titu=$arreglo[3];
                                       						$ID_tesis=$arreglo[0];

                                                  if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
                                      						 $alma="./propuestas";
                                      					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
                                      					{
                                      						 $alma="./anteproyectos";
                                      					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
                                      					{
                                      						 $alma="./proyectos";
                                      					}else {
                                      							$alma="./otros";
                                      						}
                                                  echo "<tr>";
                                      				    	echo "<td>$arreglo[1]</td>";
                                      				    	echo "<td>$arreglo[4]</td>";

                                                        echo "<td><a href='pdf/$arreglo[6]' target='_blank'><img src='images/pdf.png' width='30'  height='30' class='img-rounded'></td>";
                                      						echo "</tr>";
                                      						$total++;
                                      						}
                                                ?>
                                            </tbody>
                                        </table>
                                        <?php echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>"; ?>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>
                        </div>
                        <!--End-->
                    </div>

                    <?php
                    } else if($programa=='Mecanica'){
                 ?>
                 <div id="cpestana2">
                     <!--Start-->
                     <div class="card card-warning">
                         <div class="card-body">
                             <?php

                             $total=0;
                             //ToDo: Delete query
                             // $sql=("SELECT * FROM tesis limit 10");
                             $sql=("SELECT * FROM actas where programa='Mecanica' ORDER BY numero desc");
                             $query=mysqli_query($mysqli,$sql);
                             //var_dump($query);
                             ?>

                             <div class="box">

                                 <div class="table table-bordered  table-striped">
                                     <table class="table table-bordered  table-striped">
                                         <thead>

                                             <tr>
                                               <th scope="col">Acta No.</th>
                                               <th scope="col">Fecha Publicación</th>
                                               <th scope="col">Ver Acta</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <?php

                                             while($arreglo=mysqli_fetch_array($query)){
                                    						$titu=$arreglo[3];
                                    						$ID_tesis=$arreglo[0];

                                                if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
                                    						 $alma="./propuestas";
                                    					}else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
                                    					{
                                    						 $alma="./anteproyectos";
                                    					}else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
                                    					{
                                    						 $alma="./proyectos";
                                    					}else {
                                    							$alma="./otros";
                                    						}
                                                echo "<tr>";
                                    				    	echo "<td>$arreglo[1]</td>";
                                    				    	echo "<td>$arreglo[4]</td>";
                                                            echo "<td><a href='pdf/$arreglo[6]' target='_blank'><img src='images/pdf.png' width='30'  height='30' class='img-rounded'></td>";

                                    						echo "</tr>";
                                    						$total++;
                                               }
                                             ?>
                                         </tbody>
                                     </table>
                                     <?php echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>"; ?>
                                 </div>
                                 <!-- /.box-body -->
                             </div>
                         </div>
                     </div>
                     <!--End-->
                 </div>


                 <?php
                }
                 ?>
                </div>



                <!--    </div>

    </div> -->


            </section>


            <!-- /.content -->
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>2020</b>
            </div>
            <strong>Universidad Libre - <a href="../../index.html">SI-COMMITEE</a>.</strong>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->





    <script>
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        //window.onclick = function(event) {
        //    // if (event.target == modal) {
        //    //     modal.style.display = "none";
        //    // }
        //    CenterWindow(1000, 600, 50, 'actualizartesisdir.php', 'demo_win');
        //}
    </script>



    <script>
        $("#aclick").on('click', function() {
            alert("123");
            CenterWindow(1000, 600, 50,
                'actualizartesisdir.php', 'demo_win');
            var a = document.getElementById('aclick');
            // console.log(a);
        });
    </script>



</body>

</html>
