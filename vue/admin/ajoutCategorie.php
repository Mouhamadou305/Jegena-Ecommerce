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
         <form action="ajoutCategorie" method="post">
            <div class="content pb-0">
               <div class="animated fadeIn">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header"><strong>Catégorie</strong><small> Formulaire</small></div>
                           <div class="card-header <?=!isset($erreurs) || empty($erreurs)?'text-success':'text-danger' ?>"><?=$resultat ?></div>
                           <div class="card-body card-block">
                              <div class="form-group"><label for="nom" class="form-control-label">Nom</label><input name="nom" type="text" id="nom" placeholder="Nom de la catégorie" value="<?=isset($categorie)?htmlspecialchars($categorie->getNom()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['nom'])?htmlspecialchars($erreurs['nom']):'' ?></div>
                              <br/>
                              <div class="form-group"> <label for="genre1" class=" form-control-label">Halieutiques</label> <input type="radio" id="genre1" name="genre" value="Halieurtiques" <?=isset($categorie) && $categorie->getGenre()=='Halieutiques'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre2" class=" form-control-label">Epices</label> <input type="radio" id="genre2" name="genre" value="Epices" <?=isset($categorie) && $categorie->getGenre()=='Epices'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre3" class=" form-control-label">Huiles</label> <input type="radio" id="genre3" name="genre" value="Huiles" <?=isset($categorie) && $categorie->getGenre()=='Huiles'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre4" class=" form-control-label">Boissons</label> <input type="radio" id="genre4" name="genre" value="Boissons" <?=isset($categorie) && $categorie->getGenre()=='Boissons'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre5" class=" form-control-label">Apéritifs</label> <input type="radio" id="genre5" name="genre" value="Apéritifs" <?=isset($categorie) && $categorie->getGenre()=='Apéritifs'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre6" class=" form-control-label">Féém</label> <input type="radio" id="genre6" name="genre" value="Féém" <?=isset($categorie) && $categorie->getGenre()=='Féém'?'checked="checked"':'' ?>/> </div>
                              <div class="form-group"> <label for="genre7" class=" form-control-label">Habits</label> <input type="radio" id="genre7" name="genre" value="Habits" <?=isset($categorie) && $categorie->getGenre()=='Habits'?'checked="checked"':'' ?>/> </div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['genre'])?htmlspecialchars($erreurs['genre']):'' ?></div>
                              <input type="hidden" name="action" value="ajouter">
                              <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                              <span id="payment-button-amount">Ajouter la catégorie</span>
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