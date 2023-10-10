<?php
include_once 'header.php';
?>

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
        session_start();
    ?>

    <form method="post" action="traitementconnexion.php">
    <div class="box">
    <h1>Formulaire Connexion</h1>

        <input type="email" name="email" placeholder="Email"  class="email" />
        <input type="text" name="pseudo" placeholder="Pseudo"  class="email" />
        <input type="password" name="password" placeholder="Mot De Passe"   class="email" />
    
        <div class="btn">
            <button type="submit" name="connexion">Se connecter</button>
            <button type="submit" name="nouveau_compte">Créer un nouveau compte</button>
        </div>
    
    </div>  
    </form>

</body>
</html>
