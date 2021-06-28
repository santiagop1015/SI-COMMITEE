<!DOCTYPE html>
<?php

session_start();
if (@!$_SESSION['user']) {
    header("Location:../../index.html");
}
    //@$buscart=$_POST['buscart'];
    

	@$buscar=$_POST['buscar'];

date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
$usuario=$_SESSION['user'];
extract($_POST);
require("../../connect_db.php");
$sql=("SELECT * FROM login where id='$pr'");
$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
utf8_decode($programa=$arreglo[11]);
$coordir=$arreglo[4];
$passd=$arreglo[8];

/* if ($arreglo[2]!='Coordinador') {
	require("../../desconectar.php");
	header("Location:../../../index.html");
}*/
}

?>
<html>
<head>
	<title>PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

	<meta charset="utf-8">
<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "listadodeproyectos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

?>
	

</head>
<body>
	<div class="container">
		<?php
			require("../../connect_db.php");
			/*$sql=("Select * from tesis where ID_Directores='$usuario' and ID_estado='Entrega Proyecto' and nota>0 ORDER BY proyecto DESC");*/
			if ($ID_directores!='') {
              $sql = "SELECT * FROM tesis where ID_Directores='$ID_directores' and nota>0 and ((fecha_propuesta between '$fini' and '$ffin') or(fecha_ent_anteproyecto between '$fini' and '$ffin') or (proyecto between '$fini' and '$ffin' )) ORDER BY proyecto DESC";
              $nombreDocente = utf8_decode($ID_directores);
            }
            if ($Jurado!='') {
              $sql = "SELECT * FROM tesis where (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto') and (jurado1='$Jurado' or jurado2='$Jurado') and (fecha_aprob_propuesta between '$fini' and '$ffin' or fecha_ent_anteproyecto between '$fini' and '$ffin' or proyecto between '$fini' and '$ffin' ) order by fecha_aprob_propuesta";
              $nombreDocente = utf8_decode($Jurado);
            }
            if ($terminado>0) {
              $sql = "SELECT * FROM tesis where terminado='$terminado' and (fecha_propuesta between '$fini' and '$ffin' or fecha_aprob_propuesta between '$fini' and '$ffin' or fecha_ent_anteproyecto between '$fini' and '$ffin' or proyecto between '$fini' and '$ffin' ) order by proyecto asc";
             // $nombreDocente = $terminado;
              switch ($terminado) {
                case '1':
                    $nombreDocente = "En Proceso";
                    break;
                case '2':
                    $nombreDocente =  "Terminado";
                    break;
                case '3':
                    $nombreDocente = "Aplazado";
                    break;
                case '4':
                    $nombreDocente = "Rechazado";
                    break;
                case '6':
                    $nombreDocente = "Por Evaluar";
                    break;
                case '0':
                    $nombreDocente = "Por Evaluar";
                    break;
                case '7':
                    $nombreDocente = "Procesado";
                    break;
                default:
                    $nombreDocente = "Por Definir";
                    break;
              }
            }
            if ($id_area!=="" && $id_eje==0) {
              $sql = "SELECT * FROM tesis where id_area='$id_area'";
              $sqlLinea = $mysqli -> query ("SELECT * FROM area_inves where id_area='$id_area'");
			  while ($valores = mysqli_fetch_array($sqlLinea))	{
			  $nombre_area=$valores['nombre_area'];
			  }
              $nombreDocente = utf8_decode($nombre_area);
            }
            if ($id_eje!=0) {
              $sql = "SELECT * FROM tesis where id_eje='$id_eje'";
              $sqlEje = $mysqli -> query ("SELECT * FROM ejes_tem where id_eje='$id_eje'");
			  while ($valores = mysqli_fetch_array($sqlEje)) {
			    $nombre_eje=$valores['nombre_eje'];
			  }
              $nombreDocente = utf8_decode($nombre_eje);
            }

            if($id_estudiante2!=="") {
              $sql = "SELECT * FROM tesis where id_estudiante2='$id_estudiante2'";
              switch ($id_estudiante2) {
                case '0':
                    $nombreDocente='Proyecto';
                    break;
                case '1':
                    $nombreDocente='Semillero';
                    break;
                case '2':
                    $nombreDocente='Auxiliar de investigación';
                    break;
                case '3':
                    $nombreDocente='Postgrados';
                    break;
                case '4':
                    $nombreDocente='Curso/Diplomado';
                    break;
                default:
                    $nombreDocente='Curso/Diplomado';
                    break;
              }
            }

			$query=mysqli_query($mysqli,$sql);
		?>
		<table class="table-striped">
			<thead>
				<h2>Listado de proyectos <?php echo $ID_directores; ?></h2>
                <?php if ($terminado>0) { ?>
                <p><b>Estado: </b><?php echo $nombreDocente ?>, <b>Fecha inicial:</b> <?php echo $fini ?>, <b>Fecha final:</b> <?php echo $ffin ?></p>
                <?php } else if($id_area!=="" && $id_eje==0) { ?>
                <p><b>Línea de Investigación: </b><?php echo $nombreDocente; ?></p>
                <?php } else if($id_eje!=0) { ?>
                <p><b>Eje Temático: </b><?php echo $nombreDocente; ?></p>
                <?php } else if($id_estudiante2!=="") { ?>
                <p><b>Opción de grado: </b><?php echo $nombreDocente; ?></p>
                <?php } else { ?>
                <p><b>Docente: </b><?php echo $nombreDocente; ?>, <b>Fecha inicial:</b> <?php echo $fini ?>, <b>Fecha final:</b> <?php echo $ffin ?></p>
                <?php } ?>
                <br>
                <td>ID</td>
                <td>Presentado</td>
                <td>Titulo Proyecto</td>
				<td>Estudiantes</td>
				<td>Correo</td>
				<td>Nota</td>
                <td>Estado</td>
			</thead>
			<tbody>
				<?php
				while($arreglo=mysqli_fetch_array($query)){
                   
                    echo "<tr>";
                    echo "<td>$arreglo[0]</td>";
                    echo "<td>$arreglo[2]</td>";
                    echo "<td>$arreglo[3]</td>";
                    if($arreglo[15] != '0' || $arreglo[18] != '0') {
                        $sql1=("SELECT * FROM login where id='$arreglo[1]' or id='$arreglo[15]'");
                        $query1=mysqli_query($mysqli,$sql1);
                        echo "<td>";
			            while($arregloe=mysqli_fetch_array($query1)){
			                echo "$arregloe[3]<br>";
		                }
                        echo '</td>';
                        //
                        $query2=mysqli_query($mysqli,$sql1);
                        echo "<td>";
			            while($arregloc=mysqli_fetch_array($query2)){
			                echo "$arregloc[4]<br>";
		                }
                        echo '</td>';

                    } else {
                        echo "<td></td>";
                        echo "<td></td>";
                    }
                    
                    
                    //echo "<td>$arreglo[15] - $arreglo[18]</td>";
                    //echo "<td>$arreglo[15] - $arreglo[18]</td>";
                    echo "<td>$arreglo[20]</td>";
                    echo "<td>";
                    switch ($arreglo[19]) {
                        case '1':
                            echo "En Proceso";
                            break;
                        case '2':
                            echo "Terminado";
                            break;
                        case '3':
                            echo "Aplazado";
                            break;
                        case '4':
                            echo "Rechazado";
                            break;
                        case '6':
                            echo "Por Evaluar";
                            break;
                        case '0':
                            echo "Por Evaluar";
                            break;
                        case '7':
                            echo "Procesado";
                            break;
                        default:
                            echo "Por Definir";
                            break;
                    }
                    echo "</td>";

                }
				
				echo "</tr>";
				echo "</tbody>";
				echo "</table><br><br>";
				echo "<h4>Copyright © ".date("Y")." SICOMMITTEE - Unilibre</h4>";
				?>

			</div>

</body>
</html>