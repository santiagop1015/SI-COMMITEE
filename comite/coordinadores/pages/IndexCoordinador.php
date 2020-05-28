<!DOCTYPE html>

<?php


//session_destroy();

// if(!isset($_SESSION)) 
//     { 
//         session_start(); 
//     } 

session_start(); 
	@$buscart=$_POST['buscart'];
	@$buscar=$_POST['buscar'];

$coor=$_SESSION['user'];
date_default_timezone_set ('America/Bogota');
$fecha=date("Y-m-d");
$nuevafecha = date('Y-m-d', strtotime($fecha .'+3 month'));
$pr=$_SESSION['id'];
extract($_GET);
require("../connect_db.php");
                $sql=("SELECT * FROM login where id='$pr'");
				$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
 utf8_decode($programa=$arreglo[11]);
 $coordir=$arreglo[4];
 $passd=$arreglo[8];

 if ($arreglo[2]!='Coordinador') {
	require("../desconectar.php");
	header("Location:index.html");
}
}


?>



<html>

    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Sahil Kumar">
        <title>Comite Proyectos - UL -</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


        <style>
            /* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
            </style>
    </head>



    <FRAMESET class="webkit-scrollbar-thumb" COLS=20%,* border='0' >
    <FRAME SRC="MenuCoordinador.php" scrolling="no" >
            <FRAMESET ROWS=10%,90% border='0' >
            <FRAME SRC="Cabecera.php" scrolling="no" >
            <FRAME SRC="GenerarActa.php" name="contenido" >
            </FRAMESET>
    </FRAMESET>





</html>