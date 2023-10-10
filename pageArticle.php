<?php
    require_once('header.php');
    /*require_once('Aricle.php');*/
    require_once('functionDataBase.php');
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
        $a = [1];
        $dbh = connectToDatabase();
        $stmt = $dbh->prepare("SELECT * FROM article WHERE idArticle = ?");
        $stmt->execute($a);
        foreach ($stmt as $row){
            $titreArticle = $row['titreArticle'];
            $categorieArticle = $row['categorieArticle'];
            $pseudoArticle = $row['pseudo'];
            $descriptionArticle = $row['descriptionArticle'];
        }
    ?> 
    <div id="Article">
        <div id="headArticle">
            <div id="titreArticle">
                <?php 
                    echo($titreArticle);
                ?>
            </div>
            <div id="categorieArticle">
                <?php
                    echo($categorieArticle);
                ?>
            </div>
            <div id="pseudoArticle">
                <?php
                    echo($pseudoArticle);
                ?>
            </div>
        </div>
        <div id="descriptionArticle">
            <?php
                echo($descriptionArticle);
            ?>
        </div>
    </div>
    <div id="Commentaires"> 
        <?php 
            $stmt = $dbh->prepare("SELECT * FROM article WHERE idCommentaires  = ?");
            $stmt->execute();
            foreach ($stmt as $row){
                print_r($row);
            }
        ?> 
    </div>
</body>
</html>