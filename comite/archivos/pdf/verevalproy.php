
<?php
 date_default_timezone_set ('America/Bogota');       
	require("../../connect_db.php");
        //include 'connect_db.php';
	include 'fpdf/fpdf.php';
//$hoy= date("Y-m-d H:i:s");
$hoy=date("d-m-Y H:i:s");
//$ff=$_POST['ff'];
//$fi=$_POST['fi'];
//$id=$_POST['id'];
extract($_GET);
		$conta=0;
		$sql="SELECT * FROM evaluacion WHERE id_tesis=$id";
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
				$conta=$conta+1;
			if($conta==1){
			
                          		    	$ide=$row[0];
                          		    	$iden=$row[1];
                          		    	$ff=$row[3];
                          		    	$fecha_eval=$row[16];
										utf8_decode($forprob=$row[2]);
										utf8_decode($justificacion=$row[3]);
										utf8_decode($objetivos=$row[4]);
										utf8_decode($marcoref=$row[5]);
										utf8_decode($metodologia=$row[6]);
										utf8_decode($crono=$row[7]);
										utf8_decode($presupuesto=$row[8]);
										utf8_decode($biblio=$row[9]);
										utf8_decode($ciber=$row[10]);
										utf8_decode($claridad=$row[11]);
										utf8_decode($evidencia=$row[12]);
										utf8_decode($concepto=$row[13]);
										//utf8_decode($objetivos=$row[14]);
										utf8_decode($jurado1=$row[15]);
			}
			if($conta==2){
			
                          		    	$ide=$row[0];
                          		    	$iden=$row[1];
                          		    	$ff=$row[3];
                          		    	$fecha_eval=$row[16];
										utf8_decode($forprob2=$row[2]);
										utf8_decode($justificacion2=$row[3]);
										utf8_decode($objetivos2=$row[4]);
										utf8_decode($marcoref2=$row[5]);
										utf8_decode($metodologia2=$row[6]);
										utf8_decode($crono2=$row[7]);
										utf8_decode($presupuesto2=$row[8]);
										utf8_decode($biblio2=$row[9]);
										utf8_decode($ciber2=$row[10]);
										utf8_decode($claridad2=$row[11]);
										utf8_decode($evidencia2=$row[12]);
										utf8_decode($concepto2=$row[13]);
										//utf8_decode($objetivos=$row[14]);
										utf8_decode($jurado2=$row[15]);
			}
			

		    	}
          $sql="SELECT * FROM tesis WHERE ID_tesis=$id";
						$ressql=mysqli_query($mysqli,$sql);
						while ($row=mysqli_fetch_row ($ressql)){
                        utf8_decode($ID_estado=$row[6]);
						utf8_decode($jurado1=$row[13]);
						utf8_decode($jurado2=$row[14]);
						utf8_decode($titulo=$row[3]);
						utf8_decode($director=$row[5]);
						utf8_decode($ID_estudiante1=$row[15]);
						utf8_decode($id_estudiante=$row[1]);
						utf8_decode($id_estudiante2=$row[18]);
						utf8_decode($id_area=$row[16]);
						utf8_decode($id_eje=$row[17]);
						
						
						
						}
		 $sql="SELECT * FROM login WHERE id=$id_estudiante";
						$ressql=mysqli_query($mysqli,$sql);
						while ($row=mysqli_fetch_row ($ressql)){
                        utf8_decode($id_estudiante=$row[3]);
                        
						}
		$sql="SELECT * FROM login WHERE id=$ID_estudiante1";
						$ressql=mysqli_query($mysqli,$sql);
						while ($row=mysqli_fetch_row ($ressql)){
                        utf8_decode($ID_estudiante1=$row[3]);
						}
		$sql="SELECT * FROM area_inves WHERE id_area=$id_area";
						$ressql=mysqli_query($mysqli,$sql);
						while ($row=mysqli_fetch_row ($ressql)){
                        utf8_decode($nombre_area=$row[1]);
						}
		$sql="SELECT * FROM ejes_tem WHERE id_eje=$id_eje";
						$ressql=mysqli_query($mysqli,$sql);
						while ($row=mysqli_fetch_row ($ressql)){
                        utf8_decode($nombre_eje=$row[1]);
						}

$sql2="SELECT * FROM evaluacion WHERE id_tesis=$id";
$result=mysqli_query($mysqli,$sql2);
	$pdf = new FPDF();
	$pdf->AddPage();
  $contador=0;
 $pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','B',8);
	 $pdf->Image('esc.png',10,10,20,0);
	$pdf->SetFont('Arial','',8);
