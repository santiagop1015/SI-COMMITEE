<?php
extract($_POST);
   $Nombre = $_POST['Nombre'];
	$Correo = $_POST['Correo'];
	$Mensaje = $_POST['Mensaje'];
	$para = $_POST['Correo'];
	/*require("connect_db.php");
    $sql="select * from login WHERE email = '$email'"; 
    $result=$mysqli->query($sql);
    $error = '';
    $rows = $result->num_rows;*/
	

		$headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
    						'X-Mailer: PHP/' . phpversion();  
        $msg = $Mensaje.
        "<html><body><center> <img src='http://5.189.175.156/comite/assets/img/escudo.jpg' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
					<br><br></center>Hola, el sistema ha detectado documentos próximos a vencer en el <b>Comité de Proyectos de Grado UL</b>. <br> Para ingresar al Comité <a href='http://5.189.175.156/comite'> Haga Clic aquí!!!</a> <br><br>Si aún no tiene registros, entonces simplemente puede ignorar este correo electrónico.<br><br>
En el Comité utilizamos esta dirección de correo electrónico únicamente para envíos automáticos de información y por seguridad, la cuenta no está habilitada para recibir respuestas o consultas.<br><br>
					Equipo Comité proyectos de grado UL<br></body></html>";


					mail($para,"Mensaje comite de proyectos UL", $msg, $headers);



		echo '<script>alert("Se ha enviado el correo con éxito!!!")</script> ';
		
		echo "<script>location.href='ProximoVencer.php'</script>";
   
	
	

		

?>