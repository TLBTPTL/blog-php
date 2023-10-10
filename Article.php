<?php

include_once 'header.php';

class Article {
        private $idArticle;
        private $titreArticle;
        private $descriptionArticle;
        private $categorieArticle;
        private $pseudo;
        private $Commentaires = [];

        // Constructeur de la classe
        public function __construct($idArticle, $titreArticle, $descriptionArticle, $categorieArticle, $pseudo) {
            $this->idArticle = $idArticle;
            $this->titreArticle = $titreArticle;
            $this->descriptionArticle = $descriptionArticle;
            $this->categorieArticle = $categorieArticle;
            $this->pseudo = $pseudo;
        }

        // Méthode pour ajouter un commentaire à l'article
        public function ajouterCommentaire($commentaire) {
            $this->Commentaires[] = $commentaire;
        }

        // Méthode pour obtenir les commentaires de l'article
        public function obtenirCommentaires() {
            return $this->Commentaires;
        }

        /**
         * @return mixed
         */
        public function getIdArticle()
        {
            return $this->idArticle;
        }

        /**
         * @param mixed $idArticle
         */
        public function setIdArticle($idArticle)
        {
            $this->idArticle = $idArticle;
        }

        /**
         * @return mixed
         */
        public function getTitreArticle()
        {
            return $this->titreArticle;
        }

        /**
         * @param mixed $titreArticle
         */
        public function setTitreArticle($titreArticle)
        {
            $this->titreArticle = $titreArticle;
        }

        /**
         * @return mixed
         */
        public function getDescriptionArticle()
        {
            return $this->descriptionArticle;
        }

        /**
         * @param mixed $descriptionArticle
         */
        public function setDescriptionArticle($descriptionArticle)
        {
            $this->descriptionArticle = $descriptionArticle;
        }

        /**
         * @return mixed
         */
        public function getCategorieArticle()
        {
            return $this->categorieArticle;
        }

        /**
         * @param mixed $categorieArticle
         */
        public function setCategorieArticle($categorieArticle)
        {
            $this->categorieArticle = $categorieArticle;
        }

        /**
         * @return mixed
         */
        public function getPseudo()
        {
            return $this->pseudo;
        }

        /**
         * @param mixed $pseudo
         */
        public function setPseudo($pseudo)
        {
            $this->pseudo = $pseudo;
        }

        /**
         * @return array
         */
        public function getCommentaires()
        {
            return $this->Commentaires;
        }

        /**
         * @param array $Commentaires
         */
        public function setCommentaires($Commentaires)
        {
            $this->Commentaires = $Commentaires;
        }


    }
?>