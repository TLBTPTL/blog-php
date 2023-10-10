<?php
    include 'header.php';
    include 'Aricle.php';
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
        $stmt = $dbh->prepare("SELECT * FROM article WHERE idArticle = ?");
        $stmt->execute($_GET['idArticle']);
        foreach ($stmt as $row){
            print_r($row);
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