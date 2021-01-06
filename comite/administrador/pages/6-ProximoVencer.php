<!DOCTYPE html>

<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works

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
extract($_GET);
require("../../connect_db.php");
$sql=("SELECT * FROM login where id='$pr'");
$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
utf8_decode($programa=$arreglo[11]);
$coordir=$arreglo[4];
$passd=$arreglo[8];

 if ($arreglo[2]!='Administrador') {
	require("../../desconectar.php");
	header("Location:../../../index.html");
}
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Rechazado</title>
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
    <link href="../../LocalSources/css/fontsgoogleapis.css" rel="stylesheet">
</head>

<body>

    <div id="idCard" class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white;">

            <div class="card-tools">
                <form id="idFormEvaluar" autocomplete="off">
                    <div class="input-group input-group-sm" style="width: 200px;">
                        <input type="text" name="buscar" class="form-control float-right" value="<?php echo $buscar?>"
                            placeholder="Titulo ">

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

        <div class="card-body">

            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <?php
                $total3=0;

               $sql=("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and (terminado!=0 and terminado != 6 and terminado !=2 and terminado !=7) and (fecha_aprob_propuesta between '$fecha' and '$nuevafecha' or fecha_ent_anteproyecto between '$fecha' and '$nuevafecha' or proyecto between '$fecha ' and '$nuevafecha')  ORDER BY  ID_tesis DESC  ");
               //$sql=("SELECT * FROM tesis where titulo_tesis like '%$buscar%'"); 
               $query=mysqli_query($mysqli,$sql);
                
                ?>
                        <tr>
                            <th style="width: 40%">Título</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Disposiciones</th>
                            <th class="text-center">Archivo</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Msg</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
              while($arreglo=mysqli_fetch_array($query)){
                $titu=$arreglo[3];
                if($arreglo[6]=="Entrega Propuesta" or $arreglo[6]=="Correccion Propuesta"){
                 $alma="./propuestas";
            }else if($arreglo[6]=="Entrega Anteproyecto" or $arreglo[6]=="Correccion Anteproyecto")
            {
                 $alma="./anteproyectos";
            }else if($arreglo[6]=="Entrega Proyecto" or $arreglo[6]=="Correccion Proyecto")
            {
                 $alma="./proyectos";
            }else if($arreglo[6]=="Certificado de Notas")
            {
                 $alma="./certinotas";
            }else if($arreglo[6]=="Certificado terminacion Materias")
            {
                 $alma="./certimat";
            }else if($arreglo[6]=="Prorroga")
            {
                 $alma="./prorrogas";
            }else {
                    $alma="./otros";	
            }		
             echo "<tr>";

             echo "<td>$arreglo[3]</td>";
             echo "<td class='text-center'>$arreglo[6]</td>";
             echo "<td class='text-center'>$arreglo[7]</td>";
              //echo "<td class='text-center'> <a href='../../archivos/$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a></td>"; 
              echo "<td class='text-center'>";
              if(strlen($arreglo[8]) > 1) {
                                                    
                if(strlen($arreglo[8]) > 15) {
                    echo "
                    <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                    target='_blank'>
                    ".substr($arreglo[8],0,15)."..."."
                    </a>
                    ";
                } else {
                    echo "
                <a class='btn btn-primary btn-sm' href='../archivos/$alma/$arreglo[8]'
                target='_blank'>
                $arreglo[8]
                </a>
                ";
                }
                } else {
                echo "";
                }
            echo "</td>";
             
             echo "<td class='text-center'>
             <a class='btn btn-info btn-sm' href='2.1-act_tesis_coor.php?id=$arreglo[0]'>
             <i class='fas fa-pencil-alt'>
             </i>
             </a>
             </td>
             ";

             echo "<td class='text-center'>
             <a class='btn btn-warning btn-sm' href='6.1-enviar_msg_vencer.php?ID_estudiante=$arreglo[1]'>
             <i class='fa fa-comment'>
             </i>
             </a>
             </td>";
             
             $total3++;
             echo "</tr>";
            }
            ?>

                    </tbody>
                </table>
                <?php echo "<center><font color='red' size='3'>Total registros: $total3</font><br></center>"; ?>
            </div>
        </div>
    </div>
</body>

<script src="../../LocalSources/js/jQuery/3.5.1/jquery.min.js"></script>
<script>
//window.addEventListener("storage", Evaluar);

$(document).ready(function() {
    //Evaluar();
    /*  $("#idFormEvaluar").submit(function() {
          //  alert("Submitted");
          Evaluar();
      });
      */
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
}
</script>

</html>