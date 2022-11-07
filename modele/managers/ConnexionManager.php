<?php

    require_once('./../modele/classes/Compte.php');
    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/dao/DAOException.php');

    class ConnexionManager {
            
        private $compteDao;
        private $erreurs=array();
        private $resultat;

        public function getErreurs(){
            return $this->erreurs;
        }

        public function getResultat(){
            return $this->resultat;
        }
        
        function __construct(CompteDao $compteDao){
            $this->compteDao= $compteDao;
        }

        private function validationLogin($login) {
            if ( isset($login) && trim($login)!='') {
                if(!filter_var($login, FILTER_VALIDATE_EMAIL))
                    throw new Exception( "Merci de saisir une adresse mail valide." );
                else if($this->compteDao->trouverParLogin($login)==null)
                    throw new Exception( "L'adresse email ou le mot de passe saisi est incorrect." );
                else if(!$this->compteDao->trouverParLogin($login)->isActive())
                    throw new Exception( "L'adresse email ou le mot de passe saisi est incorrect." );
            }else {
                throw new Exception( "Merci de saisir votre adresse email." );
            }
        }

        private function validationMotDePasse( $login,$motDePasse ) {
            if ( isset($motDePasse) && trim($motDePasse)!='') {
                if ( isset($login) ) {
                    $compte=$this->compteDao->trouverParLogin($login);
                    if(isset($compte)) {
                        if(!password_verify($motDePasse, $compte->getMotDePasse()))
                            throw new Exception( "L'adresse email ou le mot de passe saisi est incorrect." );
                        /*if($motDePasse!=compte->getMotDePasse())
                            throw new Exception( "L'identifiant ou le mot de passe saisi est incorrect." );*/
                    }
                }
            } else {
                throw new Exception( "Merci de saisir votre mot de passe." );
            }
        }

        public function traiterLogin(Compte $compte, $adresseMail) {
    	
            try {
                $this->validationLogin( $adresseMail );
            } catch ( Exception $e ) {
                $this->erreurs['adresseMailLog']= $e->getMessage();
            }
            $compte->setAdresseMail( $adresseMail );
            
        }

        public function traiterMotDePasse(Compte $compte, $login, $motDePasse){
            try {
                $this->validationMotDePasse($login, $motDePasse );
            } catch ( Exception $e ) {
                $this->erreurs['motDePasseLog']= $e->getMessage();
            }
            $compte->setMotDePasse( $motDePasse );
        }

        public function connecterCompte() {
            /* Récupération des champs du formulaire */
            $adresseMail="";
            $motDePasse="";
            if(isset($_POST['adresseMail']))
                $adresseMail = trim($_POST["adresseMail"]);
            if(isset($_POST['motDePasse']))
                $motDePasse = trim($_POST["motDePasse"]);
    
            $compte = new Compte();
            
            try {
                
                $this->traiterLogin($compte, $adresseMail);
                $this->traiterMotDePasse($compte, $adresseMail, $motDePasse);
                
                if ( empty($this->erreurs) ) {
                    $compte= $this->compteDao->trouverParLogin($adresseMail);
                    $this->resultat = "Succès de la connexion.";
                } else {
                    $this->resultat = "Échec de la connexion.";
                }
            }catch(DAOException $e) {
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            
            return $compte;
        }

    }