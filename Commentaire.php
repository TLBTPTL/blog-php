<?php

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
}
