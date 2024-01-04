<?php 
    session_start();
    include_once "config.php";
    $sql=mysqli_query($conn,"SELECT * from users");
    $output = "";
    if(mysqli_num_rows($sql)==1){
        $output .= "Pas d'utilisateur actif";
    }
    elseif(mysqli_num_rows($sql)>0){
        include "data.php";
    }
    echo $output;
?>