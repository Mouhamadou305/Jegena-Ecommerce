<?php

    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/classes/Categorie.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/managers/ArticleManager.php');
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
    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();

    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();
    $entrepriseDao= $daoFactory->getEntrepriseDao();
    $contactManager= new ContactManager($entrepriseDao);
    $entreprise= $contactManager->trouverEntreprise();
    
    $panierManager= new PanierManager($panierDao, $articleDao, $contenirArticleDao);
    $imageDao= $daoFactory->getImageDao();
    $manager= new ArticleManager($articleDao, $categorieDao, null, null, null, $imageDao);

    $listeCategories= $manager->listerCategories();

    if(isset($_GET['action'])){
        if($_GET['action']=='add'){
            if(isset($_GET['article'])){
                $panierManager->ajouterArticleDansPanier();
            }
        }elseif ($_GET['action']=='remove') {
            if(isset($_GET['article'])){
                $panierManager->supprimerArticleDuPanier();
            }
            if(isset($_GET['lien'])){
                header('Location:'.$_GET['lien'].'?lien='.$_GET['lien']);
            }
        }elseif ($_GET['action']=='modifier') {
            $panierManager->supprimerArticlesDuPanier();
        }
    }
    if(isset($_POST['article']) && isset($_POST['nombre'])){
        $panierManager->modifierArticleDansPanier();
    }


    $listeContenirArticles= $panierManager->listerArticlesDuPanier();
    $panier= $panierManager->trouverPanier();

    require('./../vue/cart.php');