<?php
include_once 'header.php';
include_once 'functionDataBase.php';
$connexion = connectToDatabase();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Article - Blog</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
$sql = "SELECT idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo FROM article";
$stmt = $connexion->query($sql);
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($articles as $article) {
    echo "<a href='article.php?id={$article['idArticle']}' class='article'>";
    echo "<h2>{$article['titreArticle']}</h2>";
    echo "<p><strong>Catégorie:</strong> {$article['categorieArticle']}</p>";
    echo "<p><strong>Auteur:</strong> {$article['pseudo']}</p>";
    echo "<p>{$article['descriptionArticle']}</p>";
    echo '</a>';
}
?>
</body>
</html>
