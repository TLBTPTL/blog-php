<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un article - Blog</title>
</head>

    <?php
        include_once('header.php');
    ?>
<body> 
    <h1>Création d'Article</h1>
    <form action="redactionArticle" method="post">
        <label for="titre">Titre de l'article :</label>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="nb_categories">Nombre de Catégories :</label>
        <input type="number" id="nb_categories" name="nb_categories" min="1" max="3" required><br><br>

        <input type="submit" value="Entrer dans la personnalisation de l'article">
    </form>

    <?php
        include_once("footer.php");
    ?>
</body>
</html>
