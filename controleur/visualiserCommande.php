<?php

    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/managers/ArticleManager.php');
    require_once('./../modele/dao/PanierDao.php');
    require_once('./../modele/managers/PanierManager.php');
    require_once('./../modele/classes/Panier.php');
    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/ContenirArticle.php');
    require_once('./../modele/dao/ContenirArticleDao.php');

    require_once('./../modele/classes/Commande.php');
    require_once('./../modele/classes/CommanderArticle.php');
    require_once('./../modele/managers/ParametrageManager.php');
    require_once('./../modele/managers/CommandeManager.php');
    require_once('./../modele/dao/AdresseDao.php');
    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/classes/Adresse.php');
    require_once('./../modele/dao/CommandeDao.php');
    require_once('./../modele/dao/CommanderArticleDao.php');

    $fraisLivraison= 1500;

    $daoFactory= new DaoFactory();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();
    $adresseDao= $daoFactory->getAdresseDao();
    $compteDao= $daoFactory->getCompteDao();
    $commandeDao= $daoFactory->getCommandeDao();
    $commanderArticleDao= $daoFactory->getCommanderArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();

    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();
    $imageDao= $daoFactory->getImageDao();
    $manager= new ArticleManager($articleDao, $categorieDao, null, null, null, $imageDao);
    $commandeManager= new CommandeManager($commandeDao, $commanderArticleDao, $articleDao, $adresseDao, $contenirArticleDao, $compteDao, $panierDao, $fraisLivraison);

    if(isset($_GET['id'])){
        $listeArticles= $commandeManager->listerArticlesDeCommandePourAdmin();
        require('./../vue/admin/visualiserCommande.php');
    }
    