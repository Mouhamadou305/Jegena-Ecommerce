<?php
    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/classes/Article.php');
    require_once('./../modele/managers/ArticleManager.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/dao/PanierDao.php');
    require_once('./../modele/managers/PanierManager.php');
    require_once('./../modele/classes/Panier.php');
    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/ContenirArticle.php');
    require_once('./../modele/dao/ContenirArticleDao.php');
    require_once('./../modele/classes/Entreprise.php');
    require_once('./../modele/dao/EntrepriseDao.php');
    require_once('./../modele/managers/ContactManager.php');

    if(!isset($_SESSION['compte']) || $_SESSION['compte']->getTypeUtilisateur()!='admin'){
        echo($_SESSION['compte']->getTypeUtilisateur());
        die("Vous n'êtes pas autorisés à accéder à cette page.");
    }

    $daoFactory= new DaoFactory();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();
    $entrepriseDao= $daoFactory->getEntrepriseDao();

    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();

    $contactManager= new ContactManager($entrepriseDao);
    $entreprise= $contactManager->trouverEntreprise();

    $panierManager= new PanierManager($panierDao, $articleDao, $contenirArticleDao);
    $imageDao= $daoFactory->getImageDao();
    $manager= new ArticleManager($articleDao, $categorieDao, null, null, null, $imageDao);

    $listeCategories= $manager->listerCategories();

    $listeArticles= $manager->lister32Articles();
    $listeCategories= $manager->listerCategories();
    $resultat= $manager->getResultat();

    require('./../vue/admin/adminCommandes.php');

