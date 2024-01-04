<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>NexoTalk</title>
</head>
<body>
    <header class="logo">
        <span class="image">
            <img src="images/logo.png" alt="">
        </span>
        <span class="slogan">
            <div class="slog">NexoTalk</div>
            <div class="par">Let's talk</div>
        </span>
        
    </header>
    <div class="container">
        <div class="box connexion">
            <h2>Vous avez déja un compte ?</h2>
            <button class="signinbtn">Se connecter</button>
        </div>
        <div class="box creation">
            <h2>Vous n'avez pas déja un compte ?</h2>
            <button class="signupbtn" >S'inscrire</button>
        </div>
        <div class="formBx">
            <div class="form signinForm">
                <form action="#">
                    <header>Se connecter</header>
                    <div class="field">
                        <label>Email :</label>
                        <input type="email" placeholder="example@exmple.com">
                    </div>
                    <div class="field">
                        <label>Mot de passe :</label>
                        <input type="password" placeholder="Entrez votre mot de passe">
                    </div>
                    <div class="field submit">
                        <input type="submit" value="Se connecter">
                    </div>
                </form>
            </div>
            <div class="form signupForm">
                <form action="#">
                    <header>Créer un compte</header>
                    <div class="field">
                        <label>Nom :</label>
                        <input type="text" placeholder="Entrez votre nom">
                    </div>
                    <div class="field">
                        <label>Prénom :</label>
                        <input type="text" placeholder="Entrez votre prénom">
                    </div>
                    <div class="field">
                        <label>Email :</label>
                        <input type="text" placeholder="example@example.com">
                    </div>
                    <div class="field">
                        <label>Mot de passe :</label>
                        <input type="password" placeholder="Entrer votre mot de passe">
                    </div>
                    <div  class="field submit">
                        <input type="submit" value="S'inscrire">

                    </div>
    
                </form>
            </div>
        </div>
    </div>
    <script src="/Js/script.js"></script>
</body>
</html>