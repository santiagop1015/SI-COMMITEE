<?php
	require("../../connect_db.php");
	include 'fpdf/fpdf.php';
	date_default_timezone_set ('America/Bogota');
    utf8_decode(extract($_POST));


$sqln="SELECT * FROM actas where programa='$programa' ORDER BY numero asc";
		$ressql12=mysqli_query($mysqli,$sqln);
		while ($row=mysqli_fetch_row ($ressql12)){
        $numeroacta=$row[1]+1;
		$codver=$row[0];
		    }


$sqln="SELECT * FROM actas where programa='$programa' ORDER BY numero asc";
		$ressql12=mysqli_query($mysqli,$sqln);
		while ($row=mysqli_fetch_row ($ressql12)){
		    }

if($numeroacta==0){
$numeroacta=1;
}
$sql2="SELECT l.user, l.cedula, l.email, l.programa, t.ID_directores, t.Titulo_tesis, t.fecha_propuesta, t.observaciones, t.ID_estado, t.programa, t.ID_estudiante1
FROM login l
LEFT JOIN tesis t ON l.id = t.id_estudiante
where   t.programa='$programa' and (terminado!=5 or terminado!=0) and (aprob_dir='SI') and ( t.fecha_propuesta between '$fi 'and '$ff' or t.fecha_aprob_propuesta between '$fi 'and '$ff' or t.fecha_ent_anteproyecto between '$fi 'and '$ff' or t.proyecto between '$fi 'and '$ff')  ";
$result=mysqli_query($mysqli,$sql2);

If($programa=='Sistemas')	
{

	$pdf = new FPDF();

	$pdf->AddPage();
        $pdf->Image('../images/logo.png',40,20,120,0);
       	                         $pdf->SetFont('Arial','B',15);
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');                        
       	                          $pdf->SetFont('Arial','B',12);
								                  $pdf->Cell(200, 6, 'Acta No.  '.$numeroacta.' id-'.$codver.' c '.$idc, 0, 1, 'C'); 								  
								                  $pdf->SetFont('Arial','B',12);
       	                          $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(10, 6, 'Fecha:  ' . $fecha, 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, '', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
       	                          $pdf->SetFont('Arial','U',12);
      	                          $pdf->Cell(20, 6, '', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'ASISTENTES ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Mauricio Alonso Moncada (Director del Programa).', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Pablo Carreno. H (Coordinador del Comite).', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'Ing. Fabian Blanco Garrido. (Profesor)  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Fredys Simanca.H. (Profesor) ', 0, 1, 'L'); 
      	                          //$pdf->Cell(20, 6, ' ', 0, 0, 'C');  
      	                          //$pdf->Cell(200, 6, 'Msc. Diana Jaimes (Profesora invitada)', 0, 1, 'L'); 
     	                            $pdf->Cell(20, 6, ' ', 0, 0, 'C');
     	                            $pdf->Cell(200, 6, 'Alexandra Ortega C. (Estudiante)', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'ORDEN DEL DIA  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '1. LLAMADO A LISTA Y VERIFICACION DEL  QUORUM ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '3. SOLICITUDES RECIBIDAS DE ESTUDIANTES ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '4. DISPOSICIONES VARIAS   ', 0, 1, 'L'); 
       	                          $pdf->SetFont('Arial','U',12);
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->Cell(200, 6, 'DESARROLLO ORDEN DEL DIA ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '1. LLAMADO A LISTA ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Los integrantes del comité asistieron en su totalidad ', 0, 1, 'L'); 
 	                                $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Cumplido; se aprobó el acta anterior sin ninguna modificacion.  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								                  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '3. SOLICITUDES RECIBIDAS DE ESTUDIANTES ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C');
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
//---------------------------------------------------------------------------------- Cuadro-----------------------------------------------------------------------------
$contador=0;
while($row =$result->fetch_assoc())
{
$compa=intval($row['ID_estudiante1']);
$contador=$contador+1;
$pdf->SetFillColor(232,232,232);
$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','',11);
if($compa>0){
$sql5="SELECT * FROM login WHERE id=$compa";
		$ressql=mysqli_query($mysqli,$sql5);
while ($row2=mysqli_fetch_row ($ressql)){
		    	$id=$row2[3];
		    	$fis=$row2[1];		    	
		    	}
$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'De: '.utf8_decode($row['user']).', C.C:'.$row['cedula'].' , '.utf8_decode($id).', C.C: '.$fis, 1, 1, 'L');
}else{
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C');  
                                $pdf->MultiCell(160, 6, 'De: '.utf8_decode($row['user']).', C.C: '.$row['cedula'], 1, 1, 'L');
 } 
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'Contexto:   '.utf8_decode($row['ID_estado']).', " '.utf8_decode($row['Titulo_tesis']).'", Dir: '.utf8_decode($row['ID_directores']), 1, 1, 'L');
      	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'Disposiciones: '.utf8_decode($row['observaciones']) , 1, 1, 'L');
								$pdf->Cell(20, 6, ' ', 0, 0, 'C');  

}
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                        $pdf->SetFont('Arial','B',12);
      	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                        $pdf->Cell(180, 6, '4. DISPOSICIONES. ', 0, 1, 'L'); 
                                $pdf->SetFont('Arial','',12);
       	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, ''.$disposiciones, 0, 1, 'L',0);
     	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(20, 6, '', 0, 1, 'C');
       	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, 'Ing. Mauricio Alonso Moncada' , 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, 'Ing. Pablo Carreno. H  ' , 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, 'Ing. Fabian Blanco Garrido. ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, 'Ing. Fredys Simanca.H. ', 0,1, 'L'); 
      	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								//$pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								//$pdf->Cell(80, 6, 'Msc. Diana Jaimes ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, 'Alexandra Ortega C.', 0,1, 'L'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 0, 'C'); 

								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, 'Copyright © 2018 Unilibre' , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, 'Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación' , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(170, 6, 'Cod-Ver-bd No.  '.$numeroacta.' id-'.$codver.' c '.$idc, 0, 1, 'C'); 

