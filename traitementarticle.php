<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $contenu = $_POST['text'];

    $host = "hostname"; // Remplacez par votre hôte de base de données
    $dbname = "database_name"; // Remplacez par le nom de votre base de données
    $username = "username"; // Remplacez par votre nom d'utilisateur de la base de données
    $password = "password"; // Remplacez par votre mot de passe de la base de données

    try {
        $connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sqlCount = "SELECT COUNT(*) as rowcount FROM article";
        $resultCount = $connexion->query($sqlCount);
        $row = $resultCount->fetch(PDO::FETCH_ASSOC);
        $nb_lignes = $row['rowcount'];

        if ($nb_lignes == 0) {
            $sql = "INSERT INTO article (idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo, commentaires) VALUES (1, ?, ?, ?, ?, null)";
        } else {
            $sqlMaxId = "SELECT MAX(idArticle) as maxId FROM article";
            $resultMaxId = $connexion->query($sqlMaxId);
            $rowMaxId = $resultMaxId->fetch(PDO::FETCH_ASSOC);
            $idmax = $rowMaxId['maxId'] + 1;

            $sql = "INSERT INTO article (idArticle, titreArticle, descriptionArticle, categorieArticle, pseudo, commentaires) VALUES (?, ?, ?, ?, ?, null)";
        }

        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(1, $idmax, PDO::PARAM_INT);
        $stmt->bindParam(2, $titre, PDO::PARAM_STR);
        $stmt->bindParam(3, $contenu, PDO::PARAM_STR);
        $stmt->bindParam(4, $categorie, PDO::PARAM_STR);
        $stmt->bindParam(5, $_SESSION['pseudo'], PDO::PARAM_STR);
        $stmt->execute();
        $stmt->closeCursor();

        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
