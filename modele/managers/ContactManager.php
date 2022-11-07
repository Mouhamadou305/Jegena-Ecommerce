<?php

    require_once('./../modele/classes/Entreprise.php');
    require_once('./../modele/dao/EntrepriseDao.php');

    class ContactManager {
            
        private $entrepriseDao;

        private $erreurs=array();
        private $resultat;

        function __construct(EntrepriseDao $entrepriseDao){
            $this->entrepriseDao= $entrepriseDao;
        }

        public function getErreurs(){
            return $this->erreurs;
        }

        public function getResultat(){
            return $this->resultat;
        }
        
        private function validationObligatoire($champ) {
            $champ=trim($champ);
            if (!isset($champ) || $champ==''){
                throw new Exception( "Ce champ est obligatoire." );
            }
        }

        private function validationLogin($login) {
            if (isset($login) && trim($login)!='') {
                if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $login))
                    throw new Exception( "Merci de saisir une adresse mail valide." );
            }else {
                throw new Exception( "Ce champ est obligatoire." );
            }
        }

        private function validationPrix($champ) {
            $champ=trim($champ);
            if (isset($champ) && $champ!=''){
                if(!preg_match('#^[0-9]+(\.[0-9]+)?$#', $champ)){
                    throw new Exception( "Vueillez saisir un prix valide." );
                }
            }else {
                throw new Exception( "Ce champ est obligatoire." );
            }
        }
        
        private function validationChamp($champ) {
            $champ=trim($champ);
            if (isset($champ) && $champ!=''){
                if(strlen($champ)<2){
                    throw new Exception( "Ce champ doit comporter au moins deux caractères." );
                }
            }else {
                throw new Exception( "Ce champ est obligatoire." );
            }
        }

        public function traiterNom($entreprise, $nom){
            try{
                $this->validationObligatoire($nom);
            }catch(Exception $e){
                $this->erreurs['nom']= $e->getMessage();
            }
            $entreprise->setNom($nom);
        }

        public function traiterFraisLivraison($entreprise, $fraisLivraison){
            try {
                $this->validationPrix($fraisLivraison);
            } catch ( Exception $e ) {
                $this->erreurs['fraisLivraison']= $e->getMessage();
            }
            $entreprise->setFraisLivraison($fraisLivraison);
        }

        public function traiterMailNotification(Entreprise $entreprise, $adresseMail) {
            try {
                $this->validationLogin( $adresseMail );
            } catch ( Exception $e ) {
                $this->erreurs['mailNotification']= $e->getMessage();
            }
            $entreprise->setMailNotification( $adresseMail );
            
        }

        public function trouverEntreprise(){
            $entreprise= new Entreprise();
            try{
                $entreprise=$this->entrepriseDao->trouverEntreprise();
            }catch(DAOException $e){
                $resultat='Impossible de trouver l\'entreprise';
            }
            return $entreprise;
        }

        public function supprimerEntreprise(){
            $nom='';
            if(isset($_GET['nom'])){
                $nom= $_GET['nom'];
            }
            try{
                $this->entrepriseDao->supprimerEntreprise($nom);
            }catch(DAOException $e){
                $resultat='Impossible de supprimer l\'entreprise';
            }
        }

        public function ajouterEntreprise(){
            $nom="";
            $numeroTelephone1="";
            $numeroTelephone2="";
            $adresse="";
            $adresseMail="";
            $twitter="";
            $instagram="";
            $facebook="";
            $mailNotification="";
            $fraisLivraison="";

            if(isset($_POST['nom']))
                $nom= $_POST['nom'];
            if(isset($_POST['numeroTelephone1']))
                $numeroTelephone1= $_POST['numeroTelephone1'];
            if(isset($_POST['numeroTelephone2']))
                $numeroTelephone2= $_POST['numeroTelephone2'];
            if(isset($_POST['adresse']))
                $adresse= $_POST['adresse'];
            if(isset($_POST['adresseMail']))
                $adresseMail= $_POST['adresseMail'];
            if(isset($_POST['twitter']))
                $twitter= $_POST['twitter'];
            if(isset($_POST['instagram']))
                $instagram= $_POST['instagram'];
            if(isset($_POST['facebook']))
                $facebook= $_POST['facebook'];
            if(isset($_POST['fraisLivraison']))
                $fraisLivraison= $_POST['fraisLivraison'];
            if(isset($_POST['mailNotification']))
                $mailNotification= $_POST['mailNotification'];

            $entreprise= new Entreprise();

            try{
                traiterNom($entreprise, $nom);
                $entreprise->setAdresse($adresse);
                $entreprise->setAdresseMail($adresseMail);
                $this->traiterFraisLivraison($entreprise, $fraisLivraison);
                $this->traiterMailNotification($entreprise, $mailNotification);
                $entreprise->setFraisLivraison($entreprise, $fraisLivraison);
                $entreprise->setFacebook($facebook);
                $entreprise->setInstagram($instagram);
                $entreprise->setNumeroTelephone1($numeroTelephone1);
                $entreprise->setNumeroTelephone2($numeroTelephone2);

                if(empty($this->erreurs)){
                    $this->entrepriseDao->ajouterEntreprise($entreprise);
                    $this->resultat= 'Succés de la modification.';
                }else {
                    $this->resultat= 'Echec de la modification.';
                }

            }catch(DAOException $e){
                $this->resultat= 'Erreur interne liée au serveur.';
            }

            return $entreprise;

        }

        public function modifierEntreprise(){
            $nom="";
            $numeroTelephone1="";
            $numeroTelephone2="";
            $adresse="";
            $adresseMail="";
            $twitter="";
            $instagram="";
            $facebook="";
            $mailNotification="";
            $fraisLivraison="";

            if(isset($_POST['nom']))
                $nom= $_POST['nom'];
            if(isset($_POST['numeroTelephone1']))
                $numeroTelephone1= $_POST['numeroTelephone1'];
            if(isset($_POST['numeroTelephone2']))
                $numeroTelephone2= $_POST['numeroTelephone2'];
            if(isset($_POST['adresse']))
                $adresse= $_POST['adresse'];
            if(isset($_POST['adresseMail']))
                $adresseMail= $_POST['adresseMail'];
            if(isset($_POST['twitter']))
                $twitter= $_POST['twitter'];
            if(isset($_POST['instagram']))
                $instagram= $_POST['instagram'];
            if(isset($_POST['facebook']))
                $facebook= $_POST['facebook'];
            if(isset($_POST['fraisLivraison']))
                $fraisLivraison= $_POST['fraisLivraison'];
            if(isset($_POST['mailNotification']))
                $mailNotification= $_POST['mailNotification'];

            $entreprise= new Entreprise();

            try{
                $entreprise= $this->entrepriseDao->trouverEntreprise();
                $ancienNom= $entreprise->getNom();
                $this->traiterNom($entreprise, $nom);
                $entreprise->setAdresse($adresse);
                $entreprise->setAdresseMail($adresseMail);
                $this->traiterFraisLivraison($entreprise, $fraisLivraison);
                $this->traiterMailNotification($entreprise, $mailNotification);
                $entreprise->setTwitter($twitter);
                $entreprise->setFacebook($facebook);
                $entreprise->setInstagram($instagram);
                $entreprise->setNumeroTelephone1($numeroTelephone1);
                $entreprise->setNumeroTelephone2($numeroTelephone2);

                if(empty($this->erreurs)){
                    $this->entrepriseDao->modifierEntreprise($entreprise, $ancienNom);
                    $this->resultat= 'Succés de la modification.';
                }else {
                    $this->resultat= 'Echec de la modification.';
                }

            }catch(DAOException $e){
                $this->resultat= 'Erreur interne liée au serveur.'.$e->getMessage();
            }

            return $entreprise;

        }

    }