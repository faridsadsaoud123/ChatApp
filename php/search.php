<?php
    include_once "config.php";
    $searchContent= mysqli_real_escape_string($conn,$_POST['searchContent']);
    $sql = mysqli_query($conn,"SELECT * FROM users WHERE nom LIKE'%{$searchContent}%' OR prenom LIKE '%{$searchContent}%'");
    $output="";
    if(mysqli_num_rows($sql)>0){
        include "data.php";
    }else{
        $output .= "Aucun utilisateur trouver";
    }
    echo $output;
?>
