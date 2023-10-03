<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogophilie - Rédaction Article</title>
</head>
<body>
    <form action="traitement" method="post">
        <?php
        for ($i = 0; $i < $_POST['nb_categories']; $i++) {
            echo '<label for="categorie">Sélectionner une catégorie :</label>';
            echo '<select id="categorie" name="categorie">';
            echo '<option value="Film">Film</option>';
            echo '<option value="Jeu vidéo">Jeu vidéo</option>';
            echo '<option value="Série">Série</option>';
            echo '<option value="Musique">Musique</option>';
            echo '<option value="Histoire">Histoire</option>';
            echo '<option value="Littérature">Littérature</option>';
            echo '<option value="Philosophie">Philosophie</option>';
            echo '<option value="Politique">Politique</option>';
            echo '</select><br><br>';
        }
        ?>
    </form>
</body>
</html>
