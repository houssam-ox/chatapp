<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    
    ###### Ajouter du code ici : début
    $sql = "SELECT * FROM users 
    WHERE (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' OR CONCAT(fname, ' ', lname) LIKE '%{$searchTerm}%')
    AND unique_id != {$outgoing_id}";

    ######  Fin code

    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>