<?php

    require_once('./../modele/classes/Panier.php');
    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/ContenirArticle.php');
    require_once('./../modele/dao/ContenirArticleDao.php');
    require_once('./../modele/dao/PanierDao.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/dao/DAOException.php');
    require_once('./../modele/classes/Compte.php');

    class PanierManager {
            
        private $panierDao;
        private $articleDao;
        private $contenirArticleDao;

        private $erreurs=array();
        private $resultat;

        public function getErreurs(){
            return $this->erreurs;
        }

        public function getResultat(){
            return $this->resultat;
        }
        
        function __construct(PanierDao $panierDao, ArticleDao $articleDao, ContenirArticleDao $contenirArticleDao){
            $this->panierDao= $panierDao;
            $this->articleDao= $articleDao;
            $this->contenirArticleDao= $contenirArticleDao;
        }

        private function validationNombre($article, $nombre) {
            $nombre=trim($nombre);
            if (isset($nombre) && $nombre!=''){
                if(!preg_match('#^[0-9]+$#', $nombre) || preg_match('#^0+$#', $nombre)){
                    throw new Exception( "Cet nombre n'est pas valide." );
                }else {
                    if($this->articleDao->trouverArticle($article)->getQuantite()<$nombre){
                        throw new Exception( "Vous avez ajouter trop d'exemplaires de l'article." );
                    }
                }
            }else {
                throw new Exception( "Aucun nombre sélectionné." );
            }
        }

        private function validationArticle($article) {
            $article=trim($article);
            if (isset($article) && $article!=''){
                if(!preg_match('#^[0-9]+$#', $article)){
                    throw new Exception( "Cet article n'est pas/plus disponible." );
                }else {
                    if($this->articleDao->trouverArticle($article)==null){
                        throw new Exception( "Cet article n'est pas/plus disponible." );
                    }
                }
            }else {
                throw new Exception( "Aucun article sélectionné." );
            }
        }

        private function validationObligatoire($champ) {
            $champ=trim($champ);
            if (!isset($champ) || $champ==''){
                throw new Exception( "Ce champ est obligatoire." );
            }
        }

        public function traiterArticle($contenirArticle, $idArticle){
            try {
                $this->validationArticle($idArticle);
            } catch ( Exception $e ) {
                $this->erreurs['article']= $e->getMessage();
            }
            $contenirArticle->setArticle($this->articleDao->trouverArticle($idArticle));
            
        }

        public function traiterNombre($contenirArticle, $idArticle, $nombre){
            try {
                $this->validationArticle($idArticle);
                $this->validationNombre($idArticle, $nombre);
            } catch ( Exception $e ) {
                $this->erreurs['idNombre']= $e->getMessage();
            }
            $contenirArticle->setNombreArticles($nombre);
            
        }


        public function ajouterArticleDansPanier() {
            /* Récupération des champs du formulaire */
            $idPanier=$_SESSION['compte']->getId();
            $idArticle="";

            if(isset($_GET['article']))
                $idArticle = trim($_GET['article']);
    
            $contenirArticle = new ContenirArticle();
            $contenirArticle->setNombreArticles(1);
            
            try {
                
                $contenirArticle->setPanier($this->panierDao->trouverPanier($idPanier));
                $this->traiterArticle($contenirArticle, $idArticle);
                
                if ( empty($this->erreurs) ) {
                    if($this->contenirArticleDao->trouverArticleDansPanier($idPanier, $idArticle)==null){
                        $this->contenirArticleDao->ajouterArticleDansPanier($contenirArticle);
                        $article= $contenirArticle->getArticle();
                        $panier= $contenirArticle->getPanier();
                        $panier->setPrixTotalSansFrais($panier->getPrixTotalSansFrais() + ($article->isSolde()?$article->getPrix()-$article->getPrix()*($article->getPourcentageSolde()/100):$article->getPrix()));
                        $panier->setNombreArticles($panier->getNombreArticles()+1);
                        $this->panierDao->modifierPanier($panier);
                    }
                    $this->resultat = "Succès de l'ajout.";
                } else {
                    $this->resultat = "Échec de l'ajout.";
                }
            }catch(DAOException $e) {
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            
            return $contenirArticle;
        }

        public function modifierArticleDansPanier() {
            /* Récupération des champs du formulaire */
            $idPanier=$_SESSION['compte']->getId();
            $idArticle="";
            $nombre=1;

            if(isset($_POST['article']))
                $idArticle = trim($_POST['article']);
            if(isset($_POST['nombre']))
                $nombre = trim($_POST['nombre']);
    
            $contenirArticle = new ContenirArticle();
            
            try {
                $ancienNombre= $this->contenirArticleDao->trouverArticleDansPanier($idPanier, $idArticle)->getNombreArticles();
                $contenirArticle->setPanier($this->panierDao->trouverPanier($idPanier));
                $this->traiterArticle($contenirArticle, $idArticle);
                $this->traiterNombre($contenirArticle, $idArticle, $nombre);
                
                if ( empty($this->erreurs) ) {
                    $this->contenirArticleDao->modifierArticleDansPanier($contenirArticle);
                    $article= $contenirArticle->getArticle();
                    $panier= $contenirArticle->getPanier();
                    $panier->setPrixTotalSansFrais($panier->getPrixTotalSansFrais()+ ($nombre-$ancienNombre)*($article->isSolde()?$article->getPrix()-$article->getPrix()*($article->getPourcentageSolde()/100):$article->getPrix()));
                    $this->panierDao->modifierPanier($panier);
                    $this->resultat = "Succès de la modification.";
                } else {
                    $this->resultat = "Échec de la modification.";
                }
            }catch(DAOException $e) {
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            
            return $contenirArticle;
        }

        public function modifierArticleDansPanierBack($idPanier, $idArticle, $nombre) {
            /* Récupération des champs du formulaire */
           
            $contenirArticle = new ContenirArticle();
            
            try {
                $ancienNombre= $this->contenirArticleDao->trouverArticleDansPanier($idPanier, $idArticle)->getNombreArticles();
                $contenirArticle->setPanier($this->panierDao->trouverPanier($idPanier));
                $this->traiterArticle($contenirArticle, $idArticle);
                $contenirArticle->setNombreArticles($nombre);

                
                if ( empty($this->erreurs) ) {
                    $this->contenirArticleDao->modifierArticleDansPanier($contenirArticle);
                    $article= $contenirArticle->getArticle();
                    $panier= $contenirArticle->getPanier();
                    $panier->setPrixTotalSansFrais($panier->getPrixTotalSansFrais()+ ($nombre-$ancienNombre)*($article->isSolde()?$article->getPrix()-$article->getPrix()*($article->getPourcentageSolde()/100):$article->getPrix()));
                    if($nombre==0){
                        $panier->setNombreArticles($panier->getNombreArticles()-1);
                    }
                    $this->panierDao->modifierPanier($panier);
                    $this->resultat = "Succès de la modification.";
                } else {
                    $this->resultat = "Échec de la modification.";
                }
            }catch(DAOException $e) {
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            
            return $contenirArticle;
        }

        public function supprimerArticleDuPanier(){
            $idPanier=$_SESSION['compte']->getId();
            $idArticle="";

            if(isset($_GET['article']))
                $idArticle = trim($_GET['article']);

            $contenirArticle= new ContenirArticle();
            try{
                $contenirArticle= $this->contenirArticleDao->trouverArticleDansPanier($idPanier, $idArticle);
                if($contenirArticle!=null){
                    $panier= $contenirArticle->getPanier();
                    $article= $contenirArticle->getArticle();
                    $nombre= $contenirArticle->getNombreArticles();

                    $this->contenirArticleDao->supprimerArticleDuPanier($idPanier, $idArticle);

                    $panier->setPrixTotalSansFrais($panier->getPrixTotalSansFrais()- $nombre*($article->isSolde()?$article->getPrix()-$article->getPrix()*($article->getPourcentageSolde()/100):$article->getPrix()));
                    $panier->setNombreArticles($panier->getNombreArticles()-1);
                    $this->panierDao->modifierPanier($panier);
                }
                   
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
        }

        public function supprimerArticlesDuPanier(){
            $idPanier=$_SESSION['compte']->getId();
            
            try{
                $panier= $this->panierDao->trouverPanier($idPanier);
                $this->contenirArticleDao->supprimerArticlesDuPanier($idPanier);
                $panier->setNombreArticles(0);
                $panier->setPrixTotalSansFrais(0);
                $this->panierDao->modifierPanier($panier);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
        }

        public function trouverPanier(){
            $panier= new Panier();
            if(isset($_SESSION['compte'])){
                $idPanier=$_SESSION['compte']->getId();
                try{
                    $panier=$this->panierDao->trouverPanier($idPanier);
                }catch(DAOException $e){
                    $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
                }
            }
            return $panier;
        }

        public function listerArticlesDuPanier(){
            $articles= new Article();
            if(isset($_SESSION['compte'])){
                $idPanier=$_SESSION['compte']->getId();
                try{
                    $articles=$this->contenirArticleDao->listerArticlesDuPanier($idPanier);

                }catch(DAOException $e){
                    $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
                }
            }
            return $articles;
        }

    }