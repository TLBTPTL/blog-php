<!DOCTYPE html>
<html>
<head>
    <link rel="icon" type="image/png" href="images/logo.png">
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
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
        }

        .btn-connexion, .btn-deconnexion {
            background-color: #14B7B8;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-family: Poppins, sans-serif;
            font-size: 16px;
        }

        .btn-deconnexion {
            background-color: #FFA500;
        }

        .btn-deconnexion:hover {
            background-color: #FF8500;
        }

        .user-info {
            text-align: center;
            margin-top: 10px;
        }

        .user-info p {
            margin: 0;
            color: #FFA500;
            font-weight: bold;
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
            <li><a href="index.php" class="btn-connexion">Accueil</a></li>
            <li><a href="connexion.php" class="btn-connexion">Connexion</a></li>
            <li><a href="creationarticle.php" class="btn-connexion">Créer Article</a></li>
            <li><a href="apropos.php" class="btn-connexion">À propos</a></li>
        </ul>
    </nav>
    
    <?php
    session_start();
    if (isset($_SESSION['pseudo'])) {
        echo '<div class="user-info">';
        echo '<div>';
        echo '<p>Connecté en tant que ' . htmlspecialchars($_SESSION['pseudo']) . '</p>';
        echo '</div>';
        echo '<form method="post" action="">';
        echo '<button type="submit" name="deconnexion" class="btn-deconnexion">Déconnexion</button>';
        echo '</form>';
        echo '</div>';
        if (isset($_POST['deconnexion'])) {
            session_unset();
            header('Location: index.php');
            exit;
        }
    }
    ?>
</header>
</body>
</html>
