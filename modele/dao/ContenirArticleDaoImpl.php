<?php

    require_once('./../modele/classes/ContenirArticle.php');
    require_once('./../modele/dao/ContenirArticleDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class ContenirArticleDaoImpl implements ContenirArticleDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateContenirArticle($donnees){
                $contenirArticle= new ContenirArticle();
                $panierDao= $this->daoFactory->getPanierDao();
                $articleDao= $this->daoFactory->getArticleDao();
                $contenirArticle->setPanier($panierDao->trouverPanier($donnees['idCompte']));
                $contenirArticle->setNombreArticles($donnees['nombreArticles']);
                $contenirArticle->setArticle($articleDao->trouverArticle($donnees['idArticle']));
                return $contenirArticle;
        }

        public function ajouterArticleDansPanier(ContenirArticle $contenirArticle){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO contenirArticle(idCompte, nombreArticles, idArticle) VALUES(?,?,?);');
                $resultat= $requete->execute(array($contenirArticle->getPanier()->getCompte()->getId(), $contenirArticle->getNombreArticles(), $contenirArticle->getArticle()->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de l'contenirArticle.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer contenirArticle");
            }
        }

        public function modifierArticleDansPanier(ContenirArticle $contenirArticle){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE contenirArticle SET nombreArticles=? WHERE idCompte=? AND idArticle=?;');
                $resultat= $requete->execute(array($contenirArticle->getNombreArticles(), $contenirArticle->getPanier()->getCompte()->getId(), $contenirArticle->getArticle()->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de l'contenirArticle.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier contenirArticle".$e->getMessage());
            }
        }

        public function supprimerArticleDuPanier($idPanier, $idArticle){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM contenirArticle WHERE idCompte=? AND idArticle=?;');
                $resultat= $requete->execute(array($idPanier, $idArticle));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de l'contenirArticle.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer contenirArticle");
            }
        }

        public function trouverArticleDansPanier($idPanier, $idArticle){
            $bdd=null;
            $requete= null;
            $contenirArticle=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM contenirArticle WHERE idCompte=? AND idArticle=?;');
                $resultat= $requete->execute(array($idPanier, $idArticle));
                $donnees= $requete->fetch();
               
                if($resultat==0 || $donnees==false){
                    $contenirArticle=null;
                }else{
                    $contenirArticle= $this->hydrateContenirArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver contenirArticle");
            }
            return $contenirArticle;
        }

        public function listerArticlesDuPanier($idPanier){
            $bdd=null;
            $requete= null;
            $contenirArticles=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM contenirArticle WHERE idCompte=?;');
                $requete->execute(array($idPanier));
                while($donnees= $requete->fetch()){
                    $contenirArticles[]= $this->hydrateContenirArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister contenirArticle");
            }
            return $contenirArticles;
        }

        public function supprimerArticlesDuPanier($idPanier){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM contenirArticle WHERE idCompte=?;');
                $resultat= $requete->execute(array($idPanier));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de l'contenirArticle.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer contenirArticle");
            }
        }

        public function supprimerArticleDesPaniers($idArticle){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM contenirArticle WHERE idArticle=?;');
                $resultat= $requete->execute(array($idArticle));
                
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer article des contenirArticle");
            }
        }

        public function listerPanierContenantArticle($idArticle){
            $bdd=null;
            $requete= null;
            $contenirArticles=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM contenirArticle WHERE idArticle=?;');
                $requete->execute(array($idArticle));
                while($donnees= $requete->fetch()){
                    $contenirArticles[]= $this->hydrateContenirArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister contenirArticle");
            }
            return $contenirArticles;
        }

    }
        