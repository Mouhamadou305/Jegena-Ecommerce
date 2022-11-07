<?php

    require_once('./../modele/dao/CompteDao.php');
    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/managers/ConnexionManager.php');
    require_once('./../modele/managers/InscriptionManager.php');
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
    require_once('./../modele/classes/Entreprise.php');
    require_once('./../modele/dao/EntrepriseDao.php');
    require_once('./../modele/managers/ContactManager.php');



    $daoFactory= new DaoFactory();
    $compteDao= $daoFactory->getCompteDao();
    $articleDao= $daoFactory->getArticleDao();
    $categorieDao= $daoFactory->getCategorieDao();

    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $panierDao= $daoFactory->getPanierDao();

    $panierManager= new PanierManager($panierDao, $articleDao, $contenirArticleDao);

    $imageDao= $daoFactory->getImageDao();
    $manager= new ArticleManager($articleDao, $categorieDao, null, null, null, $imageDao);

    $listeCategories= $manager->listerCategories();

    $listeContenirArticles= $panierManager->listerArticlesDuPanier();
    $panier= $panierManager->trouverPanier();
    $entrepriseDao= $daoFactory->getEntrepriseDao();
    $contactManager= new ContactManager($entrepriseDao);
    $entreprise= $contactManager->trouverEntreprise();
    $mailNotification= $entreprise->getMailNotification();
    
    $compte= new Compte();
    if(isset($_POST['form'])){
        if($_POST['form']== 'inscription'){
            $manager= new InscriptionManager($compteDao, $panierDao);
            $compte= $manager->inscrireCompte($mailNotification);
            $resultat= $manager->getResultat();
            $erreurs= $manager->getErreurs();

            if(empty($erreurs)){
                require('./../vue/confirmation.php');
            }else{
                require('./../vue/login.php');
            }
        }elseif ($_POST['form']== 'connexion') {
            $manager= new ConnexionManager($compteDao);
            $compte= $manager->connecterCompte();
            $resultatLog= $manager->getResultat();
            $erreurs= $manager->getErreurs();
            if(empty($erreurs)){
                $_SESSION['compte']= $compte;
                if($compte->getTypeUtilisateur()=='client')
                    header('Location:accueil');
                elseif($compte->getTypeUtilisateur()=='admin')
                    header('Location:accueilAdmin');
            }else{
                require('./../vue/login.php');
            }
        }elseif ($_POST['form']== 'activation') {
            $manager= new InscriptionManager($compteDao, $panierDao);
            $compte= $manager->activerCompte();
            $resultat= $manager->getResultat();
            $erreurs= $manager->getErreurs();

            if(empty($erreurs)){
                header('Location:login?resultat='.$resultat);
            }else{
                require('./../vue/confirmation.php');
            }
        }else{
            require('./../vue/login.php');
        }
    }else{
        require('./../vue/login.php');
    }
    