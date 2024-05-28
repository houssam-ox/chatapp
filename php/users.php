<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];

    ###### Ajouter du code ici : début
    $sql = "SELECT * FROM users WHERE unique_id != {$outgoing_id}";

    ###### Fin

    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>