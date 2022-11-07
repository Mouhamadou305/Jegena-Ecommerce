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
    
    $listeContenirArticles= $panierManager->listerArticlesDuPanier();
    $panier= $panierManager->trouverPanier();
    $parametrageManager= new ParametrageManager($compteDao, $adresseDao);
    $compte= new Compte();
    $listeAdresses="";
    $adresse= new Adresse();
    if(isset($_SESSION['compte'])){
        $compte= $_SESSION['compte'];
    }
    
    if(isset($_POST['form'])){
        if($_POST['form']== 'informations'){
            
            $compte= $parametrageManager->changerInformationsCompte();
            $resultat= $parametrageManager->getResultat();
            $erreurs= $parametrageManager->getErreurs();
        }elseif ($_POST['form']== 'motDePasse') {
            
            $parametrageManager->changerMotDePasseCompte();
            $resultatMdp= $parametrageManager->getResultat();
            $erreurs= $parametrageManager->getErreurs();
        }elseif($_POST['form']== 'adresse'){
            if(isset($_POST['action'])){
                if($_POST['action']=='ajouter'){
                    
                    $adresse= $parametrageManager->ajouterAdresse();
                    $resultatAjoutAdr= $parametrageManager->getResultat();
                    $erreurs= $parametrageManager->getErreurs();
                }elseif ($_POST['action']=='modifier') {
                    
                    $adresse= $parametrageManager->modifierAdresse();
                    $resultatModAdr= $parametrageManager->getResultat();
                    $erreurs= $parametrageManager->getErreurs();
                    if(empty($erreurs)){
                        $listeAdresses= $parametrageManager->listerAdressesCompte();
                        require_once('./../vue/parametrage.php');
                    }else {
                        $listeAdresses= $parametrageManager->listerAdressesCompte();
                        require_once('./../vue/modifierAdresse.php');
                    }
                }elseif ($_POST['action']=='supprimer') {
                    
                    $parametrageManager->supprimerAdresse();
                    $resultatSupprAdr= $parametrageManager->getResultat();
                    $erreurs= $parametrageManager->getErreurs();
                }
            }
        }
    }

    if(isset($_SESSION['compte'])){
        $listeAdresses= $parametrageManager->listerAdressesCompte();
    }
    
    require_once('./../vue/parametrage.php');
    