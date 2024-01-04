<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="Css/utilisateurs.css">
    <title>NexoTalk</title>
</head>
<body>
    <div class="page">
        <div class="navbar">
            <span class="image">
                <img src="images/logo.png" alt="">
            </span>
            <span class="slogan">
                NexoTalk
            </span>
        </div>
        <div class="container">
            <div class="utilisateurs">
                <?php
                    include_once "php/config.php";
                    $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id={$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql)>0){
                        $row = mysqli_fetch_assoc($sql);
                    }
                ?>
                <header class="user">
                    <div class="infos">
                        <img src="<?php echo $row['img']?>" alt="" class="field">
                        <div class="fields">
                            <p class="field nom"><?php echo $row['nom'] . " " . $row['prenom'];?></p>
                            <p class="field actif"><?php echo $row['status'];?></p>
                        </div>
                    </div>
                    <button class="logout">Déconnecter</button>
                </header>
                <div class="search">
                    <input type="text" placeholder="Rechercher par nom">
                    <button>Rechercher</button>
                </div>
                <div class="list_users">
                    <a href="#">
                        <div class="content">
                            <img src="images/default.jpg" alt="">
                            <div class="details">
                                <span>Farid SAD SAOUD</span>
                                <p class="txt">Text message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>
                </div>
            </div>
            <div class="chat">
                <div class="receiver">
                    <img src="images/default.jpg" alt="">
                    <span>Farid SAD SAOUD</span>
                    <div class="buttons">
                        <button class="call vocal">
                            <i class="fas fa-phone-alt"></i> 
                        </button>
                        <button class="call video">
                            <i class="fas fa-video"></i> 
                        </button>
                    </div>
                    
                </div>
                <div class="chatbox">
                    <div class="chat outgoing">
                        <div class="details">
                            <p>vsvsvdvdsvd</p>
                        </div>
                    </div>
                    <div class="chat incoming">
                        <div class="details">
                            <p>svvsdvsdvdsvxsssssssssssssscdsssssssssssssssss</p>
                        </div>
                    </div>
                </div>
                <form action="#">
                    <input type="text" placeholder="Ecrire votre message ici">
                    <button type="submit"><i class="fab fa-telegram-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>