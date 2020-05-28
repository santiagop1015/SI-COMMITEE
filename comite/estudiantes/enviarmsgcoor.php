<?php
date_default_timezone_set ('America/Bogota');
echo"<meta charset='utf-8'><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";
utf8_decode(extract($_POST));

 //$fecha=date("d-m-Y H:i:s");
    require("../connect_db.php");



    //function dump_extracted_post() {
    //    extract($_POST);
    //    var_dump(get_defined_vars());
    //  }
    //  dump_extracted_post();
    //
    //echo $comen;
    //echo $programa;
    //echo $user;
    //
    //echo $fecha;
//




	mysqli_query($mysqli,"INSERT INTO comen VALUES('','$comen','$user','$programa','$fecha')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Comentario registrado con éxito");</script> ';
                          //     echo "<script>window.open('coordinador.php', '_top')</script>";
				
			
			
		

	
?>