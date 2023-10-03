<?php
    include 'header.php';
    include 'Aricle.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Article - Blog</title>
</head>
<body>
    <div id="Article"> 
        <?php 
            $Article = $_SESSION[''];
        ?> 
    </div>
    <div id="Commentaire"> <?php $_Commentaire?> </div>
</body>
</html>