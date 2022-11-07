<?php
    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/classes/Categorie.php');
    require_once('./../modele/managers/ArticleManager.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/Entreprise.php');
    require_once('./../modele/dao/EntrepriseDao.php');
    require_once('./../modele/managers/ContactManager.php');

    if(!isset($_SESSION['compte']) || $_SESSION['compte']->getTypeUtilisateur()!='admin'){
        die("Vous n'êtes pas autorisés à accéder à cette page.");
    }

    $daoFactory= new DaoFactory();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();
    $imageDao= $daoFactory->getImageDao();
    $manager= new ArticleManager($articleDao, $categorieDao, null, null, null, $imageDao);

    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();

    $listeCategories= $manager->listerCategories();
    $listeArticles= $manager->lister32Articles();
    $page=1;
    if(isset($_GET['categorie']))
        if($_GET['categorie']!=0)
            $listeArticles= $manager->lister32ArticlesParCategorie();

    $categorie= $manager->trouverCategorie();

    if(isset($_GET['page']))
        $page= $_GET['page'];
    else
        $page= 1;
    $nbrArticlesParPage= 32;
    $nbrArticles=$manager->compterArticles();

    if(isset($_GET['categorie']) && $_GET['categorie']!=0)
        $nbrArticles=$manager->compterArticlesCategorie();
    $nbrPages= intdiv($nbrArticles, $nbrArticlesParPage);
    if($nbrArticles%$nbrArticlesParPage!=0)
        $nbrPages++;
    
     $resultat= $manager->getResultat();

    require('./../vue/admin/adminArticles.php');

