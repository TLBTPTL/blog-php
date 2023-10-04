<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/douze.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Blog</title>
</head>
<body>

    <?php
        session_destroy();
        session_start();
    ?>

    <form method="post" action="index.html">
    <div class="box">
    <h1>Formulaire Connexion</h1>

        <input type="email" name="email" placeholder="Email"  class="email" />
        <input type="pseudo" name="pseudo" placeholder="Pseudo"  class="email" />
        <input type="password" name="password" placeholder="Mot De Passe"   class="email" />
    
    <a href="index.html"><div class="btn"><button type="submit">Se connecter</button></a></div>
    
    </div>  
    </form>

    <?php
        $_SESSION['pseudo']=$_POST['pseudo'];
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
    ?>

    <p>Mot de passe oublié? <a href="http://x.com" style="color:#f1c40f;">Cliquez ici !</a></p>
</body>
</html>