<?php
    include 'functionDataBase.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['idArticle']) && is_numeric($_POST['idArticle'])) {
            $idArticle = $_POST['idArticle'];
            $commentaire = $_POST['commentaire'];

            $connexion = connectToDatabase();
            $stmt = $connexion->prepare("INSERT INTO commentaire (article, descriptionCom) VALUES (:idArticle, :commentaire)");
            $stmt->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
            $stmt->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
    
            if ($stmt->execute()) {
                header("Location: pageArticle.php?id=$idArticle");
            } else {
                echo "Erreur lors de l'ajout du commentaire.";
            }
        } else {
            echo "ID d'article invalide.";
        }
    }
    ?>
