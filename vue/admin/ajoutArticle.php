<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Form Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="vue/admin/assets/css/normalize.css">
      <link rel="stylesheet" href="vue/admin/assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="vue/admin/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="vue/admin/assets/css/themify-icons.css">
      <link rel="stylesheet" href="vue/admin/assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="vue/admin/assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="vue/admin/assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="vue/admin/assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body>
      <aside id="left-panel" class="left-panel">
         <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="adminCommandes" > Gestion des commandes</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="adminArticles" > Gestion des articles</a>
                  </li>
				      <li class="menu-item-has-children dropdown">
                     <a href="adminCategories" > Gestion des catégories</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="adminComptes" > Gestion des comptes</a>
                  </li>
                  <li>
                     <a href="modifInfos" > Informations entreprise  </a>
                  </li>
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel">
         <header id="header" class="header">
            <div class="top-left">
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.html"><img src="vue/admin/images/logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" href="index.html"><img src="vue/admin/images/logo2.png" alt="Logo"></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right">
               <div class="header-menu">
                  <div class="user-area dropdown float-right">
                     <a href="accueil">Retour à l'accueil</a>
                  </div>
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Bienvenue Admin</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="parametrage"><i class=""></i>Paramétres</a>
                        <a class="nav-link" href="deconnection"><i class="fa fa-power-off"></i>Se déconnecter</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <form action="ajoutArticle" method="post" enctype="multipart/form-data">
            <div class="content pb-0">
               <div class="animated fadeIn">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header"><strong>Article</strong><small> Formulaire</small></div>
                           <div class="card-header <?=!isset($erreurs) || empty($erreurs)?'text-success':'text-danger' ?>"><?=htmlspecialchars($resultat) ?></div>
                           <div class="card-body card-block">
                              <div class="form-group"><label for="nom" class="form-control-label">Nom</label><input name="nom" type="text" id="nom" placeholder="Nom de l'article" value="<?=isset($article)?htmlspecialchars($article->getNom()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['nom'])?htmlspecialchars($erreurs['nom']):'' ?></div>
                              <div class="form-group"><label for="nom" class="form-control-label">Taille</label><input name="taille" type="text" id="taille" placeholder="Taille de l'article" value="<?=isset($article)?htmlspecialchars($article->getTaille()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['taille'])?htmlspecialchars($erreurs['taille']):'' ?></div>
                              <div class="form-group"><label for="description" class="form-control-label">Description</label><input type="text" name="description" id="description" placeholder="Description de l'article" value="<?=isset($article)?htmlspecialchars($article->getDescription()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['description'])?htmlspecialchars($erreurs['description']):'' ?></div>
                              <div class="form-group"><label for="prix" class=" form-control-label">Prix</label><input type="text" id="prix" placeholder="prix" name="prix" class="form-control" value="<?=isset($article)?htmlspecialchars($article->getPrix()):'' ?>"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['prix'])?htmlspecialchars($erreurs['prix']):'' ?></div>
                              <div class="form-group"><label for="quantité" class=" form-control-label">Quantité</label><input type="number" name="quantite" id="quantité" placeholder="Quantité" value="<?=isset($article)?htmlspecialchars($article->getQuantite()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['quantite'])?htmlspecialchars($erreurs['quantite']):'' ?></div>
                              <div class="form-group"><label for="idCategorie" class=" form-control-label">Catégorie</label>
                              <select class="ht__select" id="categorie" name="idCategorie">
                                 <option value=""></option>
                                 <?if(isset($listeCategories) && !empty($listeCategories)){
                                    foreach($listeCategories as $categ){?>
                                       <option value="<?=isset($categ)?htmlspecialchars($categ->getId()):''?>" <?=isset($categ) && isset($article) && $article->getCategorie()!==null && $categ->getId()==$article->getCategorie()->getId()?'selected="selected"':'' ?>><?=htmlspecialchars($categ->getNom())?> - <?=htmlspecialchars($categ->getGenre())?></option>
                                    <?}
                                 }?>
                              </select>
                              <br/>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['idCategorie'])?htmlspecialchars($erreurs['idCategorie']):'' ?></div>
                              <div class="form-group"> <label for="coupDeCoeur1" class=" form-control-label">Est un coup de coeur</label> <input type="radio" id="coupDeCoeur1" name="coupDeCoeur" value="1" <?=isset($article) && $article->isCoupDeCoeur()?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="coupDeCoeur2" class=" form-control-label">N'est pas un coup de coeur</label> <input type="radio" id="coupDeCoeur2" name="coupDeCoeur" value="0" <?=!isset($article) || !$article->isCoupDeCoeur()?'checked="checked"':'' ?>/> </div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['coupDeCoeur'])?htmlspecialchars($erreurs['coupDeCoeur']):'' ?></div>
                              <div class="form-group"> <label for="genre1" class=" form-control-label">Halieutiques</label> <input type="radio" id="genre1" name="genre" value="Halieurtiques" <?=isset($categorie) && $categorie->getGenre()=='Halieutiques'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre2" class=" form-control-label">Epices</label> <input type="radio" id="genre2" name="genre" value="Epices" <?=isset($categorie) && $categorie->getGenre()=='Epices'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre3" class=" form-control-label">Huiles</label> <input type="radio" id="genre3" name="genre" value="Huiles" <?=isset($categorie) && $categorie->getGenre()=='Huiles'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre4" class=" form-control-label">Boissons</label> <input type="radio" id="genre4" name="genre" value="Boissons" <?=isset($categorie) && $categorie->getGenre()=='Boissons'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre5" class=" form-control-label">Apéritifs</label> <input type="radio" id="genre5" name="genre" value="Apéritifs" <?=isset($categorie) && $categorie->getGenre()=='Apéritifs'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre6" class=" form-control-label">Féém</label> <input type="radio" id="genre6" name="genre" value="Féém" <?=isset($categorie) && $categorie->getGenre()=='Féém'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre7" class=" form-control-label">Habits</label> <input type="radio" id="genre7" name="genre" value="Habits" <?=isset($categorie) && $categorie->getGenre()=='Habits'?'checked="checked"':'' ?>/> </div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['genre'])?htmlspecialchars($erreurs['genre']):'' ?></div><div class="form-group"> <label for="solde1" class=" form-control-label">Est soldé</label> <input type="radio" id="solde1" name="solde" value="1" <?=isset($article) && $article->isSolde()?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="solde2" class=" form-control-label">N'est pas soldé</label> <input type="radio" id="solde2" name="solde" value="0" <?=!isset($article) || !$article->isSolde()?'checked="checked"':'' ?>/> </div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['solde'])?htmlspecialchars($erreurs['solde']):'' ?></div>
                              <div class="form-group"><label for="pourcentageSolde" class=" form-control-label">Pourcentage solde</label><input type="text" name="pourcentageSolde" id="pourcentageSolde" placeholder="Pourcentage du solde" value="<?=isset($article)?htmlspecialchars($article->getPourcentageSolde()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['pourcentageSolde'])?htmlspecialchars($erreurs['pourcentageSolde']):'' ?></div>
                              <div class="form-group"><label for="image1" class=" form-control-label">Image de présentation</label><input type="file" id="image1" name="image1" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['image1'])?htmlspecialchars($erreurs['image1']):'' ?></div>
                              <div class="form-group"><label for="motsCles" class=" form-control-label">Mots clés</label><input type="text" name="motsCles" id="motsCles" placeholder="Mots clés pour la recherche d'articles" value="<?=isset($article)?htmlspecialchars($article->getMotsCles()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['motsCles'])?htmlspecialchars($erreurs['motsCles']):'' ?></div>
                              <input type="hidden" name="action" value="ajouter">
                              <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                              <span id="payment-button-amount">Ajouter l'article</span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
         <div class="clearfix"></div>
         <footer class="site-footer">
            <div class="footer-inner bg-white">
               <div class="row">
                  <div class="col-sm-6">
                     Copyright &copy; 2018 Ela Admin
                  </div>
                  <div class="col-sm-6 text-right">
                     Designed by <a href="https://colorlib.com/">Colorlib</a>
                  </div>
               </div>
            </div>
         </footer>
      </div>
      <script src="vue/admin/assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="vue/admin/assets/js/popper.min.js" type="text/javascript"></script>
      <script src="vue/admin/assets/js/plugins.js" type="text/javascript"></script>
      <script src="vue/admin/assets/js/main.js" type="text/javascript"></script>
   </body>
</html>