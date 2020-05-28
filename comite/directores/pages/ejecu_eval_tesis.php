<?php
date_default_timezone_set ('America/Bogota');

extract($_POST);

$fecha_eval= date("Y-m-d H:i:s");
	require("../../connect_db.php");


/*if($concepto=='')

{
echo ' <script language="javascript">alert("Debe llenar todo los campos... Evaluación no registrada.");</script> ';
 echo "<script>window.open('director.php', '_top')</script>";			
}else{*/

	

	mysqli_query($mysqli,"INSERT INTO evaluacion VALUES('','$id_tesis','$forprob','$justificacion','$objetivos','$marcoref','$metodologia','$crono','$presupuesto','$biblio','$ciber','$claridad','$evidencia','$concepto','$observaciones','$user','$fecha_eval')");

				echo ' <script language="javascript">alert("Evaluacion registrada con éxito");</script> ';
								 //echo "<script>window.open('director.php', '_top')</script>";
								 
								 echo "<script>
		
                             opener.location.reload();
                             		window.close();
                             		</script>";
				
			
//		}	
		

	
?>