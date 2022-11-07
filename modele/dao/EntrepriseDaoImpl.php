<?php

    require_once('./../modele/classes/Entreprise.php');
    require_once('./../modele/dao/EntrepriseDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class EntrepriseDaoImpl implements EntrepriseDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFActory= $daoFactory;
        }

        private function hydrateEntreprise($donnees){
            $entreprise= new Entreprise();
            $entreprise->setNumeroTelephone1($donnees['numeroTelephone1']);
            $entreprise->setNumeroTelephone2($donnees['numeroTelephone2']);
            $entreprise->setNom($donnees['nom']);
            $entreprise->setAdresseMail($donnees['adresseMail']);
            $entreprise->setAdresse($donnees['adresse']);
            $entreprise->setTwitter($donnees['twitter']);
            $entreprise->setInstagram($donnees['instagram']);
            $entreprise->setFacebook($donnees['facebook']);
            $entreprise->setMailNotification($donnees['mailNotification']);
            $entreprise->setFraisLivraison($donnees['fraisLivraison']);
            return $entreprise;
        }

        public function ajouterEntreprise(Entreprise $entreprise){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFActory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO entreprise(numeroTelephone1, numeroTelephone2, nom, adresseMail, adresse, twitter, instagram, facebook, mailNotification, fraisLivraison) VALUES(?,?,?,?,?,?,?);');
                $resultat= $requete->execute(array($entreprise->getNumeroTelephone1(), $entreprise->getNumeroTelephone2(), $entreprise->getNom(), $entreprise->getAdresseMail(), $entreprise->getAdresse(), $entreprise->getTwitter(), $entreprise->getInstagram(), $entreprise->getFacebook(), $entreprise->getMailNotification(), $entreprise->getFraisLivraison()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de l'entreprise.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer entreprise");
            }
        }

        public function modifierEntreprise(Entreprise $entreprise, $nom){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFActory->getConnexion();
                $requete= $bdd->prepare('UPDATE entreprise SET numeroTelephone1=?, numeroTelephone2=?, adresseMail=?, adresse=?, twitter=?, instagram=?, facebook=?, nom=?, mailNotification=?, fraisLivraison=? WHERE nom=?;');
                $resultat= $requete->execute(array($entreprise->getNumeroTelephone1(), $entreprise->getNumeroTelephone2(), $entreprise->getAdresseMail(), $entreprise->getAdresse(), $entreprise->getTwitter(), $entreprise->getInstagram(), $entreprise->getFacebook(), $entreprise->getNom(), $entreprise->getMailNotification(), $entreprise->getFraisLivraison(), $nom));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de l'entreprise.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier entreprise".$e->getMessage());
            }
        }

        public function supprimerEntreprise($nom){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFActory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM entreprise WHERE nom=?;');
                $resultat= $requete->execute(array($nom));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de l'entreprise.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer entreprise");
            }
        }

        public function trouverEntreprise(){
            $bdd=null;
            $requete= null;
            $entreprise=null;
            try{
                $bdd= $this->daoFActory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM entreprise;');
                $requete->execute();
                $donnees= $requete->fetch();
                $entreprise= $this->hydrateEntreprise($donnees);
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver entreprise");
            }
            return $entreprise;
        }

    }