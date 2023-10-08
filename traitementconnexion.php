<?php
session_start();

if (isset($_POST['connexion'])) {
    // Traitez la connexion ici en vérifiant les informations dans la base de données
    header('Location: index.php');
    exit;
} elseif (isset($_POST['nouveau_compte'])) {
    // Vérifier que le compte n'existe pas déjà (si c'est le cas alors connexion simple), sinon créer le compte
    header('Location: index.php');
    exit;
}
?>
