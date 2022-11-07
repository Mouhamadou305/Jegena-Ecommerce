<?php

    require_once('./../modele/classes/CommanderArticle.php');
    require_once('./../modele/dao/CommanderArticleDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class CommanderArticleDaoImpl implements CommanderArticleDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateCommanderArticle($donnees){
            $commanderArticle= new CommanderArticle();
            $commandeDao= $this->daoFactory->getCommandeDao();
            $articleDao= $this->daoFactory->getArticleDao();
            $commanderArticle->setCommande($commandeDao->trouverCommande($donnees['idCommande']));
            $commanderArticle->setNombreArticles($donnees['nombreArticles']);
            $commanderArticle->setArticle($articleDao->trouverArticle($donnees['idArticle']));
            return $commanderArticle;
        }

        public function ajouterCommanderArticle(CommanderArticle $commanderArticle){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO commanderArticle(idCommande, nombreArticles, idArticle) VALUES(?,?,?);');
                $resultat= $requete->execute(array($commanderArticle->getCommande()->getId(), $commanderArticle->getNombreArticles(), $commanderArticle->getArticle()->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de l'commanderArticle.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer commanderArticle".$e->getMessage());
            }
        }

        public function modifierCommanderArticle(CommanderArticle $commanderArticle){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE commanderArticle SET nombreArticles=? WHERE idCommande=? AND idArticle=?;');
                $resultat= $requete->execute(array($commanderArticle->getNombreArticles(), $commanderArticle->getCommande()->getId(), $commanderArticle->getArticle()->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de l'commanderArticle.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier commanderArticle");
            }
        }

        public function supprimerCommanderArticle($idCommande, $idArticle){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM commanderArticle WHERE idCommande=? AND idArticle=?;');
                $resultat= $requete->execute(array($idCommande, $idArticle));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de l'commanderArticle.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer commanderArticle");
            }
        }

        public function trouverCommanderArticle($idCommande, $idArticle){
            $bdd=null;
            $requete= null;
            $commanderArticle=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commanderArticle WHERE idCommande=? AND idArticle=?;');
                $requete->execute(array($idCommande, $idArticle));
                $donnees= $requete->fetch();
                $commanderArticle= $this->hydrateCommanderArticle($donnees);
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver commanderArticle");
            }
            return $commanderArticle;
        }

        public function listerArticlesDeCommande($idCommande){
            $bdd=null;
            $requete= null;
            $commanderArticles=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commanderArticle WHERE idCommande=?;');
                $requete->execute(array($idCommande));
                while($donnees= $requete->fetch()){
                    $commanderArticles[]= $this->hydrateCommanderArticle($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister commanderArticle");
            }
            return $commanderArticles;
        }

        public function supprimerArticlesCommande($idCommande){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM commanderArticle WHERE idCommande=?;');
                $resultat= $requete->execute(array($idCommande));
                
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer commanderArticle");
            }
        }

        public function supprimerArticleDesCommandes($idArticle){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM commanderArticle WHERE idArticle=?;');
                $resultat= $requete->execute(array($idArticle));
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer commanderArticle");
            }
        }

    }
        