<!DOCTYPE html>

<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works

session_start();
if (@!$_SESSION['user']) {
    header("Location:../Login/index.html");
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
    <title>SI-COMMITEE || Postgrado</title>
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
                $total4=0;

                $sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscar%'  and programa='$programa' and ID_Estudiante2=4  ORDER BY  ID_tesis DESC");
              // $sql=("SELECT * FROM tesis where titulo_tesis like '%$buscar%'"); 
               $query=mysqli_query($mysqli,$sql);
                
                ?>
                        <tr>
                            <th style="width: 40%">Título</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Archivo</th>
                            <th class="text-center">Fecha Registro</th>
                            <th class="text-center">Editar</th>
                            <th class="text-center">Borrar</th>
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
              
              if(strlen($arreglo[8]) > 1) {
                echo "<td class='text-center'>
                <a class='btn btn-primary btn-sm' href='../../archivos/$alma/$arreglo[8]'
                target='_blank'>
                $arreglo[8]
                </a>
                </td>
                ";
                } else {
                echo "<td class='text-center'> </td>";
                }

                echo "<td class='text-center'>$arreglo[9]</td>";
             
             echo "<td class='text-center'>
             <a class='btn btn-info btn-sm' href='2.1-act_tesis_coor.php?id=$arreglo[0]'>
             <i class='fas fa-pencil-alt'>
             </i>
             </a>
             </td>
             ";

             echo "<td class='text-center'>
             <a class='btn btn-danger btn-sm' href='2.2-elim_tesis_coor.php?id=$arreglo[0]'>
             <i class='fas fa-trash'>
             </i>
             </a>
             </td>
             "; 
             
             $total4++;
             echo "</tr>";
            }
            ?>

                    </tbody>
                </table>
                <?php echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>"; ?>
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
}
</script>

</html>