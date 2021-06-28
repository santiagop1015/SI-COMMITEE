<?php
	require("../../../connect_db.php");
	include '../fpdf/fpdf.php';
	date_default_timezone_set ('America/Bogota');
extract($_POST);

if ($ID_directores!='')
{ //se hace el reporte para el director
$query = "SELECT * FROM tesis where programa='$programa' and ID_directores='$ID_directores' and ((fecha_propuesta between '$fini' and '$ffin') or(fecha_ent_anteproyecto between '$fini' and '$ffin') or (proyecto between '$fini' and '$ffin' ))";
	$resultado = $mysqli->query($query);
	
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	if($programa=='Sistemas'){
	$pdf->Image('logo.png',40,20,120,0);
	}
	if($programa=='Industrial'){
	$pdf->Image('logoi.png',40,20,120,0);
	}
	if($programa=='Mecanica'){
	$pdf->Image('logom.png',40,20,120,0);
	}
	if($programa=='Ambiental'){
	$pdf->Image('logoa.png',40,20,120,0);
	}
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFont('Arial','B',10);
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								$pdf->Cell(200, 6, ' ', 0, 1, 'C');
								$pdf->MultiCell(190,6,'Docente: '.utf8_decode($ID_directores).', Fecha inicial: '.$fini.', Fecha final: '.$ffin. ' del reporte.',0,1,'C');	
								$pdf->Cell(200, 6, ' ', 0, 1, 'C');
								$pdf->SetFont('Arial','B',12);
								$pdf->SetFillColor(235,235,235);
								$pdf->MultiCell(100,6,utf8_decode('Lista de Proyectos como Director'),0,1,'C');	
       	                        $pdf->SetFont('Arial','',9);
								$contador=0;
	while($row = $resultado->fetch_assoc())
	{
		
		$contador=$contador+1;
		//$pdf->SetFillColor(232,232,232);
		//$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
		if($row['terminado']==1 or $row['terminado']==2 or $row['terminado']==3 or $row['terminado']==4 and $row['ID_directores']==$ID_directores)
		{
		$pdf->Cell(1, 6, ' ', 0, 1, 'C');
		$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
		}else{
			$contador=$contador-1;
		}
		$pdf->SetFillColor(255,255,255); 
	     
		 if($row['terminado']==1 ){
			 $ter='En Proceso';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Aprobación: ').$row['fecha_aprob_propuesta'].utf8_decode(', Anteproyecto: ').$row['fecha_ent_anteproyecto'].', Nota: '.$row['nota'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }else{
			
		 }
		 if($row['terminado']==2 ){
			 $ter='Terminado';
			 $pdf->SetFillColor(213, 245, 227);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].utf8_decode(', Fecha Terminado: ').$row['proyecto'].', Nota: '.$row['nota'], 1, 1, 'L');
		 $pdf->SetFillColor(232,232,232);
		 }else{
			
		 }
		 if($row['terminado']==3 ){
			 $ter='Aplazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }else{
			
		 }
		 if($row['terminado']==4 ){
			 $ter='Rechazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }else{
			
		 }
	}
	$pdf->SetFillColor(232,232,232);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(30, 6,'Total de proyectos: '. $contador , 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(55, 6,'Verde: Terminado - Amarillo: En Proceso', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->SetFont('Arial','B',10);
								$pdf->Cell(30, 6,utf8_decode($usuario), 0, 1, 'C'); 
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(30, 6,utf8_decode('Coordinador Comité'), 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C');
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->MultiCell(160, 6, utf8_decode('IMPORTANTE: El presente reporte, no sirve para realizar trámites, ante la Universidad, solo es de información. '), 0, 1, 'L',0);
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, utf8_decode('Copyright © 2018 Unilibre') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, utf8_decode('Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
	$pdf->Output();

 
}//termina reporte del director



if ($Jurado!='')
{ //se hace el reporte para el jurado
$query = "SELECT * FROM tesis where programa='$programa' and (ID_estado='Entrega Propuesta' or ID_estado='Entrega Anteproyecto' or ID_estado='Entrega Monografia' or ID_estado='Entrega Proyecto') and (jurado1='$Jurado' or jurado2='$Jurado') and (fecha_aprob_propuesta between '$fini' and '$ffin' or fecha_ent_anteproyecto between '$fini' and '$ffin' or proyecto between '$fini' and '$ffin' ) order by fecha_aprob_propuesta";
	$resultado = $mysqli->query($query);
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	if($programa=='Sistemas'){
	$pdf->Image('logo.png',40,20,120,0);
	}
	if($programa=='Industrial'){
	$pdf->Image('logoi.png',40,20,120,0);
	}
	if($programa=='Mecanica'){
	$pdf->Image('logom.png',40,20,120,0);
	}
	if($programa=='Ambiental'){
	$pdf->Image('logoa.png',40,20,120,0);
	}
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFont('Arial','B',10);
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	                        $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								$pdf->Cell(200, 6, ' ', 0, 1, 'C');
								$pdf->MultiCell(190,6,'Docente: '.utf8_decode($Jurado).', Fecha inicial: '.$fini.', Fecha final: '.$ffin. ' del reporte.',0,1,'C');	
								$pdf->Cell(200, 6, ' ', 0, 1, 'C');
								$pdf->SetFont('Arial','B',12);
								$pdf->SetFillColor(235,235,235);
								$pdf->MultiCell(100,6,utf8_decode('Lista de Proyectos como Jurado'),0,1,'C');	
       	                        $pdf->SetFont('Arial','',9);
								$contador=0;
	while($row = $resultado->fetch_assoc())
	{
		$contador=$contador+1;
		//$pdf->SetFillColor(232,232,232);
		//$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
		if($row['terminado']==1 or $row['terminado']==2 or $row['terminado']==3 or $row['terminado']==4)
		{
		$pdf->Cell(1, 6, ' ', 0, 1, 'C');
		$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
		}else{
			$contador=$contador-1;
		}
		$pdf->SetFillColor(255,255,255); 
	     if($row['terminado']==2){
			 $ter='Terminado';
			 $pdf->SetFillColor(213, 245, 227);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].utf8_decode(', Fecha Terminado: ').$row['proyecto'].', Nota: '.$row['nota'], 1, 1, 'L');
		 $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==1){
			 $ter='En Proceso';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Aprobación: ').$row['fecha_aprob_propuesta'].utf8_decode(', Anteproyecto: ').$row['fecha_ent_anteproyecto'].', Nota: '.$row['nota'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==3){
			 $ter='Aplazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 
		 if($row['terminado']==4){
			 $ter='Procesado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
	}
	$pdf->SetFillColor(232,232,232);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(30, 6,'Total de proyectos: '. $contador , 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->SetFont('Arial','B',10);
								$pdf->Cell(30, 6,utf8_decode($usuario), 0, 1, 'C'); 
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(30, 6,utf8_decode('Coordinador Comité'), 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C');
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->MultiCell(160, 6, utf8_decode('IMPORTANTE: El presente reporte, no sirve para realizar trámites, ante la Universidad, solo es de información. '), 0, 1, 'L',0);
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, utf8_decode('Copyright © 2018 Unilibre') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, utf8_decode('Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
	$pdf->Output();

 
}//termina reporte del jurado
if ($terminado>0){ //se hace el reporte para estado del proyecto

$query = "SELECT * FROM tesis where programa='$programa' and terminado='$terminado' and (fecha_propuesta between '$fini' and '$ffin' or fecha_aprob_propuesta between '$fini' and '$ffin' or fecha_ent_anteproyecto between '$fini' and '$ffin' or proyecto between '$fini' and '$ffin' ) order by proyecto asc";
	$resultado = $mysqli->query($query);
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	if($programa=='Sistemas'){
	$pdf->Image('logo.png',40,20,120,0);
	}
	if($programa=='Industrial'){
	$pdf->Image('logoi.png',40,20,120,0);
	}
	if($programa=='Mecanica'){
	$pdf->Image('logom.png',40,20,120,0);
	}
	if($programa=='Ambiental'){
	$pdf->Image('logoa.png',40,20,120,0);
	}



	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFont('Arial','B',10);
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	                          $pdf->Cell(1, 6, ' ', 0, 1, 'C');
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  if($terminado==1)
								  {
									  $ter='En Proceso';	
								  $pdf->MultiCell(190,6,'Estado: '.utf8_decode($ter).', Fecha inicial: '.$fini.', Fecha final: '.$ffin. ' del reporte.',0,1,'C');	
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  }
								  if($terminado==2)
								  {
									  $ter='Terminado';
								  $pdf->MultiCell(190,6,'Estado: '.utf8_decode($ter).', Fecha inicial: '.$fini.', Fecha final: '.$ffin. ' del reporte.',0,1,'C');
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  }
								  if($terminado==3)
								  {
									  $ter='Aplazado';
								  $pdf->MultiCell(190,6,'Estado: '.utf8_decode($ter).', Fecha inicial: '.$fini.', Fecha final: '.$ffin. ' del reporte.',0,1,'C');
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  }
								  if($terminado==4)
								  {
									  $ter='Rechazado';
								  $pdf->MultiCell(190,6,'Estado: '.utf8_decode($ter).', Fecha inicial: '.$fini.', Fecha final: '.$ffin. ' del reporte.',0,1,'C');
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  }
								  if($terminado==7)
								  {
									  $ter='Historico';
								  $pdf->MultiCell(190,6,'Estado: '.utf8_decode($ter).', Fecha inicial: '.$fini.', Fecha final: '.$ffin. ' del reporte.',0,1,'C');
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  }
								  if($terminado==6 or $terminado==0)
								  {
									  $ter='Por Evaluar';
								  $pdf->MultiCell(190,6,'Estado: '.utf8_decode($ter).', Fecha inicial: '.$fini.', Fecha final: '.$ffin. ' del reporte.',0,1,'C');
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  }
								  $pdf->SetFont('Arial','B',12);
								  $pdf->SetFillColor(235,235,235);
								  $pdf->MultiCell(100,6,utf8_decode('Lista de Proyectos'),0,1,'C');	
       	                          $pdf->SetFont('Arial','',9);
								  $contador=0;
	while($row = $resultado->fetch_assoc())
	{
		$contador=$contador+1;
		$user=$row['ID_estudiante'];
		$user1=$row['ID_estudiante1'];
		$pdf->SetFillColor(232,232,232);
		$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
		$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
		$pdf->SetFillColor(255,255,255); 
	    if($row['terminado']==2 and $row['nota']>0){
	     	//nombre alumno
		$sqln="SELECT * FROM login where id=$user";
		$ressql12=mysqli_query($mysqli,$sqln);
		while ($row1=mysqli_fetch_row ($ressql12)){
			$user=$row1[3];
			//$user1=$row1[3];
		    }
			//fin
			//nombre alumno
		$sqln="SELECT * FROM login where id=$user1";
		$ressql12=mysqli_query($mysqli,$sqln);
		while ($row1=mysqli_fetch_row ($ressql12)){
			//$user=$row1[3];
			$user1=$row1[3];
		    }
			//fin
			 $ter='Terminado';
			 $pdf->SetFillColor(213, 245, 227);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Estado: '.$ter.utf8_decode(', Fecha Terminado: ').$row['proyecto'].', Nota: '.$row['nota'].utf8_decode(', Estudiante: '.$user. ', '. $user1), 1, 1, 'L');
		 $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==1){
			 $ter='En Proceso';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.utf8_decode($row['ID_estado']).', Estado: '.$ter.utf8_decode(', Fecha propuesta: ').$row['fecha_propuesta'].utf8_decode(', Fecha_aprob_propuesta: ').$row['fecha_aprob_propuesta'].utf8_decode(', Fecha_ent_Anteproyecto: ').$row['fecha_ent_anteproyecto'].utf8_decode(', Fecha_ent_Proyecto: ').$row['proyecto'].', Nota: '.$row['nota'].', Evaluadores: '.$row['jurado1'].', '.$row['jurado2'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==3){
			 $ter='Aplazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha propuesta: ').$row['fecha_propuesta'].utf8_decode(', Fecha_aprob_propuesta: ').$row['fecha_aprob_propuesta'].utf8_decode(', Fecha_ent_Anteproyecto: ').$row['fecha_ent_anteproyecto'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==4){
			 $ter='Rechazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha propuesta: ').$row['fecha_propuesta'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==7){
			 $ter='Historico';
			 $pdf->SetFillColor(249, 249, 249);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha propuesta: ').$row['fecha_propuesta'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==6 or $row['terminado']==0){
			 $ter='Por Evaluar';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha propuesta: ').$row['fecha_propuesta'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
	}
	$pdf->SetFillColor(232,232,232);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(30, 6,'Total de proyectos: '. $contador , 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->SetFont('Arial','B',10);
								$pdf->Cell(30, 6,utf8_decode($usuario), 0, 1, 'C'); 
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(30, 6,utf8_decode('Coordinador Comité'), 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C');
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								//$pdf->MultiCell(160, 6, utf8_decode('IMPORTANTE: El presente reporte, no sirve para realizar trámites, ante la Universidad, solo es de información. '), 0, 1, 'L',0);
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, utf8_decode('Copyright © 2018 Unilibre') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, utf8_decode('Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
	$pdf->Output();
}//termina reporte del estado

if ($id_area!=="" && $id_eje==0){ //se hace el reporte para linea de investigacion

$query = "SELECT * FROM tesis where programa='$programa' and id_area='$id_area'";
	$resultado = $mysqli->query($query);
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	if($programa=='Sistemas'){
	$pdf->Image('logo.png',40,20,120,0);
	}
	if($programa=='Industrial'){
	$pdf->Image('logoi.png',40,20,120,0);
	}
	if($programa=='Mecanica'){
	$pdf->Image('logom.png',40,20,120,0);
	}
	if($programa=='Ambiental'){
	$pdf->Image('logoa.png',40,20,120,0);
	}
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFont('Arial','B',10);
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
									$query = $mysqli -> query ("SELECT * FROM area_inves where programa='$programa' and id_area='$id_area'");
									while ($valores = mysqli_fetch_array($query))	{
									$nombre_area=$valores['nombre_area'];
														}
								  $pdf->MultiCell(100,6,utf8_decode('Línea de Investigación: ').utf8_decode($nombre_area),0,1,'C');	
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  $pdf->SetFont('Arial','B',12);
								  $pdf->SetFillColor(235,235,235);
								  $pdf->MultiCell(100,6,utf8_decode('Lista de Proyectos'),0,1,'C');	
       	                          $pdf->SetFont('Arial','',9);
								  $contador=0;
	while($row = $resultado->fetch_assoc())
	{
		$contador=$contador+1;
		$pdf->SetFillColor(232,232,232);
		$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
		$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
		$pdf->SetFillColor(255,255,255); 
	     if($row['terminado']==2){
			 $ter='Terminado';
			 $pdf->SetFillColor(213, 245, 227);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].utf8_decode(', Fecha Terminado: ').$row['proyecto'].', Nota: '.$row['nota'], 1, 1, 'L');
		 $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==1){
			 $ter='En Proceso';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==3){
			 $ter='Aplazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==4){
			 $ter='Rechazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==7){
			 $ter='Procesado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
	}
	$pdf->SetFillColor(232,232,232);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(30, 6,'Total de proyectos: '. $contador , 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->SetFont('Arial','B',10);
								$pdf->Cell(30, 6,utf8_decode($usuario), 0, 1, 'C'); 
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(30, 6,utf8_decode('Coordinador Comité'), 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C');
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->MultiCell(160, 6, utf8_decode('IMPORTANTE: El presente reporte, no sirve para realizar trámites, ante la Universidad, solo es de información. '), 0, 1, 'L',0);
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, utf8_decode('Copyright © 2018 Unilibre') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, utf8_decode('Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
	$pdf->Output();
}//termina reporte del area

if ($id_eje!=0){ //se hace el reporte para eje tematico

$query = "SELECT * FROM tesis where programa='$programa' and id_eje='$id_eje'";
	$resultado = $mysqli->query($query);
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	if($programa=='Sistemas'){
	$pdf->Image('logo.png',40,20,120,0);
	}
	if($programa=='Industrial'){
	$pdf->Image('logoi.png',40,20,120,0);
	}
	if($programa=='Mecanica'){
	$pdf->Image('logom.png',40,20,120,0);
	}
	if($programa=='Ambiental'){
	$pdf->Image('logoa.png',40,20,120,0);
	}
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFont('Arial','B',10);
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  //$pdf->MultiCell(70,6,utf8_decode('Programa: '.$programa),1,0,'C');	
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								  $query = $mysqli -> query ("SELECT * FROM ejes_tem where programa='$programa' and id_eje='$id_eje'");
								  while ($valores = mysqli_fetch_array($query))	{
									$nombre_eje=$valores['nombre_eje'];
														}
								  $pdf->MultiCell(100,6,utf8_decode('Eje Temático: ').utf8_decode($nombre_eje),0,1,'C');	
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C');
								
								  
								  $pdf->SetFont('Arial','B',12);
								  $pdf->SetFillColor(235,235,235);
								  $pdf->MultiCell(100,6,utf8_decode('Lista de Proyectos'),0,1,'C');	
       	                          $pdf->SetFont('Arial','',9);
								  $contador=0;
	while($row = $resultado->fetch_assoc())
	{
		$contador=$contador+1;
		$pdf->SetFillColor(232,232,232);
		$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
		$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
		$pdf->SetFillColor(255,255,255); 
	     if($row['terminado']==2){
			 $ter='Terminado';
			 $pdf->SetFillColor(213, 245, 227);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].utf8_decode(', Fecha Terminado: ').$row['proyecto'].', Nota: '.$row['nota'], 1, 1, 'L');
		 $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==1){
			 $ter='En Proceso';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'], 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==3){
			 $ter='Aplazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==4){
			 $ter='Rechazado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
		 if($row['terminado']==5){
			 $ter='Procesado';
			 $pdf->SetFillColor(249, 231, 159);
			 $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
		  $pdf->SetFillColor(232,232,232);
		 }
	}
	$pdf->SetFillColor(232,232,232);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(30, 6,'Total de proyectos: '. $contador , 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->SetFont('Arial','B',10);
								$pdf->Cell(30, 6,utf8_decode($usuario), 0, 1, 'C'); 
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(30, 6,utf8_decode('Coordinador Comité'), 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C');
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->MultiCell(160, 6, utf8_decode('IMPORTANTE: El presente reporte, no sirve para realizar trámites, ante la Universidad, solo es de información. '), 0, 1, 'L',0);
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, utf8_decode('Copyright © 2018 Unilibre') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, utf8_decode('Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
	$pdf->Output();
}//termina reporte del eje

if($id_estudiante2!=="") {
   //echo $id_estudiante2;
   $query = "SELECT * FROM tesis where programa='$programa' and id_estudiante2='$id_estudiante2'";
   $resultado = $mysqli->query($query);
   $pdf = new FPDF();
   $pdf->AliasNbPages();
   $pdf->AddPage();
   if($programa=='Sistemas'){
   $pdf->Image('logo.png',40,20,120,0);
   }
   if($programa=='Industrial'){
   $pdf->Image('logoi.png',40,20,120,0);
   }
   if($programa=='Mecanica'){
   $pdf->Image('logom.png',40,20,120,0);
   }
   if($programa=='Ambiental'){
   $pdf->Image('logoa.png',40,20,120,0);
   }
   $pdf->SetFillColor(232,232,232);
   $pdf->SetFont('Arial','B',12);
   $pdf->SetFont('Arial','B',10);

   $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	$pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	$pdf->Cell(200, 6, ' ', 0, 1, 'C');
		//$pdf->MultiCell(70,6,utf8_decode('Programa: '.$programa),1,0,'C');	
		$pdf->Cell(200, 6, ' ', 0, 1, 'C');
        
		/*if($id_estudiante2 == 0) {
		   $nombre_eje='Proyecto';
		} else {

		}*/
		switch ($id_estudiante2) {
			case '0':
				$nombre_eje='Proyecto';
				break;
			case '1':
				$nombre_eje='Semillero';
				break;
			case '2':
				$nombre_eje='Auxiliar de investigación';
				break;
			case '3':
				$nombre_eje='Postgrados';
				break;
			case '4':
				$nombre_eje='Curso/Diplomado';
				break;
			default:
			$nombre_eje='Curso/Diplomado';
				break;
		}
		//$query = $mysqli -> query ("SELECT * FROM ejes_tem where programa='$programa' and id_eje='$id_eje'");
		//while ($valores = mysqli_fetch_array($query))	{
		//  $nombre_eje=$valores['nombre_eje'];
		//}
				$pdf->MultiCell(100,6,utf8_decode('Opción de grado: ').utf8_decode($nombre_eje),0,1,'C');	
				$pdf->Cell(200, 6, ' ', 0, 1, 'C');
			
				
				$pdf->SetFont('Arial','B',12);
				$pdf->SetFillColor(235,235,235);
				$pdf->MultiCell(100,6,utf8_decode('Lista de Proyectos'),0,1,'C');	
       	        $pdf->SetFont('Arial','',9);
				$contador=0;

			while($row = $resultado->fetch_assoc())
			{
				if($row['terminado']==1 or $row['terminado']==2 or $row['terminado']==3 or $row['terminado']==4 or $row['terminado']==5) {
					$contador=$contador+1;
			        $pdf->SetFillColor(232,232,232);
			        $pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
			        $pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
			        $pdf->SetFillColor(255,255,255);
				} else {
					$contador=$contador-1;
				}
			 /* $contador=$contador+1;
			  $pdf->SetFillColor(232,232,232);
			  $pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
			  $pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
			  $pdf->SetFillColor(255,255,255); */
			   if($row['terminado']==2){
				   $ter='Terminado';
				   $pdf->SetFillColor(213, 245, 227);
				   $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].utf8_decode(', Fecha Terminado: ').$row['proyecto'].', Nota: '.$row['nota'], 1, 1, 'L');
			   $pdf->SetFillColor(232,232,232);
			   }
			   if($row['terminado']==1){
				   $ter='En Proceso';
				   $pdf->SetFillColor(249, 231, 159);
				   $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'], 1, 1, 'L');
				$pdf->SetFillColor(232,232,232);
			   }
			   if($row['terminado']==3){
				   $ter='Aplazado';
				   $pdf->SetFillColor(249, 231, 159);
				   $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
				$pdf->SetFillColor(232,232,232);
			   }
			   if($row['terminado']==4){
				   $ter='Rechazado';
				   $pdf->SetFillColor(249, 231, 159);
				   $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
				$pdf->SetFillColor(232,232,232);
			   }
			   if($row['terminado']==5){
				   $ter='Procesado';
				   $pdf->SetFillColor(249, 231, 159);
				   $pdf->MultiCell(190, 6, 'Titulo proyecto: '.utf8_decode($row['Titulo_tesis']).', Tipo: '.$row['ID_estado'].', Estado: '.$ter.utf8_decode(', Fecha aprobación propuesta: ').$row['fecha_aprob_propuesta'].', Nota: '.$ter.utf8_decode(', Fecha aprobación propuesta: '), 1, 1, 'L');
				$pdf->SetFillColor(232,232,232);
			   }
			}
	
	$pdf->SetFillColor(232,232,232);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(30, 6,'Total de proyectos: '. $contador , 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
								$pdf->SetFont('Arial','B',10);
								$pdf->Cell(30, 6,utf8_decode($usuario), 0, 1, 'C'); 
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(30, 6,utf8_decode('Coordinador Comité'), 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(1, 6, ' ', 0, 1, 'C');
								$pdf->SetFont('Arial','',8);
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->MultiCell(160, 6, utf8_decode('IMPORTANTE: El presente reporte, no sirve para realizar trámites, ante la Universidad, solo es de información. '), 0, 1, 'L',0);
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, utf8_decode('Copyright © 2018 Unilibre') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, utf8_decode('Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación') , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
	$pdf->Output();
}	

if($id_user!=="") {
	//$query = "SELECT * FROM tesis where programa='$programa' and id_estudiante2='$id_estudiante2'";
	//$resultado = $mysqli->query($query);
	$pdf = new FPDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	if($programa=='Sistemas'){
	$pdf->Image('logo.png',40,20,120,0);
	}
	if($programa=='Industrial'){
	$pdf->Image('logoi.png',40,20,120,0);
	}
	if($programa=='Mecanica'){
	$pdf->Image('logom.png',40,20,120,0);
	}
	if($programa=='Ambiental'){
	$pdf->Image('logoa.png',40,20,120,0);
	}
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFont('Arial','B',10);
 
	$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
		   $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
		   $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
		   $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
		   $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
		   $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
		   $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
		   $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
		   $pdf->Cell(200, 6, ' ', 0, 1, 'C');
		 //$pdf->MultiCell(70,6,utf8_decode('Programa: '.$programa),1,0,'C');	
		 $pdf->Cell(200, 6, ' ', 0, 1, 'C');
		 
		 $query = $mysqli -> query ("SELECT * FROM login where id='$id_user'");
		 while ($valores = mysqli_fetch_array($query))	{
		   $nombre_user=$valores['user'];
		 }

		 $query2 = $mysqli -> query ("SELECT * FROM entradas where id_user='$id_user'");
		 while ($valores2 = mysqli_fetch_array($query2))	{
		   $cantidad_entradas=$valores2['total'];
		   $ultima_fecha=$valores2['fecha'];
		 }

				 $pdf->MultiCell(100,6,utf8_decode('Usuario: ').utf8_decode($nombre_user),0,1,'C');	
				 $pdf->Cell(200, 6, ' ', 0, 1, 'C');
			 
				 
				 $pdf->SetFont('Arial','B',12);
				 $pdf->SetFillColor(235,235,235);
				 if(isset($cantidad_entradas) and isset($ultima_fecha)){
					$pdf->MultiCell(100,6,utf8_decode('Cantidad de entradas: ').utf8_decode($cantidad_entradas),0,1,'C');	
					$pdf->MultiCell(100,6,utf8_decode('Ultima fecha de ingreso: ').utf8_decode($ultima_fecha),0,1,'C');
				 } else {
                    $pdf->MultiCell(100,6,utf8_decode('No se encontro los ingresos para este usuario'),0,1,'C');
				 }
				 	
				 $pdf->SetFont('Arial','',9);
				 $pdf->SetFillColor(232,232,232);
				 $pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
				 
                 $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	         $pdf->Cell(200, 6, '', 0, 1, 'C'); 
				 $pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
				 $pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
				 $pdf->SetFont('Arial','B',10);
				 $pdf->Cell(30, 6,utf8_decode($usuario), 0, 1, 'C'); 
				 $pdf->SetFont('Arial','',8);
				 $pdf->Cell(30, 6,utf8_decode('Coordinador Comité'), 0, 1, 'C'); 
      	         $pdf->Cell(200, 6, '', 0, 1, 'C'); 
				 $pdf->SetFillColor(255,255,255);
				 $pdf->Cell(1, 6, ' ', 0, 1, 'C');
				 $pdf->SetFont('Arial','',8);
				 $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
				 $pdf->MultiCell(160, 6, utf8_decode('IMPORTANTE: El presente reporte, no sirve para realizar trámites, ante la Universidad, solo es de información. '), 0, 1, 'L',0);
                 $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	         $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	         $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                 $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
				 $pdf->SetFont('Arial','',10);
       	         $pdf->Cell(130, 6, utf8_decode('Copyright © 2018 Unilibre') , 0, 1, 'C'); 
				 $pdf->SetFont('Arial','',10);
       	         $pdf->Cell(180, 6, utf8_decode('Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación') , 0, 1, 'C'); 
				 $pdf->SetFont('Arial','',10);

				 $contador=0;
				 $pdf->Output();
}

?>	
