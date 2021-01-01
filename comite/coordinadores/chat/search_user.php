<?php

/*
require("../connect_db.php");
$sql = ("SELECT * FROM login where id='$pr'");
$query = mysqli_query($mysqli, $sql);

while ($arreglo = mysqli_fetch_array($query)) {
    $programa = $arreglo[11];
    $fecha = date("d-m-Y H:i:s");
}
*/

session_start();
$name_user = $_POST['name_user'];
$id = $_SESSION['id'];

require("../../connect_db.php");
$sql = ("SELECT * FROM login where user like '%$name_user%' and programa='Sistemas' ORDER BY Id DESC");

//echo $sql;
$query = mysqli_query($mysqli, $sql);

$output = '';
while ($arreglo = mysqli_fetch_array($query)) {
    //for($i = 0; $i<$arreglo; $i++) {
       // echo $arreglo[3] . '<br>';

       if($arreglo[0] !== $id) {

        $output .= '<li>
        <a class="idItemSearch" data-touserid="'.$arreglo[0].'" data-tousername="'.$arreglo[3].'" data-widget="chat-pane-toggle">';

        if(empty($arreglo[14])) {
        $output .= '<img class="contacts-list-img" src="dist/img/user1-128x128.jpg">';
        } else {
        $output .= '<img class="contacts-list-img" src="data:image/jpg;base64,'.base64_encode($arreglo[14]).'">';
        }

        $output .= '
            <div class="contacts-list-info">
                <span class="contacts-list-name">
                    '. $arreglo[3].'
                    <small class="contacts-list-date float-right">'.$arreglo[12].'</small>
                </span>
                <span class="contacts-list-msg">'.$arreglo[11].'</span>
            </div>
            <!-- /.contacts-list-info -->
        </a>
    </li>
    ';
    
}
   // }
}

echo $output;

?>