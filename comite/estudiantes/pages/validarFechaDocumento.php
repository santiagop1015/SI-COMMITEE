<?php
date_default_timezone_set ('America/Bogota');
utf8_decode(extract($_POST));


    require("../../connect_db.php");
     $mensaje = "";
     $scriptsp = "call committee.SP_Valida_Fechas_Documentos($ID_estudiante, '$ID_estado');";

     // echo ' <script language="javascript">console.log("' + $mensaje + '");</script> ';


    $result = mysqli_query($mysqli,$scriptsp);

    //Captura respuesta sp
    while ($valores = mysqli_fetch_array($result)) {
        $mensaje = $valores[0];
    }	


    echo $mensaje;

?>


