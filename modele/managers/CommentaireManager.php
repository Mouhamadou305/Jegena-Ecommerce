<?php

    require_once('./../modele/classes/Compte.php');
    require_once('./../modele/classes/Commentaire.php');
    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/dao/CommentaireDao.php');
    require_once('./../modele/dao/DAOException.php'); 

    class CommentaireManager {
            
        private $compteDao;
        private $commentaireDao;

        private $erreurs;
        private $resultat;

        public function getErreurs(){
            return $this->erreurs;
        }

        public function getResultat(){
            return $this->resultat;
        }
        
        function __construct(CompteDao $compteDao, CommentaireDao $commentaireDao){
            $this->compteDao= $compteDao;
            $this->commentaireDao= $commentaireDao;
        }

        private function validationLogin($login) {
            if (isset($login) && trim($login)!='') {
                if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $login))
                    throw new Exception( "Merci de saisir une commentaire mail valide." );
                else if($this->compteDao->trouverParLogin($login)!=null && $this->compteDao->trouverParLogin($login)->isActive())
                    throw new Exception( "Ce compte utilisateur existe déjà." );
            }else {
                throw new Exception( "Ce champ est obligatoire." );
            }
        }

        private function validationId($id) {
            if (isset($id) && trim($id)!='') {
                if($this->commentaireDao->trouverCommentaire($id)!=null && $this->commentaireDao->trouverCommentaire($id)->getCompte()->getId()!=$_SESSION['compte']->getId())
                    throw new Exception( "Vous n'êtes pas autorisé à modifier cette commentaire." );
                if($this->commentaireDao->trouverCommentaire($id)==null)
                    throw new Exception( "Vous n'êtes pas autorisé à modifier cette commentaire." );
            }else {
                throw new Exception( "Aucune commentaire sélectionnée." );
            }
        }

        private function validationChamp($champ) {
            if(isset($champ) && trim($champ)!='' && strlen($champ)<2) {
                throw new Exception("Ce champ doit comporter au moins 2 caractères.");
            }
            if(!isset($champ) || trim($champ)=='') {
                throw new Exception("Ce champ est obligatoire");
            }
        }
        
        public function traiterNom(Compte $compte, $nom) {
            try {
                $this->validationChamp($nom);
            }catch(Exception $e) {
                $this->erreurs['nom']= $e->getMessage();
            }
            $compte->setNom($nom);
        }
        
        public function traiterDescription(Commentaire $commentaire, $description){
            try {
                $this->validationChamp($description);
            }catch(Exception $e) {
                $this->erreurs['description']= $e->getMessage();
            }
            $commentaire->setDescription($description);
        }

        public function traiterId(Commentaire $commentaire, $id){
            try {
                $this->validationId($id);
            }catch(Exception $e) {
                $this->erreurs['id']= $e->getMessage();
            }
            $commentaire->setId($id);
        }

        public function ajouterCommentaire(){
            $description="";

            if(isset($_POST['commentaire']))
                $description= trim($_POST["commentaire"]);
            
            $commentaire= new Commentaire();
            if(isset($_SESSION['compte'])){
                $compte= clone $_SESSION['compte'];
                try {
                    $this->traiterDescription($commentaire, $description);
                    $commentaire->setCompte($compte);
                    
                    if(empty($this->erreurs)) {
                        $this->commentaireDao->ajouterCommentaire($commentaire);
                        $this->resultat="Ajout réussie";
                    }else {
                        $this->resultat="Echec de l'ajout";
                    }
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }

            return $commentaire;

        }

        public function modifierCommentaire(){
            $id="";
            $description="";

            if(isset($_POST['id']))
                $id= trim($_POST["id"]);
            if(isset($_POST['description']))
                $description= trim($_POST["description"]);
            
            $commentaire= new Commentaire();
            if(isset($_SESSION['compte'])){
                $compte= clone $_SESSION['compte'];
                try {
                    $this->traiterId($commentaire, $id);
                    $this->traiterDescription($commentaire, $description);
                    $commentaire->setCompte($compte);
                    
                    if(empty($this->erreurs)) {
                        $this->commentaireDao->modifierCommentaire($commentaire);
                        $this->resultat="Modification réussie";
                    }else {
                        $this->resultat="Echec de la modification";
                    }
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.".$e->getMessage();
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }

            return $commentaire;

        }

        public function supprimerCommentaire(){
            $id="";
            $commentaire= new Commentaire();
            if(isset($_POST['id']))
                $id= trim($_POST["id"]);
            if(isset($_SESSION['compte'])){
                try {
                    $this->traiterId($commentaire, $id);
                    if(empty($this->erreurs)) {
                        if($this->commentaireDao->trouverCommentaire($id)!==null){
                            $this->commentaireDao->supprimerCommentaire($id);
                            $this->resultat="Suppression réussie";
                        }
                    }else {
                        $this->resultat="Echec de la suppression";
                    }
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
        }

        public function listerCommentaires(){
            $commentaires= null;
            try {
                $commentaires= $this->commentaireDao->listerCommentaires();
            }catch(DAOException $e){
                $this->resultat="Une erreur interne liée au serveur est survenue.";
            }
            return $commentaires;
        }

        public function lister10Commentaires(){
            $commentaires= null;
            try {
                $commentaires= $this->commentaireDao->lister10Commentaires();
            }catch(DAOException $e){
                $this->resultat="Une erreur interne liée au serveur est survenue.";
            }
            return $commentaires;
        }

        public function listerCommentairesCompte(){
            $commentaires= null;
            if(isset($_SESSION['compte'])){
                try {
                    $id= $_SESSION['compte']->getId();
                    $commentaires= $this->commentaireDao->listerCommentairesCompte($id);
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $commentaires;
        }

        public function trouverCommentaire(){
            $id="";
            $commentaire= new Commentaire();
            if(isset($_GET['id']))
                $id= trim($_GET["id"]);
            if(isset($_POST['id']))
                $id= trim($_POST["id"]);
            if(isset($_SESSION['compte'])){
                try {
                    $this->traiterId($commentaire, $id);
                    if(empty($this->erreurs)) {
                        $commentaire= $this->commentaireDao->trouverCommentaire($id);
                    }else {
                        $resultat='Impossible de trouver ce commentaire.';
                    }
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $commentaire;
        }

        public function lister40Commentaires(){
            $commentaires= array();
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $commentaires=$this->commentaireDao->lister40Commentaires($page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $commentaires;
        }

        public function compterCommentaires(){
            $nombre= 1;
            try{
                $nombre=$this->commentaireDao->compterCommentaires();
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $nombre;
        }

    }