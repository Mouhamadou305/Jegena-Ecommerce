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
    $commandeDao= $daoFactory->getCommandeDao();
    $commanderArticleDao= $daoFactory->getCommanderArticleDao();
    $adresseDao= $daoFactory->getAdresseDao();
    $contenirArticleDao= $daoFactory->getContenirArticleDao();
    $compteDao= $daoFactory->getCompteDao();
    $panierDao= $daoFactory->getPanierDao();
    $fraisLivraison= 1500;

    $manager= new CommandeManager($commandeDao, $commanderArticleDao, $articleDao, $adresseDao, $contenirArticleDao, $compteDao, $panierDao, $fraisLivraison);

    $listeCommandes= $manager->lister32Commandes();
    print_r($listeCommandes);
    $page=1;
    $statut="tout";
    if(isset($_GET['statut']))
        if($_GET['statut']!='tout' && (!isset($_GET['adresse']) || $_GET['adresse']=='tout')){
            $listeCommandes= $manager->lister32CommandesParStatut();
            $statut=$_GET['statut'];
            if(isset($_GET['adresse']))
                $adresse= $_GET['adresse'];
        }

    if(isset($_GET['adresse']))
        if($_GET['adresse']!='tout' && (!isset($_GET['statut']) || $_GET['statut']=='tout')){
            $listeCommandes= $manager->lister32CommandesParAdresse();
            $adresse=$_GET['adresse'];
            if(isset($_GET['statut']))
                $statut= $_GET['statut'];
        }

    if(isset($_GET['adresse']) && isset($_GET['statut']))
        if($_GET['adresse']!='tout' && $_GET['statut']!='tout'){
            $listeCommandes= $manager->lister32CommandesParAdresseEtStatut();
            $adresse=$_GET['adresse'];
            $statut=$_GET['statut'];
        }     
    

    if(isset($_GET['page']))
        $page= $_GET['page'];
    else
        $page= 1;
    $nbrArticlesParPage= 32;
    $nbrArticles=$manager->compterCommandes();

    if(isset($_GET['statut']) && $_GET['statut']!='tout' && isset($_GET['adresse']) && $_GET['adresse']!='tout')
        $nbrArticles=$manager->compterCommandesPourAdresseEtStatut();
    elseif(isset($_GET['statut']) && $_GET['statut']!='tout')
        $nbrArticles=$manager->compterCommandesPourStatut();
    elseif(isset($_GET['adresse']) && $_GET['adresse']!='tout')
        $nbrArticles=$manager->compterCommandesPourAdresse();
    $nbrPages= intdiv($nbrArticles, $nbrArticlesParPage);
    if($nbrArticles%$nbrArticlesParPage!=0)
        $nbrPages++;
    
     $resultat= $manager->getResultat();

    require('./../vue/admin/adminCommandes.php');

