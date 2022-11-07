<?php

    require_once('./../modele/dao/AdresseDaoImpl.php');
    require_once('./../modele/dao/ArticleDaoImpl.php');
    require_once('./../modele/dao/CommandeDaoImpl.php');
    require_once('./../modele/dao/CommanderArticleDaoImpl.php');
    require_once('./../modele/dao/CompteDaoImpl.php');
    require_once('./../modele/dao/ContenirArticleDaoImpl.php');
    require_once('./../modele/dao/EntrepriseDaoImpl.php');
    require_once('./../modele/dao/ImageDaoImpl.php');
    require_once('./../modele/dao/PanierDaoImpl.php');
    require_once('./../modele/dao/CategorieDaoImpl.php');
    require_once('./../modele/dao/CommentaireDao.php');
    require_once('./../modele/dao/CommentaireDaoImpl.php');

    
    class DaoFactory{

        public function getConnexion(){
            $db = new PDO('mysql:host=localhost;dbname=friperie', 'php', 'passer', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            return $db;
        }

        public function getCompteDao() {
            return new CompteDaoImpl($this);
        }

        public function getAdresseDao() {
            return new AdresseDaoImpl($this);
        }

        public function getArticleDao() {
            return new ArticleDaoImpl($this);
        }

        public function getCommandeDao() {
            return new CommandeDaoImpl($this);
        }

        public function getCommanderArticleDao() {
            return new CommanderArticleDaoImpl($this);
        }

        public function getContenirArticleDao() {
            return new ContenirArticleDaoImpl($this);
        }

        public function getEntrepriseDao() {
            return new EntrepriseDaoImpl($this);
        }

        public function getImageDao() {
            return new ImageDaoImpl($this);
        }

        public function getPanierDao() {
            return new PanierDaoImpl($this);
        }

        public function getCategorieDao() {
            return new CategorieDaoImpl($this);
        }
        
        public function getCommentaireDao() {
            return new CommentaireDaoImpl($this);
        }

    }
