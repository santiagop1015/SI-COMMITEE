<?php
//echo"<meta charset='utf-8'><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";
utf8_decode(extract($_POST));	//extraer todos los valores del metodo post del formulario de actualizar
	require("../../connect_db.php");
	$te=$id;
	

								/* $ID_estudiante=$_POST['ID_estudiante'];
		                         $query = $mysqli -> query ("SELECT * FROM login where id='$ID_estudiante'");
                                 while ($valores = mysqli_fetch_array($query)) {
									 $correo=$valores['email'];
                                    } */


              $sqlborrar="DELETE FROM actas WHERE id='$te'";
			  $resent=mysqli_query($mysqli,$sqlborrar);

	      /*$sentencia="update tesis set   ID_estudiante='$ID_estudiante', proyecto='$proyecto', titulo_tesis='$titulo_tesis', aprob_dir='$aprob_dir', ID_directores='$ID_directores' , ID_estado='$ID_estado', observaciones='$observaciones' , archivo='$archivo' , fecha_propuesta='$fecha_propuesta' , fecha_aprob_propuesta='$fecha_aprob_propuesta' , fecha_ent_anteproyecto='$fecha_ent_anteproyecto',jurado1='$jurado1',jurado2='$jurado2' ,ID_estudiante1='$ID_estudiante1',id_estudiante2='$id_estudiante2',id_area='$id_area',id_eje='$id_eje',terminado='$terminado',nota='$nota' where ID_tesis='$te' ";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");*/
	//$resent=mysqli_query($mysqli,$sentencia);


	if ($resent==null) {
		
		//echo '<script>alert("ERROR EN PROCESAMIENTO NO SE BORRARON LOS DATOS")</script> ';
        //header("location: Listados.php");
        echo '0';
		
	//	echo "<script>location.href='Listados.php'</script>";
	}else {
	//	echo '<script>alert("EL ACTA FUE BORRADA CON EXITO!")</script> ';
	    $sql=("SELECT * FROM login where id='$id_User'");
		$query=mysqli_query($mysqli,$sql);
        while($arreglo=mysqli_fetch_array($query)){
		  $correo = $arreglo[4];
		}
		
		//enviar mensaje de registro
		if(isset($correo)) {
		$escudo = "http://sicomite.unilibre.edu.co/comite/LocalSources/images/escudo.jpg";
	    $inicio = "http://sicomite.unilibre.edu.co/";
		$email = $correo;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers = "Content-type:text/html;charset=UTF-8" . "\r\n";
		$msg = "<html><body><center> <img src='".$escudo."' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
			<br><br></center>Hola, el sistema ha detectado cambios en sus registros en el <b>Comité de Proyectos de Grado UL</b>. <br> Para ingresar al Comité <a href='".$inicio."'> Haga Clic aquí!!!</a> <br><br>Si aún no tiene registros, entonces simplemente puedes ignorar este correo electrónico.<br><br>Equipo Comité proyectos de grado UL<br></body></html>";
		mail($email, "Cambios en registros Comite de Proyectos UL", $msg, $headers);
				//echo '<script>alert("Se ha enviado el correo con éxito!!!")</script> ';
				//termina envio 
		}	
    //	echo "<script>location.href='Listados.php'</script>";
    
    echo '1';

		
	}

      ?>