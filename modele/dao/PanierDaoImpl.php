<?php

    require_once('./../modele/classes/Panier.php');
    require_once('./../modele/dao/PanierDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class PanierDaoImpl implements PanierDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydratePanier($donnees){
            $panier= new Panier();
            $compteDao= $this->daoFactory->getCompteDao();
            $panier->setCompte($compteDao->trouverCompte($donnees['idCompte']));
            $panier->setNombreArticles($donnees['nombreArticles']);
            $panier->setPrixTotalSansFrais($donnees['prixTotalSansFrais']);
            return $panier;
        }

        public function ajouterPanier(Panier $panier){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO panier(idCompte, nombreArticles, prixTotalSansFrais) VALUES(?,?,?);');
                $resultat= $requete->execute(array($panier->getCompte()->getId(), $panier->getNombreArticles(), $panier->getPrixTotalSansFrais()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de l'panier.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer panier");
            }
        }

        public function modifierPanier(Panier $panier){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE panier SET nombreArticles=?, prixTotalSansFrais=? WHERE idCompte=?;');
                $resultat= $requete->execute(array($panier->getNombreArticles(), $panier->getPrixTotalSansFrais(), $panier->getCompte()->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de l'panier.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier panier");
            }
        }

        public function supprimerPanier($idCompte){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM panier WHERE idCompte=?;');
                $resultat= $requete->execute(array($idCompte));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de l'panier.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer panier");
            }
        }

        public function trouverPanier($idCompte){
            $bdd=null;
            $requete= null;
            $panier=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM panier WHERE idCompte=?;');
                $requete->execute(array($idCompte));
                $donnees= $requete->fetch();
                $panier= $this->hydratePanier($donnees);
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver panier");
            }
            return $panier;
        }

        public function listerPaniers(){
            $bdd=null;
            $requete= null;
            $paniers=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM panier;');
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $paniers[]= $this->hydratePanier($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister panier");
            }
            return $paniers;
        }

    }