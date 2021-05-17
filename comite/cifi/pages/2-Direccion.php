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
$fecha=date("d-m-Y H:i:s");
$pr=$_SESSION['id'];
$jur=$_SESSION['user'];
$asd=0;
extract($_GET);
require("../../connect_db.php");
$sql=("SELECT * FROM login where id='$pr'");
$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
$programa=$arreglo[11];
 if ($arreglo[2]!='Cifi') {
	require("../../desconectar.php");
	header("Location:../../../index.html");
}
}
$dir=$_SESSION['user'];
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Dirección</title>
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

<body id="idCard">

    <div class="card card-warning" style="margin-bottom: 0px; ">
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
                $totalp=0;
                require("../../connect_db.php");
                $total=0;
                 $sql=("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and (id_estudiante2=1 or id_estudiante2=2) and ID_directores='$dir' ORDER BY id_tesis DESC");
                 //$sql=("SELECT * FROM tesis where titulo_tesis like '%$buscar%' and ID_directores='Fredys Simanca' ORDER BY id_tesis DESC"); 
                 $query=mysqli_query($mysqli,$sql);
                ?>
                        <tr>
                            <th style="width: 30%">Título</th>
                            <th class="text-center">Aprob_Dir</th>
                            <th class="text-center">Documento</th>
                            <th class="text-center">Opción de grado</th>
                            <th class="text-center">Fecha_Entrega</th>
                            <th class="text-center">Archivo</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total1=0;
                        $atencion = 0;
              while($arreglo=mysqli_fetch_array($query)){
                $ide=$arreglo[1]; 
				$titu=$arreglo[3];

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
                           $total1++;
                
             echo "<tr>";

             echo "<td>$arreglo[3]</td>";
             echo "<td class='text-center'>$arreglo[4]</td>";
             if($arreglo[4]=="") {
                $atencion++; 
             } 

             echo "<td class='text-center'>$arreglo[6]</td>";

             echo "<td class='text-center'>";
             switch ($arreglo[18]) {
                case 0:
                    echo "Proyecto";
                    break;
                case 1:
                  echo "Semillero";
                  break;
                case 2:
                  echo "Aux. Investigación";
                  break;
                case 3:
                  echo "Postgrados";
                  break;
                case 4:
                  echo "Curso/Diplomado";
                  break;
                default:
                  echo "";
              }
              echo "</td>";

             echo "<td class='text-center'>$arreglo[9]</td>";
              
             echo "<td class='text-center'>";
             $raiz = "../../archivos";
             if(strlen($arreglo[8]) > 1) {                         
               if(strlen($arreglo[8]) > 15) {
                   echo "
                   <a class='btn btn-primary btn-sm' href='$raiz/$alma/$arreglo[8]'
                   target='_blank'>
                   ".substr($arreglo[8],0,15)."..."."
                   </a>
                   ";
               } else {
                   echo "
               <a class='btn btn-primary btn-sm' href='$raiz/$alma/$arreglo[8]'
               target='_blank'>
               $arreglo[8]
               </a>
               ";
               }
               } else {
               echo "Archivo no disponible";
               }
               
               echo "</td>";

             echo "</tr>";
            }

            if($atencion > 0) {
                echo "<div class='alert alert-info'><strong>¡Atención!</strong> usted
                 tiene <strong>documentos</strong> para darle el visto bueno
                 </div>";
            }
            ?>
                    </tbody>
                </table>
                <?php echo "<center><font color='red' size='3'>Total registros: $total1</font><br></center>"; ?>
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