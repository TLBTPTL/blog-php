<?php
session_start();
include_once 'functionDataBase.php';

if (isset($_GET['id'])) {
    $articleId = $_GET['id'];

    try {
        $connexion = connectToDatabase();
        $sql = "DELETE FROM article WHERE idArticle = :articleId";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
        $stmt->execute();

        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "ID de l'article non spécifié.";
}
?>