$pdf->Cell(30, 1, ' ', 0, 0, 'C'); 
$pdf->Cell(50,10,'     UNIVERSIDAD LIBRE                                FORMATO - B                           Formato B/Jun-10/adoptado de mamm');
$pdf->Ln(4);$pdf->Cell(30, 1, ' ', 0, 0, 'C');
$pdf->Cell(40,10,'FACULTAD DE INGENIERIA           FORMULARIO DE EVALUACION                   jueves, 24 de enero de 2019');  
$pdf->Ln(4);$pdf->Cell(30, 1, ' ', 0, 0, 'C');
$pdf->Cell(30,10,'COMITE DE PROYECTOS                             INFORME FINAL                                            Pagina 1');  
$pdf->Ln(4);//$pdf->Cell(30, 1, ' ', 0, 0, 'C');
$pdf->Ln(6);$pdf->Ln(6);
while($row =$result->fetch_assoc())
	{
		$contador=$contador+1;
	if($jurado==$jurado1){
		$forprob=$row[2];
		$justificacion=$row[3];
		$objetivos=$row[4];
		$marcoref=$row[5];
		$metodologia=$row[6];
		$crono=$row[7];
		$presupuesto=$row[8];
		$biblio=$row[9];
		$ciber=$row[10];
		$claridad=$row[11];
		$evidencia=$row[12];
		$concepto=$row[13];
		
	}
	if($jurado==$jurado2){
		$forprob2=$row[2];
		$justificacion2=$row[3];
		$objetivos2=$row[4];
		$marcoref2=$row[5];
		$metodologia2=$row[6];
		$crono2=$row[7];
		$presupuesto2=$row[8];
		$biblio2=$row[9];
		$ciber2=$row[10];
		$claridad2=$row[11];
		$evidencia2=$row[12];
		$concepto2=$row[13];
	

	}


if($contador==1){

$fecha_eval=$row[16];
$pdf->SetFont('Arial','',8);
$pdf->SetFont('Arial','',9);
	$pdf->Cell(95, 6, 'Fecha de remision: Bogota, D.C. '.$row['fecha_eval'], 1, 0, 'C',1);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(95,6,'Trabajo de Grado No. '.$id,1,0,'C',1);
	$pdf->Ln(6);
	$pdf->Cell(70, 1, ' ', 0, 0, 'C');
	$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,10,'Ing. '.$jurado1);
$pdf->Ln(4);$pdf->Cell(70, 1, ' ', 0, 0, 'C');
$pdf->Cell(30,10,'Ing. '.$jurado2);
$pdf->Ln(8);
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);
$pdf->Cell(10, 6, ' ', 0, 0, 'C'); 
$pdf->MultiCell(185, 6, utf8_decode('Actuando como EVALUADORES 1 y 2 respectivamente del siguiente INFORME FINAL del Trabajo de Grado y siguiendo el REGLAMENTO DE OPCIONES DE GRADO DE 2019-I, devolvemos antes de quince dias hábiles al Comité de Proyectos de Grado  (SI-COMMITTEE), este documento completamente diligenciado:'), 0, 1, 'L',0); 
$pdf->Ln(6);
if($id_estudiante2==0){
	$tipod='Proyecto';
}
if($id_estudiante2==1){
	$tipod='Semillero';
}
if($id_estudiante2==2){
	$tipod='Curso y/o Diplomado';
}
if($id_estudiante2==3){
	$tipod=utf8_decode('Auxiliar de Investigación');
}
if($id_estudiante2==4){
	$tipod='Posgrado';
}
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(95,6,'TIPO DE INVESTIGACION:',1,0,'C',1);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(95,6,$tipod,1,0,'C',1);
	$pdf->Ln(6);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(95,6,utf8_decode('Línea de investigación:'),1,0,'C',1);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(95,6,utf8_decode($nombre_area),1,0,'C',1);
	$pdf->Ln(6);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(95,6,'Tema:',1,0,'C',1);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(95,6,utf8_decode($nombre_eje),1,0,'C',1);
	$pdf->Ln(7);
	$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);
$pdf->Cell(10, 6, ' ', 0, 0, 'C'); 
$pdf->MultiCell(10, 6, utf8_decode('Título:'), 0, 1, 'L',0); 
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(10, 6, ' ', 0, 0, 'C'); 
$pdf->MultiCell(190, 6, utf8_decode($titulo), 0, 1, 'L',0); 
$pdf->Ln(7);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(95,6,'Autores:',1,0,'C',1);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(95,6,utf8_decode($id_estudiante).', '.utf8_decode($ID_estudiante1),1,0,'C',1);
	$pdf->Ln(6);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(95,6,'Asesor:',1,0,'C',1);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(95,6,'Ing. '.$director,1,0,'C',1);
	$pdf->Ln(6);
 $pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','',11);
