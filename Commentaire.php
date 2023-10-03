<?php

include_once 'header.php';

class Commentaire {
        private $idCom;
        private $descriptionCom;
        private $article;
        private $pseudoArt;

        public function __construct($idCom, $descriptionCom, $article, $pseudoArt) {
            $this->idCom = $idCom;
            $this->descriptionCom = $descriptionCom;
            $this->article = $article;
            $this->pseudoArt = $pseudoArt;
        }

        /**
         * @return mixed
         */
        public function getIdCom()
        {
            return $this->idCom;
        }

        /**
         * @param mixed $idCom
         */
        public function setIdCom($idCom)
        {
            $this->idCom = $idCom;
        }

        /**
         * @return mixed
         */
        public function getDescriptionCom()
        {
            return $this->descriptionCom;
        }

        /**
         * @param mixed $descriptionCom
         */
        public function setDescriptionCom($descriptionCom)
        {
            $this->descriptionCom = $descriptionCom;
        }

        /**
         * @return mixed
         */
        public function getArticle()
        {
            return $this->article;
        }

        /**
         * @param mixed $article
         */
        public function setArticle($article)
        {
            $this->article = $article;
        }

        /**
         * @return mixed
         */
        public function getPseudoArt()
        {
            return $this->pseudoArt;
        }

        /**
         * @param mixed $pseudoArt
         */
        public function setPseudoArt($pseudoArt)
        {
            $this->pseudoArt = $pseudoArt;
        }
    }
?>