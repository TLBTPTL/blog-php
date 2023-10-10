
    <?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION['titre']=$_POST['titre'];
        $_SESSION[$i.'categorie']=$_POST[$i.'categorie'];
        $_SESSION['contenu']=$_POST['text'];

        $nb_lignes = mysql_query("SELECT COUNT(*) as rowcount FROM article");
        if($nb_lignes==0){
            $sql = mysql_query("INSERT INTO article (idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo, commentaires) VALUES (1, '{$_SESSION['titre']}', '{$_SESSION['contenu']}', '{$_SESSION['categorie']}', '{$_SESSION['pseudo']}', null)");
        }
        else{
            $idmax = mysql_query("SELECT max(id_Article) FROM article");
            $idmax = $idmax+1;
            $sql = mysql_query("INSERT INTO article (idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo, commentaires) VALUES (idmax, '{$_SESSION['titre']}', '{$_SESSION['contenu']}', '{$_SESSION['categorie']}', '{$_SESSION['pseudo']}', null)");
        }

        header('Location: index.php');
        exit;
    }



    ?>