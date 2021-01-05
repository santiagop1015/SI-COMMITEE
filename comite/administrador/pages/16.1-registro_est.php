<?php
    date_default_timezone_set ('America/Bogota');
	$user=$_POST['user'];
	$email=$_POST['email'];
	//$pasadmin= $_POST['pasadmin'];
	//$pasdir=$_POST['pasdir'];
	//$pasjur=$_POST['pasjur'];
	//$pascor=$_POST['pascor'];
	$password= $_POST['password'];
	//$TipoUsuario=$_POST['TipoUsuario'];
	$telefono=$_POST['telefono'];
	$programa=$_POST['programa'];
	$fechadenacimiento= $_POST['fechadenacimiento'];
	$cedula=$_POST['password'];
    $area=0;
    require("../../connect_db.php");
    //echo var_dump($_POST);

    $checkemail=mysqli_query($mysqli,"SELECT * FROM login WHERE email='$email' or Cedula='$password'");
    $check_mail=mysqli_num_rows($checkemail);
    //echo $check_mail;
    if($password==$password || $password==$Cedula ){
        if($check_mail>0){
            echo "2";
        } else {
            //mysqli_query($mysqli,"INSERT INTO login VALUES('','$password','Estudiante','$user','$email','','','','','$password','$telefono','$programa','$fechadenacimiento','$area')");
            mysqli_query($mysqli,"INSERT INTO login (`Cedula`,`TipoUsuario`,`user`,`email`,`password`,`telefono`,`programa`,`fechadenacimiento`,`area`) VALUES('$password','Estudiante','$user','$email','$password','$telefono','$programa','$fechadenacimiento','$area')");
            $email = $_POST['email'];
            $headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
                        'Content-type:text/html;charset=UTF-8' . "\r\n" . 
                        'X-Mailer: PHP/' . phpversion();  
            $msg = "<html><body><center> <img src='http://sicomite.unilibre.edu.co/comite/LocalSources/images/escudo.jpg' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
                <br><br></center>Bienvenid@, usted ha sido registrado en el Comité de Proyectos de Grado UL, datos de ingreso, Usuario: Su correo, enviamos una contraseña provisional para el ingreso, <br><br>Tu contraseña provisional es: <font color='#D6DBDF'>".$password."</font><br>Para ingresar al Comité <a href='http://sicomite.unilibre.edu.co/'>Haga Clic aquí!!!</a> <br><br>Si no ha solicitado el registro, entonces simplemente puede ignorar este correo electrónico.<br><br>Equipo Comité proyectos de grado UL<br></body></html>";
            mail($email, "Registro Comite de Proyectos UL", $msg, $headers);

           echo "1";
        }
    } else {
        echo "3";
    }

    ?>