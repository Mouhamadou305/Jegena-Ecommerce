<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Checkout || Asbab - eCommerce HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="vue/images/favicon.ico">
    <link rel="apple-touch-icon" href="vue/apple-touch-icon.png">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="vue/css/bootstrap.min.css">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="vue/css/owl.carousel.min.css">
    <link rel="stylesheet" href="vue/css/owl.theme.default.min.css">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="vue/css/core.css">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="vue/css/shortcode/shortcodes.css">
    <!-- Theme main style -->
    <link rel="stylesheet" href="vue/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="vue/css/responsive.css">
    <!-- User style -->
    <link rel="stylesheet" href="vue/css/custom.css">


    <!-- Modernizr JS -->
    <script src="vue/js/vendor/modernizr-3.5.0.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="accueil" style='font-size:25px;'>JEGENA</a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <?if(isset($_SESSION['compte']) && $_SESSION['compte']->getTypeUtilisateur()=='admin'){?><li class="drop"><a href="accueilAdmin">Administration</a></li><?}?>
                                        <li class="drop"><a href="#">Tout</a>
                                            <ul class="dropdown">
                                                <li><a href="product-grid">Liste de tous les produits</a></li>
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Halieutiques</a>
                                            <ul class="dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <?if(isset($listeCategories) && !empty($listeCategories)){
                                                    foreach ($listeCategories as $categ) {
                                                        if($categ->getGenre()=="Halieutiques" ){?>
                                                            <li><a href="product-grid?categorie=<?=htmlspecialchars($categ->getId())?>"><?=htmlspecialchars($categ->getNom())?></a></li>
                                                        <?}
                                                    }
                                                }?>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Epices</a>
                                            <ul class="dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <?if(isset($listeCategories) && !empty($listeCategories)){
                                                    foreach ($listeCategories as $categ) {
                                                        if($categ->getGenre()=="Epices" ){?>
                                                            <li><a href="product-grid?categorie=<?=htmlspecialchars($categ->getId())?>"><?=htmlspecialchars($categ->getNom())?></a></li>
                                                        <?}
                                                    }
                                                }?>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Huiles</a>
                                            <ul class="dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <?if(isset($listeCategories) && !empty($listeCategories)){
                                                    foreach ($listeCategories as $categ) {
                                                        if($categ->getGenre()=="Huiles" ){?>
                                                            <li><a href="product-grid?categorie=<?=htmlspecialchars($categ->getId())?>"><?=htmlspecialchars($categ->getNom())?></a></li>
                                                        <?}
                                                    }
                                                }?>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Boissons</a>
                                            <ul class="dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <?if(isset($listeCategories) && !empty($listeCategories)){
                                                    foreach ($listeCategories as $categ) {
                                                        if($categ->getGenre()=="Boissons" ){?>
                                                            <li><a href="product-grid?categorie=<?=htmlspecialchars($categ->getId())?>"><?=htmlspecialchars($categ->getNom())?></a></li>
                                                        <?}
                                                    }
                                                }?>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Apéritifs</a>
                                            <ul class="dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <?if(isset($listeCategories) && !empty($listeCategories)){
                                                    foreach ($listeCategories as $categ) {
                                                        if($categ->getGenre()=="Apéritifs" ){?>
                                                            <li><a href="product-grid?categorie=<?=htmlspecialchars($categ->getId())?>"><?=htmlspecialchars($categ->getNom())?></a></li>
                                                        <?}
                                                    }
                                                }?>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Habits</a>
                                            <ul class="dropdown">
                                                <!-- Start Single Mega MEnu -->
                                                <?if(isset($listeCategories) && !empty($listeCategories)){
                                                    foreach ($listeCategories as $categ) {
                                                        if($categ->getGenre()=="Habits" ){?>
                                                            <li><a href="product-grid?categorie=<?=htmlspecialchars($categ->getId())?>"><?=htmlspecialchars($categ->getNom())?></a></li>
                                                        <?}
                                                    }
                                                }?>
                                                <!-- End Single Mega MEnu -->
                                            </ul>
                                        </li>
                                        <li class="drop"><a href="#">Pages</a>
                                            <ul class="dropdown">
                                                <li><a href="<?= isset($_SESSION['compte'])?'cart':'#' ?>">Mon panier</a></li>
                                                <li><a href="<?= isset($_SESSION['compte'])?'checkout':'#' ?>">Commander</a></li>
                                                <li><a href="contact">Contact</a></li>
                                                <li><a href="product-grid">Liste de tous les produits</a></li>
                                                <li><a href="<?= isset($_SESSION['compte'])?'historiqueCommandes':'#' ?>">Mes commandes</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="accueil">Accueil</a></li>
                                            <?if(isset($_SESSION['compte']) && $_SESSION['compte']->getTypeUtilisateur()=='admin'){?><li><a href="accueilAdmin">Administration</a></li><?}?>
                                            <li><a href="#">pages</a>
                                                <ul>
                                                    <li><a href="<?= isset($_SESSION['compte'])?'cart':'#' ?>">Mon panier</a></li>
                                                    <li><a href="<?= isset($_SESSION['compte'])?'checkout':'#' ?>">Commander</a></li>
                                                    <li><a href="contact">contact</a></li>
                                                    <li><a href="product-grid">Liste de tous les produits</a></li>
                                                    <li><a href="<?= isset($_SESSION['compte'])?'historiqueCommandes':'#' ?>">Mes commandes</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact">contact</a></li>
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                        <ul class="">
                                            <li class="<?=isset($_SESSION['compte'])?'dropdown':''?>">
                                            <a href="<?= isset($_SESSION['compte'])?'#':'login'?>" class="<?=isset($_SESSION['compte'])?'dropdown-toggle':''?>" data-toggle="<?=isset($_SESSION['compte'])?'dropdown':''?>" > <i class="<?= isset($_SESSION['compte'])?'icon-user icons':'icon-login icons'?>"></i></a>
                                               <?= isset($_SESSION['compte'])?'
                                                    <ul class="dropdown-menu">
                                                        <li><a href="parametrage"><i class="icon-wrench icon"></i> &nbsp; <small>Paramètres</small></a></li>
                                                        <li><a href="parametrage"><i class="icon-lock icons"></i> &nbsp; <small>Mot de passe</small></a></li>
                                                        <li><a href="deconnexion"><i class="icon-logout icons"></i> &nbsp; <small>Déconnexion</small></a></li>
                                                    </ul>':
                                                    ''
                                                ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="htc__shopping__cart">
                                        <a class="<?= isset($_SESSION['compte'])?'cart__menu':'' ?>" href="<?= isset($_SESSION['compte'])?'#':'login'?>"><i class="icon-handbag icons"></i></a>
                                        <a class="<?= isset($_SESSION['compte'])?'cart__menu':'' ?>" href="<?= isset($_SESSION['compte'])?'#':'login'?>"><span class="htc__qua"><?=isset($_SESSION['compte'])? htmlspecialchars($panier->getNombreArticles()):0 ?></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->
        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
            <!-- Start Search Popap -->
            <div class="search__area">
                <div class="container" >
                    <div class="row" >
                        <div class="col-md-12" >
                            <div class="search__inner">
                                <form action="product-grid" method="get">
                                    <input placeholder="Recherchez un article... " type="text" name="motCle" value=<?=isset($_GET['motCle'])?htmlspecialchars($_GET['motCle']):''?>>
                                    <button type="submit"></button>
                                </form>
                                <div class="search__close__btn">
                                    <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Popap -->
            <!-- Start Cart Panel -->
            <div class="shopping__cart <?=isset($_GET['lien'])?'shopping__cart__on':'' ?>">
                <div class="shopping__cart__inner">
                    <div class="offsetmenu__close__btn">
                        <a href="#"><i class="zmdi zmdi-close"></i></a>
                    </div>
                    <div class="shp__cart__wrap">
                        <?if(isset($listeContenirArticles) && !empty($listeContenirArticles)){
                            foreach ($listeContenirArticles as $contenirArticle) {?>
                                <div class="shp__single__product">
                                    <div class="shp__pro__thumb">
                                        <a href="product-details?article=<?=htmlspecialchars($contenirArticle->getArticle()->getId())?>">
                                            <img src=<?=$manager->trouverImage($contenirArticle->getArticle())!==null && $manager->trouverImage($contenirArticle->getArticle())->getEmplacement()!==null?htmlspecialchars($manager->trouverImage($contenirArticle->getArticle())->getEmplacement()):"vue/images/product-2/sm-smg/1.jpg"?> alt="product images">
                                        </a>
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2><a href="product-details?article=<?=htmlspecialchars($contenirArticle->getArticle()->getId())?>"><?=htmlspecialchars($contenirArticle->getArticle()->getNom())?></a></h2>
                                        <span class="quantity">Quantité: <?=htmlspecialchars($contenirArticle->getNombreArticles())?></span>
                                        <span class="shp__price"><?=$contenirArticle->getArticle()->isSolde()? htmlspecialchars($contenirArticle->getArticle()->getPrix() - $contenirArticle->getArticle()->getPrix()*($contenirArticle->getArticle()->getPourcentageSolde()/100)):htmlspecialchars($contenirArticle->getArticle()->getPrix())?> FCFA</span>
                                    </div>
                                    <div class="remove__btn">
                                        <a href="cart?lien=checkout&amp;action=remove&article=<?=htmlspecialchars($contenirArticle->getArticle()->getId()) ?>" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                                    </div>
                                </div>
                            <?}
                        }?>
                    </div>
                    <ul class="shoping__total">
                        <li class="subtotal">Sous-total:</li>
                        <li class="total__price"><?=htmlspecialchars($panier->getPrixTotalSansFrais()) ?> FCFA</li>
                    </ul>
                    <ul class="shopping__btn">
                        <li><a href="<?= isset($_SESSION['compte'])?'cart':'#' ?>">Voir Panier</a></li>
                        <li class="shp__checkout"><a href="<?= isset($_SESSION['compte'])?'checkout':'#' ?>">Commander</a></li>
                    </ul>
                </div>
            </div>
            <!-- End Cart Panel -->
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <div class="ht__bradcaump__wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="bradcaump__inner">
                                <nav class="bradcaump-inner">
                                  <a class="breadcrumb-item" href="accueil">Accueil</a>
                                  <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                  <span class="breadcrumb-item active">Commander</span>
                                </nav>
                            </div>
                            <br/>
                            <br/>
                            <div class="row">
                                <h2 class='title_line <?=!isset($erreurs)?'text-success':'text-danger' ?>'><?=isset($resultat)? htmlspecialchars($resultat):'' ?></h2>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="checkout-wrap ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="checkout__inner">
                            <form action='checkout' method='post' name='commander'>
                                <div class="accordion-list">
                                    <div class="accordion">
                                        <div class="accordion__title">
                                            Adresse
                                        </div>
                                        <div class="accordion__body">
                                            <div class="bilinfo">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input id='ajouter' type="radio" name="adresse" value="ajouter" <?=isset($_POST['adresse']) && $_POST['adresse']=='ajouter' ?'checked="checked"':'' ?> <?=!isset($_POST['adresse']) ?'checked="checked"':'' ?>/><label for="ajouter"> Nouvelle Adresse</label><br/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input id='selectionner' type="radio" name="adresse" value="selectionner" <?=isset($_POST['adresse']) && $_POST['adresse']=='selectionner' ?'checked="checked"':'' ?>><label for="selectionner"> Sélectionner une adresse</label><br/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="ajouter" class="row">
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <select name="region" id="region">
                                                                <option value="Dakar" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Dakar'!=$commande->getAdresse()->getRegion()?'selected="selected"':'' ?> >Dakar</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <select name="ville" id="ville" style="width:100%">
                                                                <option value="" <?=!isset($commande) || $commande->getAdresse()==null || $commande->getAdresse()->getVille()==null || ''==$commande->getAdresse()->getVille()?'selected="selected"':'' ?> >Sélectionner</option>
                                                                <option value="Amitie 1" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Amitie 1'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Amitie 1</option>
                                                                <option value="Amitie 2" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Amitie 2'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Amitie 2</option>
                                                                <option value="Amitie 3" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Amitie 3'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Amitie 3</option>
                                                                <option value="Bargny" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Bargny'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Bargny</option>
                                                                <option value="Bel Air" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Bel Air'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Bel Air</option>
                                                                <option value="Bop" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Bop'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Bop</option>
                                                                <option value="Camberene" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Camberene'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Camberene</option>
                                                                <option value="Castor" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Castor'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Castor</option>
                                                                <option value="Centenaire" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Centenaire'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Centenaire</option>
                                                                <option value="Cite Keur Damel" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Cite Keur Damel'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Cite Keur Damel</option>
                                                                <option value="Cite Keur Gorgui" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Cite Keur Gorgui'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Cite Keur Gorgui</option>
                                                                <option value="Colobane" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Colobane'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Colobane</option>
                                                                <option value="Dalifort" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Dalifort'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Dalifort</option>
                                                                <option value="Derkle" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Derkle'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Derkle</option>
                                                                <option value="Diamagueune" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Diamagueune'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Diamagueune</option>
                                                                <option value="Diamalaye" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Diamalaye'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Diamalaye</option>
                                                                <option value="Dieuppeul" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Dieuppeul'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Dieuppeul</option>
                                                                <option value="Fann" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Fann'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Fann</option>
                                                                <option value="Fann Hock" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Fann Hock'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Fann Hock</option>
                                                                <option value="Fann Residence" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Fann Residence'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Fann Residence</option>
                                                                <option value="Fass" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Fass'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Fass</option>
                                                                <option value="Fass Paillote" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Fass Paillote'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Fass Paillote</option>
                                                                <option value="Fenetre Mermoz" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Fenetre Mermoz'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Fenetre Mermoz</option>
                                                                <option value="Golf" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Golf'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Golf</option>
                                                                <option value="Grand Dakar" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Grand Dakar'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Grand Dakar</option>
                                                                <option value="Grand Mbao" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Grand Mbao'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Grand Mbao</option>
                                                                <option value="Grand Medine" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Grand Medine'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Grand Medine</option>
                                                                <option value="Grand Yoff" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Grand Yoff'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Grand Yoff</option>
                                                                <option value="Guediawaye" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Guediawaye'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Guediawaye</option>
                                                                <option value="Guediawaye - Cite Gadaye" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Guediawaye - Cite Gadaye'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Guediawaye - Cite Gadaye</option>
                                                                <option value="Guediawaye - P.A.I" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Guediawaye - P.A.I'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Guediawaye - P.A.I</option>
                                                                <option value="Gueule Tapee" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Gueule Tapee'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Gueule Tapee</option>
                                                                <option value="H.L.M (1-2-3-4-5-6)" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'H.L.M (1-2-3-4-5-6)'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>H.L.M (1-2-3-4-5-6)</option>
                                                                <option value="H.L.M Patte d'Oie" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'H.L.M Patte d\'Oie'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>H.L.M Patte d'Oie</option>
                                                                <option value="Hamo (1-2-3-4-5-6)" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Hamo (1-2-3-4-5-6)'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Hamo (1-2-3-4-5-6)</option>
                                                                <option value="Hann Bel Air" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Hann Bel Air'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Hann Bel Air</option>
                                                                <option value="Hann Marinas" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Hann Marinas'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Hann Marinas</option>
                                                                <option value="Hann Mariste" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Hann Mariste'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Hann Mariste</option>
                                                                <option value="HLM Grand Medine" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'HLM Grand Medine'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>HLM Grand Medine</option>
                                                                <option value="HLM Grand Yoff" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'HLM Grand Yoff'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>HLM Grand Yoff</option>
                                                                <option value="HLM Las Palmas" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'HLM Las Palmas'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>HLM Las Palmas</option>
                                                                <option value="Keur Massar" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Keur Massar'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Keur Massar</option>
                                                                <option value="Keur Massar Diakhaye" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Keur Massar Diakhaye'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Keur Massar Diakhaye</option>
                                                                <option value="Keur Massar Parcelles Assainies" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Keur Massar Parcelles Assainies'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Keur Massar Parcelles Assainies</option>
                                                                <option value="Keur Massar Village" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Keur Massar Village'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Keur Massar Village</option>
                                                                <option value="Keur Mbaye Fall" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Keur Mbaye Fall'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Keur Mbaye Fall</option>
                                                                <option value="Liberté 6 - Cité Sipres" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Liberté 6 - Cité Sipres'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Liberté 6 - Cité Sipres</option>
                                                                <option value="Liberté 6 - Cité Sonatel" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Liberté 6 - Cité Sonatel'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Liberté 6 - Cité Sonatel</option>
                                                                <option value="Liberte 6 extension" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Liberte 6 extension'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Liberte 6 extension</option>
                                                                <option value="Malika" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Malika'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Malika</option>
                                                                <option value="Mamelle" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Mamelle'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Mamelle</option>
                                                                <option value="Maristes" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Maristes'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Maristes</option>
                                                                <option value="Mbao - Cité Sipres" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Mbao - Cité Sipres'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Mbao - Cité Sipres</option>
                                                                <option value="Medina" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Medina'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Medina</option>
                                                                <option value="Medina Gounass" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Medina Gounass'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Medina Gounass</option>
                                                                <option value="Mermoz" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Mermoz'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Mermoz</option>
                                                                <option value="Ngor - Almadies" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Ngor - Almadies'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Ngor - Almadies</option>
                                                                <option value="Nord foire" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Nord foire'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Nord foire</option>
                                                                <option value="Ouakam" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Ouakam'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Ouakam</option>
                                                                <option value="Ouest foire" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Ouest foire'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Ouest foire</option>
                                                                <option value="Parcelles - Cite Fadia" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Parcelles - Cite Fadia'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Parcelles - Cite Fadia</option>
                                                                <option value="Parcelles - Cite Nations Unies" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Parcelles - Cite Nations Unies'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Parcelles - Cite Nations Unies</option>
                                                                <option value="Parcelles Assainies" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Parcelles Assainies'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Parcelles Assainies</option>
                                                                <option value="Patte D'oie" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Patte D\'oie'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Patte D'oie</option>
                                                                <option value="Patte D'oie builders" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Patte D\'oie builders'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Patte D'oie builders</option>
                                                                <option value="Petit Mbao" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Petit Mbao'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Petit Mbao</option>
                                                                <option value="Pikine" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine</option>
                                                                <option value="Pikine Cité Lobatfall" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine Cité Lobatfall'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine Cité Lobatfall</option>
                                                                <option value="Pikine Guinaw Rail" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine Guinaw Rail'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine Guinaw Rail</option>
                                                                <option value="Pikine Icotaf" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine Icotaf'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine Icotaf</option>
                                                                <option value="Pikine Khourounar" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine Khourounar'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine Khourounar</option>
                                                                <option value="Pikine Nord" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine Nord'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine Nord</option>
                                                                <option value="Pikine Rue 10" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine Rue 10'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine Rue 10</option>
                                                                <option value="Pikine Tally Bou Bess" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine Tally Bou Bess'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine Tally Bou Bess</option>
                                                                <option value="Pikine Tally Bou Mak" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Pikine Tally Bou Mak'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Pikine Tally Bou Mak </option>
                                                                <option value="Plateau" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Plateau'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Plateau</option>
                                                                <option value="Point E" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Point E'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Point E</option>
                                                                <option value="Rue 10" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Rue 10'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Rue 10</option>
                                                                <option value="Rufisque" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Rufisque'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Rufisque</option>
                                                                <option value="Scat Urbam" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Scat Urbam'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Scat Urbam</option>
                                                                <option value="Sebikotane" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sebikotane'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sebikotane</option>
                                                                <option value="Sicap Baobab" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Baobab'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Baobab</option>
                                                                <option value="Sicap fass Mbao" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap fass Mbao'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap fass Mbao</option>
                                                                <option value="Sicap Karack" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Karack'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Karack</option>
                                                                <option value="Sicap Liberté 1" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Liberté 1'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Liberté 1</option>
                                                                <option value="Sicap Liberté 2 " <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Liberté 2'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Liberté 2 </option>
                                                                <option value="Sicap Liberté 3" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Liberté 3'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Liberté 3</option>
                                                                <option value="Sicap Liberté 4" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Liberté 4'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?> >Sicap Liberté 4</option>
                                                                <option value="Sicap Liberté 5" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Liberté 5'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Liberté 5</option>
                                                                <option value="Sicap Liberté 6" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Liberté 6'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Liberté 6</option>
                                                                <option value="Sicap Sacre Coeur 1" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Sacre Coeur 1'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Sacre Coeur 1</option>
                                                                <option value="Sicap Sacre Coeur 2" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Sacre Coeur 2'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Sacre Coeur 2</option>
                                                                <option value="Sicap Sacre Coeur 3" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Sacre Coeur 3'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Sacre Coeur 3</option>
                                                                <option value="Sicap Sacre coeur 3 Extension" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sicap Sacre coeur 3 Extension'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sicap Sacre coeur 3 Extension</option>
                                                                <option value="Soprim" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Soprim'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Soprim</option>
                                                                <option value="Sotrac Mermoz" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sotrac Mermoz'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sotrac Mermoz</option>
                                                                <option value="Sud Foire" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Sud Foire'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Sud Foire</option>
                                                                <option value="Thiaroye Gare" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Thiaroye Gare'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Thiaroye Gare</option>
                                                                <option value="Thiaroye sur mer" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Thiaroye sur mer'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Thiaroye sur mer</option>
                                                                <option value="Usine Bene Tally" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Usine Bene Tally'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Usine Bene Tally</option>
                                                                <option value="Usine Niary Tally" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Usine Niary Tally'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Usine Niary Tally</option>
                                                                <option value="Yeumbeul" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Yeumbeul'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Yeumbeul</option>
                                                                <option value="Yoff" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Yoff'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Yoff</option>
                                                                <option value="Zac Mbao" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Zac Mbao'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Zac Mbao</option>
                                                                <option value="Zone A et B" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Zone A et B'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Zone A et B</option>
                                                                <option value="Zone de Captage" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Zone de Captage'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Zone de Captage </option>
                                                                <option value="Zone Industrielle" <?=isset($commande) && $commande->getAdresse()!==null && $commande->getAdresse()->getVille()!=null && 'Zone Industrielle'==$commande->getAdresse()->getVille()?'selected="selected"':'' ?>>Zone Industrielle</option>
                                                            </select>
                                                        </div>
                                                        <div class="text-danger"><?=isset($erreurs['ville'])?htmlspecialchars($erreurs['ville']):'' ?></div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="single-input">
                                                            <input type="text" name="description" placeholder="Description de l'adresse" value="<?=isset($commande) && null!==$commande->getAdresse() && null!==$commande->getAdresse()->getDescription()?htmlspecialchars($commande->getAdresse()->getDescription()):'' ?>">
                                                            <div class="text-danger"><?=isset($erreurs) && isset($erreurs['description'])?$erreurs['description']:'' ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="selectionner" class="row">
                                                    <div class="order-details col-md-5">
                                                        <h5 class="order-details__title">Mes adresses</h5>
                                                        <div class="order-details__item">
                                                            <?if(isset($listeAdresses) && !empty($listeAdresses)){
                                                                foreach ($listeAdresses as $adr) {?>
                                                                    <div class="single-item">
                                                                        <input id='id' type="radio" name="id" value="<?=htmlspecialchars($adr->getId())?>" <?=isset($commande) && null!==$commande->getAdresse() && $commande->getAdresse()->getId()==$adr->getId()?'checked="checked"':'' ?>/>
                                                                        <label for='id'>
                                                                            <div class="single-item__content">
                                                                                <?=htmlspecialchars($adr->getDescription())?>
                                                                                <span class="price"><?=htmlspecialchars($adr->getVille())?>, <?=htmlspecialchars($adr->getRegion())?></span>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                <?}
                                                            }else{?>
                                                                <div class="single-item__content">
                                                                    <span class="text-danger"><?='Aucune adresse ajoutée'?></span>
                                                                </div>
                                                            <?}?>
                                                        </div>
                                                        <div class="text-danger"><?=isset($erreurs) && isset($erreurs['id'])?htmlspecialchars($erreurs['id']):'' ?></div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion__title">
                                            Methode de paiement
                                        </div>
                                        <div class="accordion__body">
                                            <div class="paymentinfo">
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input id='orangeMoney' type="radio" name="methodePaiement" value="orangeMoney" <?=isset($commande) && $commande->getMethodePaiement()=='orangeMoney'?'checked="checked"':'' ?>/><label for="orangeMoney"> Orange Money</label><br/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input id="wave" type="radio" name="methodePaiement" value="wave" <?=isset($commande) && $commande->getMethodePaiement()=='wave'?'checked="checked"':'' ?>/><label for="wave"> Wave</label><br/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-input">
                                                        <input id="espece" type="radio" name="methodePaiement" value="espece" <?=isset($commande) && $commande->getMethodePaiement()=='espece'?'checked="checked"':'' ?>/><label for="espece"> Paiement à la livraison</label><br/>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="text-danger"><?=isset($erreurs) && isset($erreurs['methodePaiement'])?htmlspecialchars($erreurs['methodePaiement']):'' ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br/>
                                </div>
                                <input type='hidden' name='form' value='commander'/>
                                <?if(!empty($listeContenirArticles)){?>
                                    <div class="dark-btn" onclick="document.forms['commander'].submit();">
                                        <a>Commander</a>
                                    </div>
                                <?}?>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="order-details">
                            <h5 class="order-details__title">Votre commande</h5>
                            <div class="order-details__item">*
                            <?if(isset($listeContenirArticles) && !empty($listeContenirArticles)){
                                foreach ($listeContenirArticles as $contenirArticle) {?>
                                    <div class="single-item">
                                        <div class="single-item__thumb">
                                            <img src="vue/images/cart/1.png" alt="ordered item">
                                        </div>
                                        <div class="single-item__content">
                                            <a href="product-details?article=<?=htmlspecialchars($contenirArticle->getArticle()->getId()) ?>"><?=htmlspecialchars($contenirArticle->getArticle()->getNom()) ?></a>
                                            <span class="price"><?=$contenirArticle->getArticle()->isSolde()? htmlspecialchars($contenirArticle->getArticle()->getPrix() - $contenirArticle->getArticle()->getPrix()*($contenirArticle->getArticle()->getPourcentageSolde()/100)):htmlspecialchars($contenirArticle->getArticle()->getPrix())?> FCFA</span>
                                        </div>
                                        <div class="single-item__remove">
                                        <span class="price"><?=htmlspecialchars($contenirArticle->getNombreArticles())?></span>
                                        </div>
                                    </div>
                                <?}
                            }?>
                            </div>
                            <div class="order-details__count">
                                <div class="order-details__count__single">
                                    <h5>sous total</h5>
                                    <span class="price"><?=htmlspecialchars($panier->getPrixTotalSansFrais())?></span>
                                </div>
                                <div class="order-details__count__single">
                                    <h5>Frais</h5>
                                    <span class="price"><?=$fraisLivraison ?> FCFA</span>
                                </div>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Total de la commande</h5>
                                <span class="price"><?=htmlspecialchars($panier->getPrixTotalSansFrais()+$fraisLivraison)?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- Start Footer Area -->
        <footer id="htc__footer">
            <!-- Start Footer Widget -->
            <div class="footer__container bg__cat--1">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer">
                                <h2 class="title__line--2">A propos de nous</h2>
                                <div class="ft__details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim</p>
                                    <div class="ft__social__link">
                                        <ul class="social__link">
                                            <li><a href="<?=htmlspecialchars($entreprise->getTwitter()) ?>"><i class="icon-social-twitter icons"></i></a></li>

                                            <li><a href="<?=htmlspecialchars($entreprise->getInstagram()) ?>"><i class="icon-social-instagram icons"></i></a></li>

                                            <li><a href="<?=htmlspecialchars($entreprise->getFacebook()) ?>"><i class="icon-social-facebook icons"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Informations</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="#">A propos de nous</a></li>
                                        <li><a href="#">Livraison et retour</a></li>
                                        <li><a href="contact">Nous contacter</a></li>
                                        <li><a href="#">Politique de confidentialité</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                        <!-- Start Single Footer Widget -->
                        <div class="col-md-2 col-sm-6 col-xs-12 xmt-40 smt-40">
                            <div class="footer">
                                <h2 class="title__line--2">Mon compte</h2>
                                <div class="ft__inner">
                                    <ul class="ft__list">
                                        <li><a href="<?= isset($_SESSION['compte'])?'parametrage':'#' ?>">Mon compte</a></li>
                                        <li><a href="<?= isset($_SESSION['compte'])?'cart':'#' ?>">Mon panier</a></li>
                                        <li><a href="login">S'inscrire/se connecter</a></li>
                                        <li><a href="<?= isset($_SESSION['compte'])?'historiqueCommandes':'#' ?>">Mes commandes</a></li>
                                        <li><a href="<?= isset($_SESSION['compte'])?'checkout':'#' ?>">Commander</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Footer Widget -->
                    </div>
                </div>
            </div>
            <!-- End Footer Widget -->
            <!-- Start Copyright Area -->
            <div class="htc__copyright bg__cat--5">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="copyright__inner">
                                <p>Copyright© <a href="https://freethemescloud.com/">Free themes Cloud</a> 2018. All right reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Style -->
    </div>
    <!-- Body main wrapper end -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="vue/js/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="vue/js/bootstrap.min.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="vue/js/plugins.js"></script>
    <script src="vue/js/slick.min.js"></script>
    <script src="vue/js/owl.carousel.min.js"></script>
    <!-- Waypoints.min.js. -->
    <script src="vue/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="vue/js/main.js"></script>
    <script>
        jQuery(document).ready(function(){
            /* 1 - Au lancement de la page, on cache le bloc d'éléments du formulaire correspondant aux clients existants */
            $("div#<?= isset($_POST['adresse']) && $_POST['adresse']=='selectionner'?'ajouter':'selectionner' ?>").hide();
            /* 2 - Au clic sur un des deux boutons radio "adresse", on affiche le bloc d'éléments correspondant (nouveau ou ancien client) */
            jQuery('input[name=adresse]:radio').click(function(){
                $("div#ajouter").hide();
                $("div#selectionner").hide();
                var divId = jQuery(this).val();
                $("div#"+divId).show();
            });
        });
    </script>

</body>

</html>