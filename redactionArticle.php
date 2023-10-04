<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/formulaire.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogophilie - Rédaction Article</title>
        
</head>
<body>
    <h1>Personnaliser votre article</h1>
    <form action="traitementarticle.php" method="post">
        <?php

        session_start();
        $_SESSION['titre']=$_POST['titre'];

        echo '<label for="categorie">Sélectionner catégorie(s) :</label>';
        for ($i = 0; $i < $_POST['nb_categories']; $i++) {
            echo '<select id="'.$i.'categorie" name="'.$i.'categorie">';
            echo '<option value="Film">Film</option>';
            echo '<option value="Jeu vidéo">Jeu vidéo</option>';
            echo '<option value="Série">Série</option>';
            echo '<option value="Musique">Musique</option>';
            echo '<option value="Histoire">Histoire</option>';
            echo '<option value="Littérature">Littérature</option>';
            echo '<option value="Philosophie">Philosophie</option>';
            echo '<option value="Politique">Politique</option>';
            echo '</select>';
        }

            echo "<textarea placeholder='Entrez votre texte' id='text' name='text' rows='10' cols='70'></textarea>";
        ?>
        <br>
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>
