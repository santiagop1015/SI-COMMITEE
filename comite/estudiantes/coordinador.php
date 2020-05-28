<!DOCTYPE html>

<?php


//session_destroy();
session_start();
	@$buscart=$_POST['buscart'];
	@$buscar=$_POST['buscar'];

$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
				$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 utf8_decode($programa=$arreglo[11]);
 $coordir=$arreglo[4];
 $passd=$arreglo[8];

 if ($arreglo[2]!='Coordinador') {
	require("desconectar.php");
	header("Location:index.html");
}
}


?>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Comite Proyectos - UL -</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Pablocarr">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="css/templatemo-style.css">

    <link rel="stylesheet" type="text/css" href="estilop.css" />
    <script type="text/javascript" src="cambiarPestanna.js"></script>
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
        type="text/css">
    <link href="css/landing-page.min.css" rel="stylesheet">
</head>

<body data-offset="40" background="images/fondotot.jpg" style="background-attachment: fixed">
    <div class="well well-small">
        <?php
	include("include/cabecera.php");
	?>
        <div class="footer text-left">


            <!--<img src="img/logon.png" border="0" WIDTH="100" HEIGHT="90">-->
            <font color='bisque'> ¿Cómo manejo el SI-COMMITTEE?<br></font>
            <a href="registrar.php" class="btn btn-danger btn-sm">Registrar Información</a><a href="reportes.php"
                class="btn btn-danger btn-sm">Generar Reportes</a><a href="actualizardatoscoor.php"
                class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top"
                title="Si quiere actualizar sus datos personales...">Act Mis Datos</a><a href="directorcoord.php"
                class="btn btn-danger btn-sm" target="_blank" data-toggle="tooltip" data-placement="top"
                title="Haga clic para mostrar las direcciones...">Dir/Jur</a><a href="committee.pdf"
                class="btn btn-danger btn-sm" target="_blank" data-toggle="tooltip" data-placement="top"
                title="Haga clic para mostrar la ayuda...">Ayuda</a>


            <font color='bisque'><br> ¿Cómo manejo Mi Comité de <?php echo $programa;?>? <br></font>
            <div id="pestanas">
                <ul id=lista>
                    <li id="pestana1"><a href='javascript:cambiarPestanna(pestanas,pestana1);'>
                            <font color='green'>GenerarActa
                        </a></font>
                    </li>
                    <li id="pestana2"><a href='javascript:cambiarPestanna(pestanas,pestana2);'>
                            <font color='green'>Evaluar
                        </a></font>
                    </li>
                    <li id="pestana3"><a href='javascript:cambiarPestanna(pestanas,pestana3);'>
                            <font color='green'>Proceso
                        </a></font>
                    </li>
                    <li id="pestana4"><a href='javascript:cambiarPestanna(pestanas,pestana4);'>
                            <font color='green'>Aplazado
                        </a></font>
                    </li>
                    <li id="pestana16"><a href='javascript:cambiarPestanna(pestanas,pestana16);'>
                            <font color='green'>Rechazado
                        </a></font>
                    </li>
                    <li id="pestana5"><a href='javascript:cambiarPestanna(pestanas,pestana5);'>
                            <font color='green'>Vencer
                        </a></font>
                    </li>
                    <li id="pestana6"><a href='javascript:cambiarPestanna(pestanas,pestana6);'>
                            <font color='green'>VoBo
                        </a></font>
                    </li>
                    <li id="pestana9"><a href='javascript:cambiarPestanna(pestanas,pestana9);'>
                            <font color='green'>OtrosDoc
                        </a></font>
                    </li>
                    <li id="pestana11"><a href='javascript:cambiarPestanna(pestanas,pestana11);'>
                            <font color='red'>Semillero
                        </a></font>
                    </li>
                    <li id="pestana12"><a href='javascript:cambiarPestanna(pestanas,pestana12);'>
                            <font color='red'>Posgrado
                        </a></font>
                    </li>
                    <li id="pestana13"><a href='javascript:cambiarPestanna(pestanas,pestana13);'>
                            <font color='red'>AuxInv
                        </a></font>
                    </li>
                    <li id="pestana14"><a href='javascript:cambiarPestanna(pestanas,pestana14);'>
                            <font color='red'>Curso
                        </a></font>
                    </li>

                    <li id="pestana7"><a href='javascript:cambiarPestanna(pestanas,pestana7);'>VerActas</a></li>
                    <li id="pestana10"><a href='javascript:cambiarPestanna(pestanas,pestana10);'>Listados</a></font>
                    </li>
                    <li id="pestana8"><a href='javascript:cambiarPestanna(pestanas,pestana8);'>Buscar</a></font>
                    </li>

                </ul>


            </div>
        </div>

        <body onload="javascript:cambiarPestanna(pestanas,pestana2);">
            <div id="contenidopestanas">

                <div id="cpestana1">
                    <?php echo "<table border='1'; width='100%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=6><td bgcolor='#C0392B' width='100%' colspan=7><center><font color='white' size=5>Generar actas de Comite...</font></center></td></tr></table>";?>
                    <?php $fecha=date("Y-m-d");?>
                    <br>
                    Espacio para la generación - Acta del Comité, por favor seleccione las fechas inicial y final
                    correspondientes para su Acta.<br><br>
                    <form action="pdf/generalminutes.php" method="post">
                        Fecha Actual: <input type="date" name="fecha" class="fecha" value="<?php echo $fecha;?>">
                        Fecha Inicial: <input type="date" name="fi" class="fi" placeholder=" AAAA-MM-DD">
                        Fecha Final: <input type="date" name="ff" class="ff" placeholder=" AAAA-MM-DD"><br>
                        Programa: <input type="text" name="programa" class="programa" value="<?php echo $programa;?>"
                            readonly="readonly">
                        <input type="text" name="idc" class="idc" value="<?php echo $pr;?>" readonly="readonly"> <br>
                        <br>
                        <TEXTAREA name="disposiciones"
                            placeholder="Escriba las disposiciones del comité para esta acta..."
                            style="width:50%"></TEXTAREA><br><br>
                        <input type="submit" value="Generar Acta" class="btn btn-success btn-primary">
                    </form>
                </div>

                <div id="cpestana2">


                    <A NAME="evaluar">
                        <?php
        $total=0;
				$sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and (terminado=0 or terminado=6) and observaciones='Por definir' and (aprob_dir='SI' or ID_directores='No aplica' or ID_directores='Por definir') and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Poster' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Poster' or ID_estado='Solicitud opción de grado' or ID_estado='Certificado terminacion Materias') ORDER BY  fecha_propuesta DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='100%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=6><td bgcolor='#C0392B' width='100%' colspan=6><center><font color='white' size=5>Documentos para Evaluar...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
						echo "<td><font color='white'>Director</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
                        //echo "<td><font color='white'>Disposiciones</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
						echo "<td><font color='white'>Borrar</font></td>";

					    echo "</tr>";
			?>
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
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='red' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[5]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[6]</font></td>";
                       // echo "<td><font color='red' size='2'>$arreglo[7]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
					
			?>





                </div>
                <div id="cpestana3">
                    <A NAME="proceso">
                        <?php
        $total1=0;
				$sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and terminado=1 and (ID_estado='Entrega Poster' or ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto'  or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Solicitud opción de grado' or ID_estado='Certificado de Notas')  ORDER BY  ID_tesis DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
