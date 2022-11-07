<?php

    require_once('./../modele/classes/Article.php');

    Interface ArticleDao{
        public function ajouterArticle(Article $article);
        public function modifierArticle(Article $article);
        public function supprimerArticle($id);
        public function trouverArticle($id);
        public function listerArticles();
        public function listerArticlesParCategorie($idCategorie);
        public function listerArticlesParGenre($idGenre);
        public function listerArticlesParCategorieEtGenre($idCategorie, $idGenre);
        public function lister32Articles($page);
        public function lister32ArticlesRestant($page);
        public function lister12Articles($page);
        public function lister12ArticlesCoupDeCoeur($page);
        public function lister32ArticlesParCategorie($idCategorie, $page);
        public function lister32ArticlesRestantParCategorie($idCategorie, $page);
        public function lister32ArticlesParMotCle($motCle, $page);
        public function lister32ArticlesParGenre($idGenre, $page);
        public function lister32ArticlesParCategorieEtGenre($idCategorie, $idGenre, $page);
        public function compterArticles();
        public function compterArticlesRestant();
        public function compterArticlesMotCle($motCle);
        public function compterArticlesRestantCategorie($idCategorie);
        public function compterArticlesCategorie($idCategorie);
    }