$pdf->Cell(26, 6, ' ', 0, 0, 'C');
	$pdf->Ln(2);
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(100,6,'CALIFICACION DEL DOCUMENTO FINAL',1,0,'C',1);
	$pdf->Cell(20,6,'VALOR',1,0,'C',1);
	$pdf->Cell(35,6,'EVALUADOR 1',1,0,'C',1);
	$pdf->Cell(35,6,'EVALUADOR 2',1,0,'C',1);
	$pdf->Ln(6);
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(100,6,'Edicion del Documento final',1,0,'C',1);
	$pdf->Cell(20,6,'2.4',1,0,'C',1);
	$pdf->Cell(35,6,$forprob,1,0,'C',1);
	$pdf->Cell(35,6,$forprob2,1,0,'C',1);
	$pdf->Ln(6);
	$pdf->Cell(100,6,'Cumplimiento de objetivos general y especificos',1,0,'C',1);
	$pdf->Cell(20,6,'8.0',1,0,'C',1);
	$pdf->Cell(35,6,$justificacion,1,0,'C',1);
	$pdf->Cell(35,6,$justificacion2,1,0,'C',1);
	$pdf->Ln(6);	
	$pdf->Cell(100,6,'Profundidad del tema',1,0,'C',1);
	$pdf->Cell(20,6,'4.0',1,0,'C',1);
	$pdf->Cell(35,6,$objetivos,1,0,'C',1);
	$pdf->Cell(35,6,$objetivos2,1,0,'C',1);
	$pdf->Ln(6);
	$pdf->Cell(100,6,'Desarrollo del tema',1,0,'C',1);
	$pdf->Cell(20,6,'4.0',1,0,'C',1);
	$pdf->Cell(35,6,$marcoref,1,0,'C',1);
	$pdf->Cell(35,6,$marcoref2,1,0,'C',1);
	$pdf->Ln(6);
	$pdf->Cell(100,6,'Tecnicas de Calculo Aplicadas',1,0,'C',1);
	$pdf->Cell(20,6,'4.8',1,0,'C',1);
	$pdf->Cell(35,6,$metodologia,1,0,'C',1);
	$pdf->Cell(35,6,$metodologia2,1,0,'C',1);
	$pdf->Ln(6);
	$pdf->Cell(100,6,'Calidad y manejo de la informacion',1,0,'C',1);
	$pdf->Cell(20,6,'3.2',1,0,'C',1);
	$pdf->Cell(35,6,$crono,1,0,'C',1);
	$pdf->Cell(35,6,$crono2,1,0,'C',1);
	$pdf->Ln(6);
	$pdf->Cell(100,6,'Impacto de los resultados',1,0,'C',1);
	$pdf->Cell(20,6,'6.4',1,0,'C',1);
	$pdf->Cell(35,6,$row['presupuesto'],1,0,'C',1);
	$pdf->Cell(35,6,$presupuesto2,1,0,'C',1);
	$pdf->Ln(6);
	$pdf->Cell(100,6,'Conclusiones y recomendaciones del proyecto',1,0,'C',1);
	$pdf->Cell(20,6,'7.2',1,0,'C',1);
	$pdf->Cell(35,6,$biblio,1,0,'C',1);
	$pdf->Cell(35,6,$biblio2,1,0,'C',1);
	$pdf->Ln(6);
	$totaldoc=($forprob+$justificacion+$objetivos+$marcoref+$metodologia+$crono+$presupuesto+$biblio)/10;
	$totaldoc2=($forprob2+$justificacion2+$objetivos2+$marcoref2+$metodologia2+$crono2+$presupuesto2+$biblio2)/10;
	
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(100,6,'Sub total',1,0,'C',1);
	$pdf->Cell(20,6,'4.0',1,0,'C',1);
	$pdf->Cell(35,6,$totaldoc,1,0,'C',1);
	$pdf->Cell(35,6,$totaldoc2,1,0,'C',1);
	$pdf->Ln(6);                            
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(100,6,'CALIFICACION DE LA SUSTENTACION',1,0,'C',1);
	$pdf->Cell(20,6,'VALOR',1,0,'C',1);
	$pdf->Cell(35,6,'EVALUADOR 1',1,0,'C',1);
	$pdf->Cell(35,6,'EVALUADOR 2',1,0,'C',1);
	$pdf->Ln(6);							 
	$pdf->SetFillColor(255,255,255);
	$pdf->SetFont('Arial','',9);
	$pdf->Cell(100,6,'Calidad de la sustentacion',1,0,'C',1);
	$pdf->Cell(20,6,'2.0',1,0,'C',1);
	$pdf->Cell(35,6,$row['ciber'],1,0,'C',1);
	$pdf->Cell(35,6,$ciber2,1,0,'C',1);
	$pdf->Ln(6); 
	$pdf->Cell(100,6,'Correlacion de la sustentacion con el documento',1,0,'C',1);
	$pdf->Cell(20,6,'2.5',1,0,'C',1);
	$pdf->Cell(35,6,$row['claridad'],1,0,'C',1);
	$pdf->Cell(35,6,$claridad2,1,0,'C',1);
	$pdf->Ln(6); 
	$pdf->Cell(100,6,'Respuestas y aclaracion de dudas',1,0,'C',1);
	$pdf->Cell(20,6,'3.0',1,0,'C',1);
	$pdf->Cell(35,6,$row['evidencia'],1,0,'C',1);
	$pdf->Cell(35,6,$evidencia2,1,0,'C',1);
	$pdf->Ln(6); 
	$pdf->Cell(100,6,'Dominio del tema',1,0,'C',1);
	$pdf->Cell(20,6,'2.5',1,0,'C',1);
	$pdf->Cell(35,6,$row['concepto'],1,0,'C',1);
	$pdf->Cell(35,6,$concepto2,1,0,'C',1);
	$pdf->Ln(6); 
	$totalsus=($row['ciber']+$row['claridad']+$row['evidencia']+$row['concepto'])/10;
	$totalsus2=($ciber2+$claridad2+$evidencia2+$concepto2)/10;
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(100,6,'Sub total',1,0,'C',1);
	$pdf->Cell(20,6,'1.0',1,0,'C',1);
	$pdf->Cell(35,6,$totalsus,1,0,'C',1);
	$pdf->Cell(35,6,$totalsus2,1,0,'C',1);
	$pdf->Ln(6);   
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(100,6,'TOTAL',1,0,'C',1);
	$pdf->Cell(20,6,'5.0',1,0,'C',1);
	$pdf->Cell(35,6,$totalsus+$totaldoc,1,0,'C',1);
	$pdf->Cell(35,6,$totalsus2+$totaldoc2,1,0,'C',1);
	$pdf->Ln(6); 
