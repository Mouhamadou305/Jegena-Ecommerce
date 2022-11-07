<?php

    require_once('./../modele/classes/Panier.php');

    Interface PanierDao{
        public function ajouterPanier(Panier $panier);
        public function modifierPanier(Panier $panier);
        public function supprimerPanier($id);
        public function trouverPanier($id);
        public function listerPaniers();
    }