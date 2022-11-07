<?php

    require_once('./../modele/classes/Commande.php');
    require_once('./../modele/classes/Adresse.php');
    require_once('./../modele/dao/AdresseDao.php');
    require_once('./../modele/dao/CommandeDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class CommandeDaoImpl implements CommandeDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateCommande($donnees){
            $commande= new Commande();
            $compteDao= $this->daoFactory->getCompteDao();
            $adresseDao= $this->daoFactory->getAdresseDao();
            $commande->setCompte($compteDao->trouverCompte($donnees['idClient']));
            $commande->setDateCommande(new DateTime($donnees['dateCommande']));
            $commande->setDateLivraison(new DateTime($donnees['dateLivraison']));
            $commande->setId($donnees['id']);
            $commande->setPaye((bool) $donnees['paye']);
            $commande->setStatut($donnees['statut']);
            $commande->setMethodePaiement($donnees['methodePaiement']);
            $commande->setAdresse($adresseDao->trouverAdresse($donnees['idAdresse']));
            $commande->setCout($donnees['cout']);
            return $commande;
        }

        public function ajouterCommande(Commande $commande){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO commande(idClient, dateCommande, paye, statut, methodePaiement, idAdresse, cout) VALUES(?,NOW(),?,?,?,?, ?);');
                $resultat= $requete->execute(array($commande->getCompte()->getId(), (bool)($commande->isPaye()), $commande->getStatut(), $commande->getMethodePaiement(), $commande->getAdresse()->getId(), $commande->getCout()));
                $commande->setId($bdd->lastInsertId());
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de la commande.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer commande");
            }
        }

        public function modifierCommande(Commande $commande){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE commande SET idClient=?, dateCommande=?, dateLivraison=NOW(), paye=?, statut=?, methodePaiement=?, idAdresse=?, cout=? WHERE id=?;');
                $resultat= $requete->execute(array($commande->getCompte()->getId(),$commande->getDateCommande()->format('Y-m-d H:i:s'), (bool)($commande->isPaye()), $commande->getStatut(), $commande->getMethodePaiement(), $commande->getAdresse()->getId(), $commande->getCout(), $commande->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de la commande.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier commande");
            }
        }

        public function supprimerCommande($id){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM commande WHERE id=?;');
                $resultat= $requete->execute(array($id));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de la commande.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer commande");
            }
        }

        public function trouverCommande($id){
            $bdd=null;
            $requete= null;
            $commande=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande WHERE id=?;');
                $requete->execute(array($id));
                $donnees= $requete->fetch();
                $commande= $this->hydrateCommande($donnees);
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver commande");
            }
            return $commande;
        }

        public function listerCommandes(){
            $bdd=null;
            $requete= null;
            $commandes=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande;');
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commandes[]= $this->hydrateCommande($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister commande");
            }
            return $commandes;
        }

        public function listerCommandesClient($idClient){
            $bdd=null;
            $requete= null;
            $commandes=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande WHERE idClient=?;');
                $requete->execute(array($idClient));
                while($donnees= $requete->fetch()){
                    $commandes[]= $this->hydrateCommande($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister commande");
            }
            return $commandes;
        }

        
        public function lister32Commandes($page){
            $bdd=null;
            $requete= null;
            $commandes=array();
            $nbrLignes= 32;
            $debut= (int)(($page-1)*$nbrLignes);

            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande ORDER BY dateCommande DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commandes[]= $this->hydrateCommande($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Commande");
            }
            return $commandes;
        }

        public function lister32CommandesParStatut($statut, $page){
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $commandes=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande WHERE statut= :statut ORDER BY dateCommande DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':statut', $statut);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commandes[]= $this->hydrateCommande($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $commandes;
        }

        public function lister32CommandesSelonAdresse($page){
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $commandes=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande LEFT JOIN adresse ON commande.idAdresse=adresse.id ORDER BY adresse.ville LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commandes[]= $this->hydrateCommande($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $commandes;
        }

        public function lister32CommandesParStatutSelonAdresse($statut, $page){
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $commandes=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande LEFT JOIN adresse ON commande.idAdresse=adresse.id WHERE commande.statut=:statut ORDER BY adresse.ville LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':statut', $statut);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commandes[]= $this->hydrateCommande($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $commandes;
        }

        public function lister32CommandesParAdresse($adresse, $page){
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $commandes=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande WHERE idAdresse IN (SELECT id FROM adresse WHERE ville= :adresse) ORDER BY dateCommande DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':adresse', $adresse);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commandes[]= $this->hydrateCommande($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $commandes;
        }

        public function lister32CommandesParAdresseEtStatut($adresse, $statut, $page){
            $bdd=null;
            $requete= null;
            $nbrLignes= 32;
            $commandes=array();
            $debut= (int)(($page-1)*$nbrLignes);
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commande WHERE idAdresse IN (SELECT id FROM adresse WHERE ville= :adresse) AND statut= :statut ORDER BY dateCommande DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':adresse', $adresse);
                $requete->bindParam(':statut', $statut);
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commandes[]= $this->hydrateCommande($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Article".$e->getMessage());
            }
            return $commandes;
        }

        public function compterCommandes(){
            $bdd=null;
            $requete= null;
            $commande=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(id) AS nombre FROM commande;');
                $requete->execute();
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Commande");
            }
            return $nombre;
        }

        public function compterCommandesPourStatut($statut){
            $bdd=null;
            $requete= null;
            $commande=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(id) AS nombre FROM commande WHERE statut=?;');
                $requete->execute(array($statut));
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Commande");
            }
            return $nombre;
        }

        public function compterCommandesPourAdresse($adresse){
            $bdd=null;
            $requete= null;
            $commande=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(id) AS nombre FROM commande WHERE idAdresse IN (SELECT id FROM adresse WHERE ville=?);');
                $requete->execute(array($adresse));
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Commande");
            }
            return $nombre;
        }

        public function compterCommandesPourAdresseEtStatut($adresse, $statut){
            $bdd=null;
            $requete= null;
            $commande=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(id) AS nombre FROM commande WHERE idAdresse IN (SELECT id FROM adresse WHERE ville=?) AND statut=?;');
                $requete->execute(array($adresse, $statut));
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Commande");
            }
            return $nombre;
        }

    }