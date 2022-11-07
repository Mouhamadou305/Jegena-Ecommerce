<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Contact || Asbab - eCommerce HTML5 Template</title>
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
                                            <img src=<?=$manager->trouverImage($contenirArticle->getArticle())!==null && $manager->trouverImage($contenirArticle->getArticle())->getEmplacement()!==null?htmlspecialchars($manager->trouverImage($contenirArticle->getArticle())->getEmplacement()):"vue/images/product-2/sm-smg/1.jpg"?> alt="product images">
                                        </a>
                                    </div>
                                    <div class="shp__pro__details">
                                        <h2><a href="product-details?article=<?=htmlspecialchars($contenirArticle->getArticle()->getId())?>"><?=htmlspecialchars($contenirArticle->getArticle()->getNom())?></a></h2>
                                        <span class="quantity">Quantité: <?=htmlspecialchars($contenirArticle->getNombreArticles())?></span>
                                        <span class="shp__price"><?=$contenirArticle->getArticle()->isSolde()? htmlspecialchars($contenirArticle->getArticle()->getPrix() - $contenirArticle->getArticle()->getPrix()*($contenirArticle->getArticle()->getPourcentageSolde()/100)):htmlspecialchars($contenirArticle->getArticle()->getPrix())?> FCFA</span>
                                    </div>
                                    <div class="remove__btn">
                                        <a href="cart?lien=login&amp;action=remove&article=<?=htmlspecialchars($contenirArticle->getArticle()->getId()) ?>" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
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
                                  <span class="breadcrumb-item active">Paramétrage</span>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <div class="row">
                        <h2 class='title_line <?= !isset($erreurs)?'text-success':'text-danger'?>'><?=isset($resultat)?htmlspecialchars($resultat):'' ?> <?=isset($resultatMdp)?htmlspecialchars($resultatMdp):'' ?> <?=isset($resultatAjoutAdr)?htmlspecialchars($resultatAjoutAdr):'' ?> <?=isset($resultatModAdr)?htmlspecialchars($resultatModAdr):'' ?> <?=isset($resultatSupprAdr)?htmlspecialchars($resultatSupprAdr):'' ?></h2>
                    </div> 
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Contact Area -->
        <section class="htc__contact__area ptb--100 bg__white">
            <div class="container">
                <div class="row">
					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Mot de passe</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-login-form" action="parametrage" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="motDePasse" placeholder="Votre mot de passe actuel*" style="width:100%">
										</div>
                                        <div class="text-danger"><?=isset($erreurs['motDePasse'])?htmlspecialchars($erreurs['motDePasse']):'' ?></div>
									</div>
                                    <div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="nouveauMotDePasse" placeholder="Votre nouveau mot de passe*" style="width:100%">
										</div>
                                        <div class="text-danger"><?=isset($erreurs['nouveauMotDePasse'])?htmlspecialchars($erreurs['nouveauMotDePasse']):'' ?></div>
									</div>
                                    <div class="single-contact-form">
										<div class="contact-box name">
											<input type="password" name="confirmation" placeholder="Confirmez votre nouveau mot de passe*" style="width:100%">
										</div>
									</div>

                                    <input type="hidden" name="form" value="motDePasse"/>
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn">Changer le mot de passe</button>
									</div>
								</form>
								<div class="form-output">
									<p class="<?= !isset($erreurs)?'text-success':'text-danger'?>"><?= isset($resultatMdp)?htmlspecialchars($resultatMdp):'' ?></p>
								</div>
							</div>
						</div> 
                    
				    </div>
				

					<div class="col-md-6">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Informations générales</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form id="contact-register-form" action="parametrage" method="post">
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="nom" value="<?=isset($compte) && null!==$compte->getNom()?htmlspecialchars($compte->getNom()):'' ?>" placeholder="Votre nom*" style="width:100%">
										</div>
                                        <div class="text-danger"><?=isset($erreurs['nom'])?htmlspecialchars($erreurs['nom']):'' ?></div>
									</div>
                                    <div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="prenom" value="<?=isset($compte) && null!==$compte->getPrenom()?htmlspecialchars($compte->getPrenom()):'' ?>" placeholder="Votre prénom*" style="width:100%">
										</div>
                                        <div class="text-danger"><?=isset($erreurs['prenom'])?htmlspecialchars($erreurs['prenom']):'' ?></div>
									</div>
									<div class="single-contact-form">
										<div class="contact-box name">
											<input type="text" name="numeroTelephone" value="<?=isset($compte) && null!==$compte->getNumeroTelephone()?htmlspecialchars($compte->getNumeroTelephone()):'' ?>" placeholder="Votre numéro de téléphone*" style="width:100%">
										</div>
                                        <div class="text-danger"><?=isset($erreurs['numeroTelephone'])?htmlspecialchars($erreurs['numeroTelephone']):'' ?></div>
									</div>
                                    <input type="hidden" name="form" value="informations"/>

									<div class="contact-btn">
										<button type="submit" class="fv-btn">Mettre à jour</button>
									</div>
								</form>
								<div class="form-output">
									<p class="<?= !isset($erreurs)?'text-success':'text-danger'?>"><?=isset($resultat)?htmlspecialchars($resultat):'' ?></p>
								</div>
							</div>
						</div> 
                    
				    </div>
                </div>


                <div class="row">
					<div class="col-md-4">
						<div class="contact-form-wrap mt--60">
							<div class="col-xs-12">
								<div class="contact-title">
									<h2 class="title__line--6">Ajouter une adresse</h2>
								</div>
							</div>
							<div class="col-xs-12">
								<form action="parametrage" method="post">
									
                                    <div class="single-contact-form" style="width:100%">
                                        <div class="contact-box">
                                            <select name="region" id="region">
                                                <option value="Dakar" <?=isset($adresse) && $adresse->getVille()!=null && 'Dakar'!=$adresse->getRegion()?'selected="selected"':'' ?> >Dakar</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="single-contact-form">
                                        <div class="contact-box">
                                            <select name="ville" id="ville" style="width:100%">
                                                <option value="" <?=!isset($adresse) || $adresse->getVille()==null || ''==$adresse->getVille()?'selected="selected"':'' ?> >Sélectionner</option>
                                                <option value="Amitie 1" <?=isset($adresse) && $adresse->getVille()!=null && 'Amitie 1'==$adresse->getVille()?'selected="selected"':'' ?>>Amitie 1</option>
                                                <option value="Amitie 2" <?=isset($adresse) && $adresse->getVille()!=null && 'Amitie 2'==$adresse->getVille()?'selected="selected"':'' ?>>Amitie 2</option>
                                                <option value="Amitie 3" <?=isset($adresse) && $adresse->getVille()!=null && 'Amitie 3'==$adresse->getVille()?'selected="selected"':'' ?>>Amitie 3</option>
                                                <option value="Bargny" <?=isset($adresse) && $adresse->getVille()!=null && 'Bargny'==$adresse->getVille()?'selected="selected"':'' ?>>Bargny</option>
                                                <option value="Bel Air" <?=isset($adresse) && $adresse->getVille()!=null && 'Bel Air'==$adresse->getVille()?'selected="selected"':'' ?>>Bel Air</option>
                                                <option value="Bop" <?=isset($adresse) && $adresse->getVille()!=null && 'Bop'==$adresse->getVille()?'selected="selected"':'' ?>>Bop</option>
                                                <option value="Camberene" <?=isset($adresse) && $adresse->getVille()!=null && 'Camberene'==$adresse->getVille()?'selected="selected"':'' ?>>Camberene</option>
                                                <option value="Castor" <?=isset($adresse) && $adresse->getVille()!=null && 'Castor'==$adresse->getVille()?'selected="selected"':'' ?>>Castor</option>
                                                <option value="Centenaire" <?=isset($adresse) && $adresse->getVille()!=null && 'Centenaire'==$adresse->getVille()?'selected="selected"':'' ?>>Centenaire</option>
                                                <option value="Cite Keur Damel" <?=isset($adresse) && $adresse->getVille()!=null && 'Cite Keur Damel'==$adresse->getVille()?'selected="selected"':'' ?>>Cite Keur Damel</option>
                                                <option value="Cite Keur Gorgui" <?=isset($adresse) && $adresse->getVille()!=null && 'Cite Keur Gorgui'==$adresse->getVille()?'selected="selected"':'' ?>>Cite Keur Gorgui</option>
                                                <option value="Colobane" <?=isset($adresse) && $adresse->getVille()!=null && 'Colobane'==$adresse->getVille()?'selected="selected"':'' ?>>Colobane</option>
                                                <option value="Dalifort" <?=isset($adresse) && $adresse->getVille()!=null && 'Dalifort'==$adresse->getVille()?'selected="selected"':'' ?>>Dalifort</option>
                                                <option value="Derkle" <?=isset($adresse) && $adresse->getVille()!=null && 'Derkle'==$adresse->getVille()?'selected="selected"':'' ?>>Derkle</option>
                                                <option value="Diamagueune" <?=isset($adresse) && $adresse->getVille()!=null && 'Diamagueune'==$adresse->getVille()?'selected="selected"':'' ?>>Diamagueune</option>
                                                <option value="Diamalaye" <?=isset($adresse) && $adresse->getVille()!=null && 'Diamalaye'==$adresse->getVille()?'selected="selected"':'' ?>>Diamalaye</option>
                                                <option value="Dieuppeul" <?=isset($adresse) && $adresse->getVille()!=null && 'Dieuppeul'==$adresse->getVille()?'selected="selected"':'' ?>>Dieuppeul</option>
                                                <option value="Fann" <?=isset($adresse) && $adresse->getVille()!=null && 'Fann'==$adresse->getVille()?'selected="selected"':'' ?>>Fann</option>
                                                <option value="Fann Hock" <?=isset($adresse) && $adresse->getVille()!=null && 'Fann Hock'==$adresse->getVille()?'selected="selected"':'' ?>>Fann Hock</option>
                                                <option value="Fann Residence" <?=isset($adresse) && $adresse->getVille()!=null && 'Fann Residence'==$adresse->getVille()?'selected="selected"':'' ?>>Fann Residence</option>
                                                <option value="Fass" <?=isset($adresse) && $adresse->getVille()!=null && 'Fass'==$adresse->getVille()?'selected="selected"':'' ?>>Fass</option>
                                                <option value="Fass Paillote" <?=isset($adresse) && $adresse->getVille()!=null && 'Fass Paillote'==$adresse->getVille()?'selected="selected"':'' ?>>Fass Paillote</option>
                                                <option value="Fenetre Mermoz" <?=isset($adresse) && $adresse->getVille()!=null && 'Fenetre Mermoz'==$adresse->getVille()?'selected="selected"':'' ?>>Fenetre Mermoz</option>
                                                <option value="Golf" <?=isset($adresse) && $adresse->getVille()!=null && 'Golf'==$adresse->getVille()?'selected="selected"':'' ?>>Golf</option>
                                                <option value="Grand Dakar" <?=isset($adresse) && $adresse->getVille()!=null && 'Grand Dakar'==$adresse->getVille()?'selected="selected"':'' ?>>Grand Dakar</option>
                                                <option value="Grand Mbao" <?=isset($adresse) && $adresse->getVille()!=null && 'Grand Mbao'==$adresse->getVille()?'selected="selected"':'' ?>>Grand Mbao</option>
                                                <option value="Grand Medine" <?=isset($adresse) && $adresse->getVille()!=null && 'Grand Medine'==$adresse->getVille()?'selected="selected"':'' ?>>Grand Medine</option>
                                                <option value="Grand Yoff" <?=isset($adresse) && $adresse->getVille()!=null && 'Grand Yoff'==$adresse->getVille()?'selected="selected"':'' ?>>Grand Yoff</option>
                                                <option value="Guediawaye" <?=isset($adresse) && $adresse->getVille()!=null && 'Guediawaye'==$adresse->getVille()?'selected="selected"':'' ?>>Guediawaye</option>
                                                <option value="Guediawaye - Cite Gadaye" <?=isset($adresse) && $adresse->getVille()!=null && 'Guediawaye - Cite Gadaye'==$adresse->getVille()?'selected="selected"':'' ?>>Guediawaye - Cite Gadaye</option>
                                                <option value="Guediawaye - P.A.I" <?=isset($adresse) && $adresse->getVille()!=null && 'Guediawaye - P.A.I'==$adresse->getVille()?'selected="selected"':'' ?>>Guediawaye - P.A.I</option>
                                                <option value="Gueule Tapee" <?=isset($adresse) && $adresse->getVille()!=null && 'Gueule Tapee'==$adresse->getVille()?'selected="selected"':'' ?>>Gueule Tapee</option>
                                                <option value="H.L.M (1-2-3-4-5-6)" <?=isset($adresse) && $adresse->getVille()!=null && 'H.L.M (1-2-3-4-5-6)'==$adresse->getVille()?'selected="selected"':'' ?>>H.L.M (1-2-3-4-5-6)</option>
                                                <option value="H.L.M Patte d'Oie" <?=isset($adresse) && $adresse->getVille()!=null && 'H.L.M Patte d\'Oie'==$adresse->getVille()?'selected="selected"':'' ?>>H.L.M Patte d'Oie</option>
                                                <option value="Hamo (1-2-3-4-5-6)" <?=isset($adresse) && $adresse->getVille()!=null && 'Hamo (1-2-3-4-5-6)'==$adresse->getVille()?'selected="selected"':'' ?>>Hamo (1-2-3-4-5-6)</option>
                                                <option value="Hann Bel Air" <?=isset($adresse) && $adresse->getVille()!=null && 'Hann Bel Air'==$adresse->getVille()?'selected="selected"':'' ?>>Hann Bel Air</option>
                                                <option value="Hann Marinas" <?=isset($adresse) && $adresse->getVille()!=null && 'Hann Marinas'==$adresse->getVille()?'selected="selected"':'' ?>>Hann Marinas</option>
                                                <option value="Hann Mariste" <?=isset($adresse) && $adresse->getVille()!=null && 'Hann Mariste'==$adresse->getVille()?'selected="selected"':'' ?>>Hann Mariste</option>
                                                <option value="HLM Grand Medine" <?=isset($adresse) && $adresse->getVille()!=null && 'HLM Grand Medine'==$adresse->getVille()?'selected="selected"':'' ?>>HLM Grand Medine</option>
                                                <option value="HLM Grand Yoff" <?=isset($adresse) && $adresse->getVille()!=null && 'HLM Grand Yoff'==$adresse->getVille()?'selected="selected"':'' ?>>HLM Grand Yoff</option>
                                                <option value="HLM Las Palmas" <?=isset($adresse) && $adresse->getVille()!=null && 'HLM Las Palmas'==$adresse->getVille()?'selected="selected"':'' ?>>HLM Las Palmas</option>
                                                <option value="Keur Massar" <?=isset($adresse) && $adresse->getVille()!=null && 'Keur Massar'==$adresse->getVille()?'selected="selected"':'' ?>>Keur Massar</option>
                                                <option value="Keur Massar Diakhaye" <?=isset($adresse) && $adresse->getVille()!=null && 'Keur Massar Diakhaye'==$adresse->getVille()?'selected="selected"':'' ?>>Keur Massar Diakhaye</option>
                                                <option value="Keur Massar Parcelles Assainies" <?=isset($adresse) && $adresse->getVille()!=null && 'Keur Massar Parcelles Assainies'==$adresse->getVille()?'selected="selected"':'' ?>>Keur Massar Parcelles Assainies</option>
                                                <option value="Keur Massar Village" <?=isset($adresse) && $adresse->getVille()!=null && 'Keur Massar Village'==$adresse->getVille()?'selected="selected"':'' ?>>Keur Massar Village</option>
                                                <option value="Keur Mbaye Fall" <?=isset($adresse) && $adresse->getVille()!=null && 'Keur Mbaye Fall'==$adresse->getVille()?'selected="selected"':'' ?>>Keur Mbaye Fall</option>
                                                <option value="Liberté 6 - Cité Sipres" <?=isset($adresse) && $adresse->getVille()!=null && 'Liberté 6 - Cité Sipres'==$adresse->getVille()?'selected="selected"':'' ?>>Liberté 6 - Cité Sipres</option>
                                                <option value="Liberté 6 - Cité Sonatel" <?=isset($adresse) && $adresse->getVille()!=null && 'Liberté 6 - Cité Sonatel'==$adresse->getVille()?'selected="selected"':'' ?>>Liberté 6 - Cité Sonatel</option>
                                                <option value="Liberte 6 extension" <?=isset($adresse) && $adresse->getVille()!=null && 'Liberte 6 extension'==$adresse->getVille()?'selected="selected"':'' ?>>Liberte 6 extension</option>
                                                <option value="Malika" <?=isset($adresse) && $adresse->getVille()!=null && 'Malika'==$adresse->getVille()?'selected="selected"':'' ?>>Malika</option>
                                                <option value="Mamelle" <?=isset($adresse) && $adresse->getVille()!=null && 'Mamelle'==$adresse->getVille()?'selected="selected"':'' ?>>Mamelle</option>
                                                <option value="Maristes" <?=isset($adresse) && $adresse->getVille()!=null && 'Maristes'==$adresse->getVille()?'selected="selected"':'' ?>>Maristes</option>
                                                <option value="Mbao - Cité Sipres" <?=isset($adresse) && $adresse->getVille()!=null && 'Mbao - Cité Sipres'==$adresse->getVille()?'selected="selected"':'' ?>>Mbao - Cité Sipres</option>
                                                <option value="Medina" <?=isset($adresse) && $adresse->getVille()!=null && 'Medina'==$adresse->getVille()?'selected="selected"':'' ?>>Medina</option>
                                                <option value="Medina Gounass" <?=isset($adresse) && $adresse->getVille()!=null && 'Medina Gounass'==$adresse->getVille()?'selected="selected"':'' ?>>Medina Gounass</option>
                                                <option value="Mermoz" <?=isset($adresse) && $adresse->getVille()!=null && 'Mermoz'==$adresse->getVille()?'selected="selected"':'' ?>>Mermoz</option>
                                                <option value="Ngor - Almadies" <?=isset($adresse) && $adresse->getVille()!=null && 'Ngor - Almadies'==$adresse->getVille()?'selected="selected"':'' ?>>Ngor - Almadies</option>
                                                <option value="Nord foire" <?=isset($adresse) && $adresse->getVille()!=null && 'Nord foire'==$adresse->getVille()?'selected="selected"':'' ?>>Nord foire</option>
                                                <option value="Ouakam" <?=isset($adresse) && $adresse->getVille()!=null && 'Ouakam'==$adresse->getVille()?'selected="selected"':'' ?>>Ouakam</option>
                                                <option value="Ouest foire" <?=isset($adresse) && $adresse->getVille()!=null && 'Ouest foire'==$adresse->getVille()?'selected="selected"':'' ?>>Ouest foire</option>
                                                <option value="Parcelles - Cite Fadia" <?=isset($adresse) && $adresse->getVille()!=null && 'Parcelles - Cite Fadia'==$adresse->getVille()?'selected="selected"':'' ?>>Parcelles - Cite Fadia</option>
                                                <option value="Parcelles - Cite Nations Unies" <?=isset($adresse) && $adresse->getVille()!=null && 'Parcelles - Cite Nations Unies'==$adresse->getVille()?'selected="selected"':'' ?>>Parcelles - Cite Nations Unies</option>
                                                <option value="Parcelles Assainies" <?=isset($adresse) && $adresse->getVille()!=null && 'Parcelles Assainies'==$adresse->getVille()?'selected="selected"':'' ?>>Parcelles Assainies</option>
                                                <option value="Patte D'oie" <?=isset($adresse) && $adresse->getVille()!=null && 'Patte D\'oie'==$adresse->getVille()?'selected="selected"':'' ?>>Patte D'oie</option>
                                                <option value="Patte D'oie builders" <?=isset($adresse) && $adresse->getVille()!=null && 'Patte D\'oie builders'==$adresse->getVille()?'selected="selected"':'' ?>>Patte D'oie builders</option>
                                                <option value="Petit Mbao" <?=isset($adresse) && $adresse->getVille()!=null && 'Petit Mbao'==$adresse->getVille()?'selected="selected"':'' ?>>Petit Mbao</option>
                                                <option value="Pikine" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine</option>
                                                <option value="Pikine Cité Lobatfall" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine Cité Lobatfall'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine Cité Lobatfall</option>
                                                <option value="Pikine Guinaw Rail" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine Guinaw Rail'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine Guinaw Rail</option>
                                                <option value="Pikine Icotaf" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine Icotaf'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine Icotaf</option>
                                                <option value="Pikine Khourounar" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine Khourounar'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine Khourounar</option>
                                                <option value="Pikine Nord" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine Nord'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine Nord</option>
                                                <option value="Pikine Rue 10" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine Rue 10'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine Rue 10</option>
                                                <option value="Pikine Tally Bou Bess" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine Tally Bou Bess'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine Tally Bou Bess</option>
                                                <option value="Pikine Tally Bou Mak" <?=isset($adresse) && $adresse->getVille()!=null && 'Pikine Tally Bou Mak'==$adresse->getVille()?'selected="selected"':'' ?>>Pikine Tally Bou Mak </option>
                                                <option value="Plateau" <?=isset($adresse) && $adresse->getVille()!=null && 'Plateau'==$adresse->getVille()?'selected="selected"':'' ?>>Plateau</option>
                                                <option value="Point E" <?=isset($adresse) && $adresse->getVille()!=null && 'Point E'==$adresse->getVille()?'selected="selected"':'' ?>>Point E</option>
                                                <option value="Rue 10" <?=isset($adresse) && $adresse->getVille()!=null && 'Rue 10'==$adresse->getVille()?'selected="selected"':'' ?>>Rue 10</option>
                                                <option value="Rufisque" <?=isset($adresse) && $adresse->getVille()!=null && 'Rufisque'==$adresse->getVille()?'selected="selected"':'' ?>>Rufisque</option>
                                                <option value="Scat Urbam" <?=isset($adresse) && $adresse->getVille()!=null && 'Scat Urbam'==$adresse->getVille()?'selected="selected"':'' ?>>Scat Urbam</option>
                                                <option value="Sebikotane" <?=isset($adresse) && $adresse->getVille()!=null && 'Sebikotane'==$adresse->getVille()?'selected="selected"':'' ?>>Sebikotane</option>
                                                <option value="Sicap Baobab" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Baobab'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Baobab</option>
                                                <option value="Sicap fass Mbao" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap fass Mbao'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap fass Mbao</option>
                                                <option value="Sicap Karack" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Karack'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Karack</option>
                                                <option value="Sicap Liberté 1" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Liberté 1'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Liberté 1</option>
                                                <option value="Sicap Liberté 2 " <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Liberté 2'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Liberté 2 </option>
                                                <option value="Sicap Liberté 3" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Liberté 3'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Liberté 3</option>
                                                <option value="Sicap Liberté 4" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Liberté 4'==$adresse->getVille()?'selected="selected"':'' ?> >Sicap Liberté 4</option>
                                                <option value="Sicap Liberté 5" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Liberté 5'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Liberté 5</option>
                                                <option value="Sicap Liberté 6" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Liberté 6'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Liberté 6</option>
                                                <option value="Sicap Sacre Coeur 1" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Sacre Coeur 1'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Sacre Coeur 1</option>
                                                <option value="Sicap Sacre Coeur 2" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Sacre Coeur 2'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Sacre Coeur 2</option>
                                                <option value="Sicap Sacre Coeur 3" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Sacre Coeur 3'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Sacre Coeur 3</option>
                                                <option value="Sicap Sacre coeur 3 Extension" <?=isset($adresse) && $adresse->getVille()!=null && 'Sicap Sacre coeur 3 Extension'==$adresse->getVille()?'selected="selected"':'' ?>>Sicap Sacre coeur 3 Extension</option>
                                                <option value="Soprim" <?=isset($adresse) && $adresse->getVille()!=null && 'Soprim'==$adresse->getVille()?'selected="selected"':'' ?>>Soprim</option>
                                                <option value="Sotrac Mermoz" <?=isset($adresse) && $adresse->getVille()!=null && 'Sotrac Mermoz'==$adresse->getVille()?'selected="selected"':'' ?>>Sotrac Mermoz</option>
                                                <option value="Sud Foire" <?=isset($adresse) && $adresse->getVille()!=null && 'Sud Foire'==$adresse->getVille()?'selected="selected"':'' ?>>Sud Foire</option>
                                                <option value="Thiaroye Gare" <?=isset($adresse) && $adresse->getVille()!=null && 'Thiaroye Gare'==$adresse->getVille()?'selected="selected"':'' ?>>Thiaroye Gare</option>
                                                <option value="Thiaroye sur mer" <?=isset($adresse) && $adresse->getVille()!=null && 'Thiaroye sur mer'==$adresse->getVille()?'selected="selected"':'' ?>>Thiaroye sur mer</option>
                                                <option value="Usine Bene Tally" <?=isset($adresse) && $adresse->getVille()!=null && 'Usine Bene Tally'==$adresse->getVille()?'selected="selected"':'' ?>>Usine Bene Tally</option>
                                                <option value="Usine Niary Tally" <?=isset($adresse) && $adresse->getVille()!=null && 'Usine Niary Tally'==$adresse->getVille()?'selected="selected"':'' ?>>Usine Niary Tally</option>
                                                <option value="Yeumbeul" <?=isset($adresse) && $adresse->getVille()!=null && 'Yeumbeul'==$adresse->getVille()?'selected="selected"':'' ?>>Yeumbeul</option>
                                                <option value="Yoff" <?=isset($adresse) && $adresse->getVille()!=null && 'Yoff'==$adresse->getVille()?'selected="selected"':'' ?>>Yoff</option>
                                                <option value="Zac Mbao" <?=isset($adresse) && $adresse->getVille()!=null && 'Zac Mbao'==$adresse->getVille()?'selected="selected"':'' ?>>Zac Mbao</option>
                                                <option value="Zone A et B" <?=isset($adresse) && $adresse->getVille()!=null && 'Zone A et B'==$adresse->getVille()?'selected="selected"':'' ?>>Zone A et B</option>
                                                <option value="Zone de Captage" <?=isset($adresse) && $adresse->getVille()!=null && 'Zone de Captage'==$adresse->getVille()?'selected="selected"':'' ?>>Zone de Captage </option>
                                                <option value="Zone Industrielle" <?=isset($adresse) && $adresse->getVille()!=null && 'Zone Industrielle'==$adresse->getVille()?'selected="selected"':'' ?>>Zone Industrielle</option>
                                            </select>
                                        </div>
                                        <div class="text-danger"><?=isset($erreurs['ville'])?htmlspecialchars($erreurs['ville']):'' ?></div>
                                    </div>
                                    
                                    <div class="single-contact-form">
                                        <div class="contact-box name">
                                            <input type="text" name="description" value="<?=isset($adresse) && null!==$adresse->getDescription()?htmlspecialchars($adresse->getDescription()):'' ?>" placeholder="Détails de l'adresse*" style="width:100%">
                                        </div>
                                        <div class="text-danger"><?=isset($erreurs['description'])?htmlspecialchars($erreurs['description']):'' ?></div>
                                    </div>

                                    <input type="hidden" name="form" value="adresse"/>
                                    <input type="hidden" name="action" value="ajouter"/>
									
									<div class="contact-btn">
										<button type="submit" class="fv-btn">Ajouter l'adresse</button>
									</div>
								</form>
								<div class="form-output">
									<p class="<?= !isset($erreurs)?'text-success':'text-danger'?>"><?= isset($resultatAjoutAdr)?htmlspecialchars($resultatAjoutAdr):'' ?></p>
								</div>
							</div>
						</div> 
                    
				    </div>
                
                    <div class="col-md-8">
                        <div class="contact-form-wrap mt--60">
                            <div class="col-xs-12">
                                <div class="order-details">
                                    <h5 class="order-details__title">Mes adresses</h5>
                                    <div class="order-details__item">
                                        <?$i=0;?>
                                        <?if(isset($listeAdresses) && !empty($listeAdresses)){
                                            foreach ($listeAdresses as $adr) {
                                                $i++;?>
                                                <div class="single-item">
                                                    <div class="single-item__content">
                                                        <a href="modifierAdresse?id=<?=htmlspecialchars($adr->getId())?>"><?=htmlspecialchars($adr->getDescription())?></a>
                                                        <span class="price"><?=htmlspecialchars($adr->getVille())?>, <?=htmlspecialchars($adr->getRegion())?></span>
                                                    </div>
                                                    <div class="single-item__remove">
                                                        <a href="modifierAdresse?id=<?=htmlspecialchars($adr->getId())?>"><i class="zmdi zmdi-edit"></i></a>
                                                    </div>
                                                    <div class="single-item__remove">
                                                        <form name="supprimerAdresse<?=$i?>" action="parametrage" method='post'>
                                                            <input type="hidden" name="action" value="supprimer"/>
                                                            <input type="hidden" name="form" value="adresse"/>
                                                            <input type="hidden" name="id" value="<?=htmlspecialchars($adr->getId())?>"/>
                                                            <a class="zmdi zmdi-delete" onclick="document.forms['supprimerAdresse<?=$i?>'].submit();"></a>
                                                        </form>
                                                    </div>
                                                </div>
                                            <?}
                                        }else{?>
                                            <div class="single-item__content">
                                                <span class="text-danger"><?='Aucune adresse ajoutée'?></span>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

					
            </div>
        </section>
        <!-- End Contact Area -->
        <!-- End Banner Area -->
        <!-- Start Footer Area -->
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
    <script src="vue/js/ajax-mail.js"></script>

    
    <!-- Waypoints.min.js. -->
    <script src="vue/js/waypoints.min.js"></script>
    <!-- Main js file that contents all jQuery plugins activation. -->
    <script src="vue/js/main.js"></script>

</body>

</html>