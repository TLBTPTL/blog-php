<?php
include_once 'functionDataBase.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commentId'])) {
    $commentId = $_POST['commentId'];

    try {
        $connexion = connectToDatabase();

        $sql = "SELECT c.idCom, a.idAuteur AS idAuteurArticle, u.pseudo AS pseudoAuteur, c.pseudoArt AS pseudoCommentaire
                FROM article a
                JOIN commentaires c ON a.idArticle = c.article
                JOIN utilisateurs u ON a.idAuteur = u.idUtilisateur
                WHERE c.idCom = :commentId";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (isset($_SESSION['pseudo']) && ($_SESSION['pseudo'] == $result['pseudoAuteur'] || $_SESSION['pseudo'] == 'admin' || $_SESSION['pseudo'] == $result['pseudoCommentaire'])) {
                $sqlDeleteComment = "DELETE FROM commentaires WHERE idCom = :commentId";
                $stmtDeleteComment = $connexion->prepare($sqlDeleteComment);
                $stmtDeleteComment->bindParam(':commentId', $commentId, PDO::PARAM_INT);
                $stmtDeleteComment->execute();

                // Redirigez l'utilisateur ou affichez un message de succès.
                header('Location: index.php'); // Vous pouvez rediriger vers la page d'accueil par exemple.
                exit;
            } else {
                echo "Vous n'êtes pas autorisé à supprimer ce commentaire.";
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
