
<?php
date_default_timezone_set ('America/Bogota');
echo"<meta charset='utf-8'><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";
utf8_decode(extract($_POST));
 //$fecha=date("d-m-Y H:i:s");
	require("../../connect_db.php");

	$fecha=date("Y-m-d");

	
	mysqli_query($mysqli,"INSERT INTO `committee`.`comen`(`comen`,`user`,`programa`,`fecha`) VALUES('$comen','$user','$programa','$fecha')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Comentario registrado con éxito");</script> ';
				echo "<script>location.href='ListadoEstudiantes.php'</script>";
				
			
			
		

	
?>