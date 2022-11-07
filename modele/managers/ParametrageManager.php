<?php

    require_once('./../modele/classes/Compte.php');
    require_once('./../modele/classes/Adresse.php');
    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/dao/AdresseDao.php');
    require_once('./../modele/dao/DAOException.php'); 

    class ParametrageManager {
            
        private $compteDao;
        private $adresseDao;

        private $erreurs;
        private $resultat;

        public function getErreurs(){
            return $this->erreurs;
        }

        public function getResultat(){
            return $this->resultat;
        }
        
        function __construct(CompteDao $compteDao, AdresseDao $adresseDao){
            $this->compteDao= $compteDao;
            $this->adresseDao= $adresseDao;
        }

        private function validationTel($numeroTelephone){
            if(isset($numeroTelephone) && trim($numeroTelephone)!='') {
                if(!preg_match('#^(\+[0-9]{1,3})?((-| )?[0-9]+)+$#', $numeroTelephone))
                    throw new Exception("Vueillez saisir un numéro de téléphone valide.");
            }else
                throw new Exception("Ce champ est obligatoire.");
        }

        private function validationNouveauMotDePasse($motDePasse, $confirmation) {
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

        private function validationMotDePasse( $login,$motDePasse ) {
            if ( isset($motDePasse) && trim($motDePasse)!='') {
                if ( isset($login) ) {
                    $compte=$this->compteDao->trouverParLogin($login);
                    if(isset($compte)) {
                        if(!password_verify($motDePasse, $compte->getMotDePasse()))
                            throw new Exception( "Le mot de passe saisi est incorrect." );
                        /*if($motDePasse!=compte->getMotDePasse())
                            throw new Exception( "L'identifiant ou le mot de passe saisi est incorrect." );*/
                    }
                }
            } else {
                throw new Exception( "Merci de saisir votre mot de passe." );
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

        private function validationId($id) {
            if (isset($id) && trim($id)!='') {
                if($this->adresseDao->trouverAdresse($id)!=null && $this->adresseDao->trouverAdresse($id)->getCompte()->getId()!=$_SESSION['compte']->getId())
                    throw new Exception( "Vous n'êtes pas autorisé à modifier cette adresse." );
                if($this->adresseDao->trouverAdresse($id)==null)
                    throw new Exception( "Vous n'êtes pas autorisé à modifier cette adresse." );
            }else {
                throw new Exception( "Aucune adresse sélectionnée." );
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

        public function traiterMotDePasse($login, $motDePasse){
            try {
                $this->validationMotDePasse($login, $motDePasse );
            } catch ( Exception $e ) {
                $this->erreurs['motDePasse']= $e->getMessage();
            }
        }

        public function traiterNouveauMotDePasse(Compte $compte, $motDePasse, $confirmation){
            try {
                $this->validationNouveauMotDePasse($motDePasse, $confirmation );
            } catch ( Exception $e ) {
                $this->erreurs['nouveauMotDePasse']= $e->getMessage();
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

        public function traiterVille(Adresse $adresse, $ville){
            try {
                $this->validationChamp($ville);
            }catch(Exception $e) {
                $this->erreurs['ville']= $e->getMessage();
            }
            $adresse->setVille($ville);
        }

        public function traiterRegion(Adresse $adresse, $region){
            try {
                $this->validationChamp($region);
            }catch(Exception $e) {
                $this->erreurs['region']= $e->getMessage();
            }
            $adresse->setRegion($region);
        }

        public function traiterDescription(Adresse $adresse, $description){
            try {
                $this->validationChamp($description);
            }catch(Exception $e) {
                $this->erreurs['description']= $e->getMessage();
            }
            $adresse->setDescription($description);
        }

        public function traiterId(Adresse $adresse, $id){
            try {
                $this->validationId($id);
            }catch(Exception $e) {
                $this->erreurs['id']= $e->getMessage();
            }
            $adresse->setId($id);
        }

        public function changerInformationsCompte() {

            $nom="";
            $prenom="";
            $telephone="";
		
            if(isset($_POST['nom']))
                $nom= trim($_POST['nom']);
            if(isset($_POST['prenom']))
                $prenom= trim($_POST["prenom"]);
            if(isset($_POST['numeroTelephone']))
                $telephone= trim($_POST["numeroTelephone"]);

            if(isset($_SESSION['compte'])){
                $compte= clone $_SESSION['compte'];
                try {
                
                    $this->traiterNom($compte, $nom);
                    $this->traiterPrenom($compte, $prenom);
                    $this->traiterTel($compte, $telephone);
                    
                    if(empty($this->erreurs)) {
                        $this->compteDao->modifierCompte($compte);
                        $_SESSION['compte']= clone $compte;
                        $this->resultat="Modification réussie";
                    }else {
                        $this->resultat="Echec de la modification";
                    }
                }catch(DAOException $e) {
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $compte= new Compte();
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            
            return $compte;
            
        }

        public function changerMotDePasseCompte(){
            $motDePasse="";
            $nouveauMotDePasse="";
            $confirmation="";
            if(isset($_POST['motDePasse']))
                $motDePasse= trim($_POST["motDePasse"]);
            if(isset($_POST['nouveauMotDePasse']))
                $nouveauMotDePasse= trim($_POST["nouveauMotDePasse"]);
            if(isset($_POST['confirmation']))
                $confirmation= trim($_POST["confirmation"]);

            if(isset($_SESSION['compte'])){
                $compte= clone $_SESSION['compte'];
                try {
                    $this->traiterMotDePasse($compte->getAdresseMail(), $motDePasse);
                    $this->traiterNouveauMotDePasse($compte, $nouveauMotDePasse, $confirmation);
                    if(empty($this->erreurs)) {
                        $this->compteDao->modifierCompte($compte);
                        $_SESSION['compte']= clone $compte;
                        $this->resultat="Modification réussie";
                    }else {
                        $this->resultat="Echec de la modification";
                    }
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
        }

        public function ajouterAdresse(){
            $ville="";
            $region="";
            $description="";

            if(isset($_POST['ville']))
                $ville= trim($_POST["ville"]);
            if(isset($_POST['region']))
                $region= trim($_POST["region"]);
            if(isset($_POST['description']))
                $description= trim($_POST["description"]);
            
            $adresse= new Adresse();
            if(isset($_SESSION['compte'])){
                $compte= clone $_SESSION['compte'];
                try {
                    $this->traiterVille($adresse, $ville);
                    $this->traiterRegion($adresse, $region);
                    $this->traiterDescription($adresse, $description);
                    $adresse->setCompte($compte);
                    
                    if(empty($this->erreurs)) {
                        $this->adresseDao->ajouterAdresse($adresse);
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

            return $adresse;

        }

        public function modifierAdresse(){
            $id="";
            $ville="";
            $region="";
            $description="";

            if(isset($_POST['id']))
                $id= trim($_POST["id"]);
            if(isset($_POST['ville']))
                $ville= trim($_POST["ville"]);
            if(isset($_POST['region']))
                $region= trim($_POST["region"]);
            if(isset($_POST['description']))
                $description= trim($_POST["description"]);
            
            $adresse= new Adresse();
            if(isset($_SESSION['compte'])){
                $compte= clone $_SESSION['compte'];
                try {
                    $this->traiterId($adresse, $id);
                    $this->traiterVille($adresse, $ville);
                    $this->traiterRegion($adresse, $region);
                    $this->traiterDescription($adresse, $description);
                    $adresse->setCompte($compte);
                    
                    if(empty($this->erreurs)) {
                        $this->adresseDao->modifierAdresse($adresse);
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

            return $adresse;

        }

        public function supprimerAdresse(){
            $id="";
            $adresse= new Adresse();
            if(isset($_POST['id']))
                $id= trim($_POST["id"]);
            if(isset($_SESSION['compte'])){
                try {
                    $this->traiterId($adresse, $id);
                    if(empty($this->erreurs)) {
                        if($this->adresseDao->trouverAdresse($id)!==null){
                            $this->adresseDao->supprimerAdresse($id);
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

        public function listerAdressesCompte(){
            $adresses= null;
            if(isset($_SESSION['compte'])){
                try {
                    $id= $_SESSION['compte']->getId();
                    $adresses= $this->adresseDao->listerAdressesCompte($id);
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $adresses;
        }

        public function trouverAdresse(){
            $id="";
            $adresse= new Adresse();
            if(isset($_GET['id']))
                $id= trim($_GET["id"]);
            if(isset($_POST['id']))
                $id= trim($_POST["id"]);
            if(isset($_SESSION['compte'])){
                try {
                    $this->traiterId($adresse, $id);
                    if(empty($this->erreurs)) {
                        $adresse= $this->adresseDao->trouverAdresse($id);
                    }else {
                        $resultat='Impossible de trouver cette adresse.';
                    }
                }catch(DAOException $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $adresse;
        }

    }