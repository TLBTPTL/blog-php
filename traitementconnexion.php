<?php
session_start();



if (isset($_POST['connexion'])) {
$email = $_POST['email'];
$motDePasse = $_POST['password'];
$pseudo = $_POST['pseudo'];

$sql = "SELECT COUNT(*) AS compte_existe
            FROM compte
            WHERE email = :email
            AND motDePasse = :motDePasse
            AND pseudoCompte = :pseudo";

$stmt = $connexion->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
$stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result['compte_existe'] == 1) {
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pseudo'] = $_POST['pseudo'];
} else {
    $_SESSION['erreurconnexion'] = 1;
    header('Location: connexion.php');
}

header('Location: index.php');
exit;
} elseif (isset($_POST['nouveau_compte'])) {
$email = $_POST['email'];
$motDePasse = $_POST['password'];
$pseudo = $_POST['pseudo'];

$sql = "SELECT COUNT(*) AS compte_existe
            FROM compte
            WHERE email = :email
            AND motDePasse = :motDePasse
            AND pseudoCompte = :pseudo";

$stmt = $connexion->prepare($sql);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
$stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result['compte_existe'] == 1) {
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pseudo'] = $_POST['pseudo'];
    header('Location: index.php');
} else {
    $sql = "SELECT MAX(idCompte) FROM compte";
    $stmt = $connexion->query($sql);
    $idsuiv = $stmt->fetchColumn() + 1;

    $sql = "INSERT INTO compte (idCompte, email, motDePasse, pseudoCompte) 
                VALUES (:id, :email, :motDePasse, :pseudo)";

    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id', $idsuiv, PDO::PARAM_INT);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':motDePasse', $motDePasse, PDO::PARAM_STR);
    $stmt->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);

    $stmt->execute();
    header('Location: connexion.php');
}

header('Location: index.php');
exit;
}
