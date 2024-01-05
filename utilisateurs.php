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
                    <a href="php/logout.php?logout_id=<?php echo $row['unique_id']  ?>" class="logout">Déconnecter</a>
                </header>
                <div class="search">
                    <input type="text" placeholder="Rechercher par nom">

                </div>
                <div class="list_users">
                    
                </div>
            </div>
            <div class="chat hidden">
                
                <div class="receiver">
                    <img src="images/default.jpg" alt="">
                    <span></span>
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
                    
                    
                </div>
                <form action="#">
                    <input type="text" class="message" placeholder="Ecrire votre message ici" name="message">
                    <input type="text" class="out" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                    <input type="text" name="incoming_id" class="inc_msg" hidden>
                    <button type="submit" class="subBtn"><i class="fab fa-telegram-plane"></i></button>
                </form>
            </div>
            <div class="no">
                <div>NexoTalk</div>
                <p>Cliquer sur une discussion pour commencer</p>
            </div>
        </div>
    </div>
    <script src="Js/users.js"></script>
    <script src="Js/chat.js"></script>
    
</body>
</html>