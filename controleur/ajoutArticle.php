<?php
    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/classes/Categorie.php');
    require_once('./../modele/managers/ArticleManager.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/classes/Article.php');

    if(!isset($_SESSION['compte']) || $_SESSION['compte']->getTypeUtilisateur()!='admin'){
        die("Vous n'êtes pas autorisés à accéder à cette page.");
    }

    $daoFactory= new DaoFactory();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();
    $imageDao= $daoFactory->getImageDao();

    $manager= new ArticleManager($articleDao, $categorieDao,null, null, null, $imageDao);

    $listeCategories= $manager->listerCategories();
    $article= new Article();
    if(isset($_POST['action']))
        $article= $manager->ajouterArticle();
    $erreurs= $manager->getErreurs();
    $resultat= $manager->getResultat();

    require('./../vue/admin/ajoutArticle.php');

