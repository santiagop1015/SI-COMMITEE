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

		$sql="SELECT * FROM evaluacion WHERE id_tesis=$id";
		$ressql=mysqli_query($mysqli,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
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
                        utf8_decode($concepto=$row[3]);
                        utf8_decode($objetivos=$row[14]);
		
		    	}
//mysqli_query($mysqli,"INSERT INTO actas VALUES('','$numeroacta','$fi','$ff','$fechaa')");
//mysqli_query($mysqli,"INSERT INTO actas VALUES('','$numeroacta','$fi','$ff')");
/*
$sql2="SELECT l.user, l.cedula, l.email, l.programa, t.ID_directores, t.Titulo_tesis, t.fecha_propuesta, t.observaciones, t.id_estado
FROM login l
LEFT JOIN tesis t ON l.id = t.id_estudiante 
where   t.fecha_ent_anteproyecto between '$fi ' and '$ff'  or t.fecha_aprob_propuesta between '$fi ' and '$ff'  or t.fecha_propuesta between '$fi 'and '$ff' ";
*/
$sql2="SELECT * FROM evaluacion WHERE id_tesis=$id";


$result=mysqli_query($mysqli,$sql2);


	$pdf = new FPDF();

	$pdf->AddPage();


  $pdf->Image('logof.png',40,10,120,0);

       


       	                         $pdf->SetFont('Arial','B',15);
       	                         // $pdf->Cell(200, 6, '  UNIVERSIDAD LIBRE   ', 0, 1, 'C'); 
       	                         // $pdf->Cell(200, 6, '  FACULTAD DE INGENIERIA   ', 0, 1, 'C'); 
       	                         // $pdf->Cell(200, 6, 'PROGRAMA DE SISTEMAS', 0, 1, 'C');
       	                         // $pdf->Cell(200, 6, 'COMITE PROYECTOS DE GRADO', 0, 1, 'C'); 
      	                         // $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C');    	                          
       	                          $pdf->SetFont('Arial','B',12);
       	                          $pdf->Cell(200, 6, 'Fecha: '.$hoy, 0, 1, 'C'); 
       	                         // $pdf->Cell(200, 6, 'Fecha Impresion.  '.$hoy, 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                         // $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                    //      $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                    //      $pdf->Cell(10, 6, 'Fecha:  ' .$fecha, 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, '', 0, 0, 'C'); 
       	                          
  /*                                $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 

       	                          $pdf->SetFont('Arial','U',12);
      	                          $pdf->Cell(20, 6, '', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'ASISTENTES ', 0, 1, 'L'); 



                                  $pdf->SetFont('Arial','',12);
                                  $pdf->Cell(200, 6, ' ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'Ing. Fabian Blanco Garrido  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Mauricio Alonso Moncada ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Fredys Simanca.H  ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Pablo Carreno. H ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, 'Ing. Pedro Alonso Forero S.   ', 0, 1, 'L'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 

     	                          $pdf->Cell(200, 6, ' ', 0, 1, '');
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, 'MSc. Diana Jaimes (Profesora invitada)	   ', 0, 1, 'L'); 


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
       	                          $pdf->Cell(180, 6, '1. LLAMADO LISTA ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Los integrantes del comite asistieron en su totalidad ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 


 	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '2. LECTURA Y VERIFICACION DEL ACTA ANTERIOR ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(200, 6, '         Cumplido; se aprobo el acta anterior sin ninguna modificacion.  ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
*/
 	                       
       	                          $pdf->SetFont('Arial','B',12);
      	                        //  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(160, 6, 'RESULTADO DE EVALUACION ', 0, 1, 'L'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C');
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 




//---------------------------------------------------------------------------------- Cuadro-----------------------------------------------------------------------------
                   

  $contador=0;
