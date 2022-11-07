<?php

    require_once('./../modele/classes/Categorie.php');

    Interface CategorieDao{
        public function ajouterCategorie(Categorie $entreprise);
        public function modifierCategorie(Categorie $entreprise);
        public function supprimerCategorie($id);
        public function trouverCategorie($id);
        public function listerCategories();
    }