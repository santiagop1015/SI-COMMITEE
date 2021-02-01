<?php
date_default_timezone_set ('America/Bogota');
utf8_decode(extract($_POST));


    require("../../connect_db.php");
    $mensaje = "";
    $scriptsp = "call committee.SP_Estudiante_Registra_Aplazamiento_Semestre($IdEstudianteSeleccionado, $AnioSeleccionado, $SemestreSeleccionado, '$Descripcion');";
    
    //echo ' <script language="javascript">console.log(' + $scriptsp + '); cambiarPestanna(pestanas,pestana5);</script> ';

    
    $result = mysqli_query($mysqli,$scriptsp);

    while ($valores = mysqli_fetch_array($result)) {
        $mensaje = $valores[0];
    }	


    echo $mensaje;


// =				//echo 'Se ha registrado con exito';
// 				echo ' <script language="javascript">alert("Proceso Realizado");</script> ';
//                           //   echo "<script>window.open('coordinador.php', '_top')</script>";
                          
				
			


    // echo ' <script language="javascript">alert("' + $mensaje + '"); cambiarPestanna(pestanas,pestana5);</script> ';
	
?>







 <?php
   // echo "<script>window.open('../estudiante.php', '_top')</script>";	

?>

