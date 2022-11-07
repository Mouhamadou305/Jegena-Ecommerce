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
         <form action="modifInfos" method="post">
            <div class="content pb-0">
               <div class="animated fadeIn">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-header"><strong>Article</strong><small> Formulaire</small></div>
                           <div class="card-header <?=!isset($erreurs) || empty($erreurs)?'text-success':'text-danger' ?>"><?=htmlspecialchars($resultat) ?></div>
                           <div class="card-body card-block">
                              <div class="form-group"><label for="nom" class=" form-control-label">Nom</label><input name="nom" type="text" id="nom" placeholder="Nom de l'entreprise" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getNom()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['nom'])?htmlspecialchars($erreurs['nom']):'' ?></div>
                              <div class="form-group"><label for="numeroTelephone1" class=" form-control-label">Numéro téléphone 1:</label><input type="text" name="numeroTelephone1" id="numeroTelephone1" placeholder="numéro de téléphone" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getNumeroTelephone1()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['numeroTelephone1'])?htmlspecialchars($erreurs['numeroTelephone1']):'' ?></div>
                              <div class="form-group"><label for="numeroTelephone2" class=" form-control-label">Numéro Téléphone 2:</label><input type="text" id="numeroTelephone2" placeholder="numeroTelephone2" name="numeroTelephone2" class="form-control" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getNumeroTelephone2()):'' ?>"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['numeroTelephone2'])?htmlspecialchars($erreurs['numeroTelephone2']):'' ?></div>
                              <div class="form-group"><label for="adresseMail" class=" form-control-label">Adresse email</label><input type="text" name="adresseMail" id="adresseMail" placeholder="Adresse email" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getAdresseMail()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['adresseMail'])?htmlspecialchars($erreurs['adresseMail']):'' ?></div>
                              <div class="form-group"><label for="mailNotification" class=" form-control-label">Adresse email de notification</label><input type="text" name="mailNotification" id="mailNotification" placeholder="Adresse email de notification" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getMailNotification()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['mailNotification'])?htmlspecialchars($erreurs['mailNotification']):'' ?></div>
                              <div class="form-group"><label for="fraisLivraison" class=" form-control-label">Frais de livraison</label><input type="text" name="fraisLivraison" id="fraisLivraison" placeholder="Frais de livraison" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getFraisLivraison()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['fraisLivraison'])?htmlspecialchars($erreurs['fraisLivraison']):'' ?></div>
                              <div class="form-group"><label for="adresse" class=" form-control-label">Adresse</label><input type="text" name="adresse" id="adresse" placeholder="Adresse" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getAdresse()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['adresse'])?htmlspecialchars($erreurs['adresse']):'' ?></div>
                              <div class="form-group"><label for="twitter" class=" form-control-label">Page twitter</label><input type="text" name="twitter" id="twitter" placeholder="page twitter" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getTwitter()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['twitter'])?htmlspecialchars($erreurs['twitter']):'' ?></div>
                              <div class="form-group"><label for="instagram" class=" form-control-label">Page instagram</label><input type="text" name="instagram" id="instagram" placeholder="page instagram" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getInstagram()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['instagram'])?htmlspecialchars($erreurs['instagram']):'' ?></div>
                              <div class="form-group"><label for="facebook" class=" form-control-label">Page Facebook</label><input type="text" name="facebook" id="facebook" placeholder="Page facebook" value="<?=isset($entreprise)?htmlspecialchars($entreprise->getFacebook()):'' ?>" class="form-control"></div>
                              <div class="alert alert-info text-danger"><?=isset($erreurs) && isset($erreurs['facebook'])?htmlspecialchars($erreurs['facebook']):'' ?></div>
                              <input type="hidden" name="action" value="modifier">
                              <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                              <span id="payment-button-amount">Modifier l'entreprise</span>
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