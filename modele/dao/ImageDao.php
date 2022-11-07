<?php

    require_once('./../modele/classes/Image.php');

    Interface ImageDao{
        public function ajouterImage(Image $image);
        public function modifierImage(Image $image);
        public function supprimerImage($id);
        public function trouverImage($id);
    }