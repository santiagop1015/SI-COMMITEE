<?php
    $Nombre = $_POST['Nombre'];
	$Correo = $_POST['Correo'];
	$Mensaje = $_POST['Mensaje'];
	$para = $_POST['para'];
	/*require("connect_db.php");
    $sql="select * from login WHERE email = '$email'"; 
    $result=$mysqli->query($sql);
    $error = '';
    $rows = $result->num_rows;*/
	

		$headers ='From:'. $Correo. "\r\n" . 
    						'Content-type:text/html;charset=UTF-8' . "\r\n" . 
    						'X-Mailer: PHP/' . phpversion();  
        //$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $msg = $Mensaje;
        //mail($para, $Nombre, $msg, $headers);
		//echo '<script>alert("Se ha enviado el correo con éxito!!!")</script> ';
		
		echo "<script>
        localStorage.setItem('SendMessage', true);
        location.href='contact.html';
        </script>";
   
	
	

		

?>