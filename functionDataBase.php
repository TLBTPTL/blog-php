<?php

    function connectToDatabase() {
        try {
            $connexion = new PDO("mysql:host=localhost;dbname=blogandregirardsauvaget", 'root', '');
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connexion;
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
        catch (Exception $e){
            die('Erreur générale : ' . $e->getMessage());
        }
    }
?>