while($row =$result->fetch_assoc())
{
	$pdf->Cell(200, 6, $row['user'], 0, 1, 'C');
}
	//$pdf->Output();
//generar acta numero consecutivo

  $pdf->Output('as'.$numeroacta.'.pdf', 'F'); 
  $nombrear='as'.$numeroacta.'.pdf';
  utf8_decode($disposiciones=$nombrear);
  mysqli_query($mysqli,"INSERT INTO actas VALUES('','$numeroacta','$fi','$ff','$fecha','$programa','$disposiciones')");

$pdf->Output();
	}
//industrial ------------------------------------------------------------

If($programa=='Industrial')	
{
	$pdf = new FPDF();
	$pdf->AddPage();
        $pdf->Image('logoi.png',40,20,120,0);
       	                         $pdf->SetFont('Arial','B',15);
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');                        
       	                          $pdf->SetFont('Arial','B',12);
								  $pdf->Cell(200, 6, 'Acta No.  '.$numeroacta.' id-'.$codver.' c '.$idc, 0, 1, 'C'); 								  
								  $pdf->SetFont('Arial','B',12);
       	                          $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(10, 6, 'Fecha:  ' . date("d M Y"), 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, '', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
       	                          $pdf->SetFont('Arial','U',12);
      	                          $pdf->Cell(20, 6, '', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'ASISTENTES ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Andrés Guarín Salinas(Director del Programa)', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Orlando de Antonio Suaréz (Coordinador del Comité)' , 0, 1, 'L');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'Ing. Ever Fuentes Rojas ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Est. Juan Sebastián Espitia Lancheros ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C');  
     	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'ORDEN DEL DIA  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '1. LLAMADO A LISTA Y VERIFICACION DEL  QUORUM ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '3. SOLICITUDES RECIBIDAS DE ESTUDIANTES ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '4. DISPOSICIONES VARIAS   ', 0, 1, 'L'); 
       	                          $pdf->SetFont('Arial','U',12);
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->Cell(200, 6, 'DESARROLLO ORDEN DEL DIA ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '1. LLAMADO A LISTA ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Los integrantes del comité asistieron en su totalidad ', 0, 1, 'L'); 
 	                              $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Cumplido; se aprobó el acta anterior sin ninguna modificacion.  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '3. SOLICITUDES RECIBIDAS DE ESTUDIANTES ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C');
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
//---------------------------------------------------------------------------------- Cuadro-----------------------------------------------------------------------------
$contador=0;
while($row =$result->fetch_assoc())
{
$compa=intval($row['ID_estudiante1']);
$contador=$contador+1;
$pdf->SetFillColor(232,232,232);
$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','',11);
if($compa>0){
$sql5="SELECT * FROM login WHERE id=$compa";
		$ressql=mysqli_query($mysqli,$sql5);
while ($row2=mysqli_fetch_row ($ressql)){
		    	$id=$row2[3];
		    	$fis=$row2[1];		    	
		    	}
$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'De: '.utf8_decode($row['user']).', C.C:'.$row['cedula'].' , '.utf8_decode($id).', C.C: '.$fis, 1, 1, 'L');
}else{
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C');  
                                $pdf->MultiCell(160, 6, 'De: '.utf8_decode($row['user']).', C.C: '.$row['cedula'], 1, 1, 'L');
 } 
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'Contexto:   '.utf8_decode($row['ID_estado']).', " '.utf8_decode($row['Titulo_tesis']).'", Dir: '.utf8_decode($row['ID_directores']), 1, 1, 'L');
      	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'Disposiciones: '.utf8_decode($row['observaciones']) , 1, 1, 'L');
								$pdf->Cell(20, 6, ' ', 0, 0, 'C');  

}
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                        $pdf->SetFont('Arial','B',12);
      	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                        $pdf->Cell(180, 6, '4. DISPOSICIONES. ', 0, 1, 'L'); 
                                $pdf->SetFont('Arial','',12);
       	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, ''.$disposiciones, 0, 1, 'L',0);
     	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(160, 6, '', 0, 1, 'C');
								$pdf->Cell(160, 6, '', 0, 1, 'C');
								$pdf->Cell(160, 6, '', 0, 1, 'C');
								$pdf->Cell(160, 6, '', 0, 1, 'C');
								$pdf->Cell(160, 6, '', 0, 1, 'C');
                                //$pdf->Image('todos.png');
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, 'Ing. Andrés Guarín Salinas' , 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, 'Ing. Orlando de Antonio Suaréz ' , 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, 'Ing. Ever Fuentes Rojas ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, 'Est. Juan Sebastián Espitia Lancheros ', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, 'Copyright © 2018 Unilibre' , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, 'Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación' , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(170, 6, 'Cod-Ver-bd No.  '.$numeroacta.' id-'.$codver.' c '.$idc, 0, 1, 'C'); 

