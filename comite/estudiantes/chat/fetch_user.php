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
$id = $_SESSION['id'];

require("../../connect_db.php");
 //$sql = ("SELECT * FROM login where id != '$id' and programa='Sistemas'");
//  $sql = ("SELECT * FROM `chat_message` where (`from_user_id` = $from_user_id and `to_user_id` = $to_user_id) or (`from_user_id` = $to_user_id and `to_user_id` = $from_user_id)");
//echo $sql;

//$sql = ("SELECT * FROM `chat_message` where (`to_user_id` = $id) or (`from_user_id` = $id) ORDER BY chat_message_id DESC");

//$sql = ("SELECT * FROM `chat_message` where (`from_user_id` = 5) or (`to_user_id` = 5) and `chat_message_id` = (SELECT MAX(`chat_message_id`) FROM `chat_message`) GROUP BY `to_user_id`, `from_user_id` HAVING COUNT(*)>=1 ORDER BY timestamp desc");
$sql = ("SELECT * FROM `chat_message` where (`from_user_id` = $id) or (`to_user_id` = $id) and `chat_message_id`=(SELECT MAX(`chat_message_id`) FROM `chat_message`) GROUP BY `to_user_id`, `from_user_id` HAVING COUNT(*)>=1 ORDER BY timestamp desc");


//$sql = ("SELECT * FROM `chat_message` where (`from_user_id` = $id) or (`to_user_id` = $id)  GROUP BY `to_user_id`, `from_user_id` HAVING COUNT(*)>=1 ORDER BY timestamp desc");


// SELECT * FROM `chat_message` WHERE (`to_user_id` = 5) OR (`from_user_id` = 5) GROUP BY to_user_id, from_user_id HAVING COUNT(*)>1


$query = mysqli_query($mysqli, $sql);

$output = '';

$array = [];
$cont = 0;

while ($arreglo = mysqli_fetch_array($query)) {

    if($arreglo[1] == $id) {
        $sql_Login = ("SELECT * FROM login where id = '$arreglo[2]'");
        $id_Item = $arreglo[2];
    } else {
        $sql_Login = ("SELECT * FROM login where id = '$arreglo[1]'");
        $id_Item = $arreglo[1];
    }
    
       $query_Login = mysqli_query($mysqli, $sql_Login);

       while ($arreglo_User = mysqli_fetch_array($query_Login)) {
        $foto = $arreglo_User[14];
        /*
$os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Got Irix";
}
        */
        if (in_array($id_Item, $array)) {
            //echo "Got Irix";
        } else {
            // SELECT MAX(`chat_message_id`) FROM `chat_message` where (`from_user_id` = 51 and `to_user_id`=5) or (`from_user_id` = 5 and `to_user_id`=51)
        
        $sql_id = ("SELECT MAX(`chat_message_id`) FROM `chat_message` where (`from_user_id` = $id and `to_user_id`=$id_Item) or (`from_user_id` = $id_Item and `to_user_id`=$id) LIMIT 1");
    
       $query_id = mysqli_query($mysqli, $sql_id);
       while ($arreglo_id = mysqli_fetch_array($query_id)) {
           $Id_Max = $arreglo_id[0];
       }

       $sql_Message = ("SELECT * FROM `chat_message` where `chat_message_id` = $Id_Max LIMIT 1");

       $query_Message = mysqli_query($mysqli, $sql_Message);
       while ($arreglo_Message = mysqli_fetch_array($query_Message)) {
           $Message = $arreglo_Message[3];
       }

       if(empty($foto)) {
        $output .= '<li>
        <a class="idItemSearch" data-touserid="'.$id_Item.'" data-tousername="'.$arreglo_User[3].'" data-widget="chat-pane-toggle">
            <img class="contacts-list-img" src="dist/img/user1-128x128.jpg"> 
           
            <div class="contacts-list-info">
                <span class="contacts-list-name">
                    '. $arreglo_User[3].'
                <!--    <small class="contacts-list-date float-right">2/28/2015</small> -->
                <small class="contacts-list-date float-right">'.count_unseen_message($id_Item, $id).'</small>
                </span>
               <!-- <span class="contacts-list-msg">'.$arreglo[3].'</span> -->
               <span class="contacts-list-msg">'.$Message.'</span>
            </div>
            <!-- /.contacts-list-info -->
        </a>
    </li>
    ';

       } else {
        $output .= '<li>
        <a class="idItemSearch" data-touserid="'.$id_Item.'" data-tousername="'.$arreglo_User[3].'" data-widget="chat-pane-toggle">
           <!-- <img class="contacts-list-img" src="dist/img/user1-128x128.jpg"> -->
           <img class="contacts-list-img" src="data:image/jpg;base64,'.base64_encode($foto).'">
           
            <div class="contacts-list-info">
                <span class="contacts-list-name">
                    '. $arreglo_User[3].'
                <!--    <small class="contacts-list-date float-right">2/28/2015</small> -->
                <small class="contacts-list-date float-right">'.count_unseen_message($id_Item, $id).'</small>
                </span>
               <!-- <span class="contacts-list-msg">'.$arreglo[3].'</span> -->
               <span class="contacts-list-msg">'.$Message.'</span>
            </div>
            <!-- /.contacts-list-info -->
        </a>
    </li>
    ';
       }

            
        }

        $array[$cont] = $id_Item;

        $cont++;
       }  
        //   if($arreglo[4] == $Ultima_fecha) {
              // $output .= $arreglo[4] . '<br/>';
              // $output .= $Ultima_fecha;
          /*  $output .= '<li>
            <a class="idItemSearch" data-touserid="'.$arreglo[0].'" data-tousername="'.$arreglo_User[3].'" data-widget="chat-pane-toggle">
                <img class="contacts-list-img" src="dist/img/user1-128x128.jpg">
    
                <div class="contacts-list-info">
                    <span class="contacts-list-name">
                        '. $arreglo_User[3].'
                        <small class="contacts-list-date float-right">2/28/2015</small>
                    </span>
                    <span class="contacts-list-msg">'.$arreglo[3].'</span>
                </div>
                <!-- /.contacts-list-info -->
            </a>
        </li>
        ';
        */
     //   }
}

echo $output;

// Funcion para mostrar numero de mensajes nuevos
function count_unseen_message($from_user_id, $to_user_id) {

    require("../../connect_db.php");
    
//$sql = ("SELECT * FROM `chat_message` where (`from_user_id` = $from_user_id) and (`to_user_id` = $to_user_id)  and status = 1");

 $sql = ("SELECT * FROM `chat_message` where `from_user_id` = $from_user_id and `to_user_id` = $to_user_id and status=1");
// $sql = ("SELECT * FROM `chat_message` where (`from_user_id` = $id) or (`to_user_id` = $id)");
$query = mysqli_query($mysqli, $sql);

$count = 0;
$out = '';

while ($arreglo1 = mysqli_fetch_array($query)) {
    $count++;
}

if($count > 0) {
    $out .= '<span class="badge badge-primary" style="font-size: 100%;">'.$count.'</span>';

    /*
<span data-toggle="tooltip" title="3 New Messages" class="badge badge-primary">3</span>
    */
}

return $out;

}


?>