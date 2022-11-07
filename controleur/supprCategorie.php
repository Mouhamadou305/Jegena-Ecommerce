<?php
    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/classes/Categorie.php');
    require_once('./../modele/managers/CommandeManager.php');
    require_once('./../modele/managers/ArticleManager.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/dao/CommandeDao.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/Commande.php');

    if(!isset($_SESSION['compte']) || $_SESSION['compte']->getTypeUtilisateur()!='admin'){
        die("Vous n'êtes pas autorisés à accéder à cette page.");
    }

    $daoFactory= new DaoFactory();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();
    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $commanderArticleDao= $daoFactory->getCommanderArticleDao();
    $panierDao= $daoFactory->getPanierDao();
    $imageDao= $daoFactory->getImageDao();
    
    $manager= new ArticleManager($articleDao, $categorieDao, $contenirArticleDao, $commanderArticleDao, $panierDao, $imageDao);

    if(isset($_POST['id'])){
        $manager->supprimerCategorie();
    }
 
    $resultat= $manager->getResultat();

    header('Location:adminCategories?resultat='.$resultat);

