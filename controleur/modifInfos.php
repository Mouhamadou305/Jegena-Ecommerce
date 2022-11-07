<?php
    require_once('./../modele/classes/Compte.php');

    session_start();

    require_once('./../modele/classes/Categorie.php');
    require_once('./../modele/managers/ContactManager.php');
    require_once('./../modele/dao/DaoFactory.php');
    require_once('./../modele/dao/EntrepriseDao.php');
    require_once('./../modele/classes/Entreprise.php');

    if(!isset($_SESSION['compte']) || $_SESSION['compte']->getTypeUtilisateur()!='admin'){
        die("Vous n'êtes pas autorisés à accéder à cette page.");
    }

    $daoFactory= new DaoFactory();
    $entrepriseDao= $daoFactory->getEntrepriseDao();
    
    $manager= new ContactManager($entrepriseDao);
    $entreprise= $manager->trouverEntreprise();

    if(isset($_POST['action'])){
        $entreprise= $manager->modifierEntreprise();
    }
    $erreurs= $manager->getErreurs();
    $resultat= $manager->getResultat();

    require('./../vue/admin/modifInfos.php');

