<?php
include 'functionDataBase.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['idArticle']) && is_numeric($_POST['idArticle'])) {
        $idArticle = $_POST['idArticle'];
        $commentaire = $_POST['commentaire'];
        $pseudo  = $_SESSION['pseudo'];

        $connexion = connectToDatabase();

        $sqlMaxId = "SELECT MAX(idCom) as maxId FROM commentaire";
        $resultMaxId = $connexion->query($sqlMaxId);
        $rowMaxId = $resultMaxId->fetch(PDO::FETCH_ASSOC);
        $idmax = $rowMaxId['maxId'] + 1;

        $stmt = $connexion->prepare("INSERT INTO commentaire (idCom, article, descriptionCom, pseudoArt) VALUES (:idmax, :idArticle, :commentaire, :pseudo)");
        $stmt->bindParam(':idmax', $idmax, PDO::PARAM_INT);
        $stmt->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
        $stmt->bindParam(':commentaire', $commentaire, PDO::PARAM_STR);
        $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

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
