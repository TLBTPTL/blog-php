<?php

include_once 'header.php';

class Categorie {
        private $idCategorie;
        private $nomCategorie;
        private $articles = array();

        public function __construct($idCategorie, $nomCategorie) {
            $this->idCategorie = $idCategorie;
            $this->nomCategorie = $nomCategorie;
        }

        // Méthode pour ajouter un article à la catégorie
        public function ajouterArticle($article) {
            $this->articles[] = $article;
        }

        // Getter pour récupérer les articles de la catégorie
        public function getArticles() {
            return $this->articles;
        }

        /**
         * @return mixed
         */
        public function getIdCategorie()
        {
            return $this->idCategorie;
        }

        /**
         * @param mixed $idCategorie
         */
        public function setIdCategorie($idCategorie)
        {
            $this->idCategorie = $idCategorie;
        }

        /**
         * @return mixed
         */
        public function getNomCategorie()
        {
            return $this->nomCategorie;
        }

        /**
         * @param mixed $nomCategorie
         */
        public function setNomCategorie($nomCategorie)
        {
            $this->nomCategorie = $nomCategorie;
        }
    }
?>