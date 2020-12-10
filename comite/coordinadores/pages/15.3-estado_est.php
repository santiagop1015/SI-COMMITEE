<!DOCTYPE html>
<?php
session_start();
if (@!$_SESSION['user']) {
    header("Location:../Login/index.html");
}

date_default_timezone_set ('America/Bogota');

extract($_GET);
//$est=$_SESSION['id'];
require("../../connect_db.php");
$nota=0;

    $sql=("SELECT * FROM login where id='$est'");
	$query=mysqli_query($mysqli,$sql);
	while($arreglo=mysqli_fetch_array($query)){
	   $programa=$arreglo[11];
	   $fecha=date("d-m-Y H:i:s");
	   $user=$arreglo[3];
	}

	$sql=("SELECT * FROM tesis where ID_estudiante='$est' and nota>0");
	$query=mysqli_query($mysqli,$sql);
	while($arreglo1=mysqli_fetch_array($query)){
	   $nota=$arreglo1[20];
	}
	if($nota>0)
	{
		$Estadoest='Graduado';
	}else{
		$Estadoest='En proceso';
	}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SI-COMMITEE || Estado Actual</title>
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
<style>
.white {
    color: white;
}
</style>

<body id="idCard">

    <div class="card card-warning" style="margin-bottom: 0px; ">
        <div class="card-header" style="background-color:#B42A2A; color: white;">
            <h3 class="card-title">
                <button type="button" class="btn btn-tool"><i class="fa fa-arrow-circle-left white"
                        onclick="history.back();"></i></button>
                Estado Actual de <strong><?php echo $user ?></strong> (<strong><?php echo $Estadoest ?></strong>)</h3>

        </div>

        <div class="card-body">

            <div class="box-body table-responsive no-padding">
                <table class="table table-bordered table-striped">
                    <thead>
                        <?php
                    $total=0;
                    $sql=("SELECT * FROM tesis where ID_estudiante='$est' or ID_estudiante1='$est'");
                 //   $sql=("SELECT * FROM tesis");
                    $query=mysqli_query($mysqli,$sql); 
                ?>
                        <tr>
                            <th style="width: 30%">Titulo Documento</th>
                            <th class="text-center">Estado</th>
                            <th class="text-center" style="width: 20%">Disposiciones</th>
                            <th class="text-center">Archivo</th>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">CIFI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
               while($arreglo=mysqli_fetch_array($query)){
                   $ID_tesis=$arreglo[0];
                   $id_estudiante2=$arreglo[18];
               /*$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
               $query=mysqli_query($mysqli,$sql);
               while($arreglo1=mysqli_fetch_array($query)){
                $certi_CIFI=$arreglo1[5];
               }*/
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

                   if($id_estudiante2==1 or $id_estudiante2==3)
				{
				
				  	echo "<tr>";
				    	echo "<td>$arreglo[3]</td>";
				    	//echo "<td>$arreglo[5]</td>";
				    	echo "<td class='text-center'>$arreglo[6]</td>";
				    	echo "<td class='text-center'>$arreglo[7]</td>";
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
				    	echo "<td class='text-center'>En Proceso </td>";
                       /* echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";
                        echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]'><img src='images/pdf.png' width='20'  height='20'  class='img-rounded'></td>";*/
					echo "</tr>";
				}else{
					echo "<tr>";
				    	echo "<td>$arreglo[3]</td>";
				    	//echo "<td>$arreglo[5]</td>";
				    	echo "<td class='text-center'>$arreglo[6]</td>";
				    	echo "<td class='text-center'>$arreglo[7]</td>";
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
				    	echo "<td class='text-center'>No Aplica </td>";
                        /*echo "<td><a href='res_eval.php?id=$arreglo[0]'><img src='images/html.png' width='30'  height='30' class='img-rounded'></td>";
                        echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]'><img src='images/pdf.png' width='20'  height='20'  class='img-rounded'></td>";*/
					echo "</tr>";
					
				}
                
              
            /*  if(strlen($arreglo[8]) > 1) {
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
                */

            
             
            /* echo "<td class='text-center'>
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
             */
             echo "</tr>";
             $total++;
            }
            ?>

                    </tbody>
                </table>
                <?php echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>"; ?>
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