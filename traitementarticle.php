<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement Article</title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $_SESSION['titre']=$_POST['titre'];
        for($i=0;$i<3;$i++){
            if(isset($_POST[$i.'categorie'])){
                $_SESSION[$i.'categorie']=$_POST[$i.'categorie'];
            }
        }
        $_SESSION['contenu']=$_POST['text'];
    }


    ?>
    
</body>
</html>