while($row =$result->fetch_assoc())
{
$contador=$contador+1;
$pdf->SetFillColor(232,232,232);
$pdf->Cell(1, 6, ' ', 0, 1, 'C'); 
$pdf->Cell(55, 6, 'Jurado: '.$contador.', Fecha: '.$row['fecha_eval'], 1, 1, 'C',1); 
 $pdf->SetFillColor(255,255,255); 
$pdf->SetFont('Arial','',11);
                             /*    $pdf->Cell(26, 6, ' ', 0, 0, 'C');  
                                 $pdf->MultiCell(160, 6, 'De: '.$row['id'].', C.C: '.$row['cedula'], 1, 1, 'L');*/
$pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, utf8_decode('Formato de inscripción: Está bien diligenciado y cumple con los requisitos   ').utf8_decode($row['forprob']), 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Coherencia: Claridad y coherencia entre los diferentes puntos de la propuesta. '.utf8_decode($row['justificacion']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C');  
      	                         $pdf->MultiCell(160, 6, 'Dominio temático y manejo del público: El ponente muestra seguridad,  conocimiento  y buena expresión oral y mantiene la atención del público  '.utf8_decode($row['objetivos']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Formato del Póster: El póster cumple los requerimientos (Tamaño, título, objetivo, metodología, resultados, conclusiones bibliografía). '.utf8_decode($row['marcoref']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Creatividad y diseño: El póster presenta una organización y diseño que faciliten la presentación '.utf8_decode($row['metodologia']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Introducción: Descripción breve del tema de investigación, dirigido a orientar al lector sobre la condición a investigar.  '.utf8_decode($row['crono']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Planteamiento del problema: Descripción del problema que soporta al estudio.  '.utf8_decode($row['presupuesto']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Objetivos: Los objetivos son precisos y coherentes; conducen a la resolución del problema planteado  '.utf8_decode($row['biblio']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Referente teórico: Explicación breve de los principales aspectos teóricos que respaldan la investigación.  '.utf8_decode($row['ciber']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Metodología: Presentación del tipo y diseño de investigación, Población-muestra y técnicas de recolección de datos.  '.utf8_decode($row['claridad']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                         $pdf->MultiCell(160, 6, 'Resultados: Los datos recolectados son coherentes con los objetivos de la investigación  '.utf8_decode($row['evidencia']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); $pdf->SetFillColor(232,232,232);
      	                         $pdf->MultiCell(160, 6, 'Conclusiones: Descripción precisa de los aspectos más relevantes obtenidos en la investigación  '.utf8_decode($row['concepto']) , 1, 1, 'L');
      	                         $pdf->Cell(26, 6, ' ', 0, 0, 'C'); $pdf->SetFillColor(255,255,255);
                                 $pdf->MultiCell(160, 6, 'Observaciones Generales:  '.utf8_decode($row['observaciones']) , 1, 1, 'L');
                                 $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 

$pdf->SetFont('Arial','',9);
$pdf->Cell(200, 6,'Control: '.$row['id'].','.$id, 0, 1, 'C'); 


}
$pdf->SetFillColor(255,255,255);
$pdf->SetFont('Arial','',8);
$pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
$pdf->MultiCell(160, 6, 'IMPORTANTE: La presente evaluacion, no sirve para realizar tramites, ante la universidad, solo es de informacion para correcciones de su Anteproyecto - Proyecto. ', 0, 1, 'L',0); 
 

//---------------------------------------------------------------------------------- Cuadro-----------------------------------------------------------------------------

 /*   	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->Cell(1, 6, ' ', 0, 0, 'C'); 
				  $pdf->Cell(5, 6, '2 ', 1, 0, 'C',1); 
      	                          $pdf->MultiCell(165, 6, 'De: Diana Alejandra Rodriguez, Codigo 066111077', 1, 'L',0,1); 

      	                          $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->MultiCell(165, 6, 'Contexto: Entrega propuesta titulada  -DESARROLLO DE UNA APP QUE TRADUZCA LLAMADAS DE VOZ A TEXTO COMO AYUDA PARA PERSONAS CON DISCAPACIDAD AUDITIVA-, Dir. Ing. Fabian Blanco.', 1, 'L',0); 

      	                          $pdf->Cell(26, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->MultiCell(165, 6, 'APLAZADO, se envia resultado de la evaluacion al correo del estudiante.', 1, 'L',0); */

//---------------------------------------------------------------------------------- -----------------------------------------------------------------------------
/*	
$pdf->SetFillColor(255,255,255);
 	                          $pdf->Cell(200, 6, ' ', 0, 1, 'C'); 
       	                          $pdf->SetFont('Arial','B',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
       	                          $pdf->Cell(180, 6, '4. DISPOSICIONES. ', 0, 1, 'L'); 
                                  $pdf->SetFont('Arial','',12);
      	                          $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 

       	                          $pdf->MultiCell(170, 6, 'El coordinador del comite, dispone en secretaria del programa de los formatos: F1: Procedimientos para la presentacion de proyectos de grado, y F2: Formato de presentacion propuesta de grado. ', 0, 1, 'L',0); 
 

                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                 $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
				  $pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                          $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
				  $pdf->Cell(80, 6, 'Ing. Mauricio alonso' , 0, 0, 'L'); 
      	                          $pdf->Cell(115, 6, 'Ing. Fabian Blanco ' , 0,1, 'L'); 


                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                 $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
				  $pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                          $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
				  $pdf->Cell(80, 6, 'Ing. Pablo Carreno H ', 0, 0, 'L'); 
      	                          $pdf->Cell(115, 6, 'Ing. Pedro Alonso Forero ', 0,1, 'L'); 
     	

                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
      	                          $pdf->Cell(200, 6, '', 0, 1, 'C'); 
                                 $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
				  $pdf->Cell(80, 6, '(Original Firmado) ', 0, 0, 'L'); 
      	                          $pdf->Cell(115, 6, '(Original Firmado)', 0,1, 'L'); 
                                  $pdf->Cell(20, 6, ' ', 0, 0, 'C'); 
				  $pdf->Cell(80, 6, 'Ing. Fredys Simanca H ', 0, 0, 'L'); 
      	                          $pdf->Cell(115, 6, 'MSc. Diana Jaimes ', 0,1, 'L'); 


*/

 

while($row =$result->fetch_assoc())
{
	$pdf->Cell(200, 6, $row['user'], 0, 1, 'C');
}
	$pdf->Output();
	
?>