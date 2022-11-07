<?php

    require_once('./../modele/classes/Image.php');
    require_once('./../modele/dao/ImageDao.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/DAOException.php');

    class ImageDaoImpl implements ImageDao{

        private $daoFactory;
        
        function __construct(DaoFactory $daoFactory){
            $this->daoFactory= $daoFactory;
        }

        private function hydrateImage($donnees){
            $image= new Image();
            $articleDao= $this->daoFactory->getArticleDao();
            $image->setNom($donnees['nom']);
            $image->setEmplacement($donnees['emplacement']);
            $image->setId($donnees['id']);
            $image->setArticle($articleDao->trouverArticle($donnees['idArticle']));
            return $image;
        }

        public function ajouterImage(Image $image){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('INSERT INTO image(nom, emplacement, idArticle) VALUES(?,?,?);');
                $resultat= $requete->execute(array($image->getNom(), $image->getEmplacement(), $image->getArticle()->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de l'insertion de l'image.");
                }
                $image->setId($bdd->lastInsertId());
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL insérer image".$e->getMessage());
            }
        }

        public function modifierImage(Image $image){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('UPDATE image SET nom=?, emplacement=?, idArticle=? WHERE id=?;');
                $resultat= $requete->execute(array($image->getNom(), $image->getEmplacement(), $image->getArticle()->getId(), $image->getId()));
                if($resultat==0) {
                    throw new DAOException("Echec de la modification de l'image.");
                }
                $image->setId($bdd->lastInsertId());
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL modifier image");
            }
        }

        public function supprimerImage($id){
            $bdd=null;
            $requete= null;
            $resultat=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('DELETE FROM image WHERE id=?;');
                $resultat= $requete->execute(array($id));
                if($resultat==0) {
                    throw new DAOException("Echec de la suppression de l'image.");
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL supprimer image");
            }
        }

        public function trouverImage($id){
            $bdd=null;
            $requete= null;
            $image=null;
            try{
                $bdd= $this->daoFactory->getConnexion();
                $requete= $bdd->prepare('SELECT * FROM image WHERE idArticle=?;');
                $resultat= $requete->execute(array($id));
                $donnees= $requete->fetch();
                $image= $this->hydrateImage($donnees);
                if($resultat==0 || empty($donnees) || $donnees=false){
                    return null;
                }
            }catch(PDOException $e){
                throw new DAOException("Erreur interne du serveur. SQL trouver image");
            }
            return $image;
        }

    }