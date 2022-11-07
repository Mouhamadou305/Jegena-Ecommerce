<?php

    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/Categorie.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/dao/DAOException.php');
    require_once('./../modele/managers/PanierManager.php');

    class ArticleManager {
            
        private $articleDao;
        private $categorieDao;
        private $contenirArticleDao;
        private $commanderArticleDao;
        private $panierDao;
        private $imageDao;

        private $erreurs=array();
        private $resultat;

        public function getErreurs(){
            return $this->erreurs;
        }

        public function getResultat(){
            return $this->resultat;
        }
        
        function __construct(ArticleDao $articleDao, CategorieDao $categorieDao, ContenirArticleDao $contenirArticleDao=null, CommanderArticleDao $commanderArticleDao=null, PanierDao $panierDao=null, ImageDao $imageDao=null){
            $this->articleDao= $articleDao;
            $this->categorieDao= $categorieDao;
            $this->contenirArticleDao= $contenirArticleDao;
            $this->commanderArticleDao= $commanderArticleDao;
            $this->panierDao= $panierDao;
            $this->imageDao= $imageDao;
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

        private function validationPourcentage($champ) {
            $champ=trim($champ);
            if (isset($champ) && $champ!=''){
                if(!preg_match('#^[0-9]+(\.[0-9]+)?$#', $champ)){
                    throw new Exception( "Vueillez saisir un nombre valide." );
                }
                if((float)$champ>100){
                    throw new Exception( "Vueillez saisir nombre inférieur ou égal à 100." );
                }
            }else {
                throw new Exception( "Ce champ est obligatoire." );
            }
        }

        private function validationNombre($champ) {
            $champ=trim($champ);
            if (isset($champ) && $champ!=''){
                if(!preg_match('#^[0-9]+$#', $champ)){
                    throw new Exception( "Vueillez saisir un nombre valide." );
                }
            }else {
                throw new Exception( "Ce champ est obligatoire." );
            }
        }

        private function validationObligatoire($champ) {
            $champ=trim($champ);
            if (!isset($champ) || $champ==''){
                throw new Exception( "Ce champ est obligatoire." );
            }
        }

        private function validationBooleen($champ) {
            $champ=trim($champ);
            if (isset($champ) && $champ!=0 && $champ!=1){
                throw new Exception( "Ce champ n'est pas valide." );
            }
        }

        public function traiterNom($objet, $nom) {
    	
            try {
                $this->validationChamp($nom);
            } catch ( Exception $e ) {
                $this->erreurs['nom']= $e->getMessage();
            }
            $objet->setNom($nom);
            
        }

        public function traiterGenre($objet, $genre){
            try {
                $this->validationObligatoire($genre);
            } catch ( Exception $e ) {
                $this->erreurs['genre']= $e->getMessage();
            }
            $objet->setGenre($genre);

        }

        public function traiterTaille($objet, $taille){
            try {
                $this->validationObligatoire($taille);
            } catch ( Exception $e ) {
                $this->erreurs['taille']= $e->getMessage();
            }
            $objet->setTaille($taille);

        }
        
        public function traiterCoupDeCoeur($article, $coupDeCoeur){
            try {
                $this->validationBooleen($coupDeCoeur);
            } catch ( Exception $e ) {
                $this->erreurs['coupDeCoeur']= $e->getMessage();
            }
            $article->setCoupDeCoeur($coupDeCoeur);
            
        }

        public function traiterSolde($article, $solde){
            try {
                $this->validationBooleen($solde);
            } catch ( Exception $e ) {
                $this->erreurs['solde']= $e->getMessage();
            }
            $article->setSolde($solde);
            
        }

        public function traiterPrix($article, $prix){
            try {
                $this->validationPrix($prix);
            } catch ( Exception $e ) {
                $this->erreurs['prix']= $e->getMessage();
            }
            $article->setPrix($prix);
            
        }

        public function traiterPourcentageSolde($article, $pourcentageSolde){
            try {
                $this->validationPourcentage($pourcentageSolde);
            } catch ( Exception $e ) {
                $this->erreurs['pourcentageSolde']= $e->getMessage();
            }
            $article->setPourcentageSolde($pourcentageSolde);
            
        }

        public function traiterDescription($article, $description){
            try {
                $this->validationChamp($description);
            } catch ( Exception $e ) {
                $this->erreurs['description']= $e->getMessage();
            }
            $article->setDescription($description);
            
        }

        public function traiterQuantite($article, $quantite){
            try {
                $this->validationNombre($quantite);
            } catch ( Exception $e ) {
                $this->erreurs['quantite']= $e->getMessage();
            }
            $article->setQuantite($quantite);
            
        }

        public function traiterCategorie($article, $idCategorie){
            try {
                $this->validationObligatoire($idCategorie);
            } catch ( Exception $e ) {
                $this->erreurs['idCategorie']= $e->getMessage();
            }
            $article->setCategorie($this->categorieDao->trouverCategorie($idCategorie));
            
        }


        public function ajouterArticle() {
            /* Récupération des champs du formulaire */
            $nom="";
            $genre="";
            $coupDeCoeur=false;
            $solde=false;
            $prix="";
            $pourcentageSolde=0;
            $description="";
            $quantite=1;
            $idCategorie="";
            $taille="";
            $motsCles="";
            if(isset($_POST['motsCles']))
                $motsCles = trim($_POST['motsCles']);
            if(isset($_POST['genre']))
                $genre = trim($_POST['genre']);
            if(isset($_POST['taille']))
                $taille = trim($_POST['taille']);
            if(isset($_POST['nom']))
                $nom = trim($_POST['nom']);
            if(isset($_POST['coupDeCoeur']))
                $coupDeCoeur = trim($_POST['coupDeCoeur']);
            if(isset($_POST['solde']))
                $solde = trim($_POST['solde']);
            if(isset($_POST['prix']))
                $prix = trim($_POST['prix']);
            if(isset($_POST['pourcentageSolde']))
                $pourcentageSolde = trim($_POST['pourcentageSolde']);
            if(isset($_POST['description']))
                $description = trim($_POST['description']);
            if(isset($_POST['quantite']))
                $quantite = trim($_POST['quantite']);
            if(isset($_POST['idCategorie']))
                $idCategorie = trim($_POST['idCategorie']);
    
            $article = new Article();
            
            try {
                
                $this->traiterGenre($article, $genre);
                $this->traiterTaille($article, $taille);
                $this->traiterNom($article, $nom);
                $this->traiterCoupDeCoeur($article, $coupDeCoeur);
                $this->traiterSolde($article, $solde);
                $this->traiterPrix($article, $prix);
                $this->traiterPourcentageSolde($article, $pourcentageSolde);
                $this->traiterDescription($article, $description);
                $this->traiterQuantite($article, $quantite);
                $this->traiterCategorie($article, $idCategorie);
                $article->setMotsCles($motsCles);
             
                if ( empty($this->erreurs) ) {
                    $this->articleDao->ajouterArticle($article);
                    $this->uploaderImage($article);
                    if ( !empty($this->erreurs) ){
                        $this->articleDao->supprimerArticle($article->getId());
                        $this->resultat = "Échec de l'ajout.";
                    }
                    else
                        $this->resultat = "Succès de l'ajout.";
                } else {
                    $this->resultat = "Échec de l'ajout.";
                }
            }catch(DAOException $e) {
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            
            return $article;
        }

        public function modifierArticle() {
            /* Récupération des champs du formulaire */
            $id="";
            $nom="";
            $genre="";
            $coupDeCoeur=false;
            $solde=false;
            $prix="";
            $pourcentageSolde=0;
            $description="";
            $quantite=1;
            $idCategorie="";
            $taille="";
            $motsCles="";
            if(isset($_POST['motsCles']))
                $motsCles = trim($_POST['motsCles']);
            if(isset($_POST['genre']))
                $genre = trim($_POST['genre']);
            if(isset($_POST['taille']))
                $taille = trim($_POST['taille']);
            if(isset($_POST['nom']))
                $nom = trim($_POST['nom']);
            if(isset($_POST['coupDeCoeur']))
                $coupDeCoeur = trim($_POST['coupDeCoeur']);
            if(isset($_POST['solde']))
                $solde = trim($_POST['solde']);
            if(isset($_POST['prix']))
                $prix = trim($_POST['prix']);
            if(isset($_POST['pourcentageSolde']))
                $pourcentageSolde = trim($_POST['pourcentageSolde']);
            if(isset($_POST['description']))
                $description = trim($_POST['description']);
            if(isset($_POST['quantite']))
                $quantite = trim($_POST['quantite']);
            if(isset($_POST['idCategorie']))
                $idCategorie = trim($_POST['idCategorie']);
            if(isset($_POST['article']))
                $id = trim($_POST['article']);
    
            $article = new Article();
            
            try {
                
                $this->traiterGenre($article, $genre);
                $this->traiterTaille($article, $taille);
                $this->traiterNom($article, $nom);
                $this->traiterCoupDeCoeur($article, $coupDeCoeur);
                $this->traiterSolde($article, $solde);
                $this->traiterPrix($article, $prix);
                $this->traiterPourcentageSolde($article, $pourcentageSolde);
                $this->traiterDescription($article, $description);
                $this->traiterQuantite($article, $quantite);
                $this->traiterCategorie($article, $idCategorie);
                $article->setId($id);
                $article->setMotsCles($motsCles);
              
                if ( empty($this->erreurs) ) {
                    $ancienArticle=  $this->articleDao->trouverArticle($id);
                    $this->articleDao->modifierArticle($article);
                    $this->uploaderImage($article);
                    if ( !empty($this->erreurs) ){
                        $this->articleDao->modifierArticle($ancienArticle);
                        $this->resultat = "Échec de la modification.";
                    }
                    else
                        $this->resultat = "Succès de la modification.";
                } else {
                    $this->resultat = "Échec de la modification.";
                }
            }catch(DAOException $e) {
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            
            return $article;
        }

        public function supprimerArticle(){
            $id="";
            $panierManager= new PanierManager($this->panierDao, $this->articleDao, $this->contenirArticleDao);
            if(isset($_POST['id']))
                $id= $_POST['id'];
            try{
                $article= $this->articleDao->trouverArticle($id);
                $image= $this->trouverImage($article);
                $fichier= $image->getEmplacement();
                if( file_exists ( $fichier))
                    unlink( $fichier ) ;
                $this->imageDao->supprimerImage($image->getId());
                $listeContenirArticles= $this->contenirArticleDao->listerPanierContenantArticle($article->getId());
                foreach($listeContenirArticles as $contenirArticle){
                    $contenirArticle->setNombreArticles(0);
                    $panierManager->modifierArticleDansPanierBack($contenirArticle->getPanier()->getCompte()->getId(), $article->getId(), $contenirArticle->getNombreArticles());
                }
                $this->contenirArticleDao->supprimerArticleDesPaniers($article->getId());
                $this->commanderArticleDao->supprimerArticleDesCommandes($id);
                $this->articleDao->supprimerArticle($id);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
        }

        public function trouverArticle(){
            $id="";
            if(isset($_GET['article']))
                $id= htmlspecialchars($_GET['article']);
            else {
                return null;
            }
            $article= new Article();
            try{
                $article=$this->articleDao->trouverArticle($id);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $article;
        }

        public function listerCategories(){
            $categories= array();
            try{
                $categories=$this->categorieDao->listerCategories();
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $categories;
        }
        
        public function listerArticles(){
            $articles= array();
            try{
                $articles=$this->articleDao->listerArticles();
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        public function listerArticlesParCategorieEtGenre(){
            $articles= array();
            $categorie="";
            $genre="";
            if(isset($_GET['categorie']))
                $categorie= htmlspecialchars($_GET['categorie']);
            else{
                $categorie=1;
            }
            if(isset($_GET['genre']))
                $genre= htmlspecialchars($_GET['genre']);
            else{
                $genre='Femme';
            }   
            try{
                $articles=$this->articleDao->listerArticlesParCategorieEtGenre($categorie, $genre);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        public function listerArticlesParGenre(){
            $articles= array();
            $genre="";
            if(isset($_GET['genre']))
                $genre= htmlspecialchars($_GET['genre']);
            else{
                $genre='Femme';
            }    
            try{
                $articles=$this->articleDao->listerArticlesParGenre($genre);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        public function listerArticlesParCategorie(){
            $articles= array();
            $categorie="";
            if(isset($_GET['categorie']))
                $categorie= htmlspecialchars($_GET['categorie']);
            else{
                $categorie=1;
            }    
            try{
                $articles=$this->articleDao->listerArticlesParCategorie($categorie);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        //

        public function lister32Articles(){
            $articles= array();
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $articles=$this->articleDao->lister32Articles($page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        public function lister32ArticlesRestant(){
            $articles= array();
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $articles=$this->articleDao->lister32ArticlesRestant($page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            return $articles;
        }

        public function lister12Articles(){
            $articles= array();
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $articles=$this->articleDao->lister12Articles($page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        public function lister12ArticlesCoupDeCoeur(){
            $articles= array();
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $articles=$this->articleDao->lister12ArticlesCoupDeCoeur($page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        public function lister32ArticlesParCategorieEtGenre(){
            $articles= array();
            $categorie="";
            $genre="";
            if(isset($_GET['categorie']))
                $categorie= htmlspecialchars($_GET['categorie']);
            else{
                $categorie=1;
            }
            if(isset($_GET['genre']))
                $genre= htmlspecialchars($_GET['genre']);
            else{
                $genre='Femme';
            }
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }    
            try{
                $articles=$this->articleDao->lister32ArticlesParCategorieEtGenre($categorie, $genre, $page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        public function lister32ArticlesParGenre(){
            $articles= array();
            $genre="";
            if(isset($_GET['genre']))
                $genre= htmlspecialchars($_GET['genre']);
            else{
                $genre='Femme';
            }
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $articles=$this->articleDao->lister32ArticlesParGenre($genre, $page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $articles;
        }

        public function lister32ArticlesParCategorie(){
            $articles= array();
            $categorie="";
            if(isset($_GET['categorie']))
                $categorie= htmlspecialchars($_GET['categorie']);
            else{
                $categorie=1;
            }
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $articles=$this->articleDao->lister32ArticlesParCategorie($categorie, $page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            return $articles;
        }

        public function lister32ArticlesRestantParCategorie(){
            $articles= array();
            $categorie="";
            if(isset($_GET['categorie']))
                $categorie= htmlspecialchars($_GET['categorie']);
            else{
                $categorie=1;
            }
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $articles=$this->articleDao->lister32ArticlesRestantParCategorie($categorie, $page);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            return $articles;
        }

        public function lister32ArticlesParMotCle(){
            $articles= array();
            $motCle="";
            if(isset($_GET['motCle']))
                $motCle= htmlspecialchars($_GET['motCle']);
            else{
                $motCle=1;
            }
            if(isset($_GET['page']))
                $page= htmlspecialchars($_GET['page']);
            else {
                $page=1;
            }  
            try{
                $articles=$this->articleDao->lister32ArticlesParMotCle($motCle, $page);
                if(empty($articles))
                    $this->resultat="Aucun aricle ne correspond à cette description.";
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            return $articles;
        }

        public function trouverCategorie(){
            $idCategorie="";
            if(isset($_GET['categorie']))
                $idCategorie= htmlspecialchars($_GET['categorie']);
            else{
                return null;
            }
            $categorie= new Categorie();
            try{
                $categorie=$this->categorieDao->trouverCategorie($idCategorie);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $categorie;
        }

        public function compterArticles(){
            $nombre= 1;
            try{
                $nombre=$this->articleDao->compterArticles();
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $nombre;
        }

        public function compterArticlesRestant(){
            $nombre= 1;
            try{
                $nombre=$this->articleDao->compterArticlesRestant();
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            return $nombre;
        }

        public function compterArticlesMotCle(){
            $nombre= 1;
            $motCle="";
            if(isset($_GET['motCle'])){
                $motCle= $_GET['motCle'];
            }
            try{
                $nombre=$this->articleDao->compterArticlesMotCle($motCle);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            return $nombre;
        }

        public function compterArticlesRestantCategorie(){
            $nombre= 1;
            $idCategorie=1;
            if(isset($_GET['categorie']))
                $idCategorie= htmlspecialchars($_GET['categorie']);
            try{
                $nombre=$this->articleDao->compterArticlesRestantCategorie($idCategorie);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            return $nombre;
        }

        public function compterArticlesCategorie(){
            $nombre= 1;
            $idCategorie=1;
            if(isset($_GET['categorie']))
                $idCategorie= htmlspecialchars($_GET['categorie']);
            try{
                $nombre=$this->articleDao->compterArticlesCategorie($idCategorie);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.".$e->getMessage();
            }
            return $nombre;
        }

        public function ajouterCategorie() {
            /* Récupération des champs du formulaire */
            $nom="";
            $genre="";
             if(isset($_POST['genre']))
                $genre = trim($_POST['genre']);
            if(isset($_POST['nom']))
                $nom = trim($_POST['nom']);
           
            $categorie = new Categorie();
            
            try {
                
                $this->traiterGenre($categorie, $genre);
                $this->traiterNom($categorie, $nom);
               
                if ( empty($this->erreurs) ) {
                    $this->categorieDao->ajouterCategorie($categorie);
                    $this->resultat = "Succès de l'ajout.";
                } else {
                    $this->resultat = "Échec de l'ajout.";
                }
            }catch(DAOException $e) {
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            
            return $categorie;
        }

        public function modifierCategorie() {
            /* Récupération des champs du formulaire */
            $id="";
            $nom="";
            $genre="";
            if(isset($_POST['genre']))
                $genre = trim($_POST['genre']);
            if(isset($_POST['nom']))
                $nom = trim($_POST['nom']);
            if(isset($_POST['categorie']))
                $id = trim($_POST['categorie']);
           
            $categorie = new Categorie();
            
            try {
                
                $this->traiterGenre($categorie, $genre);
                $this->traiterNom($categorie, $nom);
                $categorie->setId($id);
             
                if ( empty($this->erreurs) ) {
                    $this->categorieDao->modifierCategorie($categorie);
                    $this->resultat = "Succès de la modification.";
                } else {
                    $this->resultat = "Échec de la modification.";
                }
            }catch(DAOException $e) {
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            
            return $categorie;
        }

        public function supprimerCategorie(){
            $id="";
            $panierManager= new PanierManager($this->panierDao, $this->articleDao, $this->contenirArticleDao);
            if(isset($_POST['id']))
                $id= $_POST['id'];
            try{
                $listeArticles= $this->articleDao->listerArticlesParCategorie($id);
                foreach ($listeArticles as $article) {
                    $this->contenirArticleDao->supprimerArticleDesPaniers($article->getId());
                    $listeContenirArticles= $this->contenirArticleDao->listerPanierContenantArticle($article->getId());
                    foreach($listeContenirArticles as $contenirArticle){
                        $contenirArticle->setNombreArticles(0);
                        $panierManager->modifierArticleDansPanierBack($contenirArticle->getPanier()->getCompte()->getId(), $article->getId(), $contenirArticle->getNombreArticles());
                    }
                    $this->contenirArticleDao->supprimerArticleDesPaniers($article->getId());
                    $this->commanderArticleDao->supprimerArticleDesCommandes($article->getId());
                    $this->articleDao->supprimerArticle($article->getId());
                }
                $this->categorieDao->supprimerCategorie($id);
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
        }

        private function uploaderImage($article){
            $image= new Image();
            if (isset($_FILES['image1']) AND $_FILES['image1']['error'] == 0){
                // Testons si le fichier n'est pas trop gros
                if ($_FILES['image1']['size'] <= 3000000){
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['image1']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    if (in_array($extension_upload, $extensions_autorisees)){
                        // On peut valider le fichier et le stocker définitivement
                        $taille= getimagesize($_FILES['image1']['tmp_name']);
                        if($taille[0]>=275 && $taille[0]<=305 && $taille[1]<=400 && $taille[1]>=370 ){
                            move_uploaded_file($_FILES['image1']['tmp_name'], './../vue/images/produits/' . $article->getId() . '.'.$extension_upload);
                            $image->setArticle($article);
                            $image->setEmplacement('vue/images/produits/' . $article->getId() . '.'.$extension_upload);
                            $image->setNom($article->getId() . '.'.$extension_upload);
                            $img= $this->imageDao->trouverImage($article->getId());
                            if($img==null)
                                $this->imageDao->ajouterImage($image);
                            else{
                                $image->setId($img->getId());
                                $this->imageDao->modifierImage($image);
                            }
                        }else{
                            $this->erreurs["image1"]="La largeur de l'image doit être comprise entre 275 px et 305 px et la longueur entre 370 px et 400px.";
                        }
                    }else{
                        $this->erreurs["image1"]="Ce type de fichier n'est pas autorisé.";
                    }
                }else{
                    $this->erreurs["image1"]="Ce fichier est trop volumineux.";
                }
                
            }elseif (isset($_FILES['image1'])) {
                $this->erreurs["image1"]="Aucune image n'a été sélectionnée.";
            }
            return $image;
        }

        public function trouverImage($article){
            $image= new Image();
            try{
                $image=$this->imageDao->trouverImage($article->getId());
            }catch(DAOException $e){
                $this->resultat= "Une erreur inattendue est survenue. Vueillez réessayer plus tard.";
            }
            return $image;
        }

    }