while($row =$result->fetch_assoc())
{
	$pdf->Cell(200, 6, $row['user'], 0, 1, 'C');
}
//generar acta numero consecutivo

  $pdf->Output('ai'.$numeroacta.'.pdf', 'F'); 
  $nombrear='ai'.$numeroacta.'.pdf';
  $disposiciones=$nombrear;
  mysqli_query($mysqli,"INSERT INTO actas VALUES('','$numeroacta','$fi','$ff','$fecha','$programa','$disposiciones')");
	$pdf->Output();
	}
//termina industrial ----------------------------------------------------

//mecanica ------------------------------------------------------------

If(utf8_decode($programa=='Mecanica'))	
{
	$pdf = new FPDF();
	$pdf->AddPage();
        $pdf->Image('logom.png',40,20,120,0);
$pdf->SetFont('Arial','B',15);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C');          
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'C');                        
                                  $pdf->SetFont('Arial','B',12);
                                  $pdf->Cell(200, 6, 'Acta No.  '.$numeroacta.' id-'.$codver.' c '.$idc, 0, 1, 'C');                  
                                  $pdf->SetFont('Arial','B',12);
                                  $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, '');
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(10, 6, 'Fecha:  ' . $fecha, 0, 1, 'L'); 
                                  $pdf->Cell(20, 6, '', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','U',12);
                                  $pdf->Cell(20, 6, '', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, 'ASISTENTES ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, '');
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, 'Fredy Alexander Aguirre Gomez(Director del Programa).', 0, 1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, 'Edilberto Carlos Vivas González (Docente Jornada Completa).', 0, 1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(180, 6, 'Ismael Marquez Lasso (Docente Jornada Completa)  ', 0, 1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, 'María Gabriela Mago Ramos (Docente Jornada Completa) ', 0, 1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, 'Mauricio Augusto Sierra Cetina (Docente Jornada Completa) ', 0, 1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, 'Andres Felipe Eslava Sarmiento (Docente Jornada Completa) ', 0, 1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, 'Ricardo Augusto Rios Linares (Docente Jornada Completa) ', 0, 1, 'L'); 
                                  //$pdf->Cell(20, 6, ' ', 0, 0, 'C');  
                                  //$pdf->Cell(200, 6, 'Msc. Diana Jaimes (Profesora invitada)', 0, 1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C');
                                  $pdf->Cell(200, 6, 'Sandra carolina Loaiza Pabón (Estudiante)', 0, 1, 'L'); 
                                  $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                  $pdf->SetFont('Arial','B',12);
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'ORDEN DEL DIA  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '1. LLAMADO A LISTA Y VERIFICACION DEL  QUORUM ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '3. SOLICITUDES RECIBIDAS DE ESTUDIANTES ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '4. DISPOSICIONES VARIAS   ', 0, 1, 'L'); 
       	                          $pdf->SetFont('Arial','U',12);
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->Cell(200, 6, 'DESARROLLO ORDEN DEL DIA ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '1. LLAMADO A LISTA ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Los integrantes del comité asistieron en su totalidad ', 0, 1, 'L'); 
 	                              $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Cumplido; se aprobó el acta anterior sin ninguna modificacion.  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '3. SOLICITUDES RECIBIDAS DE ESTUDIANTES ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C');
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
//---------------------------------------------------------------------------------- Cuadro-----------------------------------------------------------------------------
$contador=0;
while($row =$result->fetch_assoc())
{
$compa=intval($row['ID_estudiante1']);
$contador=$contador+1;
$pdf->SetFillColor(232,232,232);
$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','',11);
if($compa>0){
$sql5="SELECT * FROM login WHERE id=$compa";
		$ressql=mysqli_query($mysqli,$sql5);
while ($row2=mysqli_fetch_row ($ressql)){
		    	$id=$row2[3];
		    	$fis=$row2[1];		    	
		    	}
$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'De: '.utf8_decode($row['user']).', C.C:'.$row['cedula'].' , '.utf8_decode($id).', C.C: '.$fis, 1, 1, 'L');
}else{
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C');  
                                $pdf->MultiCell(160, 6, 'De: '.utf8_decode($row['user']).', C.C: '.$row['cedula'], 1, 1, 'L');
 } 
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'Contexto:   '.utf8_decode($row['ID_estado']).', " '.utf8_decode($row['Titulo_tesis']).'", Dir: '.utf8_decode($row['ID_directores']), 1, 1, 'L');
      	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'Disposiciones: '.utf8_decode($row['observaciones']) , 1, 1, 'L');
								$pdf->Cell(20, 6, ' ', 0, 0, 'C');  

}
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                        $pdf->SetFont('Arial','B',12);
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(180, 6, '4. DISPOSICIONES. ', 0, 1, 'L'); 
                                $pdf->SetFont('Arial','',12);
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->MultiCell(160, 6, ''.$disposiciones, 0, 1, 'L',0);
                              $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(20, 6, '', 0, 1, 'C');
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(20, 6, '', 0, 1, 'C');
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                $pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
                                $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                $pdf->Cell(80, 6, 'Fredy Alexander Aguirre' , 0, 0, 'L'); 
                                $pdf->Cell(115, 6, 'Edilberto Carlos Vivas González' , 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                $pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
                                $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                $pdf->Cell(80, 6, 'Ismael Marquez Lasso', 0, 0, 'L'); 
                                $pdf->Cell(115, 6, 'María Gabriela Mago Ramos', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
                                $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                $pdf->Cell(80, 6, 'Andres Felipe Eslava Sarmiento', 0, 0, 'L'); 
                                $pdf->Cell(115, 6, 'Mauricio Augusto Sierra Cetina', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                $pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
                                $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                $pdf->Cell(80, 6, 'Ricardo Augusto Rios Linares', 0, 0, 'L'); 
                                $pdf->Cell(115, 6, 'Sandra carolina Loaiza Pabón', 0,1, 'L'); 
                                $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(200, 6, '', 0, 0, 'C'); 

                $pdf->SetFont('Arial','',10);
                                $pdf->Cell(130, 6, 'Copyright © 2018 Unilibre' , 0, 1, 'C'); 
                $pdf->SetFont('Arial','',10);
                                $pdf->Cell(180, 6, 'Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación' , 0, 1, 'C'); 
                $pdf->SetFont('Arial','',10);
                                $pdf->Cell(170, 6, 'Cod-Ver-bd No.  '.$numeroacta.' id-'.$codver.' c '.$idc, 0, 1, 'C'); 

while($row =$result->fetch_assoc())
{
	$pdf->Cell(200, 6, $row['user'], 0, 1, 'C');
}
//generar acta numero consecutivo

  $pdf->Output('am'.$numeroacta.'.pdf', 'F'); 
  $nombrear='am'.$numeroacta.'.pdf';
  $disposiciones=$nombrear;

  mysqli_query($mysqli,"INSERT INTO actas VALUES('','$numeroacta','$fi','$ff','$fecha','$programa','$disposiciones')");
	$pdf->Output();
	}
//termina mecanica ----------------------------------------------------

//ambiental ------------------------------------------------------------

If($programa=='Ambiental')	
{
	$pdf = new FPDF();
	$pdf->AddPage();
        $pdf->Image('logoa.png',40,20,120,0);
       	                         $pdf->SetFont('Arial','B',15);
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	     
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');                        
       	                          $pdf->SetFont('Arial','B',12);
								  $pdf->Cell(200, 6, 'Acta No.  '.$numeroacta.' id-'.$codver.' c '.$idc, 0, 1, 'C'); 								  
								  $pdf->SetFont('Arial','B',12);
       	                          $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(10, 6, 'Fecha:  ' . date("d M Y"), 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, '', 0, 0, 'C'); 
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
       	                          $pdf->SetFont('Arial','U',12);
      	                          $pdf->Cell(20, 6, '', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'ASISTENTES ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. (Director del Programa)', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing.  (Coordinador del Comité)' , 0, 1, 'L');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'Ing.  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Est.  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C');  
     	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'ORDEN DEL DIA  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '1. LLAMADO A LISTA Y VERIFICACION DEL  QUORUM ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '3. SOLICITUDES RECIBIDAS DE ESTUDIANTES ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '4. DISPOSICIONES VARIAS   ', 0, 1, 'L'); 
       	                          $pdf->SetFont('Arial','U',12);
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->Cell(200, 6, 'DESARROLLO ORDEN DEL DIA ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '1. LLAMADO A LISTA ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Los integrantes del comité asistieron en su totalidad ', 0, 1, 'L'); 
 	                              $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Cumplido; se aprobó el acta anterior sin ninguna modificacion.  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								  $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '3. SOLICITUDES RECIBIDAS DE ESTUDIANTES ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C');
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
//---------------------------------------------------------------------------------- Cuadro-----------------------------------------------------------------------------
$contador=0;
while($row =$result->fetch_assoc())
{
$compa=intval($row['ID_estudiante1']);
$contador=$contador+1;
$pdf->SetFillColor(232,232,232);
$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
$pdf->Cell(5, 6, $contador , 1, 1, 'C',1); 
$pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','',11);
if($compa>0){
$sql5="SELECT * FROM login WHERE id=$compa";
		$ressql=mysqli_query($mysqli,$sql5);
while ($row2=mysqli_fetch_row ($ressql)){
		    	$id=$row2[3];
		    	$fis=$row2[1];		    	
		    	}
$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'De: '.utf8_decode($row['user']).', C.C:'.$row['cedula'].' , '.utf8_decode($id).', C.C: '.$fis, 1, 1, 'L');
}else{
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C');  
                                $pdf->MultiCell(160, 6, 'De: '.utf8_decode($row['user']).', C.C: '.$row['cedula'], 1, 1, 'L');
 } 
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'Contexto:   '.utf8_decode($row['ID_estado']).', " '.utf8_decode($row['Titulo_tesis']).'", Dir: '.utf8_decode($row['ID_directores']), 1, 1, 'L');
      	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, 'Disposiciones: '.utf8_decode($row['observaciones']) , 1, 1, 'L');
								$pdf->Cell(20, 6, ' ', 0, 0, 'C');  

}
								$pdf->SetFillColor(255,255,255);
								$pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                        $pdf->SetFont('Arial','B',12);
      	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                        $pdf->Cell(180, 6, '4. DISPOSICIONES. ', 0, 1, 'L'); 
                                $pdf->SetFont('Arial','',12);
       	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->MultiCell(160, 6, ''.$disposiciones, 0, 1, 'L',0);
     	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
       	                        $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(160, 6, '', 0, 1, 'C');
								$pdf->Cell(160, 6, '', 0, 1, 'C');
								$pdf->Cell(160, 6, '', 0, 1, 'C');
								$pdf->Cell(160, 6, '', 0, 1, 'C');
								$pdf->Cell(160, 6, '', 0, 1, 'C');
                                //$pdf->Image('todos.png');
								$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, 'Ing. ' , 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, 'Ing.  ' , 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
								$pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->Cell(80, 6, 'Ing.  ', 0, 0, 'L'); 
      	                        $pdf->Cell(115, 6, 'Est.  ', 0,1, 'L'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                        $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(130, 6, 'Copyright © 2018 Unilibre' , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(180, 6, 'Institución de Educación Superior sujeta a inspección y vigilancia por el Ministerio de Educación' , 0, 1, 'C'); 
								$pdf->SetFont('Arial','',10);
       	                        $pdf->Cell(170, 6, 'Cod-Ver-bd No.  '.$numeroacta.' id-'.$codver.' c '.$idc, 0, 1, 'C'); 

while($row =$result->fetch_assoc())
{
	$pdf->Cell(200, 6, $row['user'], 0, 1, 'C');
}
//generar acta numero consecutivo

  $pdf->Output('aa'.$numeroacta.'.pdf', 'F'); 
  $nombrear='aa'.$numeroacta.'.pdf';
  $disposiciones=$nombrear;
  mysqli_query($mysqli,"INSERT INTO actas VALUES('','$numeroacta','$fi','$ff','$fecha','$programa','$disposiciones')");
	$pdf->Output();
	}
//termina ambiental ----------------------------------------------------

?>	