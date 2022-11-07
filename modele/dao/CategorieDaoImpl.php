<?php

    require_once('./../modele/classes/Categorie.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class CategorieDaoImpl implements CategorieDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateCategorie($donnees){
            $categorie= new Categorie();
            $categorie->setId($donnees['id']);
            $categorie->setNom($donnees['nom']);
            $categorie->setGenre($donnees['genre']);

            return $categorie;
        }

        public function ajouterCategorie(Categorie $categorie){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO categorie(nom, genre) VALUES(?, ?);');
                $resultat= $requete->execute(array($categorie->getNom(), $categorie->getGenre()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de la catégorie.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer catégorie");
            }
        }

        public function modifierCategorie(Categorie $categorie){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE categorie SET nom=?, genre=? WHERE id=?;');
                $resultat= $requete->execute(array($categorie->getNom(),$categorie->getGenre(), $categorie->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de la catégorie.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier categorie");
            }
        }

        public function supprimerCategorie($id){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM categorie WHERE id=?;');
                $resultat= $requete->execute(array($id));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de la catégorie.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer catégorie");
            }
        }

        public function trouverCategorie($id){
            $bdd=null;
            $requete= null;
            $categorie=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM categorie WHERE id=?;');
                $requete->execute(array($id));
                $donnees= $requete->fetch();
                $categorie= $this->hydrateCategorie($donnees);
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver categorie");
            }
            return $categorie;
        }

        public function listerCategories(){
            $bdd=null;
            $requete= null;
            $categories=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM categorie ORDER BY genre;');
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $categories[]= $this->hydrateCategorie($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver categorie");
            }
            return $categories;
        }

    }