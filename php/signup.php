<?php
    session_start();
    include_once "config.php";
    $nom = mysqli_real_escape_string($conn,$_POST['nom']);
    $prenom =  mysqli_real_escape_string($conn,$_POST['prenom']);
    $email =  mysqli_real_escape_string($conn,$_POST['email']);
    $mdp =  mysqli_real_escape_string($conn,$_POST['mdp']);

    if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($mdp)){
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn," SELECT email from users where email='{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - this email already exist";
            }else{
                $defaultImg = 'images/default.jpg';
                $status = "Actif";
                // $targetFile = $targetDirectory . basename($_FILES["profileImage"]["name"]);
                $random_id = rand(time(),10000000);

                $sql2 = mysqli_query($conn,"INSERT INTO users (unique_id, nom, prenom, email, password, img, status)
                VALUES ('{$random_id}','{$nom}','{$prenom}','{$email}','{$mdp}','{$defaultImg}','{$status}')");
                if($sql2){
                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email='{$email}'");
                    if ($sql3) {
                        if(mysqli_num_rows($sql3) > 0){
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION['unique_id'] = $row['unique_id'];
                            echo 'success';
                        }
                    }else{
                    echo "something went wrong";
                }
                }
            }
        }
        else{
            echo $email."Vous de devez entrer un email correct";
        }
    }else{
        echo "vous devez remplir ltous les champs";
    }
?>