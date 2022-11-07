<?php

    require_once('./../modele/classes/Commande.php');

    Interface CommandeDao{
        public function ajouterCommande(Commande $commande);
        public function modifierCommande(Commande $commande);
        public function supprimerCommande($id);
        public function trouverCommande($id);
        public function listerCommandes();
        public function listerCommandesClient($idClient);
        public function lister32Commandes($page);
        public function lister32CommandesParStatut($statut, $page);
        public function compterCommandesPourAdresse($adresse);
        public function compterCommandesPourAdresseEtStatut($adresse, $statut);
        public function lister32CommandesParAdresse($adresse, $page);
        public function lister32CommandesParAdresseEtStatut($adresse, $statut, $page);
        public function lister32CommandesSelonAdresse($page);
        public function lister32CommandesParStatutSelonAdresse($statut, $page);
    }