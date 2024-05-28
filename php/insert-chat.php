<?php 
    session_start();
    if(isset($_SESSION['unique_id']))
    {
        include_once "config.php";

        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        if(!empty($message)){

            
            $sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg) VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            echo "Message sent successfully.";
        } else {
            echo "Failed to send message.";
        }
           
        }
    }else{
        header("location: ../login.php");
    }


    
?>