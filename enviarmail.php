<?php
    $email = $_POST['email'];
    require("comite/connect_db.php");
    $sql="select * from login WHERE email = '$email'"; 
    $result=$mysqli->query($sql);
    $error = '';
    $rows = $result->num_rows;
    echo $email. '<br>';
    //var_dump($rows);
    $escudo = "http://sicomite.unilibre.edu.co/comite/LocalSources/images/escudo.jpg";
	$inicio = "http://sicomite.unilibre.edu.co/";
    if($rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        $tipo = $row['TipoUsuario'];

        $headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
                            'X-Mailer: PHP/' . phpversion(); 
        $msg = "<html>s<body><center> <img src='".$escudo."' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
                <br><br></center>Hola,  hemos recibido una solicitud para restablecer tu contraseña en el Comité de Proyectos de Grado UL, enviamos una contraseña provisional para el ingreso, <br><br>Tu contraseña provisional es: <font color='#D6DBDF'>".$row['pascor']."</font><br>Para ingresar al Comité <a href='".$inicio."'>Haga Clic aquí!!!</a> <br><br>Si no has realizado ninguna solicitud de restablecimiento de contraseña, es probable que otro usuario introduzca su dirección de correo electrónico por error, entonces simplemente puedes ignorar este correo electrónico.<br><br>Equipo Comité proyectos de grado UL<br></body></html>";
        // mail($row['email'], "Recuperar contrasena Comite de Proyectos UL", $msg, $headers);
        if($tipo=='Coordinador'){
        mail($row['email'], "Recuperar contrasena Comite de Proyectos UL", $msg, $headers);
        //echo '<script>alert("Se ha enviado el correo con éxito!!!")</script> ';
        echo "<script>
        localStorage.setItem('StateMessageRecover', 2);
        localStorage.setItem('MessageRecover', 'Se ha enviado la contraseña al correo: $email');
        location.href='index.html';
        </script>";
        }
        if($tipo=='Estudiante'){
            $headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
    						'X-Mailer: PHP/' . phpversion(); 
        $msg = "<html><body><center> <img src='".$escudo."' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
            <br><br></center>Hola,  hemos recibido una solicitud para restablecer tu contraseña en el Comité de Proyectos de Grado UL, enviamos una contraseña provisional para el ingreso, <br><br>Tu contraseña provisional es: <font color='#D6DBDF'>".$row['password']."</font><br>Para ingresar al Comité <a href='".$inicio."'>Haga Clic aquí!!!</a> <br><br>Si no has realizado ninguna solicitud de restablecimiento de contraseña, es probable que otro usuario introduzca su dirección de correo electrónico por error, entonces simplemente puedes ignorar este correo electrónico.<br><br>Equipo Comité proyectos de grado UL<br></body></html>";        
            mail($row['email'], "Recuperar contrasena Comite de Proyectos UL", $msg, $headers);
            echo "<script>
        localStorage.setItem('StateMessageRecover', 2);
        localStorage.setItem('MessageRecover', 'Se ha enviado la contraseña al correo: $email');
        location.href='index.html';
        </script>";
        }
        if($tipo=='Director'){
            $headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
                                'Content-type:text/html;charset=UTF-8' . "\r\n" . 
                                'X-Mailer: PHP/' . phpversion(); 
            $msg = "<html><body><center> <img src='".$escudo."' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
                <br><br></center>Hola,  hemos recibido una solicitud para restablecer tu contraseña en el Comité de Proyectos de Grado UL, enviamos una contraseña provisional para el ingreso, <br><br>Tu contraseña provisional es: <font color='#D6DBDF'>".$row['pasdir']."</font><br>Para ingresar al Comité <a href='".$inicio."'>Haga Clic aquí!!!</a> <br><br>Si no has realizado ninguna solicitud de restablecimiento de contraseña, es probable que otro usuario introduzca su dirección de correo electrónico por error, entonces simplemente puedes ignorar este correo electrónico.<br><br>Equipo Comité proyectos de grado UL<br></body></html>";        
                mail($row['email'], "Recuperar contrasena Comite de Proyectos UL", $msg, $headers);
                echo "<script>
                localStorage.setItem('StateMessageRecover', 2);
                localStorage.setItem('MessageRecover', 'Se ha enviado la contraseña al correo: $email');
                location.href='index.html';
                </script>";
       }
       if($tipo=='Jurado'){
		$headers ='From: Comité Proyectos UL <webmaster@comiteul.edu.co> ' . "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
    						'X-Mailer: PHP/' . phpversion(); 
        $msg = "<html><body><center> <img src='".$escudo."' border='0' WIDTH='100' HEIGHT='100'><br><font color='#B40431' size='6' face='Times New Roman'>Facultad de Ingeniería</FONT><br><font color='#B40431' size='5' face='Times New Roman'>Comité de Proyectos de Grado</FONT><br>
            <br><br></center>Hola,  hemos recibido una solicitud para restablecer tu contraseña en el Comité de Proyectos de Grado UL, enviamos una contraseña provisional para el ingreso, <br><br>Tu contraseña provisional es: <font color='#D6DBDF'>".$row['pasjur']."</font><br>Para ingresar al Comité <a href='".$inicio."'>Haga Clic aquí!!!</a> <br><br>Si no has realizado ninguna solicitud de restablecimiento de contraseña, es probable que otro usuario introduzca su dirección de correo electrónico por error, entonces simplemente puedes ignorar este correo electrónico.<br><br>Equipo Comité proyectos de grado UL<br></body></html>";        
			mail($row['email'], "Recuperar contrasena Comite de Proyectos UL", $msg, $headers);
            echo "<script>
            localStorage.setItem('StateMessageRecover', 2);
            localStorage.setItem('MessageRecover', 'Se ha enviado la contraseña al correo: $email');
            location.href='index.html';
            </script>";
       }
        

    } else {
        echo "<script>
        localStorage.setItem('StateMessageRecover', 1);
        localStorage.setItem('MessageRecover', 'El correo ingresado no existe');
        localStorage.setItem('Email-Recover', '$email');
        location.href='index.html';
        </script>";
    }
   


?>