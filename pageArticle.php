<?php
include 'header.php';
include_once 'functionDataBase.php';
$connexion = connectToDatabase();

// Vérifie si l'ID de l'article est passé en tant que paramètre dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $idArticle = $_GET['id'];

    $stmt = $connexion->prepare("SELECT titreArticle, categorieArticle, pseudo, descriptionArticle
    FROM article
    WHERE idArticle = :idArticle");

    $stmt->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $titreArticle = $row['titreArticle'];
        $categorieArticle = $row['categorieArticle'];
        $pseudoArticle = $row['pseudo'];
        $descriptionArticle = $row['descriptionArticle'];
    } else {
        echo "L'article demandé n'a pas été trouvé.";
    }
} else {
    echo "ID d'article invalide.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/article.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Article - Blog</title>
</head>
<body>
    <div id="Article">
        <?php if (isset($titreArticle)) : ?>
            <div id="headArticle">
                <div id="titreArticle">
                    <?php echo $titreArticle; ?>
                </div>
                <div id="categorieArticle">
                    <?php if (isset($categorieArticle)) : ?>
                        <?php echo $categorieArticle; ?>
                    <?php else : ?>
                        Categorie non définie
                    <?php endif; ?>
                </div>
                <div id="pseudoArticle">
                    <?php if (isset($pseudoArticle)) : ?>
                        <?php echo $pseudoArticle; ?>
                    <?php else : ?>
                        Auteur non défini
                    <?php endif; ?>
                </div>
            </div>
            <div id="descriptionArticle">
                <?php if (isset($descriptionArticle)) : ?>
                    <?php echo $descriptionArticle; ?>
                <?php else : ?>
                    Description non définie
                <?php endif; ?>
            </div>
        <?php else : ?>
            <p>L'article demandé n'a pas été trouvé.</p>
        <?php endif; ?>
    </div>

    <?php if(isset($_SESSION['pseudo'])){?>

    <div id="AjouterCommentaire">
        <h2>Ajouter un commentaire</h2>
        <form method="post" action="traitementcommentaire.php">
            <input type="hidden" name="idArticle" value="<?php echo $idArticle; ?>">
            <label for="commentaire">Commentaire :</label>
            <textarea name="commentaire" id="commentaire" rows="4" required></textarea>
            <button type="submit">Ajouter le commentaire</button>
        </form>
    </div>
    <?php } ?>

    <div id="Commentaires"> 
        <?php 
            $stmtCommentaires = $connexion->prepare("SELECT descriptionCom, pseudoArt FROM commentaire WHERE article = :idArticle");
            $stmtCommentaires->bindParam(':idArticle', $idArticle, PDO::PARAM_INT);
            $stmtCommentaires->execute();

            if ($stmtCommentaires->rowCount() > 0) {
                $commentaires = $stmtCommentaires->fetchAll(PDO::FETCH_ASSOC);
                foreach ($commentaires as $commentaire) {
                    $stmtUtilisateur = $connexion->prepare("SELECT pseudoCompte FROM compte WHERE idCompte = :idCompte");
                    $stmtUtilisateur->bindParam(':idCompte', $commentaire['pseudoArt'], PDO::PARAM_INT);
                    $stmtUtilisateur->execute();

                    if ($stmtUtilisateur->rowCount() > 0) {
                        $row = $stmtUtilisateur->fetch(PDO::FETCH_ASSOC);
                        $auteurCommentaire = $row['pseudoCompte'];
                    } else {
                        $auteurCommentaire = "Auteur inconnu";
                    }

                    echo '<div class="commentaire">';
                    echo '<p><strong>Par ' . $auteurCommentaire . '</strong></p>';
                    echo '<p>' . $commentaire['descriptionCom'] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "Aucun commentaire pour cet article.";
            }
        ?> 
    </div>


</body>
</html>
