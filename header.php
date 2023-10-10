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
    <header>
        <h1>Blogophilie</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="connexion.php">Connexion</a></li>
                <li><a href="creationarticle.php">Créer Article</a></li>
                <li><a href="apropos.php">À propos</a></li>
            </ul>
        </nav>
        <?php
        session_start();
        if (isset($_SESSION['pseudo'])) {
            echo '<div class="user-info"><p>Connecté en tant que ' . htmlspecialchars($_SESSION['pseudo']) . '</p></div>';
        }
        ?>
    </header>
    </head>
