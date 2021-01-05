<?php
$pr=$_SESSION['id'];

require("../../connect_db.php");
$sql=("SELECT * FROM login where id='$pr'");
$query=mysqli_query($mysqli,$sql);
while($arreglo=mysqli_fetch_array($query)){
    $foto = $arreglo[14];
}

    if(empty($foto)) {
        echo '<img src="../dist/img/avatar-user.jpg" class="img-circle elevation-2" alt="User Image">';
    } else {
        echo '<img src="data:image/jpg;base64,'.base64_encode($foto).'" class="img-circle elevation-2" alt="User Image">';
    }

?>