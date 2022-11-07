<?php

    require_once('./../modele/classes/Commande.php');
    require_once('./../modele/classes/CommanderArticle.php');
    require_once('./../modele/managers/ParametrageManager.php');
    require_once('./../modele/dao/AdresseDao.php');
    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/classes/Adresse.php');
    require_once('./../modele/classes/Compte.php');
    require_once('./../modele/dao/CommandeDao.php');
    require_once('./../modele/dao/CommanderArticleDao.php');
    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/Categorie.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/classes/ContenirArticle.php');
    require_once('./../modele/dao/ContenirArticleDao.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/dao/DAOException.php');

    class CommandeManager{

        private $commandeDao;
        private $commanderArticleDao;
        private $articleDao;
        private $adresseDao;
        private $contenirArticleDao;
        private $compteDao;
        private $panierDao;

        private $fraisLivraison;

        private $erreurs=array();
        private $resultat;

        public function getFraisLivraison(){
            return $this->fraisLivraison;
        }

        public function setFraisLivraison($fraisLivraison){
            $this->fraisLivraison= $fraisLivraison;
        }

        public function getErreurs(){
            return $this->erreurs;
        }

        public function getResultat(){
            return $this->resultat;
        }
        
        function __construct(CommandeDao $commandeDao, CommanderArticleDao $commanderArticleDao, ArticleDao $articleDao, AdresseDao $adresseDao, ContenirArticleDao $contenirArticleDao, CompteDao $compteDao, PanierDao $panierDao, $fraisLivraison){
            $this->commandeDao= $commandeDao;
            $this->commanderArticleDao= $commanderArticleDao;
            $this->articleDao= $articleDao;
            $this->adresseDao= $adresseDao;
            $this->contenirArticleDao= $contenirArticleDao;
            $this->compteDao= $compteDao;
            $this->panierDao= $panierDao;
            $this->fraisLivraison= $fraisLivraison;
        }

        private function validationIdAdresse($id) {
            if (isset($id) && trim($id)!='') {
                if($this->adresseDao->trouverAdresse($id)!=null && $this->adresseDao->trouverAdresse($id)->getCompte()->getId()!=$_SESSION['compte']->getId())
                    throw new Exception( "Vous n'êtes pas autorisé à modifier cette adresse." );
                if($this->adresseDao->trouverAdresse($id)==null)
                    throw new Exception( "Vous n'êtes pas autorisé à modifier cette adresse." );
            }else {
                throw new Exception( "Aucune adresse sélectionnée." );
            }
        }

        private function validationIdCommande($id) {
            if (isset($id) && trim($id)!='') {
                if($this->commandeDao->trouverCommande($id)!=null && $this->commandeDao->trouverCommande($id)->getCompte()->getId()!=$_SESSION['compte']->getId())
                    throw new Exception( "Vous n'êtes pas autorisé à modifier cette commande." );
                if($this->commandeDao->trouverCommande($id)==null)
                    throw new Exception( "Vous n'êtes pas autorisé à modifier cette commande." );
            }else {
                throw new Exception( "Aucune commande sélectionnée." );
            }
        }

        public function validationMethodePaiement($methodePaiement){
            if(isset($methodePaiement) && trim($methodePaiement)!=''){
                if($methodePaiement!='orangeMoney' && $methodePaiement!='wave' && $methodePaiement!='espece'){
                    throw new Exception('Cette méthode de paiement n\'est pas supportée.');
                }
            }else{
                throw new Exception('Ce champ est obligatoire');
            }
        }

        public function traiterIdAdresse(Commande $commande, $idAdresse){
            try{
                $this->validationIdAdresse($idAdresse);
            }catch(Exception $e){
                $this->erreurs['idAdresse']= $e->getMessage();
            }
            $commande->setAdresse($this->adresseDao->trouverAdresse($idAdresse));
        }

        public function traiterIdCommande(Commande $commande, $idCommande){
            try{
                $this->validationIdCommande($idCommande);
            }catch(Exception $e){
                $this->erreurs['idCommande']= $e->getMessage();
            }
            $commande->setId($idCommande);
        }

        public function traiterMethodePaiement(Commande $commande, $methodePaiement){
            try{
                $this->validationMethodePaiement($methodePaiement);
            }catch(Exception $e){
                $this->erreurs['methodePaiement']= $e->getMessage();
            }
            $commande->setMethodePaiement($methodePaiement);
        }

        public function creerCommande(){
            $statut= 'en attente';
            $paye= false;
            $adresse= new Adresse();
            $methodePaiement="";
            $manager= new ParametrageManager($this->compteDao, $this->adresseDao);
 
            if(isset($_POST['adresse'])){
                if($_POST['adresse']=='selectionner'){
                    $adresse= $manager->trouverAdresse();
                }else{
                    $adresse= $manager->ajouterAdresse();
                }
            }else{
                $adresse= $manager->ajouterAdresse();
            }
            $this->erreurs= $manager->getErreurs();
            $this->resultat= $manager->getResultat();

            if(isset($_POST['methodePaiement'])){
                $methodePaiement= $_POST['methodePaiement'];
            }
            
            $commande= new Commande();
            $commanderArticle= new CommanderArticle();
            $panierManager= new PanierManager($this->panierDao, $this->articleDao, $this->contenirArticleDao);

            if(isset($_SESSION['compte'])){
                $compte= clone $_SESSION['compte'];
                $listeArticlesDuPanier= $this->contenirArticleDao->listerArticlesDuPanier($compte->getId());
                $commande->setCompte($compte);
                $commande->setStatut($statut);
                $commande->setPaye($paye);
                try {
                    $panier= $this->panierDao->trouverPanier($compte->getId());
                    $commande->setCout($panier->getPrixTotalSansFrais()+$this->fraisLivraison);
                    $commande->setAdresse($adresse);
                    $this->traiterMethodePaiement($commande, $methodePaiement);

                    if(empty($this->erreurs)) {
                        $this->commandeDao->ajouterCommande($commande);
                        
                        foreach ($listeArticlesDuPanier as $articleDuPanier) {

                            $commanderArticle->setCommande($commande);
                            $commanderArticle->setArticle($articleDuPanier->getArticle());
                            $commanderArticle->setNombreArticles($articleDuPanier->getNombreArticles());
                            $this->commanderArticleDao->ajouterCommanderArticle($commanderArticle);

                            $article= $commanderArticle->getArticle();
                            $article->setQuantite($article->getQuantite()-$commanderArticle->getNombreArticles());
                            $this->articleDao->modifierArticle($article);

                            $listeContenirArticles= $this->contenirArticleDao->listerPanierContenantArticle($article->getId());
                            if($article->getQuantite()==0){
                                foreach($listeContenirArticles as $contenirArticle){
                                    $contenirArticle->setNombreArticles(0);
                                    $panierManager->modifierArticleDansPanierBack($contenirArticle->getPanier()->getCompte()->getId(), $article->getId(), $contenirArticle->getNombreArticles());
                                }
                                $this->contenirArticleDao->supprimerArticleDesPaniers($article->getId());
                            }else{
                                foreach($listeContenirArticles as $contenirArticle){
                                    if($contenirArticle->getNombreArticles()>$article->getQuantite()){
                                        $contenirArticle->setNombreArticles($article->getQuantite());
                                        $panierManager->modifierArticleDansPanierBack($contenirArticle->getPanier()->getCompte()->getId(), $article->getId(), $contenirArticle->getNombreArticles());
                                    }
                                }
                            }

                        }

                        $this->contenirArticleDao->supprimerArticlesDuPanier($compte->getId());
                        $panier->setNombreArticles(0);
                        $panier->setPrixTotalSansFrais(0);
                        $this->panierDao->modifierPanier($panier);
                    
                        $this->resultat="La commande a été validée.";
                    }else {
                        if(isset($_POST['adresse']) && $_POST['adresse']!='selectionner'){
                            $adresse= $this->adresseDao->supprimerAdresse($adresse->getId());
                        }
                        $this->resultat="Echec de la commande.";
                    }
                }catch(DAOException $e) {
                    $this->resultat="Une erreur interne liée au serveur est survenue.".$e->getMessage();
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $commande;
        }

        public function listerArticlesDeCommandePourClient(){
            $listeArticlesDeCommande="";
            $idCommande="";
            $commande= new Commande();
            if(isset($_GET['idCommande']))
                $idCommande= $_GET['idCommande'];
            if(isset($_SESSION['compte'])){
                try{
                    $this->traiterIdCommande($commande, $idCommande);
                    if(empty($this->erreurs))
                        $listeArticlesDeCommande= $this->commanderArticleDao->listerArticlesDeCommande($idCommande);
                    else {
                        $this->resultat="Erreur";
                    }
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else{
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $listeArticlesDeCommande;
        }

        public function listerCommandesPourClient(){
            $listeCommandes="";
            $idClient="";
            if(isset($_SESSION['compte'])){
                $idClient= $_SESSION['compte']->getId();
                try{
                    $listeCommandes= $this->commandeDao->listerCommandesClient($idClient);
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $listeCommandes;
        }

        public function listerArticlesDeCommandePourAdmin(){
            $listeArticlesDeCommande="";
            $id="";
            $commande= new Commande();
            if(isset($_GET['id']))
                $id= $_GET['id'];
            if(isset($_SESSION['compte'])){
                try{
                    if(empty($this->erreurs))
                        $listeArticlesDeCommande= $this->commanderArticleDao->listerArticlesDeCommande($id);
                    else {
                        $this->resultat="Erreur";
                    }
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else{
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $listeArticlesDeCommande;
        }

        public function modifierCommande(){
            
        }

        public function supprimerCommande(){
            $id="";
            if(isset($_POST['id']))
                $id= $_POST['id'];
            try{
                $this->commanderArticleDao->supprimerArticlesCommande($id);
                $this->commandeDao->supprimerCommande($id);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
        }

        public function marquerCommeLivre(){
            $id='';
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            if(isset($_SESSION['compte']) && $_SESSION['compte']->getTypeUtilisateur()=='admin'){
                try{
                    if($this->commandeDao->trouverCommande($id)!=null){
                        $commande= $this->commandeDao->trouverCommande($id);
                        if($commande->getStatut()!='livré'){
                            $listeCommanderArticles= $this->commanderArticleDao->listerArticlesDeCommande($id);
                            if($commande->getStatut()=='non-livré'){
                                foreach($listeCommanderArticles as $commanderArticle){
                                    $article= $commanderArticle->getArticle();
                                    $article->setQuantite($article->getQuantite()-$commanderArticle->getNombreArticles());
                                    $this->articleDao->modifierArticle($article);
                                }
                            }
                            $commande->setStatut('livré');
                            $this->commandeDao->modifierCommande($commande);
                            $this->resultat= "Modification effectuée.";
                        }else{
                            $this->resultat= "Cette commande a déjà été livrée.";
                        }
                    }else{
                        $this->resultat= "Cette commande n'existe pas.";
                    }
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }
        }

        public function marquerCommeNonLivre(){
            $id='';
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            if(isset($_SESSION['compte']) && $_SESSION['compte']->getTypeUtilisateur()=='admin'){
                try{
                    if($this->commandeDao->trouverCommande($id)!=null){
                        $commande= $this->commandeDao->trouverCommande($id);
                        if($commande->getStatut()!='non-livré'){
                            $listeCommanderArticles= $this->commanderArticleDao->listerArticlesDeCommande($id);
                            foreach($listeCommanderArticles as $commanderArticle){
                                $article= $commanderArticle->getArticle();
                                $article->setQuantite($article->getQuantite()+$commanderArticle->getNombreArticles());
                                $this->articleDao->modifierArticle($article);
                            }
                            $commande->setStatut('non-livré');
                            $this->commandeDao->modifierCommande($commande);
                            $this->resultat= "Modification effectuée.";
                        }else{
                            $this->resultat= "Cette commande a déjà été annulée.";
                        }
                    }else{
                        $this->resultat= "Cette commande n'existe pas.";
                    }
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }
        }

        public function marquerCommePaye(){
            $id='';
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
            if(isset($_SESSION['compte']) && $_SESSION['compte']->getTypeUtilisateur()=='admin'){
                try{
                    if($this->commandeDao->trouverCommande($id)!=null){
                        $commande= $this->commandeDao->trouverCommande($id);
                        $commande->setPaye(true);
                        $this->commandeDao->modifierCommande($commande);
                        $this->resultat= "Modification effectuée.";
                    }else{
                        $this->resultat= "Cette commande n'existe pas.";
                    }
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }
        }
        
        public function lister32Commandes(){
            $listeCommandes="";
            $idClient="";
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            if(isset($_SESSION['compte'])){
                $idClient= $_SESSION['compte']->getId();
                try{
                    if(!isset($_GET['trierParAdresse']))
                        $listeCommandes= $this->commandeDao->lister32Commandes($page);
                    else {
                        $listeCommandes= $this->commandeDao->lister32CommandesSelonAdresse($page);
                    }
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $listeCommandes;
        }

        public function lister32CommandesParStatut(){
            $listeCommandes="";
            $statut="";
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            if(isset($_GET['statut'])){
                $statut= $_GET['statut'];
                try{
                    if(!isset($_GET['trierParAdresse']))
                        $listeCommandes= $this->commandeDao->lister32CommandesParStatut($statut, $page);
                    else
                        $listeCommandes= $this->commandeDao->lister32CommandesParStatutSelonAdresse($statut, $page);
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $listeCommandes;
        }

        public function lister32CommandesParAdresse(){
            $listeCommandes="";
            $adresse="";
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            if(isset($_GET['adresse'])){
                $adresse= $_GET['adresse'];
                try{
                    $listeCommandes= $this->commandeDao->lister32CommandesParAdresse($adresse, $page);
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $listeCommandes;
        }

        public function lister32CommandesParAdresseEtStatut(){
            $listeCommandes="";
            $adresse="";
            $statut="";
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            if(isset($_GET['adresse']) && isset($_GET['statut'])){
                $adresse= $_GET['adresse'];
                $statut= $_GET['statut'];
                try{
                    $listeCommandes= $this->commandeDao->lister32CommandesParAdresseEtStatut($adresse, $statut, $page);
                }catch(Exception $e){
                    $this->resultat="Une erreur interne liée au serveur est survenue.";
                }
            }else {
                $this->resultat="Vous devez d'abord vous connecter.";
            }
            return $listeCommandes;
        }
        
        public function compterCommandes(){
            $nombre= 1;
            try{
                $nombre=$this->commandeDao->compterCommandes();
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $nombre;
        }

        public function compterCommandesPourStatut(){
            $nombre= 1;
            $statut="en attente";
            if(isset($_GET['statut']))
                $statut= htmlspecialchars($_GET['statut']);
            try{
                $nombre=$this->commandeDao->compterCommandesPourStatut($statut);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $nombre;
        }

        public function compterCommandesPourAdresse(){
            $nombre= 1;
            $adresse="Amitie 1";
            if(isset($_GET['adresse']))
                $adresse= htmlspecialchars($_GET['adresse']);
            try{
                $nombre=$this->commandeDao->compterCommandesPourAdresse($adresse);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $nombre;
        }

        public function compterCommandesPourAdresseEtStatut(){
            $nombre= 1;
            $adresse="Amitie 1";
            $statut="en attente";
            if(isset($_GET['adresse']) && isset($_GET['statut'])){
                $adresse= $_GET['adresse'];
                $statut= $_GET['statut'];
            }
            try{
                $nombre=$this->commandeDao->compterCommandesPourAdresseEtStatut($adresse, $statut);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $nombre;
        }
    }