<?php

    require_once('./../modele/classes/ContenirArticle.php');

    Interface ContenirArticleDao{
        public function ajouterArticleDansPanier(ContenirArticle $contenirArticle);
        public function modifierArticleDansPanier(ContenirArticle $contenirArticle);
        public function supprimerArticleDuPanier($idPanier, $idArticle);
        public function trouverArticleDansPanier($idPanier, $idArticle);
        public function listerArticlesDuPanier($idPanier);
        public function supprimerArticlesDuPanier($idPanier);
        public function listerPanierContenantArticle($idArticle);
        public function supprimerArticleDesPaniers($idArticle);
    }