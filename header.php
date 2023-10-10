<!DOCTYPE html>
<html>
<head>
    <!-- Ouais le css en html évite de faire des fichiers en plus -->
    <title>Blogophilie - Jérémy Girard</title>
    <style>
        body {
            text-align: center;
            font-family: Poppins, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info p {
            margin: 0;
            color: #FFA500;
            font-weight: bold;
            margin-left: 10px;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<header style="background-color: #333; color: white; padding: 20px; display: flex; justify-content: space-between; align-items: center;">
    <img src="images/logo.png" alt="Logo de Blogophilie" width="150" height="124">
    <div>
        <h1 style="margin-left: 80px; font-size: 24px;">Blogophilie</h1>
        <nav style="margin-top: 10px; margin-left: 80px;">
            <ul style="list-style: none; padding: 0; display: flex;">
                <li style="margin-right: 20px;"><a href="index.php" style="text-decoration: none; color: white;">Accueil</a></li>
                <li style="margin-right: 20px;"><a href="connexion.php" style="text-decoration: none; color: white;">Connexion</a></li>
                <li style="margin-right: 20px;"><a href="creationarticle.php" style="text-decoration: none; color: white;">Créer Article</a></li>
                <li><a href="apropos.php" style="text-decoration: none; color: white;">À propos</a></li>
            </ul>
        </nav>
    </div>
        <?php
        session_start();
        if (isset($_SESSION['pseudo'])) {
            echo '<div class="user-info"><p>Connecté en tant que ' . htmlspecialchars($_SESSION['pseudo']) . '</p></div>';
        }
        ?>
    </header>
    </head>
