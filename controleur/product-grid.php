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

    $daoFactory= new DaoFactory();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();
    $imageDao= $daoFactory->getImageDao();

    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();

    $panierManager= new PanierManager($panierDao, $articleDao, $contenirArticleDao);

    $manager= new ArticleManager($articleDao, $categorieDao, null, null , null, $imageDao);
    $listeArticles;
    $nbrArticles;
    $entrepriseDao= $daoFactory->getEntrepriseDao();
    $contactManager= new ContactManager($entrepriseDao);
    $entreprise= $contactManager->trouverEntreprise();
    
    if(isset($_GET['categorie'])){
        $listeArticles= $manager->lister32ArticlesRestantParCategorie();
        $nbrArticles=$manager->compterArticlesRestantCategorie();
    }
    elseif(isset($_GET['motCle'])){
        $listeArticles= $manager->lister32ArticlesParMotCle();
        $nbrArticles=$manager->compterArticlesMotCle();
    }
    else{
        $listeArticles= $manager->lister32ArticlesRestant();
        $nbrArticles=$manager->compterArticlesRestant();
    }

    $listeCategories= $manager->listerCategories();
    $categorie= $manager->trouverCategorie();
    $resultat= $manager->getResultat();
    if(isset($_GET['page']))
        $page= $_GET['page'];
    else
        $page= 1;
    $nbrArticlesParPage= 32;
    $nbrPages= intdiv($nbrArticles, $nbrArticlesParPage);
    if($nbrArticles%$nbrArticlesParPage!=0)
        $nbrPages++;
    
    $listeContenirArticles= $panierManager->listerArticlesDuPanier();
    $panier= $panierManager->trouverPanier();

    require('./../vue/product-grid.php');