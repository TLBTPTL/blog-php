<?php
session_start();
include_once 'functionDataBase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $commentaireId = $_POST['id'];

    try {
        $connexion = connectToDatabase();
        $sql = "SELECT pseudoArt, article FROM commentaire WHERE idCom = :commentaireId";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':commentaireId', $commentaireId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (isset($_SESSION['pseudo'])) {
                if ($_SESSION['pseudo'] == $result['pseudoArt'] || $_SESSION['pseudo'] == 'admin') {
                    $sqlDelete = "DELETE FROM commentaire WHERE idCom = :commentaireId";
                    $stmtDelete = $connexion->prepare($sqlDelete);
                    $stmtDelete->bindParam(':commentaireId', $commentaireId, PDO::PARAM_INT);
                    $stmtDelete->execute();

                    // Redirigez l'utilisateur vers la page de l'article après la suppression.
                    header('Location: pageArticle.php?id=' . $result['article']);
                    exit;
                } else {
                    echo "Vous n'êtes pas autorisé à supprimer ce commentaire.";
                }
            } else {
                echo "Vous devez être connecté pour supprimer un commentaire.";
            }
        } else {
            echo "Ce commentaire n'existe pas.";
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
} else {
    echo "ID du commentaire non spécifié.";
}
?>
