<?php

    require_once('./../modele/classes/Compte.php');
    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/classes/Adresse.php');
    require_once('./../modele/dao/AdresseDao.php');
    require_once('./../modele/dao/DAOException.php'); 

    class InscriptionManager {
            
        private $compteDao;
        private $panierDao;

        private $erreurs;
        private $resultat;

        public function getErreurs(){
            return $this->erreurs;
        }

        public function getResultat(){
            return $this->resultat;
        }
        
        function __construct(CompteDao $compteDao, PanierDao $panierDao){
            $this->compteDao= $compteDao;
            $this->panierDao= $panierDao;
        }

        private function validationTel($numeroTelephone){
            if(isset($numeroTelephone) && trim($numeroTelephone)!='') {
                if(!preg_match('#^(\+[0-9]{1,3})?((-| )?[0-9]+)+$#', $numeroTelephone))
                    throw new Exception("Vueillez saisir un numéro de téléphone valide.");
            }else
                throw new Exception("Ce champ est obligatoire.");
        }

        private function validationMotDePasse($motDePasse, $confirmation) {
            if(isset($motDePasse) && isset($confirmation) && trim($confirmation)!='' && trim($motDePasse)!='' ) {
                if($motDePasse!=$confirmation) {
                    throw new Exception("Les mots de passe entrés sont différents.");
                }else if(strlen($motDePasse)<3) {
                    throw new Exception("Le mot de passe saisi doit comporter au moins 3 caractères.");
                }
            }else {
                throw new Exception("Vueillez saisir puis confirmer votre mot de passe.");
            }
        }

        private function validationLogin($login) {
            if (isset($login) && trim($login)!='') {
                if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $login))
                    throw new Exception( "Merci de saisir une adresse mail valide." );
                else if($this->compteDao->trouverParLogin($login)!=null && $this->compteDao->trouverParLogin($login)->isActive())
                    throw new Exception( "Ce compte utilisateur existe déjà." );
            }else {
                throw new Exception( "Ce champ est obligatoire." );
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
        
        public function validationCode($id, $code){
            if(isset($code) && trim($code)!=''){
                if($code!=$this->compteDao->trouverCompte($id)->getCodeActivation()){
                    echo($id);
                    echo($this->compteDao->trouverCompte($id)->getCodeActivation());

                    throw new Exception("Le code saisi est incorrect.");
                }
            }else {
                throw new Exception("Ce champ est obligatoire");
            }
        }

        public function traiterCode($id, $codeActivation) {
    	
            try {
                $this->validationCode( $id, $codeActivation );
            } catch ( Exception $e ) {
                $this->erreurs['codeActivation']= $e->getMessage();
            }
            
        }

        public function traiterLogin(Compte $compte, $adresseMail) {
    	
            try {
                $this->validationLogin( $adresseMail );
            } catch ( Exception $e ) {
                $this->erreurs['adresseMail']= $e->getMessage();
            }
            $compte->setAdresseMail( $adresseMail );
            
        }

        public function traiterMotDePasse(Compte $compte, $motDePasse, $confirmation){
            try {
                $this->validationMotDePasse($motDePasse, $confirmation );
            } catch ( Exception $e ) {
                $this->erreurs['motDePasse']= $e->getMessage();
            }
            
            $motDePasseChiffre = password_hash($motDePasse, PASSWORD_DEFAULT);
            
            $compte->setMotDePasse( $motDePasseChiffre );
        }
        
        public function traiterNom(Compte $compte, $nom) {
            try {
                $this->validationChamp($nom);
            }catch(Exception $e) {
                $this->erreurs['nom']= $e->getMessage();
            }
            $compte->setNom($nom);
        }
        
        public function traiterPrenom(Compte $compte, $prenom) {
            try {
                $this->validationChamp($prenom);
            }catch(Exception $e) {
                $this->erreurs['prenom']= $e->getMessage();
            }
            $compte->setPrenom($prenom);
        }
        
        public function traiterTel(Compte $compte, $numeroTelephone) {
            try {
                $this->validationTel($numeroTelephone);
            }catch(Exception $e) {
                $this->erreurs['numeroTelephone']= $e->getMessage();
            }
            $compte->setNumeroTelephone($numeroTelephone);
        }

        public function inscrireCompte($mailNotification) {

            $nom="";
            $prenom="";
            $motDePasse="";
            $confirmation="";
            $adresseMail="";
            $telephone="";
		
            if(isset($_POST['nom']))
                $nom= trim($_POST['nom']);
            if(isset($_POST['prenom']))
                $prenom= trim($_POST["prenom"]);
            if(isset($_POST['motDePasse']))
                $motDePasse= trim($_POST["motDePasse"]);
            if(isset($_POST['confirmation']))
                $confirmation= trim($_POST["confirmation"]);
            if(isset($_POST['adresseMail']))
                $adresseMail= trim($_POST["adresseMail"]);
            if(isset($_POST['numeroTelephone']))
                $telephone= trim($_POST["numeroTelephone"]);

            $codeActivation= $this->generateRandomString();
            
            $compte= new Compte();
            
            try {
                
                $this->traiterLogin($compte, $adresseMail);
                $this->traiterNom($compte, $nom);
                $this->traiterPrenom($compte, $prenom);
                $this->traiterMotDePasse($compte, $motDePasse, $confirmation);
                $this->traiterTel($compte, $telephone);
                $compte->setTypeUtilisateur("client");
                $compte->setActive(false);
                $compte->setCodeActivation($codeActivation);
                
                if(empty($this->erreurs)) {

                    if($this->compteDao->trouverParLogin($adresseMail)===null)
                        $this->compteDao->ajouterCompte($compte);
                    else{
                        $compte->setId($this->compteDao->trouverParLogin($adresseMail)->getId());
                        $this->compteDao->modifierCompte($compte);
                    }
                    
                    $header= "MIME-Version: 1.0\r\n";
                    $header.= 'From:"A&MFrip"<'.$mailNotification.'>'."\n";
                    $header.= 'Content-Type:text/html; charset="utf-8"'."\n";
                    $header.= 'Content-Transfer-Encoding: 8bit';

                    $subject= 'Code d\'activation A&MFrip';
                    $to= $compte->getAdresseMail();
                    $message='
                    <html>
                        <body>
                            <div align="center">
                                <p>Bonjour , voici votre code d\'activation: '.$codeActivation.'</p>
                            </div>
                        </body>
                    </html>
                    ';
                    mail($to, $subject, $message, $header);
    
                    
                    $this->resultat="Inscription réussie";
                }else {
                    $this->resultat="Echec de l'inscription";
                }
            }catch(DAOException $e) {
                $this->resultat="Une erreur interne liée au serveur est survenue.".$e->getMessage();
            }
            
            return $compte;
            
        }

        public function activerCompte(){
            $id="";
            $codeActivation="";
            $compte= new Compte();
            if(isset($_POST['id']))
                $id= trim($_POST['id']);
            if(isset($_POST['codeActivation']))
                $codeActivation= trim($_POST['codeActivation']);
            $this->traiterCode($id, $codeActivation);

            if(empty($this->erreurs)){
                try{
                    $compte= $this->compteDao->trouverCompte($id);
                    $compte->setActive(true);
                    $this->compteDao->modifierCompte($compte);
                    $panier= new Panier();
                    $panier->setCompte($compte);
                    $panier->setNombreArticles(0);
                    $panier->setPrixTotalSansFrais(0);
                    $this->panierDao->ajouterPanier($panier);
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.".$e->getMessage();
                }
                $this->resultat= 'Votre compte a été activé avec succés. Connectez vous.';
            }else {
                $this->resultat= 'Echec de l\'activation du compte.';
            }
        }

        private function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

    }