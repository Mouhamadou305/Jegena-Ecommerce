<?php

    require_once('./../modele/classes/Entreprise.php');

    Interface EntrepriseDao{
        public function ajouterEntreprise(Entreprise $entreprise);
        public function modifierEntreprise(Entreprise $entreprise, $nom);
        public function supprimerEntreprise($nom);
        public function trouverEntreprise();
    }