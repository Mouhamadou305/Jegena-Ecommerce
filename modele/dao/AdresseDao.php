<?php

    require_once('./../modele/classes/Adresse.php');

    Interface AdresseDao{
        public function ajouterAdresse(Adresse $adresse);
        public function modifierAdresse(Adresse $adresse);
        public function supprimerAdresse($id);
        public function trouverAdresse($id);
        public function listerAdresses();
        public function listerAdressesCompte($idCompte);
    }