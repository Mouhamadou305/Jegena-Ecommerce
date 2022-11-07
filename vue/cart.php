<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cart || Asbab - eCommerce HTML5 Template</title>
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
                                                <li><a href="contact">contact</a></li>
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
                                            <img src=<?=$manager->trouverImage($contenirArticle->getArticle())!==null && $manager->trouverImage($contenirArticle->getArticle())->getEmplacement()!==null? htmlspecialchars($manager->trouverImage($contenirArticle->getArticle())->getEmplacement()):"vue/images/product-2/sm-smg/1.jpg"?> alt="product images">
                                        </a>
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2><a href="product-details?article=<?=htmlspecialchars($contenirArticle->getArticle()->getId())?>"><?=htmlspecialchars($contenirArticle->getArticle()->getNom())?></a></h2>
                                        <span class="quantity">Quantité: <?=htmlspecialchars($contenirArticle->getNombreArticles())?></span>
                                        <span class="shp__price"><?=$contenirArticle->getArticle()->isSolde()? htmlspecialchars($contenirArticle->getArticle()->getPrix() - $contenirArticle->getArticle()->getPrix()*($contenirArticle->getArticle()->getPourcentageSolde()/100)):htmlspecialchars($contenirArticle->getArticle()->getPrix())?> FCFA</span>
                                    </div>
                                    <div class="remove__btn">
                                        <a href="cart?lien=cart&amp;action=remove&article=<?=htmlspecialchars($contenirArticle->getArticle()->getId()) ?>" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
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
                                  <span class="breadcrumb-item active">Mon panier</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area ptb--100 bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">produits</th>
                                            <th class="product-name">nom du produit</th>
                                            <th class="product-price">Prix</th>
                                            <th class="product-name">Taille</th>
                                            <th class="product-quantity">Quantité</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?$i=0;?>
                                        <?if(isset($listeContenirArticles) && !empty($listeContenirArticles)){
                                            foreach ($listeContenirArticles as $contenirArticle) {
                                                $i++;?>
                                                <tr>
                                                    <td class="product-thumbnail"><a href="product-details?article=<?=htmlspecialchars($contenirArticle->getArticle()->getId())?>"><img src=<?=$manager->trouverImage($contenirArticle->getArticle())!==null && $manager->trouverImage($contenirArticle->getArticle())->getEmplacement()!==null?htmlspecialchars($manager->trouverImage($contenirArticle->getArticle())->getEmplacement()):"vue/images/product-2/cart-img/1.jpg"?> alt="product images"></a><a href="product-details?article=<?=htmlspecialchars($contenirArticle->getArticle()->getId()) ?>"></a></td>
                                                    <td class="product-name"><a href="#"><?=htmlspecialchars($contenirArticle->getArticle()->getNom())?></a>
                                                        <ul  class="pro__prize">
                                                            <li class="old__prize"><?=htmlspecialchars($contenirArticle->getArticle()->getPrix())?> FCFA</li>
                                                            <li><?=$contenirArticle->getArticle()->isSolde()? htmlspecialchars($contenirArticle->getArticle()->getPrix() - $contenirArticle->getArticle()->getPrix()*($contenirArticle->getArticle()->getPourcentageSolde()/100)):htmlspecialchars($contenirArticle->getArticle()->getPrix())?> FCFA</li>
                                                        </ul>
                                                    </td>
                                                    <td class="product-price"><span class="amount"><?=$contenirArticle->getArticle()->isSolde()? htmlspecialchars($contenirArticle->getArticle()->getPrix() - $contenirArticle->getArticle()->getPrix()*($contenirArticle->getArticle()->getPourcentageSolde()/100)):htmlspecialchars($contenirArticle->getArticle()->getPrix())?> FCFA</span></td>
                                                    <td class="product-name"><?=htmlspecialchars($contenirArticle->getArticle()->getTaille())?></td>
                                                    <td class="product-quantity"><form name="changerNombre<?=$i?>" action='cart' method='post'><input type="hidden" name="article" value="<?=htmlspecialchars($contenirArticle->getArticle()->getId())?>"/><input type="number" onchange="document.forms['changerNombre<?=$i?>'].submit();" name="nombre" value="<?=htmlspecialchars($contenirArticle->getNombreArticles())?>" /></form></td>
                                                    <td class="product-subtotal"><?=$contenirArticle->getNombreArticles()*($contenirArticle->getArticle()->isSolde()? htmlspecialchars($contenirArticle->getArticle()->getPrix() - $contenirArticle->getArticle()->getPrix()*($contenirArticle->getArticle()->getPourcentageSolde()/100)):htmlspecialchars($contenirArticle->getArticle()->getPrix()))?> FCFA</td>
                                                    <td class="product-remove"><a href="cart?action=remove&article=<?=htmlspecialchars($contenirArticle->getArticle()->getId()) ?>"><i class="icon-trash icons"></i></a></td>
                                                </tr>
                                            <?}
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="buttons-cart--inner">
                                        <div class="buttons-cart">
                                            <script>
                                                document.write('<a href="' + document.referrer + '">Continuer le shopping</a>');
                                            </script>
                                        </div>
                                        <div class="buttons-cart checkout--btn">
                                            <a href="cart">Raffraichir</a>
                                            <a href="checkout">Commander</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end -->
        <!-- End Banner Area -->
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

</body>

</html>