<?php
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
    }
?>