$pdf->SetFont('Arial','',9);
$pdf->Cell(60, 6,'SI-COMMITTEE: '.$row['id'].','.$id, 0, 1, 'C'); 
}
}
if($totalsus==0 and $totaldoc>0){
$pdf->Ln(2); 
$pdf->SetFont('Arial','',10);
$pdf->MultiCell(190, 6,utf8_decode('Nota: En el próximo Comité se definirá la fecha de Sustentación y/o se recibirán correcciones si las hay.: ').$row['id'].','.$id, 0, 1, 'C'); 	
	
}
if($totalsus==0 and $totaldoc==0){
	$pdf->SetFont('Arial','',8);
$pdf->Cell(10, 6, ' ', 0, 0, 'C'); 
$pdf->MultiCell(10, 6, utf8_decode('Título:'), 0, 1, 'L',0); 
	$pdf->SetFont('Arial','B',9);
	$pdf->Cell(10, 6, ' ', 0, 0, 'C'); 
$pdf->MultiCell(190, 6, utf8_decode($titulo), 0, 1, 'L',0); 
$pdf->Ln(2); 
$pdf->SetFont('Arial','',12);
$pdf->Cell(160, 6,utf8_decode('Nota: Aun no se ha hecho la evaluacíon: ').$row['id'].','.$id, 0, 1, 'C'); 	
	
}

$pdf->Ln(18); 
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',10);
$pdf->Cell(190, 6, '___________________                                           __________________ ', 0, 0, 'C'); 
$pdf->Ln(4); 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 6, 'EVALUADOR 1                                                  EVALUADOR 2 ', 0, 0, 'C'); 
$pdf->MultiCell(160, 6, '', 0, 1, 'L',0); 

	
while($row =$result->fetch_assoc())
{
	$pdf->Cell(200, 6, $row['user'], 0, 1, 'C');
}
	$pdf->Output();
?>				