echo "<center><font color='white' size=5>Documentos en Proceso...</font></center>";
				echo "<table border='1'; width='100%'>";

						
						echo"<tr bgcolor='#797D7F'>";
						echo "<td ><font color='white'>Título</font></td>";
                        echo "<td ><font color='white'>Id Est</font></td>";
                        echo "<td ><font color='white'>Tipo</font></td>";

                        //echo "<td><font color='white'>Disposiciones</font></td>";
						echo "<td ><font color='white'>Archivo</font></td>";
                        echo "<td ><font color='white'>Editar</font></td>";
						echo "<td ><font color='white'>Borrar</font></td>";
						echo "<td ><font color='white'>Eval</font></td>";
					    echo "</tr>";




			?>
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
						
						
						echo "<tr bgcolor='white'>";
						if($arreglo[6]=='Entrega Propuesta'){
						echo "<td><font color='#E74C3C ' size='2'>$arreglo[3]</font></td>";
						echo "<td><font color='black' size='2'>$arreglo[1]</font></td>";
				    	echo "<td><font color='#E74C3C ' size='2'>$arreglo[6]</font></td>";

						}
						else if($arreglo[6]=='Entrega Anteproyecto'){
						echo "<td><font color='#F1C40F' size='2'>$arreglo[3]</font></td>";
						echo "<td><font color='black' size='2'>$arreglo[1]</font></td>";
				    	echo "<td><font color='#F1C40F' size='2'>$arreglo[6]</font></td>";

						}
						else if($arreglo[6]=='Entrega Proyecto'){
						echo "<td><font color='#08B180' size='2'>$arreglo[3]</font></td>";
						echo "<td><font color='black' size='2'>$arreglo[1]</font></td>";
				    	echo "<td><font color='#08B180' size='2'>$arreglo[6]</font></td>";

						}else{
							
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[1]</font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[6]</font></td>";
}

				    	echo "<td><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='20' class='img-rounded'/></a></td>";
 						if($arreglo[6]=='Entrega Proyecto'){
 							echo "<td><a href='./pdf/verevalproy.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";

 						} else if($arreglo[6]=='Entrega Poster'){
 							echo "<td><a href='./pdf/verevalposter.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";

 						}
 						else if($arreglo[6]=='Entrega Anteproyecto'){
 							echo "<td><a href='./pdf/vereval.php?id=$arreglo[0]' target='_blank'><img src='images/pdf.png' width='20'  height='10'  class='img-rounded'></a></td>";

 						}
 						else{
 						echo "<td><font color='black' size='2'>N/A</font></td>";
 						}
						echo "</tr>";
						$total1++;
						}
						echo "</table>";
					
						echo "<center><font color='red' size='3'>Total registros: $total1</font><br></center>";
						
			?>






                </div>
                <div id="cpestana4">

                    <A NAME="aplazado">
                        <?php
        $total2=0;
				$sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and terminado=3  ORDER BY  ID_tesis DESC  ");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";
						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Documentos Aplazados...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
                        echo "<td><font color='white'>Disposiciones</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
					    echo "</tr>";
			?>
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
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[6]</font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[7]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
						echo "</tr>";
						$total2++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total2</font><br></center>";
						extract($_GET);
			?>

                </div>
                <div id="cpestana16">


                    <?php
        $total2=0;
				$sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and terminado=4  ORDER BY  ID_tesis DESC  ");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";
						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Documentos Rechazados...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
                        echo "<td><font color='white'>Disposiciones</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
					    echo "</tr>";
			?>
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
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[6]</font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[7]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
						echo "</tr>";
						$total2++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total2</font><br></center>";
						extract($_GET);
			?>

                </div>
                <div id="cpestana5">
                    <?php
        $total3=0;
		$sql=("SELECT * FROM tesis  where  programa='$programa' and (terminado!=0 and terminado != 6 and terminado !=2 and terminado !=7) and (fecha_aprob_propuesta between '$fecha' and '$nuevafecha' or fecha_ent_anteproyecto between '$fecha' and '$nuevafecha' or proyecto between '$fecha ' and '$nuevafecha')  ORDER BY  ID_tesis DESC  ");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Documentos próximos a vencer...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
                        echo "<td><font color='white'>Disposiciones</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
						echo "<td><font color='white'>Msg</font></td>";
					    echo "</tr>";
			?>
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
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[6]</font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[7]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
						echo "<td><a href='enviar_msg_vencer.php?ID_estudiante=$arreglo[1]&programa=$programa'><img src='images/msg.png' width='30'  height='30' class='img-rounded'</td>";
						echo "</tr>";
						$total3++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total3</font><br></center>";
						extract($_GET);
									?>



                </div>
                <div id="cpestana6">

                    <?php
        $total4=0;
				$sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and (terminado=6 or terminado=0) and observaciones='Por definir' and aprob_dir='' and ID_directores!='No aplica' and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  ID_tesis DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Documentos pendientes VB Director...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
						echo "<td><font color='white'>Director</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
						echo "<td><font color='white' size='2'>Propuesta</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
					    echo "</tr>";
			?>
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
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[5]</font></td>";
						
				    	echo "<td><font color='red' size='2'>$arreglo[6]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[9]</font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
						echo "</tr>";
						$total4++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
						extract($_GET);
						
			?>



                </div>


                <div id="cpestana7">

                    <?php

				require("../connect_db.php");
				$sql=("SELECT * FROM actas where programa='$programa' ORDER BY  numero DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br><br><br> <A NAME='actas'>";

				echo "<table  width=98% border='1';class='table'; >";
					echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=12><center><font color='white' size=5>Actas del Comité...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td>  <font color='white'>Acta No.</td>";
						echo "<td><font color='white'>Fecha Publicacion</font></font></td>";
						//echo "<td><font color='white'>Ver Acta</font></font></td>";
						echo "<td><font color='white'>Ver Acta</font></font></td>";
						echo "<td><font color='white'>Borrar</font></font></td>";
				        echo "</tr>";
			?>

                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
				  	echo "<tr bgcolor='white'>";
				    	echo "<td border='black 9px solid'><font color='black'>$arreglo[1]</font></td>";
				    	echo "<td><font color='black'>$arreglo[4]</font></td>";
                        echo "<td><font color='black'><a href='pdf/$arreglo[6]'><img src='images/pdf.png' width='30'  height='10' class='img-rounded'></font></td>";
                        echo "<td><a href='elim_acta_coor.php?numero=$arreglo[1]&id=$arreglo[0]&programa=$programa'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
					echo "</tr>";
				}
				echo "</table>";
			?>


                </div>







                <div id="cpestana9">



                    <A NAME="evaluar">
                        <?php
        $total4=0;
				$sql=("SELECT * FROM tesis  where (ID_estado='Prorroga' or ID_estado='Solicitud opción de grado' or ID_estado='Renuncia al Proyecto' or ID_estado='Certificado de Notas' or ID_estado='Cancelar Anteproyecto' or ID_estado='Cancelar Proyecto' or ID_estado='Certificado terminacion Materias' or ID_estado='Cancelar Propuesta' or ID_estado='Solicitud opción de grado') and programa='$programa' and terminado=0 ORDER BY  ID_tesis DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Cartas-Solicitudes-Otros...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
						echo "<td><font color='white' size='2'>FechaRegsitro</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
						echo "<td><font color='white'>Borrar</font></td>";
					    echo "</tr>";
			?>
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
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[6]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[9]</font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
						echo "</tr>";
						$total4++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
						extract($_GET);
						
			?>



                </div>
                <div id="cpestana8">
                    <center><br>Clic en la opción para buscar...<br><br>
                        <a href="buscar.php" class="btn btn-danger" role="button">Buscar Documentos</a>

                        <br><br></center>
                </div>
                <div id="cpestana10">
                    <center><br>Clic en la opción para generar el listado...<br><br>
                        <a href="listado.php" class="btn btn-danger" role="button">Generar listado de Estudiantes</a>
                        <a href="listadoprof.php" class="btn btn-danger" role="button">Generar listado de Profesores</a>
                        <br><br></center>
                </div>

                <div id="cpestana11">

                    <?php
        $total=0;
				$sql=("SELECT * FROM tesis  where programa='$programa' and ID_Estudiante2=1  and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Propuesta' or ID_estado='Correccion Anteproyecto' or ID_estado='Correccion Proyecto' or ID_estado='Correccion Monografia') ORDER BY  ID_tesis DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Documentos en Semilleros...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
						echo "<td><font color='white'>Director</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
                        echo "<td><font color='white'>Disposiciones</font></td>";
                        echo "<td><font color='white'>CIFI</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
						echo "<td><font color='white'>Borrar</font></td>";

					    echo "</tr>";
			?>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						$ID_tesis=$arreglo[0];

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
					}else {
							$alma="./otros";	
						}	
						
						if($arreglo[7]!='Por definir'){
							echo "<tr bgcolor='white'>";
				    	echo "<td><font color='green' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='green' size='2'>$arreglo[5]</font></td>";
				    	echo "<td><font color='green' size='2'>$arreglo[6]</font></td>";
                        echo "<td><font color='green' size='2'>$arreglo[7]</font></td>";

                        echo "<td><font color='green' size='2'></font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";

						}else{
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='red' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[5]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[6]</font></td>";
                        echo "<td><font color='red' size='2'>$arreglo[7]</font></td>";

                        echo "<td><font color='red' size='2'></font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";}

						$total++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
						
			?>




                </div>

                <div id="cpestana12">

                    <A NAME="evaluar">
                        <?php
        $total4=0;
				$sql=("SELECT * FROM tesis  where programa='$programa' and ID_Estudiante2=4  ORDER BY  ID_tesis DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Documentos de Posgrados...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
						echo "<td><font color='white' size='2'>FechaRegsitro</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
						echo "<td><font color='white'>Borrar</font></td>";
					    echo "</tr>";
			?>
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

					if($arreglo[7]!='Por definir'){
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='green' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='green' size='2'>$arreglo[6]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='green' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
				    	echo "<td><font color='green' size='2'>$arreglo[9]</font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
						echo "</tr>";
					}else{

						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[6]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
				    	echo "<td><font color='black' size='2'>$arreglo[9]</font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='30'  height='30' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
						echo "</tr>";

					}



						$total4++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total4</font><br></center>";
						extract($_GET);
						
			?>





                </div>

                <div id="cpestana13">
                    <?php
        $total=0;
				$sql=("SELECT * FROM tesis  where programa='$programa' and ID_Estudiante2=3 and (ID_estado='Entrega Monografia' or ID_estado='Entrega Propuesta' or ID_estado='Correccion Propuesta' or ID_estado='Entrega Proyecto' or ID_estado='Correccion Proyecto' or ID_estado='Entrega Anteproyecto' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Documentos Auxiliares de Investigación...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
                        echo "<td><font color='white'>Disposiciones</font></td>";
                        echo "<td><font color='white'>CIFI</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
						echo "<td><font color='white'>Borrar</font></td>";

					    echo "</tr>";
			?>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						$ID_tesis=$arreglo[0];

					/*	$sql=("SELECT * FROM cifi where id_tesis='$ID_tesis'");
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
					}else {
							$alma="./otros";	
						}	
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[6]</font></td>";
                        echo "<td><font color='red' size='2'>$arreglo[7]</font></td>";
                        echo "<td><font color='red' size='2'>$certi_CIFI</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
						
			?>



                </div>
                <div id="cpestana14">
                    <?php
        $total=0;
				$sql=("SELECT * FROM tesis  where programa='$programa' and ID_Estudiante2=2 and (ID_estado='Entrega Monografia' or ID_estado='Correccion Monografia' or ID_estado='Solicitud opción de grado') and (terminado=1 or terminado=3 or terminado=4 or terminado=6) ORDER BY  ID_tesis DESC");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";

						echo "<tr bgcolor='#797D7F'width='100%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Documentos en Curso (Diplomados)...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
                        echo "<td><font color='white'>Tipo</font></td>";
                        echo "<td><font color='white'>Disposiciones</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
						echo "<td><font color='white'>Borrar</font></td>";

					    echo "</tr>";
			?>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						if($arreglo[6]=="Entrega Propuesta"){
							$alma="./propuestas";
						}else if($arreglo[6]=="Entrega Anteproyecto")
						{
							$alma="./anteproyectos";
						}else if($arreglo[6]=="Entrega Proyecto")
						{
							$alma="./proyectos";
						}else {
							$alma="./otros";	
						}	
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	echo "<td><font color='red' size='2'>$arreglo[6]</font></td>";
                        echo "<td><font color='red' size='2'>$arreglo[7]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
						
			?>



                </div>
                <div id="cpestana15">


                    <?php
        $total=0;
				$sql=("SELECT * FROM tesis  where titulo_tesis like '%$buscart%'  and programa='$programa' and (terminado=0 or terminado=7 or terminado=4 or terminado=3 or terminado=2)  ORDER BY  fecha_propuesta DESC LIMIT 50");
				$query=mysqli_query($mysqli,$sql);
echo "<br>";
				echo "<table border='1'; width='98%';>";

						echo "<tr bgcolor='#797D7F'width='98%'colspan=8><td bgcolor='#C0392B' width='100%' colspan=18><center><font color='white' size=5>Histórico de Documentos...</font></center></td></tr>";
						echo"<tr bgcolor='#797D7F'>";
						echo "<td><font color='white'>Título</font></td>";
						//echo "<td><font color='white'>Director</font></td>";
                        //echo "<td><font color='white'>Tipo</font></td>";
                        //echo "<td><font color='white'>Disposiciones</font></td>";
						echo "<td><font color='white'>Archivo</font></td>";
                        echo "<td><font color='white'>Editar</font></td>";
						echo "<td><font color='white'>Borrar</font></td>";

					    echo "</tr>";
			?>
                    <?php 
				 while($arreglo=mysqli_fetch_array($query)){
						$titu=$arreglo[3];
						if($arreglo[6]=="Entrega Propuesta"){
							$alma="./propuestas";
						}else if($arreglo[6]=="Entrega Anteproyecto")
						{
							$alma="./anteproyectos";
						}else if($arreglo[6]=="Entrega Proyecto")
						{
							$alma="./proyectos";
						}else {
							$alma="./otros";	
						}	
						echo "<tr bgcolor='white'>";
				    	echo "<td><font color='black' size='2'>$arreglo[3]</font></td>";
				    	//echo "<td><font color='red' size='2'>$arreglo[5]</font></td>";
				    	//echo "<td><font color='red' size='2'>$arreglo[6]</font></td>";
                       // echo "<td><font color='red' size='2'>$arreglo[7]</font></td>";
				    	echo "<td  bgcolor='#797D7F'><font color='black' size='2'> <a href='$alma/$arreglo[8]  ' target='_blank'>$arreglo[8]</a> </font></td>";
                        echo "<td><a href='act_tesis_coor.php?id=$arreglo[0]'><img src='images/actualizar.png' width='40'  height='40' class='img-rounded'></td>";
 						echo "<td><a href='elim_tesis_coor.php?id=$arreglo[0]'><img src='images/eliminar.png' width='30'  height='30' class='img-rounded'/></a></td>";
 						
						echo "</tr>";
						$total++;
						}
						echo "</table>";
						echo "<center><font color='red' size='3'>Total registros: $total</font><br></center>";
					
			?>





                </div>


            </div>



            <link href="css/freelancer.min.css" rel="stylesheet">
            <footer class="footer text-center">
                <div class="container">
                    <div class="row">

                        <!-- Footer Location -->


                        <!-- Footer Social Icons -->
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <h4 class="text-uppercase mb-4">
                                <font color='#909090'>Envíenos un Comentario!</font>
                            </h4>
                            <p class="lead mb-0">
                                <font color="#B40431" size="4" face="Times New Roman">
                                </font><br>
                                <form action="enviarmsgcoor.php" method="post">
                                    <textarea class="comentario" name="comen" cols="29" rows="6"
                                        aria-required="true"></textarea>
                                    <div id="datos">
                                        <input type="text" name="user"
                                            value="<?php echo utf8_decode($_SESSION['user']);?>"
                                            readonly="readonly"><br>
                                        <input type="text" name="programa" value="<?php echo utf8_decode($programa);?>"
                                            readonly="readonly"><br>
                                        <input type="text" name="fecha" value="<?php echo $fecha;?>"
                                            readonly="readonly">
                                    </div>
                                    <input type="submit" class="btn btn-success" name="enviar"
                                        value="Enviar Comentario">

                                </form>
                                </font>
                            </p>
                        </div>

                        <!-- Footer About Text -->
                        <div class="col-lg-5 mb-5 mb-lg-0">
                            <h4 class="text-uppercase mb-4">
                                <font color='#909090'>Ultimos Comentarios!</font>
                            </h4>
                            <p class="lead mb-0">
                                <font color="#B40431" size="4" face="Times New Roman">
                                </font><br>
                                <iframe class="embed-responsive-item" src="comentarios.php" width="90%"
                                    height="280"></iframe></font>
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="text-uppercase mb-6">
                                <font color='#909090'>Importante!</font>
                            </h4>
                            <p class="lead mb-0">
                                <font color="#909090" size="4" face="Times New Roman"><b></b><br>Este es un recurso para
                                    estar informado de lo que esta sucediendo en el comite, por favor solo, comentarios
                                    académicos.</font>
                            </p>
                        </div>

                    </div>
                </div>
            </footer>

            <!-- Footer -->
            <link href="css/freelancer.min.css" rel="stylesheet">
            <footer class="footer text-center">
                <div class="container">
                    <div class="row">

                        <!-- Footer Location -->


                        <!-- Footer Social Icons -->
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <h4 class="text-uppercase mb-4">
                                <font color='#909090'>Documentos</font>
                            </h4>
                            <p class="lead mb-0">
                                <a href="./modelo/Reglamento.pdf" class="btn btn-danger btn-sm"
                                    target="_blanck">Reglamento v3.0</a>
                                <font color='#909090'><br> Antes de marzo de 2019<br></font>
                                <a href="./modelo/reglamento-grados-ingenieria-2019.pdf" class="btn btn-danger btn-sm"
                                    target="_blanck">Reglamento v4.0 2019</a>
                                <font color='#909090'><br>A partir de marzo de 2019<br></font>
                                <a href="./modelo/propuesta.docx" class="btn btn-danger btn-sm" target="_blanck">Formato
                                    presentación Propuesta</a><br>
                                <a href="./modelo/GUÍA PARA LA ELABORACIÓN DEL ANTEPROYECTO.pdf"
                                    class="btn btn-danger btn-sm" target="_blanck">Guia Elaboración Anteproyecto</a><br>
                                <a href="./modelo/GUÍA PARA LA ELABORACIÓN DEL DOCUMENTO FINAL.pdf"
                                    class="btn btn-danger btn-sm" target="_blanck">Guia elaboración documento
                                    Final</a><br>
                                <a href="./modelo/rubrica-poster.docx" class="btn btn-danger btn-sm"
                                    target="_blanck">Rúbrica - Presentación de Póster</a>
                            </p>
                        </div>

                        <!-- Footer About Text -->
                        <div class="col-lg-5 mb-5 mb-lg-0">
                            <h4 class="text-uppercase mb-4">
                                <font color='#909090'>Información General</font>
                            </h4>
                            <p class="lead mb-0">
                                <font color='#909090'>Comite de Proyectos de
                                    Grado<br><b>Ambiental-Industrial-Mecánica-Sistemas</b><br>Espacio creado para el
                                    manejo y colaboración<br>de Proyectos de grado en la Facultad de Ingeniería <br>de
                                    la Universidad Libre.
                                    <br>Diseño y programación <br> Ing. Pablo E. Carreño H.<br>Ing. Mauricio A. Alonso
                                    M.<br>Ing. Fabian Blanco G.<br>Ing. Fredys A. Simanca H.</font><br>
                                <a href="http://www.unilibre.edu.co">Universidad Libre</a></font>
                            </p>
                        </div>
                        <div class="col-lg-3">
                            <h4 class="text-uppercase mb-6">
                                <font color='#909090'>Contacto</font>
                            </h4>
                            <p class="lead mb-0">
                                <font color='#909090'>Ing. Pablo E. Carreño H.
                                    Webmaster
                                    pabloe.carrenoh@unilibre.edu.co

                                    Programa Ingeniería de Sistemas
                                    Director: Ing. Mauricio Alonso</font>
                            </p>
                        </div>

                    </div>
                </div>
            </footer>

            <!-- Copyright Section -->
            <section class="copyright py-4 text-center text-white">
                <div class="container">
                    <small>Copyright &copy; SI-COMMITTEE 2019</small>
                </div>
            </section>




            <?php
//	include("include/pie.php");
	?>


        </body>

</html>