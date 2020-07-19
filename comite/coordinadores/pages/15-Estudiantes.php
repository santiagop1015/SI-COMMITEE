<!DOCTYPE html>

<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../../Login/index.html");
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
	header("Location:../Login/index.html");
}
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Aux Investigacion</title>
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
</head>

<body>

    <div id="idCard" class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white;">

            <div class="card-tools">
                <form id="idFormEvaluar" autocomplete="off" method="post">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="buscar" class="form-control float-right" value="<?php 
                        if (@$_POST['buscar']) {
                            echo $buscar;
                        } else {
                          echo '';
                        }
                        ?>" placeholder="Nombre Estudiante ">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default" onclick="Evaluar();"><i
                                    class="fas fa-search"></i></button>
                            <button type="button" class="btn btn-default"><i class="fas fa-sync-alt"
                                    onclick="location.reload();"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="card-body pb-0">

            <div class="row d-flex align-items-stretch">

                <?php
        /*
            echo "<td><a href='elim_user_coorp.php?id=$arreglo[0]'><img src='../images/eliminar.png' width='30'
                        height='30' class='img-rounded' /></a></td>";
            echo "<td><a href='enviar_msg_coor.php?Correo=$arreglo[4]&programa=$programa'><img src='../images/msg.png'
                        width='30' height='30' class='img-rounded' </td>";
                    echo "
            <td><a href='estado_est.php?est=$arreglo[0]'><img src='../images/user.png' width='30' height='30'
                        class='img-rounded' </td>";
                    echo "
        */
        $total=0;

        if(!$_GET) {
            header('Location:?pagina=1');
        }

        $estudiantes_x_pagina = 9;

        $iniciar = ($_GET['pagina']-1)*$estudiantes_x_pagina;
        //echo $iniciar;

        if (@$_POST['buscar']) {
            $sql=("SELECT * FROM login where user like '%$buscar%' and programa='$programa' and tipoUsuario='Estudiante'
        ORDER BY Id DESC");
        } else {
         //   @$buscar=$_POST['buscar'];
         $sql=("SELECT * FROM login where programa='$programa' and tipoUsuario='Estudiante'
        ORDER BY Id DESC LIMIT $iniciar,$estudiantes_x_pagina");
        }
       // echo $sql;

       /* $sql=("SELECT * FROM login where user like '%$buscar%' and programa='$programa' and tipoUsuario='Estudiante'
        ORDER BY Id DESC"); */
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

       // $total=$total+1;

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
                    <div class="col-5 text-center">
                        <img src="../dist/img/avatar-user.jpg" alt="" class="img-circle img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                <a href="15.1-elim_user_coorp.php?id='.$arreglo[0].'" class="btn btn-sm bg-danger">
                        <i class="fa fa-trash"></i>
                    </a>
                    <a href="15.2-enviar_msg_coor.php?Correo='.$arreglo[4].'&programa='.$programa.'" class="btn btn-sm bg-teal">
                        <i class="fas fa-comments"></i>
                    </a>
                    <a href="15.3-estado_est.php?est='.$arreglo[0].'" class="btn btn-sm btn-primary">
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


if(@$_POST['buscar']) {
   /* $sql2=("SELECT * FROM login where user like '%$buscar%' and programa='$programa' and tipoUsuario='Estudiante'
        ORDER BY Id DESC"); 
        */
        $sql2=("SELECT * FROM login where user like '%$buscar%' and programa='$programa' and tipoUsuario='Estudiante'
        ORDER BY Id DESC");
      //  $total = 1;
} else {
    $sql2=("SELECT * FROM login where programa='$programa' and tipoUsuario='Estudiante'
    ORDER BY Id DESC");
}


$query2=mysqli_query($mysqli,$sql2);

while($arreglo2=mysqli_fetch_array($query2)){
    $total=$total+1;
}





if($total === 0) {
   // echo 'No hay resultados';
    echo '<iframe src="../../404.html" width="100%"
    style="border: none;" frameborder="0" scrolling="no"
    onload="resizeIframe(this, 500)" height="50%"></iframe>';
}
?>

            <?php
              
            //  echo $total;
              $paginas = $total/$estudiantes_x_pagina;
            //  echo $paginas;
              $paginas = ceil($paginas);
              
              
            ?>

            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item
                        <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="?pagina=<?php echo $_GET['pagina']-1 ?>">
                                Anterior
                            </a>
                        </li>
                        <?php for($i=0;$i<$paginas;$i++): ?>
                        <li class="page-item
                        <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
                            <a class="page-link" href="?pagina=<?php echo $i+1; ?>">
                                <?php echo $i+1; ?>
                            </a>
                        </li>
                        <?php endfor ?>
                        <li class="page-item
                        <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">
                            <a class="page-link" href="?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
                    </ul>
                </nav>
            </div>



        </div>
    </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);

$(document).ready(function() {
    Evaluar();
    /*  $("#idFormEvaluar").submit(function() {
          //  alert("Submitted");
          Evaluar();
      });
      */
});

function Evaluar(event) {
    var card = document.getElementById("idCard");
    // console.log(card.clientHeight);
    localStorage.setItem("evaluar", card.clientHeight);
    //  console.log(card.clientHeight);

    //var elmnt = document.getElementById("idHeader");
    // card.scrollIntoView();
}


function resizeIframe(obj, px) {

    //obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
    if (!px) {
        obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
    } else {
        if (px == 0) {
            obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + "px";
        } else {
            obj.style.height = px + "px";
        }

    }
}
</script>

</html>