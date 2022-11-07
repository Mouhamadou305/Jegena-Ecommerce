<?php
    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/Entreprise.php');
    require_once('./../modele/dao/EntrepriseDao.php');
    require_once('./../modele/managers/ContactManager.php');
    require_once('./../modele/managers/ArticleManager.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/ArticleDao.php');
    require_once('./../modele/dao/CategorieDao.php');
    require_once('./../modele/dao/PanierDao.php');
    require_once('./../modele/managers/PanierManager.php');
    require_once('./../modele/managers/CommentaireManager.php');
    require_once('./../modele/classes/Panier.php');
    require_once('./../modele/classes/Article.php');
    require_once('./../modele/classes/ContenirArticle.php');
    require_once('./../modele/dao/ContenirArticleDao.php');


    $daoFactory= new DaoFactory();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();

    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();
    $entrepriseDao= $daoFactory->getEntrepriseDao();
    $compteDao= $daoFactory->getCompteDao();
    $commentaireDao= $daoFactory->getCommentaireDao();
    $contactManager= new ContactManager($entrepriseDao);
    $entreprise= $contactManager->trouverEntreprise();
    $panierManager= new PanierManager($panierDao, $articleDao, $contenirArticleDao);
    $commentaireManager= new CommentaireManager($compteDao, $commentaireDao);

    $imageDao= $daoFactory->getImageDao();
    $manager= new ArticleManager($articleDao, $categorieDao, null, null, null, $imageDao);

    $listeCategories= $manager->listerCategories();

    $listeArticles= $manager->lister12Articles();
    $listeArticlesCoupDeCoeur= $manager->lister12ArticlesCoupDeCoeur();

    if(isset($_POST['commentaire'])){
        $commentaireManager->ajouterCommentaire();
    }

    $listeCommentaires= $commentaireManager->lister10Commentaires();
    $listeCategories= $manager->listerCategories();
    $resultat= $manager->getResultat();

    $listeContenirArticles= $panierManager->listerArticlesDuPanier();
    $panier= $panierManager->trouverPanier();

    require('./../vue/index.php');

