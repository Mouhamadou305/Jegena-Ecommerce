<?php

    require_once('./../modele/classes/CommanderArticle.php');

    Interface CommanderArticleDao{
        public function ajouterCommanderArticle(CommanderArticle $commanderArticle);
        public function modifierCommanderArticle(CommanderArticle $commanderArticle);
        public function supprimerCommanderArticle($idCommande, $idArticle);
        public function trouverCommanderArticle($idCommande, $idArticle);
        public function listerArticlesDeCommande($idCommande);
        public function supprimerArticlesCommande($idCommande);
        public function supprimerArticleDesCommandes($idArticle);
    }