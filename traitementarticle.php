<?php
session_start();
include_once 'functionDataBase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $contenu = $_POST['text'];

    try {
        $connexion = connectToDatabase();
        $sqlCount = "SELECT COUNT(*) as rowcount FROM article";
        $resultCount = $connexion->query($sqlCount);
        $row = $resultCount->fetch(PDO::FETCH_ASSOC);
        $nb_lignes = $row['rowcount'];


        if ($nb_lignes == 0) {
            $sql = "INSERT INTO article (idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo, commentaires) VALUES (1, ?, ?, ?, ?, 0)";
        } else {
            $sqlMaxId = "SELECT MAX(idArticle) as maxId FROM article";
            $resultMaxId = $connexion->query($sqlMaxId);
            $rowMaxId = $resultMaxId->fetch(PDO::FETCH_ASSOC);
            $idmax = $rowMaxId['maxId'] + 1;

            $sql = "INSERT INTO article (idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo, commentaires) VALUES (?, ?, ?, ?, ?, 0)";
        }

        $stmt = $connexion->prepare($sql);

        if ($nb_lignes == 0) {
            $stmt->bindParam(1, $titre, PDO::PARAM_STR);
            $stmt->bindParam(2, $contenu, PDO::PARAM_STR);
            $stmt->bindParam(3, $categorie, PDO::PARAM_STR);
            $stmt->bindParam(4, $_SESSION['pseudo'], PDO::PARAM_STR);
        } else {
            $stmt->bindParam(1, $idmax, PDO::PARAM_INT);
            $stmt->bindParam(2, $titre, PDO::PARAM_STR);
            $stmt->bindParam(3, $contenu, PDO::PARAM_STR);
            $stmt->bindParam(4, $categorie, PDO::PARAM_STR);
            $stmt->bindParam(5, $_SESSION['pseudo'], PDO::PARAM_STR);
        }

        $stmt->execute();
        $stmt->closeCursor();



        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
