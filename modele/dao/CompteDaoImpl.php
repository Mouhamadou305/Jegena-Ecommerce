<?php

    require_once('./../modele/classes/Compte.php');
    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class CompteDaoImpl implements CompteDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateCompte($donnees){
            $compte= new Compte();
            $compte->setId($donnees['id']);
            $compte->setNom($donnees['nom']);
            $compte->setPrenom($donnees['prenom']);
            $compte->setNumeroTelephone($donnees['numeroTelephone']);
            $compte->setAdresseMail($donnees['adresseMail']);
            $compte->setMotDePasse($donnees['motDePasse']);
            $compte->setPointsLivraison($donnees['pointsLivraison']);
            $compte->setTypeUtilisateur($donnees['typeUtilisateur']);
            $compte->setDateCreation(new DateTime($donnees['dateCreation']));
            $compte->setActive($donnees['active']);
            $compte->setCodeActivation($donnees['codeActivation']);
           
            return $compte;
        }

        public function ajouterCompte(Compte $compte){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO compte(nom, prenom, numeroTelephone, adresseMail, motDePasse, pointsLivraison, typeUtilisateur, dateCreation, active, codeActivation) VALUES(?,?,?,?,?,?,?,NOW(), FALSE, ?);');
                $resultat= $requete->execute(array($compte->getNom(), $compte->getPrenom(),$compte->getNumeroTelephone(), $compte->getAdresseMail(), $compte->getMotDePasse(), $compte->getPointsLivraison(), $compte->getTypeUtilisateur(), $compte->getCodeActivation()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion du compte.");
                }else{
                    $compte->setId($bdd->lastInsertId());
                }
            }catch(PDOException $e){
                echo($e->getMessage());
                throw new DAOException("Erreur interne du serveur. SQL insérer compte");
            }
        }

        public function modifierCompte(Compte $compte){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE compte SET nom=?, prenom=?, numeroTelephone=?, motDePasse=?, pointsLivraison=?, typeUtilisateur=?, dateCreation= NOW(), active=?, codeActivation=? WHERE adresseMail=?;');
                $resultat= $requete->execute(array($compte->getNom(), $compte->getPrenom(),$compte->getNumeroTelephone(), $compte->getMotDePasse(), $compte->getPointsLivraison(), $compte->getTypeUtilisateur(), (int)($compte->isActive()), $compte->getCodeActivation(), $compte->getAdresseMail()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification du compte.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier compte");
            }
        }

        public function supprimerCompte($id){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM compte WHERE id=?;');
                $resultat= $requete->execute(array($id));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression du compte.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer compte");
            }
        }

        public function trouverCompte($id){
            $bdd=null;
            $requete= null;
            $compte=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM compte WHERE id=?;');
                $resultat= $requete->execute(array($id));
                $donnees= $requete->fetch();
                $compte= $this->hydrateCompte($donnees);
                if($resultat==0 || empty($donnees)){
                    $compte=null;
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver compte");
            }
            return $compte;
        }

        public function trouverParLogin($login){
            $bdd=null;
            $requete= null;
            $compte=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM compte WHERE adresseMail=?;');
                $resultat= $requete->execute(array($login));
                $donnees= $requete->fetch();
                $compte= $this->hydrateCompte($donnees);
                if($resultat==0 || empty($donnees)){
                    $compte=null;
                }
            }catch(PDOException $e){
                echo($e->getMessage());
                throw new DAOException(""+$e->getMessage());
            }
                return $compte;
        }

        public function listerComptes(){
            $bdd=null;
            $requete= null;
            $comptes=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM compte;');
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $comptes[]= $this->hydrateCompte($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister compte");
            }
            return $comptes;
        }

    }