<?php

    require_once('./../modele/classes/Article.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class ArticleDaoImpl implements ArticleDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateArticle($donnees){
            $article= new Article();
            $categorieDao= $this->daoFactory->getCategorieDao();
            $article->setCategorie($categorieDao->trouverCategorie($donnees['idCategorie']));
            $article->setCoupDeCoeur($donnees['coupDeCoeur']);
            $article->setDateModification(new DateTime($donnees['dateModification']));
            $article->setDescription($donnees['description']);
            $article->setGenre($donnees['genre']);
            $article->setId($donnees['id']);
            $article->setNom($donnees['nom']);
            $article->setPourcentageSolde($donnees['pourcentageSolde']);
            $article->setPrix($donnees['prix']);
            $article->setQuantite($donnees['quantite']);
            $article->setSolde($donnees['solde']);
            $article->setTaille($donnees['taille']);
            $article->setMotsCles($donnees['motsCles']);
            return $article;
        }

        public function ajouterArticle(Article $article){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO article(idCategorie, coupDeCoeur, dateModification, description, genre, nom, pourcentageSolde, prix, quantite, solde, taille, motsCles) VALUES(?,?,NOW(),?,?,?,?,?,?,?,?,?);');
                $resultat= $requete->execute(array($article->getCategorie()->getId(), (bool)$article->isCoupDeCoeur(), $article->getDescription(), $article->getGenre(), $article->getNom(), $article->getPourcentageSolde(), $article->getPrix(), $article->getQuantite(), (bool)$article->isSolde(), $article->getTaille(), $article->getMotsCles()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de l'Article.");
                }
                $article->setId($bdd->lastInsertId());
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer Article");
            }
        }

        public function modifierArticle(Article $article){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE article SET idCategorie=?, coupDeCoeur=?, dateModification=NOW(), description=?, genre=?, nom=?, pourcentageSolde=?, prix=?, quantite=?, solde=?, taille=?, motsCles=? WHERE id=?;');
                $resultat= $requete->execute(array($article->getCategorie()->getId(), (bool)$article->isCoupDeCoeur(), $article->getDescription(), $article->getGenre(), $article->getNom(), $article->getPourcentageSolde(), $article->getPrix(), $article->getQuantite(), (bool)$article->isSolde(), $article->getTaille(), $article->getMotsCles(), $article->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de l'Article.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier Article".$e->getMessage());
            }
        }

        public function supprimerArticle($id){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM article WHERE id=?;');
                $resultat= $requete->execute(array($id));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de l'Article.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer Article");
            }
        }

        public function trouverArticle($id){
            $bdd=null;
            $requete= null;
            $article=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE id=?;');
                $resultat=$requete->execute(array($id));
                $donnees= $requete->fetch();
                $article= $this->hydrateArticle($donnees);
                if($resultat==0 || empty($donnees)){
                    $article=null;
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Article");
            }
            return $article;
        }

        public function listerArticles(){
            $bdd=null;
            $requete= null;
            $articles=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article ORDER BY dateModification DESC;');
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function listerArticlesParCategorie($idCategorie){
            $bdd=null;
            $requete= null;
            $articles=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE idCategorie=? ORDER BY dateModification DESC;');
                $requete->execute(array($idCategorie));
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function listerArticlesParGenre($genre){
            $bdd=null;
            $requete= null;
            $articles=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE genre=? ORDER BY dateModification DESC;');
                $requete->execute(array($genre));
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function listerArticlesParCategorieEtGenre($idCategorie, $genre){
            $bdd=null;
            $requete= null;
            $articles=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE idCategorie=? AND genre=? ORDER BY dateModification DESC;');
                $requete->execute(array($idCategorie, $genre));
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function lister32Articles($page){
            $bdd=null;
            $requete= null;
            $articles=array();
            $nbrLignes= 32;
            $debut= (int)(($page-1)*$nbrLignes);

            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function lister12Articles($page){
            $bdd=null;
            $requete= null;
            $articles=array();
            $nbrLignes= 12;
            $debut= (int)(($page-1)*$nbrLignes);

            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE quantite>0 ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function lister12ArticlesCoupDeCoeur($page){
            $bdd=null;
            $requete= null;
            $articles=array();
            $nbrLignes= 12;
            $debut= (int)(($page-1)*$nbrLignes);

            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE coupDeCoeur=1 AND quantite>0 ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function lister32ArticlesParCategorie($idCategorie, $page){
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $articles=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE idCategorie= :categorie ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':categorie', $idCategorie, PDO::PARAM_INT);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $articles;
        }

        public function lister32ArticlesParmotCle($motCle, $page){
            $motCle="%$motCle%";
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $articles=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE nom LIKE :motCle OR motsCles LIKE :motCle ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':motCle', $motCle);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $articles;
        }

        public function lister32ArticlesParGenre($genre, $page){
            $bdd=null;
            $requete= null;
            $articles=array();
            $nbrLignes= 32;
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE genre= :genre ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':genre', $genre);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function lister32ArticlesParCategorieEtGenre($idCategorie, $genre, $page){
            $bdd=null;
            $requete= null;
            $articles=array();
            $nbrLignes= 32;
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE idCategorie= :categorie AND genre= :genre ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':genre', $genre);
                $requete->bindParam(':categorie', $categorie, PDO::PARAM_INT);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article");
            }
            return $articles;
        }

        public function compterArticles(){
            $bdd=null;
            $requete= null;
            $article=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(id) AS nombre FROM article;');
                $requete->execute();
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Article".$e->getMessage());
            }
            return $nombre;
        }

        public function compterArticlesCategorie($idCategorie){
            $bdd=null;
            $requete= null;
            $article=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(id) AS nombre FROM article WHERE idCategorie=?;');
                $requete->execute(array($idCategorie));
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Article".$e->getMessage());
            }
            return $nombre;
        }

        public function lister32ArticlesRestantParCategorie($idCategorie, $page){
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $articles=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article WHERE idCategorie= :categorie AND quantite!=0 ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':categorie', $idCategorie, PDO::PARAM_INT);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $articles;
        }

        public function lister32ArticlesRestant($page){
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $articles=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM article ORDER BY dateModification DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $articles[]= $this->hydrateArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $articles;
        }

        public function compterArticlesRestant(){
            $bdd=null;
            $requete= null;
            $article=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(*) AS nombre FROM article WHERE quantite!=0;');
                $requete->execute();
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Article".$e->getMessage());
            }
            return $nombre;
        }

        public function compterArticlesMotCle($motCle){
            $motCle="%$motCle%";
            $bdd=null;
            $requete= null;
            $article=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(*) AS nombre FROM article WHERE nom LIKE :motCle;');
                $requete->bindParam(':motCle', $motCle);
                $requete->execute();
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Article".$e->getMessage());
            }
            return $nombre;
        }
    
        public function compterArticlesRestantCategorie($idCategorie){
            $bdd=null;
            $requete= null;
            $article=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(id) AS nombre FROM article WHERE idCategorie=? AND quantite!=0;');
                $requete->execute(array($idCategorie));
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Article");
            }
            return $nombre;
        }

    }