<?php
    while($row = mysqli_fetch_assoc($query))
    {
        ###### Ajouter du code ici : début
        $user_id = $row['unique_id'];
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$user_id} OR outgoing_msg_id = {$user_id}) AND (incoming_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        ######  Fin code

        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        if(isset($row2['outgoing_msg_id']))
        {
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";

        }else{
            $you = "";
        }

        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>