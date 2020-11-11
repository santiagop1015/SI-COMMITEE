<?php

function fetch_user_chat_history($from_user_id, $to_user_id) {
    require("../../connect_db.php");
    $sql = ("SELECT * FROM `chat_message` where (`from_user_id` = $from_user_id and `to_user_id` = $to_user_id) or (`from_user_id` = $to_user_id and `to_user_id` = $from_user_id)");

  // $sql = ("SELECT * FROM `chat_message` where (`from_user_id` = $from_user_id) and (`to_user_id` = $to_user_id)");

  //$sql = ("SELECT * FROM `chat_message` where (`from_user_id` = $from_user_id or `to_user_id` = $to_user_id) or (`from_user_id` = $to_user_id or `to_user_id` = $from_user_id)");  

    $query = mysqli_query($mysqli, $sql);
    
    $output = '';

    $totalMensajes = 0;
    
   while ($arreglo = mysqli_fetch_array($query)) {
       $totalMensajes++;

//   if($totalMensajes <= ) {

 //  $output .= '<div id="idMessages"'.$to_user_id.'>';

    if($arreglo[2] == $_SESSION['id']) {
        $output .= '<div class="direct-chat-msg right">
        <div class="direct-chat-infos clearfix">
          
      <!--  <span class="direct-chat-timestamp float-left">'.$arreglo[4].'</span> -->
          <span class="direct-chat-timestamp float-right">'.date('F j, Y g:i a', strtotime($arreglo[4])).'</span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
          '.$arreglo[3].'
        </div>
        <!-- /.direct-chat-text -->
      </div>';
    } else {

        $output .= '<div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
        
         <!--   <span class="direct-chat-timestamp float-right">'.$arreglo[4].'</span>  -->
         <span class="direct-chat-timestamp float-right">'.date('F j, Y g:i a', strtotime($arreglo[4])).'</span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
            '.$arreglo[3].'
        </div>
        <!-- /.direct-chat-text -->
    </div>';
    }

   // $output .= '</diV>';

}

 //   }
    
   return $output;
}


?>