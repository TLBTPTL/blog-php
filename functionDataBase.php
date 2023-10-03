<?php

    function connectToDatabase() {
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=tp_pendu", 'root', ''    );
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        catch (Exceotion $e){
            die('Erreur général : ' . $e->getMessage());
        }
    }
?>