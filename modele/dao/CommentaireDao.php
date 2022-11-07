<?php

    require_once('./../modele/classes/Commentaire.php');

    Interface CommentaireDao{
        public function ajouterCommentaire(Commentaire $commentaire);
        public function modifierCommentaire(Commentaire $commentaire);
        public function supprimerCommentaire($id);
        public function trouverCommentaire($id);
        public function listerCommentaires();
        public function lister10Commentaires();
        public function lister40Commentaires($page);
        public function listerCommentairesCompte($idCompte);
        public function compterCommentaires();
    }