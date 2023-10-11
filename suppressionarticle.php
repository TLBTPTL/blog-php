<?php
session_start();
include_once 'functionDataBase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $articleId = $_POST['id'];

    try {
        $connexion = connectToDatabase();
        $sql = "SELECT pseudo FROM article WHERE idArticle = :articleId";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result && isset($_SESSION['pseudo']) && $result['pseudo'] === $_SESSION['pseudo']) {
            // L'utilisateur connecté est l'auteur de l'article, autorisez la suppression
            $sql = "DELETE FROM article WHERE idArticle = :articleId";
            $stmt = $connexion->prepare($sql);
            $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
            $stmt->execute();

            header('Location: index.php');
            exit;
        } else {
            // L'utilisateur n'est pas l'auteur, affichez un message d'erreur ou redirigez-le
            echo "Vous n'êtes pas autorisé à supprimer cet article.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "ID de l'article non spécifié.";
}
?>
