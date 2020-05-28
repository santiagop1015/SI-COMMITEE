<?php
date_default_timezone_set ('America/Bogota');
echo"<meta charset='utf-8'><meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>";
utf8_decode(extract($_POST));	
	
	require("../../connect_db.php");
	if($ID_estado=='Entrega Propuesta'){
		$fecha_ent_anteproyectomas = '<b>Fecha de entrega Anteproyecto:</b> Desde: '.date('Y-m-d', strtotime($fecha_aprob_propuesta .'+1 month'));  
	$proyectomas = 'Hasta: '.date('Y-m-d', strtotime($fecha_aprob_propuesta .'+3 month')); 
}else{
	$fecha_ent_anteproyectomas='';
	$proyectomas='';
}
	
	if($ID_estado=='Entrega Anteproyecto'){
		$fecha_ent_anteproyectomas= '<b>Fecha de entrega Proyecto:</b> Desde: '.date('Y-m-d', strtotime($fecha_ent_anteproyecto .'+4 month'));  
	$proyectomas = 'Hasta: '.date('Y-m-d', strtotime($fecha_ent_anteproyecto .'+12 month')); 
}else{
	$fecha_ent_proyectomas='';
	$proyectomass='';
}
	
	$te=$id;
								$ID_estudiante=$_POST['ID_estudiante'];
		                        $query = $mysqli -> query ("SELECT * FROM login where id='$ID_estudiante'");
                                while ($valores = mysqli_fetch_array($query)) {
																				 $correo=$valores['email'];
																				 $user=$valores['user'];
																				} 

																			
								$sentencia="update tesis set   ID_estudiante='$ID_estudiante', proyecto='$proyecto', titulo_tesis='$titulo_tesis', aprob_dir='$aprob_dir', ID_directores='$ID_directores' , ID_estado='$ID_estado', observaciones='$observaciones' , archivo='$archivo' , fecha_propuesta='$fecha_propuesta' , fecha_aprob_propuesta='$fecha_aprob_propuesta' , fecha_ent_anteproyecto='$fecha_ent_anteproyecto',jurado1='$jurado1',jurado2='$jurado2' ,ID_estudiante1='$ID_estudiante1',id_estudiante2='$id_estudiante2',id_area='$id_area',id_eje='$id_eje',terminado='$terminado',nota='$nota' where ID_tesis='$te' ";
								
								echo "<script>alert('".$sentencia."');</script>"; 
								
								$resent=mysqli_query($mysqli,$sentencia);
	if ($resent==null) {
		// echo "<script>alert('".$id_estudiante2."');</script>"; 
		echo '<script>alert("ERROR EN PROCESAMIENTO NO SE ACTUALIZARON LOS DATOS")</script> ';
		header("location: Evaluar.php");
		echo "<script>location.href='Evaluar.php'</script>";
	}else {
		echo '<script>alert("EDICION TERMINADA")</script> ';
		//enviar mensaje de registro
				$email = $correo;
				$headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
    						'X-Mailer: PHP/' . phpversion();  
							$msg = "<html><body><center> <img src='http://5.189.175.156/comite/assets/img/escudo.jpg' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
							<br><br></center>Hola, $user  el sistema ha detectado cambios en sus registros en el <b>Comité de Proyectos de Grado UL</b>. <br> Para ingresar al Comité <a href='http://5.189.175.156/comite'> Haga Clic aquí!!!</a> <br><br>Si aún no tiene registros, entonces simplemente puede ignorar este correo electrónico.<br><br>
								<b>Nota:</b> Para radicar su propuesta de proyecto de grado, los estudiantes deben haber cursado y aprobado como mínimo el 60% de los créditos de su plan de estudios. <br><br>
								<b>PARA TENER EN CUENTA !!!</b><br>
									$fecha_ent_anteproyectomas $proyectomas<br>
									<br><br>

							En el Comité utilizamos esta dirección de correo electrónico únicamente para envíos automáticos de información y por seguridad, la cuenta no está habilitada para recibir respuestas o consultas.<br><br>
							Equipo Comité proyectos de grado UL<br></body></html>";
				mail($email,"Cambio en sus registros", $msg, $headers);
				//termina envio 
				//enviar correo a jurado1
				$jurado1=$_POST['jurado1'];
		                        $query = $mysqli -> query ("SELECT * FROM login where user='$jurado1'");
                                while ($valores = mysqli_fetch_array($query)) {
																				 $correoj1=$valores['email'];
																				 $user1=$valores['user'];
																				} 
				$email = $correoj1;
				$headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
    						'X-Mailer: PHP/' . phpversion();  
							$msg = "<html><body><center> <img src='http://5.189.175.156/comite/assets/img/escudo.jpg' border='0' WIDTH='100' HEIGHT='97'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
							<br><br></center>Hola, señor profesor,  el SI COMMITTEE ha detectado nuevas asignaciones y/o modificaciones en el <b>Comité de Proyectos de Grado UL</b>. <br> Para ingresar al Comité <a href='http://5.189.175.156/comite'> Haga Clic aquí!!!</a>, de lo contrario, entonces simplemente puede ignorar este correo electrónico.<br><br>
								<b>Nota:</b> Para el <b>anteproyecto </b>tenga en cuenta que, - los evaluadores tendrán un plazo máximo de quince (15) días hábiles para hacer lectura completa del mismo, y diligenciar el formato de concepto de evaluación que se encuentra disponible en el SI COMMITTEE.<br><br>
								<b>Nota:</b> Para el <b>anteproyecto </b> - Los evaluadores deben solicitar una sola corrección del documento sin posibilidad de agregar otras correcciones diferentes a las ya solicitadas por escrito en el documento o en un documento aparte de correcciones.<br><br>
								
							En el Comité utilizamos esta dirección de correo electrónico únicamente para envíos automáticos de información y por seguridad, la cuenta no está habilitada para recibir respuestas o consultas.<br><br>
							Equipo Comité proyectos de grado UL<br></body></html>";
				mail($email,"Nuevas Asignaciones", $msg, $headers);
				//final envio jurado1
				//enviar correo a jurado2
				$jurado2=$_POST['jurado2'];
		                        $query = $mysqli -> query ("SELECT * FROM login where user='$jurado2'");
                                while ($valores = mysqli_fetch_array($query)) {
																$correoj2=$valores['email'];
																$user2=$valores['user'];
																} 
				$email = $correoj2;
				$headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
    						'X-Mailer: PHP/' . phpversion();  
							$msg = "<html><body><center> <img src='http://5.189.175.156/comite/assets/img/escudo.jpg' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
							<br><br></center>Hola, señor profesor,  el SI COMMITTEE ha detectado nuevas asignaciones y/o modificaciones en el <b>Comité de Proyectos de Grado UL</b>. <br> Para ingresar al Comité <a href='http://5.189.175.156/comite'> Haga Clic aquí!!!</a>, de lo contrario, entonces simplemente puede ignorar este correo electrónico.<br><br>
								<b>Nota:</b> Para el <b>anteproyecto </b>tenga en cuenta que, - los evaluadores tendrán un plazo máximo de quince (15) días hábiles para hacer lectura completa del mismo, y diligenciar el formato de concepto de evaluación que se encuentra disponible en el SI COMMITTEE.<br><br>
								<b>Nota:</b> Para el <b>anteproyecto </b> - Los evaluadores deben solicitar una sola corrección del documento sin posibilidad de agregar otras correcciones diferentes a las ya solicitadas por escrito en el documento o en un documento aparte de correcciones.<br><br>
							En el Comité utilizamos esta dirección de correo electrónico únicamente para envíos automáticos de información y por seguridad, la cuenta no está habilitada para recibir respuestas o consultas.<br><br>
							Equipo Comité proyectos de grado UL<br></body></html>";
				mail($email,"Nuevas Asignaciones", $msg, $headers);
				//final envio jurado2
				//enviar correo a director
				$ID_directores=$_POST['ID_directores'];
		                        $query = $mysqli -> query ("SELECT * FROM login where user='$ID_directores'");
                                while ($valores = mysqli_fetch_array($query)) {
																				 $correodir=$valores['email'];
																				 $user3=$valores['user'];
																				} 
				$email = $correodir;
				$headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
    						'X-Mailer: PHP/' . phpversion();  
							$msg = "<html><body><center> <img src='http://5.189.175.156/comite/assets/img/escudo.jpg' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
							<br><br></center>Hola, señor Director de Proyecto,  el SI COMMITTEE ha detectado nuevas asignaciones o solicitudes en el <b>Comité de Proyectos de Grado UL</b>. <br> Para ingresar al Comité <a href='http://5.189.175.156/comite'> Haga Clic aquí!!!</a>, de lo contrario, entonces simplemente puede ignorar este correo electrónico.<br><br>
							<b>Nota:</b> El docente director dará la aprobación del documento subido por el estudiante (Propuesta, Anteproyecto y Proyecto), desde el mismo SI COMMITTEE. Sin dicha aprobación, el documento queda subido en la plataforma, pero no se discute en las reuniones de Comité de Proyectos de Grado.<br><br>
							En el Comité utilizamos esta dirección de correo electrónico únicamente para envíos automáticos de información y por seguridad, la cuenta no está habilitada para recibir respuestas o consultas.<br><br>
							Equipo Comité proyectos de grado UL<br></body></html>";
				mail($email,"Nuevas Asignaciones", $msg, $headers);
				//final envio director
				echo "<script>location.href='Evaluar.php'</script>";
			}

      ?>                   