<?php
    include 'header.php';
    include 'Article.php';
    include_once 'functionDataBase.php';
    $connexion = connectToDatabase();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Article - Blog</title>
</head>
<body>
<?php

    $sql = "SELECT titreArticle, descriptionArticle, categorieArticle, pseudo FROM article";
    $stmt = $connexion->query($sql);
    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);


    foreach ($articles as $article) {
        echo "<h2>{$article['titreArticle']}</h2>";
        echo "<p><strong>Catégorie:</strong> {$article['categorieArticle']}</p>";
        echo "<p><strong>Auteur:</strong> {$article['pseudo']}</p>";
        // Vous pouvez afficher une partie du contenu ici si vous le souhaitez
        echo "<p>{$article['descriptionArticle']}</p>";
        //echo "<a href='article_detail.php?id={$article['idArticle']}' class='btn btn-primary'>Lire la suite</a>";
}


?>
</body>
</html>