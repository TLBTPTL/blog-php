<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement Article</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION['titre']=$_POST['titre'];
        $_SESSION[$i.'categorie']=$_POST[$i.'categorie'];
        $_SESSION['contenu']=$_POST['text'];


        $sql = mysql_query("INSERT INTO article (idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo, commentaires) VALUES (null, '{$_SESSION['titre']}', '{$_SESSION['contenu']}', '{$_SESSION['categorie']}', '{$_SESSION['pseudo']}', null)");

    }



    ?>
    
</body>
</html>