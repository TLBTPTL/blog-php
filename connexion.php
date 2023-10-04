<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/douze.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Blog</title>
</head>
<body>

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
        session_start();
        # Il faudrait pouvoir l'ajouter à la base de donnée, impossible à traiter pour l'instant
        # Faire le cas où l'email est bonne mais pas le mot de passe
        # Faire le cas où le compte existe pas (ça l'ajoute à la base de donnée)
        # Potentiellement faire le mot de passe oublié
        $_POST['email']=null;
        $_POST['password']=null;
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
    ?>

    <p>Mot de passe oublié? <a href="http://x.com" style="color:#f1c40f;">Cliquez ici !</a></p>
</body>
</html>