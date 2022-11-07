<?php

    require_once('./../modele/classes/Commentaire.php');
    require_once('./../modele/dao/CommentaireDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class CommentaireDaoImpl implements CommentaireDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateCommentaire($donnees){
            $commentaire= new Commentaire();
            $compteDao= $this->daoFactory->getCompteDao();
            $commentaire->setCompte($compteDao->trouverCompte($donnees['idCompte']));
            $commentaire->setDescription($donnees['description']);
            $commentaire->setDateCommentaire( new DateTime($donnees['dateCommentaire']));
            $commentaire->setId($donnees['id']);
            return $commentaire;
        }

        public function ajouterCommentaire(Commentaire $commentaire){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO commentaire(description, idCompte, dateCommentaire) VALUES(?,?, NOW());');
                $resultat= $requete->execute(array($commentaire->getDescription(), $commentaire->getCompte()->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion du commentaire.");
                }
                $commentaire->setId($bdd->lastInsertId());
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer commentaire");
            }
        }

        public function modifierCommentaire(Commentaire $commentaire){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE commentaire SET description=?, idCompte=?, dateCommentaire= NOW() WHERE id=?;');
                $resultat= $requete->execute(array($commentaire->getDescription(), $commentaire->getCompte()->getId(), $commentaire->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification du commentaire.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier commentaire");
            }
        }

        public function supprimerCommentaire($id){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM commentaire WHERE id=?;');
                $resultat= $requete->execute(array($id));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression du commentaire.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer commentaire");
            }
        }

        public function trouverCommentaire($id){
            $bdd=null;
            $requete= null;
            $commentaire=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commentaire WHERE id=?;');
                $requete->execute(array($id));
                $donnees= $requete->fetch();
                if(!isset($donnees) || $donnees==false)
                    $commentaire= null;
                else
                    $commentaire= $this->hydrateCommentaire($donnees);
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver commentaire");
            }
            return $commentaire;
        }

        public function listerCommentaires(){
            $bdd=null;
            $requete= null;
            $commentaires=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commentaire;');
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commentaires[]= $this->hydrateCommentaire($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister commentaires");
            }
            return $commentaires;
        }

        public function lister10Commentaires(){
            $bdd=null;
            $requete= null;
            $commentaires=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commentaire ORDER BY dateCommentaire DESC LIMIT 0, 10;');
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commentaires[]= $this->hydrateCommentaire($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister commentaires");
            }
            return $commentaires;
        }

        public function listerCommentairesCompte($idCompte){
            $bdd=null;
            $requete= null;
            $commentaires=array();
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commentaire WHERE idCompte=?;');
                $requete->execute(array($idCompte));
                while($donnees= $requete->fetch()){
                    $commentaires[]= $this->hydrateCommentaire($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister commentaires compte");
            }
            return $commentaires;
        }

        public function lister40Commentaires($page){
            $bdd=null;
            $requete= null;
            $commentaires=array();
            $nbrLignes= 40;
            $debut= (int)(($page-1)*$nbrLignes);

            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM commentaire ORDER BY dateCommentaire DESC LIMIT :debut, :nbrLignes;');
                $requete->bindParam(':debut', $debut, PDO::PARAM_INT);
                $requete->bindParam(':nbrLignes', $nbrLignes, PDO::PARAM_INT);
                $requete->execute();
                while($donnees= $requete->fetch()){
                    $commentaires[]= $this->hydrateCommentaire($donnees);
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL lister Commentaire");
            }
            return $commentaires;
        }

        public function compterCommentaires(){
            $bdd=null;
            $requete= null;
            $commentaire=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT COUNT(id) AS nombre FROM commentaire;');
                $requete->execute();
                $donnees= $requete->fetch();
                $nombre= (int) $donnees['nombre'];
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver Commentaire");
            }
            return $nombre;
        }

    }