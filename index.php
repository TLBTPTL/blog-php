<?php
include_once 'header.php';
include_once 'functionDataBase.php';
$connexion = connectToDatabase();
$_SESSION['erreurconnexion'] = 0;

$categorieSelectionnee = null;

if (isset($_GET['categorie'])) {
    $categorieSelectionnee = $_GET['categorie'];
    if ($categorieSelectionnee === "") {
        $sql = "SELECT idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo FROM article";
    } else {
        $sql = "SELECT idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo FROM article WHERE categorieArticle = :categorie";
    }
    $stmt = $connexion->prepare($sql);
    if ($categorieSelectionnee !== "") {
        $stmt->bindParam(':categorie', $categorieSelectionnee);
    }
    $stmt->execute();
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo FROM article";
    $stmt = $connexion->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$sql = "SELECT DISTINCT categorieArticle FROM article";
$stmt = $connexion->query($sql);
$categories = $stmt->fetchAll(PDO::FETCH_COLUMN);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Articles - Blog</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <form method="get" action="index.php">
        <label for="categorie">Filtrer par catégorie :</label>
        <select name="categorie" id="categorie">
            <option value="">Toutes les catégories</option>
            <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie; ?>" <?= $categorieSelectionnee === $categorie ? 'selected' : ''; ?>>
                    <?= $categorie; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filtrer</button>
    </form>

    <?php foreach ($articles as $article) : ?>
        <a href='article.php?id=<?= $article['idArticle'] ?>' class='article'>
            <h2><?= $article['titreArticle'] ?></h2>
            <p><strong>Catégorie :</strong> <?= $article['categorieArticle'] ?></p>
            <p><strong>Auteur :</strong> <?= $article['pseudo'] ?></p>
            <p><?= $article['descriptionArticle'] ?></p>
        </a>
    <?php endforeach; ?>
</body>
</html>
