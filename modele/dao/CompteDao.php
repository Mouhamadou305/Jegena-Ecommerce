<?php

    require_once('./../modele/classes/Compte.php');

    Interface CompteDao{
        public function ajouterCompte(Compte $compte);
        public function modifierCompte(Compte $compte);
        public function supprimerCompte($id);
        public function trouverCompte($id);
        public function trouverParLogin($id);
        public function listerComptes();
    }