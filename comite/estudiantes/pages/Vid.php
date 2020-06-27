<?php
session_start();

require("../../connect_db.php");

// $pr = $_SESSION['id'];
$pr = "1016006718";
echo $pr;


$sql = ("SELECT * FROM login where Cedula='$pr'");
$query = mysqli_query($mysqli, $sql);


$extraido1= mysqli_fetch_array($query);

if (!$extraido1) {
    echo "El usuario no existe";
} else {
    echo $extraido1[1];
}



/*


while ($arreglo = mysqli_fetch_array($query)) {

var_dump($arreglo);

echo "Mensaje";


}

if(isset($arreglo)) {
    echo "vacia";
} else {
    echo "No vacia";
}
*/



/*
if(isset($arreglo)) {
  echo "La variable no esta definida";
}

*/





?>