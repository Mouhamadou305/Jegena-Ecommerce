<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Page</title>
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
                  <a class="navbar-brand" href="accueilAdmin"><img src="vue/admin/images/logo.png" alt="Logo"></a>
                  <a class="navbar-brand hidden" href="accueilAdmin"><img src="vue/admin/images/logo2.png" alt="Logo"></a>
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
         <div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body" style="background-color:#c43b68">
                           <h4 class="box-title">Categories </h4>
                        </div>
                        <div class="card-body--">
                           <a class="btn btn-primary" href="ajoutCategorie">Ajouter une nouvelle catégorie</a>
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead >
                                    <tr>
                                       <th class="serial" style="color:#c43b68">ID</th>
                                       <th style="color:#c43b68">Nom</th>
                                       <th style="color:#c43b68">Genre</th>
                                       <th style="color:#c43b68">Modifier</th>
                                       <th style="color:#c43b68">Supprimer</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?if(isset($listeCategories) && !empty($listeCategories)){
                                       foreach($listeCategories as $categorie) {?>
                                       <tr>
                                          <td style="color:#c43b68" class="serial"><?=htmlspecialchars($categorie->getId()) ?></td>
                                          <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($categorie->getNom()) ?></span> </td>
                                          <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($categorie->getGenre()) ?></span> </td>
                                          <td>
                                             <a class="btn btn-primary" href="modifCategorie?categorie=<?=htmlspecialchars($categorie->getId()) ?>">Modifier</a>
                                          </td>
                                          <td>
                                             <form action="supprCategorie" onsubmit="return confirm('En supprimant cette catégorie, vous supprimez tous les articles de cette catégorie. Êtes vous sûre de vouloir supprimer cette catégorie?');" method="post"><input type="hidden" name="id" value="<?=htmlspecialchars($categorie->getId()) ?>"/><input type="submit" class="btn btn-danger" value="Supprimer"/></form>
                                          </td>
                                       </tr>
                                    <?}
                                 }?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
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