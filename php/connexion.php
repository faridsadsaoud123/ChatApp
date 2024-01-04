<?php
    session_start();
    include_once "config.php";
    $emailC =mysqli_real_escape_string($conn,$_POST['emailC']);
    $mdpC =mysqli_real_escape_string($conn,$_POST['mdpC']);
    // echo "hello";
    if(!empty($emailC) && !empty($mdpC)){
        $sq = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$emailC}' AND password = '{$mdpC}'");
        if(mysqli_num_rows($sq)>0){
            $row = mysqli_fetch_assoc($sq);
            $_SESSION['unique_id'] = $row['unique_id'];
            echo 'success';
        }else{
            echo "Email ou password incorrect";
        }
    }else{
        echo "Vous devez remplir tous les champs ";
    }
?>