<?php
    date_default_timezone_set ('America/Bogota');
	$user=$_POST['user'];
	$email=$_POST['email'];
	//$pasadmin= $_POST['pasadmin'];
	//$pasdir=$_POST['pasdir'];
	//$pasjur=$_POST['pasjur'];
	//$pascor=$_POST['pascor'];
	$password= $_POST['password'];
	$tipousuario=$_POST['tipousuario'];
	$telefono=$_POST['telefono'];
	$programa=$_POST['programa'];
    $fechadenacimiento= $_POST['fechadenacimiento'];
    if($tipousuario == "Director") {
        $area=$_POST['area'];
    }
   
    
    require("../../connect_db.php");
    //la variable  $mysqli viene de connect_db que lo traigo con el require("../../connect_db.php");
	$checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$email'");
    $check_mail=mysqli_num_rows($checkemail);
   // echo $check_mail;
		if($password==$password){
			if($check_mail>0){
           // $mensajeRespuesta = 'Atencion, ya existe un usuario con estos caracteres, verifique sus datos';
            echo 2;
            } else {
                
                if($tipousuario == 'Estudiante')//Creacion para Estudiante
				{
					$passest = $password;
					$pasadmin= "";
					$pasdir= "";
					$pasjur= "";
					$pascor= "";
				}
				else if($tipousuario == 'Director')//Creacion para director
				{
					$passest = "";
					$pasadmin= "";
					$pasdir= $password;
					$pasjur= "";
					$pascor= "";
                }
                
                if($tipousuario == "Director") {
                    mysqli_query($mysqli,"INSERT INTO login (`Cedula`,`TipoUsuario`,`user`,`email`,`pasadmin`,`pasdir`,`pasjur`,`pascor`,`password`,`telefono`,`programa`,`fechadenacimiento`,`area`) VALUES('$password','$tipousuario','$user','$email','','$pasdir','$pasjur','$pascor','$passest','$telefono','$programa','$fechadenacimiento','$area')");
                } else {
                    mysqli_query($mysqli,"INSERT INTO login (`Cedula`,`TipoUsuario`,`user`,`email`,`pasadmin`,`pasdir`,`pasjur`,`pascor`,`password`,`telefono`,`programa`,`fechadenacimiento`,`area`) VALUES('$password','$tipousuario','$user','$email','','$pasdir','$pasjur','$pascor','$passest','$telefono','$programa','$fechadenacimiento','0')");
                }
                
                $email = $_POST['email'];
				$headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" .
    						'Content-type:text/html;charset=UTF-8' . "\r\n" .
    						'X-Mailer: PHP/' . phpversion();
				$msg = "<html><body><center> <img src='http://5.189.175.156/comite/assets/img/escudo.jpg' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
					<br><br></center>Bienvenid@, usted ha sido registrado en el Comité de Proyectos de Grado UL, datos de ingreso, Usuario: su correo, enviamos una contraseña provisional para el ingreso, <br><br>tu contraseña provisional es: <font color='#D6DBDF'>".$password."</font><br>Para ingresar al Comité <a href='http://5.189.175.156/comite'>Haga Clic aquí!!!</a> <br><br>Si no ha solicitado el registro, entonces simplemente puede ignorar este correo electrónico.<br><br>Equipo Comité proyectos de grado UL<br></body></html>";
                mail($email, "Registro Comite de Proyectos UL", $msg, $headers);
                

            echo 1;
            }
        } else {
            echo 3;
        }

?>