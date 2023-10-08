
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION['titre']=$_POST['titre'];
        $_SESSION[$i.'categorie']=$_POST[$i.'categorie'];
        $_SESSION['contenu']=$_POST['text'];


        $sql = mysql_query("INSERT INTO article (idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo, commentaires) VALUES (null, '{$_SESSION['titre']}', '{$_SESSION['contenu']}', '{$_SESSION['categorie']}', '{$_SESSION['pseudo']}', null)");

        header('Location: index.php');
        exit;
    }



    ?>