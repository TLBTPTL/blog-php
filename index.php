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
    <title>Liste Article - Blog</title>
</head>
<body>  
    <h1>Bienvenue sur Le Blog d'Irene</h1>
    <?php
    $sql =  'SELECT titreArticle, descriptionArticle, idArticle FROM article WHERE idArticle = 1';
    foreach  ($connexion->query($sql) as $row) {
        print 'L\'article numero '. $row['idArticle'] . "\t";
        print 'est intitulé ' . $row['titreArticle'] . "\t";
        print 'est contient ' . $row['descriptionArticle'] . "\n";
    }
    ?>
</body>
</html>