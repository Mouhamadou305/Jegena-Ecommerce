<?php

    require_once('./../modele/classes/Adresse.php');
    require_once('./../modele/dao/AdresseDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class AdresseDaoImpl implements AdresseDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateAdresse($donnees){
            $adresse= new Adresse();
            $compteDao= $this->daoFactory->getCompteDao();
            $adresse->setCompte($compteDao->trouverCompte($donnees['idCompte']));
            $adresse->setDescription($donnees['description']);
            $adresse->setId($donnees['id']);
            $adresse->setRegion($donnees['region']);
            $adresse->setVille($donnees['ville']);
            return $adresse;
        }

        public function ajouterAdresse(Adresse $adresse){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO adresse(ville, region, description, idCompte) VALUES(?,?,?,?);');
                $resultat= $requete->execute(array($adresse->getVille(), $adresse->getRegion(), $adresse->getDescription(), $adresse->getCompte()->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de l'adresse.");
                }
                $adresse->setId($bdd->lastInsertId());
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer adresse");
            }
        }

        public function modifierAdresse(Adresse $adresse){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE adresse SET ville=?, region=?, description=?, idCompte=? WHERE id=?;');
                $resultat= $requete->execute(array($adresse->getVille(), $adresse->getRegion(), $adresse->getDescription(), $adresse->getCompte()->getId(), $adresse->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de l'adresse.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier adresse");
            }
        }

        public function supprimerAdresse($id){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM adresse WHERE id=?;');
                $resultat= $requete->execute(array($id));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de l'adresse.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer adresse");
            }
        }

        public function trouverAdresse($id){
            $bdd=null;
            $requete= null;
            $adresse=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM adresse WHERE id=?;');
                $requete->execute(array($id));
                $donnees= $requete->fetch();
                if(!isset($donnees) || $donnees==false)
                    $adresse= null;
                else
                    $adresse= $this->hydrateAdresse($donnees);
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver adresse");
            }
            return $adresse;
        }

        public function listerAdresses(){
            $bdd=null;
            $requete= null;
            $adresses=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM adresse;');
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $adresses[]= $this->hydrateAdresse($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister adresses");
            }
            return $adresses;
        }

        public function listerAdressesCompte($idCompte){
            $bdd=null;
            $requete= null;
            $adresses=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM adresse WHERE idCompte=?;');
                $requete->execute(array($idCompte));
                while($donnees= $requete->fetch()){
                    $adresses[]= $this->hydrateAdresse($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister adresses compte");
            }
            return $adresses;
        }

    }