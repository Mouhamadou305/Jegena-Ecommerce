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
                           <h4 class="box-title">Articles </h4>
                        </div>
                        <div class="card-body--">
                           <div class="htc__select__option">
                              <form method="get" action="adminArticles" name="changerCategorie">
                                 <label for="categorie">Filtrer le contenu:</label>
                                 <select class="ht__select" id="categorie" name="categorie" onchange="document.forms['changerCategorie'].submit();">
                                       <option value="0">Toutes catégories</option>
                                       <?if(isset($listeCategories) && !empty($listeCategories)){
                                          foreach($listeCategories as $categ){?>
                                             <option value="<?=htmlspecialchars($categ->getId())?>" <?=isset($categorie)&&$categ->getId()==$categorie->getId()?'selected="selected"':'' ?>><?=htmlspecialchars($categ->getNom())?></option>
                                          <?}
                                       }?>
                                 </select>
                              </form>
                              <a class="btn btn-primary" href="ajoutArticle">Ajouter un nouvel article</a>
                           </div>
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead >
                                    <tr>
                                       <th class="serial" style="color:#c43b68">ID</th>
                                       <th class="avatar" style="color:#c43b68">Modèle</th>
                                       <th style="color:#c43b68">Nom</th>
                                       <th style="color:#c43b68">Genre</th>
                                       <th style="color:#c43b68">Catégorie</th>
                                       <th style="color:#c43b68">Prix</th>
                                       <th style="color:#c43b68">Taille</th> 
                                       <th style="color:#c43b68">Quantité</th>
                                       <th style="color:#c43b68">Soldé</th>
                                       <th style="color:#c43b68">Modifier</th>
                                       <th style="color:#c43b68">Supprimer</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?foreach($listeArticles as $article) {?>
                                          <tr>
                                             <td style="color:#c43b68" class="serial"><?=htmlspecialchars($article->getId()) ?></td>
                                             <td style="color:#c43b68" class="avatar">
                                                <div class="round-img">
                                                   <a href="#"><img src=<?=$manager->trouverImage($article)!==null && $manager->trouverImage($article)->getEmplacement()!==null?htmlspecialchars($manager->trouverImage($article)->getEmplacement()):"vue/images/product-2/cart-img/1.jpg"?> alt="product images"></a>
                                                </div>
                                             </td>
                                             <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($article->getNom()) ?></span> </td>
                                             <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($article->getGenre()) ?></span> </td>
                                             <td> <span style="color:#c43b68" class="product"><?=htmlspecialchars($article->getCategorie()->getNom())?></span> </td>
                                             <td><span style="color:#c43b68" class="count"><?=htmlspecialchars($article->getPrix()) ?></span></td>
                                             <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($article->getTaille())?></span> </td>
                                             <td><span style="color:#c43b68" class="count"><?=htmlspecialchars($article->getQuantite()) ?></span></td>
                                             <td> <span style="color:#c43b68" class="name"><?=$article->isSolde()?'OUI':'NON' ?></span> </td>
                                             <td>
                                                <a class="btn btn-primary" href="modifArticle?article=<?=htmlspecialchars($article->getId()) ?>">Modifier</a>
                                             </td>
                                             <td>
                                                <form action="supprArticle" onsubmit="return confirm('En supprimant cet article, vous le retirez des commandes et des paniers qui le contenait. Êtes vous sûre de vouloir supprimer cet article?');" method="post"><input type="hidden" name="id" value="<?=htmlspecialchars($article->getId()) ?>"/><input type="submit" class="btn btn-danger" value="Supprimer"/></form>
                                             </td>
                                          </tr>
                                    <?}?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <div class="container">
                        <ul class="pagination">
                           <li class="page-item"><a class="page-link" href="adminArticles?<?=isset($categorie)?'categorie='.htmlspecialchars($categorie->getId()):'' ?>&amp;page=<?=htmlspecialchars($page)>1?htmlspecialchars($page)-1:'1' ?>" style="color:#c43b68">Previous</a></li>
                           <?for($numPage=1; $numPage<=$nbrPages; $numPage++){?>
                              <li class="page-item"><a class="page-link" href="adminArticles?<?=isset($categorie)?'categorie='.htmlspecialchars($categorie->getId()):'' ?>&amp;page=<?=htmlspecialchars($numPage) ?>" style="<?=htmlspecialchars($page)!=$numPage?'color:#c43b68':'background-color:#c43b68'?>"><?=htmlspecialchars($numPage) ?></a></li>
                           <?}?>
                           <li class="page-item"><a class="page-link" href="adminArticles?<?=isset($categorie)?'categorie='.htmlspecialchars($categorie->getId()):'' ?>&amp;page=<?=htmlspecialchars($page)<$nbrPages?htmlspecialchars($page)+1:htmlspecialchars($nbrPages) ?>" style="color:#c43b68">Next</a></li>
                        </ul>
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