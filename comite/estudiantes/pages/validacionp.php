<?php
session_start();

if (@!$_SESSION['user']) {
    header("Location:../index.tml");
}/*elseif ($_SESSION['rol']==2) {
    header("Location:index2.php");
}*/

$user=$_SESSION['id'];
$pr=$_SESSION['id'];
?>

<?php 
            require("../../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
                $query=mysqli_query($mysqli,$sql);
                while($arreglo=mysqli_fetch_array($query)){
                                            $ced=$arreglo[1];
                                            
                                          }       
     ?>
<?php
     date_default_timezone_set ('America/Bogota');
     $conexion = $mysqli;
     //echo $_FILES["archivo"]["size"];
     // 4766573  5000000
    // echo $_FILES["archivo"];

   //var_dump($_POST);

   //  $_FILES["archivo"]["type"]

   if($_FILES["archivo"]["size"]>5000000){
     echo "Solo se permiten archivos menores a 5MB <br>";
   } else {


    $nombre_archivo = $_FILES['archivo']['name'];
     // echo $nombre_archivo . '<br>';
    $tipo_archivo= $_FILES['archivo']['type'];
    //  echo $tipo_archivo. '<br>';
    $tamano_archivo = $_FILES["archivo"]['size'];
    //  echo $tamano_archivo. '<br>';
    $direccion_temporar = $_FILES['archivo']['tmp_name'];
    //  echo $direccion_temporar. '<br>';
    $Observaciones="Por definir";
    //  echo $Observaciones. '<br>';
     if(!isset($_POST['ID_directores'])) {
         //echo "La variable ID directores esta vacia <br>";
     } else {
        $ID_directores=$_POST['ID_directores'];
      //  echo $ID_directores. '<br>';
     }
     
   
     if(!isset($_POST['id_estudiante2'])) {
        echo "Opcion de Grado <br>";
    } else {
       $id_estudiante2=$_POST['id_estudiante2'];
    }
    
    

    if(!isset($_POST['fecha_propuesta'])) {
        echo "La variable fecha propuesta esta vacia <br>";
    } else {
       $fecha_propuesta=$_POST['fecha_propuesta'];
       //echo $fecha_propuesta. '<br>';
    }

    if(!isset($_POST['fecha_aprob_propuesta'])) {
        echo "La variable fecha aprob propuesta esta vacia <br>";
    } else {
       $fecha_aprob_propuesta=$_POST['fecha_aprob_propuesta'];
       //echo $fecha_aprob_propuesta. '<br>';
    }
   
    $terminado=6;

    if(!isset($_POST['ID_estado'])) {
       // echo "La variable tipo de documento es isset <br>";
    } else {
        if(!empty($_POST['ID_estado'])) {

        
       $carp=$_POST['ID_estado'];
     //  echo $carp. '<br>';
    

    //$carp= $_POST['ID_estado'];
     // echo $carp;
    if($carp=="Entrega Propuesta" or $carp=="Correccion Propuesta"){
        $alma="./propuestas";
        //$nombre_archivo=$ced.'.pdf';
    }
       else if($carp=="Entrega Anteproyecto" or $carp=="Correccion Anteproyecto")
       {
            $alma="./anteproyectos";
            //$nombre_archivo=$ced.'.pdf';
       }else if($carp=="Entrega Proyecto" or $carp=="Correccion Proyecto")
       {
            $alma="/proyectos";
            //$nombre_archivo=$ced.'.pdf';
       }
       else if($carp=="Certificado de Notas")
       {
            $alma="/certinotas";
            //$nombre_archivo=$ced.'.pdf';
       }else if($carp=="Certificado terminacion Materias")
       {
            $alma="/certimat";
            //$nombre_archivo=$ced.'.pdf';
       }else if($carp=="Prorroga")
       {
            $alma="/prorrogas";
            //$nombre_archivo=$ced.'.pdf';
       }else {
            $alma="/otros";	
            //$nombre_archivo=$nombre_archivo;
       }
       
    
}
}


//var_dump($_REQUEST);
if(isset($_POST['ID_estudiante1']) || isset($_POST['ID_estado']) || isset($ID_directores) || isset($_POST['Titulo_tesis'])) {
 //  echo "Establecida";

 // ID_estudiante1

// empty($_POST['ID_estudiante1'])
// empty($_POST['ID_estado'])

if(empty($ID_directores) || empty($_POST['Titulo_tesis']) || strlen($id_estudiante2) <= 0 || empty($_POST['ID_estado'])) {
  echo "Revise que los siguientes campos esten completos: <br>";
    if(empty($_POST['Titulo_tesis'])) {
        echo "Titulo Tesis <br>";
    }
   /* Mensaje falta id otro integrante: cambio: es opcional 21/09/2020
    if(empty($_POST['ID_estudiante1'])) {
        echo "Id otro integrante <br>";
    }
    */
    /* Mensaje falta tipo de documento: cambio: es opcional 21/09/2020
    if(empty($_POST['ID_estado'])) {
        echo "Tipo de documento <br>";
    }
    */
    if(strlen($_POST['ID_estado']) <= 0) {
        echo "Tipo de documento <br>";
    }

    if(empty($ID_directores)) {
        echo "Director <br>";
    }

    if(strlen($id_estudiante2) <= 0) {
        echo "Opcion de grado <br>";
    }

    
    /*
    echo '-' . $id_estudiante2 . '-';
    echo strlen($id_estudiante2);
    */
    
} else {

    // 1 Correcto
    // 2 Error
    // 3 El id otro integrante no existe en el sistema
    $idIntegrante = $_POST['ID_estudiante1'];
    $sqlIntegrante = "SELECT * FROM login where Cedula='$idIntegrante'";

    $fecha_actual = '"'.date('Y') . '-' . date('m') . '-' . date('d').'"';

   
    $consultaIntegrante = mysqli_query($mysqli, $sqlIntegrante );
    $DatosIntegrante = mysqli_fetch_array($consultaIntegrante);
   // echo $idIntegrante;
    if(!empty($idIntegrante)){
       
    if (!$DatosIntegrante) {
        echo "El usuario no existe";
       // echo $DatosIntegrante;
    } else {
       $querytesis = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr and id_estudiante2=$id_estudiante2");
       while ($arregloOpciondeGrado = mysqli_fetch_array($querytesis)) {
          $EstadoDB = $arregloOpciondeGrado[6];
       }
       $row_count = $querytesis->num_rows;
       if($row_count > 0 && $EstadoDB == $_REQUEST['ID_estado']){
           if(isset($_POST['reemplazar'])) {
             //echo "Existe";
             $nombre_archivo = $_REQUEST['ID_estado'].'_'.$id_estudiante2.'_'.$ced.'.pdf';
             $raiz = "../../archivos";
             move_uploaded_file($_FILES['archivo']['tmp_name'],"$raiz$alma/$nombre_archivo");
             mysqli_query($conexion, "update tesis set Titulo_tesis='$_REQUEST[Titulo_tesis]', ID_estudiante=$_REQUEST[ID_estudiante], ID_estado='$_REQUEST[ID_estado]', archivo='$nombre_archivo', Observaciones='$Observaciones', fecha_propuesta=$fecha_propuesta, fecha_aprob_propuesta=$fecha_aprob_propuesta, ID_directores='$ID_directores', programa='$_REQUEST[programa]', ID_estudiante1='$_POST[ID_estudiante1]', id_estudiante2=$id_estudiante2, terminado=$_REQUEST[terminado], fecha_doc=$fecha_actual where ID_estudiante=$pr and id_estudiante2=$id_estudiante2 and ID_estado='$_REQUEST[ID_estado]'");
             echo 3;
            } else {
             echo 2;
           }
       } else {
          //$nombre_archivo = $_REQUEST['ID_estado'].'_'.date("YmdHis").'_'.$nombre_archivo;
          $nombre_archivo = $_REQUEST['ID_estado'].'_'.$id_estudiante2.'_'.$ced.'.pdf';  
         /* if($nombre_archivo) {

          }*/
          $raiz = "../../archivos";
          // echo "Guardado <br>";
       
          if($tipo_archivo=='application/pdf'){
           //$nombre_archivo=$ced.'.pdf';
           // echo ' <script language="javascript">console.log("' + $_FILES['archivo']['tmp_name'],"$raiz$alma/$nombre_archivo" + '");</script> ';
       
           move_uploaded_file($_FILES['archivo']['tmp_name'],"$raiz$alma/$nombre_archivo");
          
           //ToDo: Prueba Local
           //move_uploaded_file($_FILES['archivo']['tmp_name'],"D:/Documents/TestDocuments/$nombre_archivo");
       
           }
           //else{
           //$nombre_archivo=$ced.'.doc';
           /*
           move_uploaded_file($_FILES['archivo']['tmp_name'],"$raiz$alma/$nombre_archivo"); 
       
           }*/

         /*  mysqli_query($conexion,"insert into tesis(proyecto, Titulo_tesis, ID_estudiante,ID_estado,archivo, Observaciones,fecha_propuesta,fecha_aprob_propuesta, ID_directores,  programa, ID_estudiante1, id_estudiante2, terminado, aprob_dir, fecha_ent_anteproyecto, jurado1, jurado2, id_area, id_eje, nota  ) values
          ($fecha_actual,'$_REQUEST[Titulo_tesis]','$_REQUEST[ID_estudiante]','$_REQUEST[ID_estado]','$nombre_archivo ','$Observaciones ', '$fecha_propuesta', '$fecha_aprob_propuesta', '$ID_directores', '$_REQUEST[programa]', '$_REQUEST[ID_estudiante]', $id_estudiante2, '$_REQUEST[terminado]','','0000-00-00','','',0,0,'')") 
          or die("Problemas en el select".mysqli_error($conexion));*/

          mysqli_query($conexion,"insert into tesis(Titulo_tesis, ID_estudiante,ID_estado,archivo, Observaciones,fecha_propuesta,fecha_aprob_propuesta, ID_directores,  programa, ID_estudiante1, id_estudiante2, terminado, aprob_dir, fecha_ent_anteproyecto, jurado1, jurado2, id_area, id_eje, nota, fecha_doc) values
          ('$_REQUEST[Titulo_tesis]','$_REQUEST[ID_estudiante]','$_REQUEST[ID_estado]','$nombre_archivo ','$Observaciones ', '$fecha_propuesta', '$fecha_aprob_propuesta', '$ID_directores', '$_REQUEST[programa]', '$_REQUEST[ID_estudiante]', $id_estudiante2, '$_REQUEST[terminado]','','0000-00-00','','',0,0,'',$fecha_actual)") 
          or die("Problemas en el select".mysqli_error($conexion));
          
          mysqli_close($conexion);

          echo 1;
          

        }

      } 
            
    } else {

      $querytesis = $mysqli->query("SELECT * FROM tesis where ID_estudiante=$pr and id_estudiante2=$id_estudiante2");
        while ($arregloOpciondeGrado = mysqli_fetch_array($querytesis)) {
           $EstadoDB = $arregloOpciondeGrado[6];
        }
        $row_count = $querytesis->num_rows;
        if($row_count > 0 && $EstadoDB == $_REQUEST['ID_estado']){
            if(isset($_POST['reemplazar'])) {
              //echo "Existe";
              $nombre_archivo = $_REQUEST['ID_estado'].'_'.$id_estudiante2.'_'.$ced.'.pdf';
              $raiz = "../../archivos";
              move_uploaded_file($_FILES['archivo']['tmp_name'],"$raiz$alma/$nombre_archivo");
              //"update tesis set Titulo_tesis=$_REQUEST[Titulo_tesis], ID_estudiante=$_REQUEST[ID_estudiante], ID_estado=$_REQUEST[ID_estado], archivo=$nombre_archivo, Observaciones=$Observaciones, fecha_propuesta=$fecha_propuesta, fecha_aprob_propuesta=$fecha_aprob_propuesta, ID_directores=$ID_directores, programa=$_REQUEST[programa], ID_estudiante1=$_REQUEST[ID_estudiante], id_estudiante2=$id_estudiante2, terminado=$_REQUEST[terminado]";
              /*mysqli_query($conexion,"insert into tesis(proyecto, Titulo_tesis, ID_estudiante, ID_estado, archivo, Observaciones,fecha_propuesta,fecha_aprob_propuesta, ID_directores,  programa, ID_estudiante1, id_estudiante2, terminado, aprob_dir, fecha_ent_anteproyecto, jurado1, jurado2, id_area, id_eje, nota  ) values
              ($fecha_actual, '$_REQUEST[Titulo_tesis]', '$_REQUEST[ID_estudiante]', '$_REQUEST[ID_estado]', '$nombre_archivo ','$Observaciones ', '$fecha_propuesta', '$fecha_aprob_propuesta', '$ID_directores', '$_REQUEST[programa]', '$_REQUEST[ID_estudiante]', $id_estudiante2, '$_REQUEST[terminado]','','0000-00-00','','',0,0,'')") 
              or die("Problemas en el select".mysqli_error($conexion));*/
              mysqli_query($conexion, "update tesis set Titulo_tesis='$_REQUEST[Titulo_tesis]', ID_estudiante=$_REQUEST[ID_estudiante], ID_estado='$_REQUEST[ID_estado]', archivo='$nombre_archivo', Observaciones='$Observaciones', fecha_propuesta=$fecha_propuesta, fecha_aprob_propuesta=$fecha_aprob_propuesta, ID_directores='$ID_directores', programa='$_REQUEST[programa]', ID_estudiante1='', id_estudiante2=$id_estudiante2, terminado=$_REQUEST[terminado], fecha_doc=$fecha_actual where ID_estudiante=$pr and id_estudiante2=$id_estudiante2 and ID_estado='$_REQUEST[ID_estado]'");
              //echo "update tesis set Titulo_tesis='$_REQUEST[Titulo_tesis]', ID_estudiante=$_REQUEST[ID_estudiante], ID_estado='$_REQUEST[ID_estado]', archivo='$nombre_archivo', Observaciones='$Observaciones', fecha_propuesta=$fecha_propuesta, fecha_aprob_propuesta=$fecha_aprob_propuesta, ID_directores='$ID_directores', programa='$_REQUEST[programa]', ID_estudiante1='', id_estudiante2=$id_estudiante2, terminado=$_REQUEST[terminado], fecha_doc=$fecha_actual where ID_estudiante=$pr and id_estudiante2=$id_estudiante2 and ID_estado='$_REQUEST[ID_estado]'";
              //update tesis set Titulo_tesis="Nuevo postgrado 111111", ID_estudiante=5, ID_estado="Solicitud opción de grado", archivo="Solicitud opción de grado_4_66091058.pdf", Observaciones="Por definir", fecha_propuesta=2021-02-07, fecha_aprob_propuesta=0000-00-00, ID_directores="Pablo Carreno H", programa="Sistemas", ID_estudiante1='', id_estudiante2=4, terminado=0, fecha_doc="2021-02-07" where ID_estudiante=5 and id_estudiante2=4 and ID_estado="Solicitud opción de grado"

              echo 3;
            } else {
              echo 2;
            }
        } else {
        //$nombre_archivo = $_REQUEST['ID_estado'].'_'.date("YmdHis").'_'.$nombre_archivo;  
        $nombre_archivo = $_REQUEST['ID_estado'].'_'.$id_estudiante2.'_'.$ced.'.pdf';
        $raiz = "../../archivos";
  
     if($tipo_archivo=='application/pdf'){
      //$nombre_archivo=$ced.'.pdf';
      // echo ' <script language="javascript">console.log("' + $_FILES['archivo']['tmp_name'],"$raiz$alma/$nombre_archivo" + '");</script> ';
  
      move_uploaded_file($_FILES['archivo']['tmp_name'],"$raiz$alma/$nombre_archivo");
     
      //ToDo: Prueba Local
      //move_uploaded_file($_FILES['archivo']['tmp_name'],"D:/Documents/TestDocuments/$nombre_archivo");
  
      }//else{
      //$nombre_archivo=$ced.'.doc';
      /*move_uploaded_file($_FILES['archivo']['tmp_name'],"$raiz$alma/$nombre_archivo"); 
  
      }*/

    /*  mysqli_query($conexion,"insert into tesis(proyecto, Titulo_tesis, ID_estudiante, ID_estado, archivo, Observaciones,fecha_propuesta,fecha_aprob_propuesta, ID_directores,  programa, ID_estudiante1, id_estudiante2, terminado, aprob_dir, fecha_ent_anteproyecto, jurado1, jurado2, id_area, id_eje, nota  ) values
        ($fecha_actual, '$_REQUEST[Titulo_tesis]', '$_REQUEST[ID_estudiante]', '$_REQUEST[ID_estado]', '$nombre_archivo ','$Observaciones ', '$fecha_propuesta', '$fecha_aprob_propuesta', '$ID_directores', '$_REQUEST[programa]', '$_REQUEST[ID_estudiante]', $id_estudiante2, '$_REQUEST[terminado]','','0000-00-00','','',0,0,'')") 
        or die("Problemas en el select".mysqli_error($conexion));*/
        //echo $fecha_actual;
      //  echo date('Y') . '-' . date('m') . '-' . date('d'); 

      mysqli_query($conexion,"insert into tesis(Titulo_tesis, ID_estudiante, ID_estado, archivo, Observaciones,fecha_propuesta,fecha_aprob_propuesta, ID_directores,  programa, ID_estudiante1, id_estudiante2, terminado, aprob_dir, fecha_ent_anteproyecto, jurado1, jurado2, id_area, id_eje, nota, fecha_doc) values
        ('$_REQUEST[Titulo_tesis]', '$_REQUEST[ID_estudiante]', '$_REQUEST[ID_estado]', '$nombre_archivo ','$Observaciones ', '$fecha_propuesta', '$fecha_aprob_propuesta', '$ID_directores', '$_REQUEST[programa]', '$_REQUEST[ID_estudiante]', $id_estudiante2, '$_REQUEST[terminado]','','0000-00-00','','',0,0,'',$fecha_actual)") 
        or die("Problemas en el select".mysqli_error($conexion));
        
        mysqli_close($conexion);

        echo 1;

   }

    
    

} 

} 


}


}



/*
$errores = 0;
mysqli_query($conexion,"insert into tesis(Titulo_tesis, ID_estudiante,ID_estado,archivo, Observaciones,fecha_propuesta,fecha_aprob_propuesta, ID_directores,  programa, ID_estudiante1, id_estudiante2, terminado ) values
('$_REQUEST[Titulo_tesis]','$_REQUEST[ID_estudiante]','$_REQUEST[ID_estado]','$nombre_archivo ','$Observaciones ', '$fecha_propuesta', '$fecha_aprob_propuesta', '$ID_directores', '$_REQUEST[programa]', '$_REQUEST[ID_estudiante1]', $id_estudiante2, '$_REQUEST[terminado]')") 
or die("Problemas en el select".mysqli_error($conexion));

mysqli_close($conexion);

*/
//header('Location: estudiante.php');


?>