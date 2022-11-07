<?php

    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/dao/AdresseDao.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/managers/ParametrageManager.php');
    require_once('./../modele/managers/ArticleManager.php');
    require_once('./../modele/dao/PanierDao.php');
    require_once('./../modele/managers/PanierManager.php');
    require_once('./../modele/classes/Panier.php');
    require_once('./../modele/classes/Adresse.php');
    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/ContenirArticle.php');
    require_once('./../modele/dao/ContenirArticleDao.php');
    require_once('./../modele/classes/Entreprise.php');
    require_once('./../modele/dao/EntrepriseDao.php');
    require_once('./../modele/managers/ContactManager.php');

    $daoFactory= new DaoFactory();
    $compteDao= $daoFactory->getCompteDao();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();
    $adresseDao= $daoFactory->getAdresseDao();

    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();

    $panierManager= new PanierManager($panierDao, $articleDao, $contenirArticleDao);

    $imageDao= $daoFactory->getImageDao();
    $manager= new ArticleManager($articleDao, $categorieDao, null, null, null, $imageDao);
    $listeCategories= $manager->listerCategories();
    $entrepriseDao= $daoFactory->getEntrepriseDao();
    $contactManager= new ContactManager($entrepriseDao);
    $entreprise= $contactManager->trouverEntreprise();
    
    $contactManager= new ContactManager($entrepriseDao);
    $entreprise= $contactManager->trouverEntreprise();
    
    $listeContenirArticles= $panierManager->listerArticlesDuPanier();
    $panier= $panierManager->trouverPanier();
    $parametrageManager= new ParametrageManager($compteDao, $adresseDao);
    $adresse= new Adresse();    
    if(isset($_SESSION['compte']) && isset($_GET['id']))
        $adresse= $parametrageManager->trouverAdresse();

    require('./../vue/modifierAdresse.php');