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

        if ($result) {
            if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] === $result['pseudo'] || $_SESSION['pseudo'] === 'admin')) {
                $sql = "DELETE FROM article WHERE idArticle = :articleId";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':articleId', $articleId, PDO::PARAM_INT);
                $stmt->execute();

                header('Location: index.php');
                exit;
            } else {
                echo "Vous n'êtes pas autorisé à supprimer cet article.";
            }
        } else {
            echo "Cet article n'existe pas.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "ID de l'article non spécifié.";
}
?>
