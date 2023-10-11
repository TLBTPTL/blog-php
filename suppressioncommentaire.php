<?php
session_start();
include_once 'functionDataBase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    echo $_POST['id'];
    $commentaireId = $_POST['id'];

    try {
        $connexion = connectToDatabase();
        $sql = "SELECT pseudoArt FROM commentaire WHERE idCommentaire = :commentaireId";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':commentaireId', $commentaireId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            if (isset($_SESSION['idCompte']) && ($_SESSION['idCompte'] == $result['pseudoArt'] || $_SESSION['pseudoCompte'] === 'admin')) {
                $sql = "DELETE FROM commentaire WHERE idCommentaire = :commentaireId";
                $stmt = $connexion->prepare($sql);
                $stmt->bindParam(':commentaireId', $commentaireId, PDO::PARAM_INT);
                $stmt->execute();

                //header('Location: pageArticle.php?id=' . $['idArticle']);
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
<?php
