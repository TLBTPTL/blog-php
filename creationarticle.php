<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/formulaire.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un article - Blog</title>
</head>
<body> 

    <h1>Création d'article</h1>
    <form action="redactionArticle" method="post">
        <label for="titre">Titre de l'article :</label>
        <input type="text" id="titre" name="titre" required><br><br>

        <label for="categorie">Sélectionner catégorie(s) :</label>
        <select id="categorie" name="categorie">
            <option value="Film">Film</option>
            <option value="Jeu vidéo">Jeu vidéo</option>
            <option value="Série">Série</option>
            <option value="Musique">Musique</option>
            <option value="Histoire">Histoire</option>
            <option value="Littérature">Littérature</option>
            <option value="Philosophie">Philosophie</option>
            <option value="Politique">Politique</option>
        </select>

        <label for="text">Contenu de l'article :</label>
        <textarea placeholder="Entrez votre texte" id="text" name="text" rows="10" cols="70"></textarea>
        <br>
        <input type="submit" value="Soumettre">
    </form>
</body>
</html>
