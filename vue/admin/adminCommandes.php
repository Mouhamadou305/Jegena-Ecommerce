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
                           <h4 class="box-title">Commandes </h4>
                        </div>
                        <div class="card-body--">
                           <form method="get" action="adminCommandes" name="changerCategorie">
                              <div class="htc__select__option">
                                 <label for="statut">Filtrer par statut:</label>
                                 <select class="ht__select" id="statut" name="statut" onchange="document.forms['changerCategorie'].submit();">
                                    <option value="tout" >Tout</option>
                                    <option value="en attente" <?='en attente'==$statut?'selected="selected"':'' ?>>En attente</option>
                                    <option value="livré" <?='livré'==$statut?'selected="selected"':'' ?>>Livrée</option>
                                    <option value="non-livré" <?='non-livré'==$statut?'selected="selected"':'' ?>>Non-livrée</option>
                                 </select>
                              </div>
                              <div class="htc__select__option">
                                 <label for="adresse">Filtrer par adresse:</label>
                                 <select class="ht__select" id="adresse" name="adresse" onchange="document.forms['changerCategorie'].submit();">
                                    <option value="tout" >Tout</option>
                                    <option value="Amitie 1" <?=isset($adresse) && $adresse!=null && 'Amitie 1'==$adresse?'selected="selected"':'' ?>>Amitie 1</option>
                                    <option value="Amitie 2" <?=isset($adresse) && $adresse!=null && 'Amitie 2'==$adresse?'selected="selected"':'' ?>>Amitie 2</option>
                                    <option value="Amitie 3" <?=isset($adresse) && $adresse!=null && 'Amitie 3'==$adresse?'selected="selected"':'' ?>>Amitie 3</option>
                                    <option value="Bargny" <?=isset($adresse) && $adresse!=null && 'Bargny'==$adresse?'selected="selected"':'' ?>>Bargny</option>
                                    <option value="Bel Air" <?=isset($adresse) && $adresse!=null && 'Bel Air'==$adresse?'selected="selected"':'' ?>>Bel Air</option>
                                    <option value="Bop" <?=isset($adresse) && $adresse!=null && 'Bop'==$adresse?'selected="selected"':'' ?>>Bop</option>
                                    <option value="Camberene" <?=isset($adresse) && $adresse!=null && 'Camberene'==$adresse?'selected="selected"':'' ?>>Camberene</option>
                                    <option value="Castor" <?=isset($adresse) && $adresse!=null && 'Castor'==$adresse?'selected="selected"':'' ?>>Castor</option>
                                    <option value="Centenaire" <?=isset($adresse) && $adresse!=null && 'Centenaire'==$adresse?'selected="selected"':'' ?>>Centenaire</option>
                                    <option value="Cite Keur Damel" <?=isset($adresse) && $adresse!=null && 'Cite Keur Damel'==$adresse?'selected="selected"':'' ?>>Cite Keur Damel</option>
                                    <option value="Cite Keur Gorgui" <?=isset($adresse) && $adresse!=null && 'Cite Keur Gorgui'==$adresse?'selected="selected"':'' ?>>Cite Keur Gorgui</option>
                                    <option value="Colobane" <?=isset($adresse) && $adresse!=null && 'Colobane'==$adresse?'selected="selected"':'' ?>>Colobane</option>
                                    <option value="Dalifort" <?=isset($adresse) && $adresse!=null && 'Dalifort'==$adresse?'selected="selected"':'' ?>>Dalifort</option>
                                    <option value="Derkle" <?=isset($adresse) && $adresse!=null && 'Derkle'==$adresse?'selected="selected"':'' ?>>Derkle</option>
                                    <option value="Diamagueune" <?=isset($adresse) && $adresse!=null && 'Diamagueune'==$adresse?'selected="selected"':'' ?>>Diamagueune</option>
                                    <option value="Diamalaye" <?=isset($adresse) && $adresse!=null && 'Diamalaye'==$adresse?'selected="selected"':'' ?>>Diamalaye</option>
                                    <option value="Dieuppeul" <?=isset($adresse) && $adresse!=null && 'Dieuppeul'==$adresse?'selected="selected"':'' ?>>Dieuppeul</option>
                                    <option value="Fann" <?=isset($adresse) && $adresse!=null && 'Fann'==$adresse?'selected="selected"':'' ?>>Fann</option>
                                    <option value="Fann Hock" <?=isset($adresse) && $adresse!=null && 'Fann Hock'==$adresse?'selected="selected"':'' ?>>Fann Hock</option>
                                    <option value="Fann Residence" <?=isset($adresse) && $adresse!=null && 'Fann Residence'==$adresse?'selected="selected"':'' ?>>Fann Residence</option>
                                    <option value="Fass" <?=isset($adresse) && $adresse!=null && 'Fass'==$adresse?'selected="selected"':'' ?>>Fass</option>
                                    <option value="Fass Paillote" <?=isset($adresse) && $adresse!=null && 'Fass Paillote'==$adresse?'selected="selected"':'' ?>>Fass Paillote</option>
                                    <option value="Fenetre Mermoz" <?=isset($adresse) && $adresse!=null && 'Fenetre Mermoz'==$adresse?'selected="selected"':'' ?>>Fenetre Mermoz</option>
                                    <option value="Golf" <?=isset($adresse) && $adresse!=null && 'Golf'==$adresse?'selected="selected"':'' ?>>Golf</option>
                                    <option value="Grand Dakar" <?=isset($adresse) && $adresse!=null && 'Grand Dakar'==$adresse?'selected="selected"':'' ?>>Grand Dakar</option>
                                    <option value="Grand Mbao" <?=isset($adresse) && $adresse!=null && 'Grand Mbao'==$adresse?'selected="selected"':'' ?>>Grand Mbao</option>
                                    <option value="Grand Medine" <?=isset($adresse) && $adresse!=null && 'Grand Medine'==$adresse?'selected="selected"':'' ?>>Grand Medine</option>
                                    <option value="Grand Yoff" <?=isset($adresse) && $adresse!=null && 'Grand Yoff'==$adresse?'selected="selected"':'' ?>>Grand Yoff</option>
                                    <option value="Guediawaye" <?=isset($adresse) && $adresse!=null && 'Guediawaye'==$adresse?'selected="selected"':'' ?>>Guediawaye</option>
                                    <option value="Guediawaye - Cite Gadaye" <?=isset($adresse) && $adresse!=null && 'Guediawaye - Cite Gadaye'==$adresse?'selected="selected"':'' ?>>Guediawaye - Cite Gadaye</option>
                                    <option value="Guediawaye - P.A.I" <?=isset($adresse) && $adresse!=null && 'Guediawaye - P.A.I'==$adresse?'selected="selected"':'' ?>>Guediawaye - P.A.I</option>
                                    <option value="Gueule Tapee" <?=isset($adresse) && $adresse!=null && 'Gueule Tapee'==$adresse?'selected="selected"':'' ?>>Gueule Tapee</option>
                                    <option value="H.L.M (1-2-3-4-5-6)" <?=isset($adresse) && $adresse!=null && 'H.L.M (1-2-3-4-5-6)'==$adresse?'selected="selected"':'' ?>>H.L.M (1-2-3-4-5-6)</option>
                                    <option value="H.L.M Patte d'Oie" <?=isset($adresse) && $adresse!=null && 'H.L.M Patte d\'Oie'==$adresse?'selected="selected"':'' ?>>H.L.M Patte d'Oie</option>
                                    <option value="Hamo (1-2-3-4-5-6)" <?=isset($adresse) && $adresse!=null && 'Hamo (1-2-3-4-5-6)'==$adresse?'selected="selected"':'' ?>>Hamo (1-2-3-4-5-6)</option>
                                    <option value="Hann Bel Air" <?=isset($adresse) && $adresse!=null && 'Hann Bel Air'==$adresse?'selected="selected"':'' ?>>Hann Bel Air</option>
                                    <option value="Hann Marinas" <?=isset($adresse) && $adresse!=null && 'Hann Marinas'==$adresse?'selected="selected"':'' ?>>Hann Marinas</option>
                                    <option value="Hann Mariste" <?=isset($adresse) && $adresse!=null && 'Hann Mariste'==$adresse?'selected="selected"':'' ?>>Hann Mariste</option>
                                    <option value="HLM Grand Medine" <?=isset($adresse) && $adresse!=null && 'HLM Grand Medine'==$adresse?'selected="selected"':'' ?>>HLM Grand Medine</option>
                                    <option value="HLM Grand Yoff" <?=isset($adresse) && $adresse!=null && 'HLM Grand Yoff'==$adresse?'selected="selected"':'' ?>>HLM Grand Yoff</option>
                                    <option value="HLM Las Palmas" <?=isset($adresse) && $adresse!=null && 'HLM Las Palmas'==$adresse?'selected="selected"':'' ?>>HLM Las Palmas</option>
                                    <option value="Keur Massar" <?=isset($adresse) && $adresse!=null && 'Keur Massar'==$adresse?'selected="selected"':'' ?>>Keur Massar</option>
                                    <option value="Keur Massar Diakhaye" <?=isset($adresse) && $adresse!=null && 'Keur Massar Diakhaye'==$adresse?'selected="selected"':'' ?>>Keur Massar Diakhaye</option>
                                    <option value="Keur Massar Parcelles Assainies" <?=isset($adresse) && $adresse!=null && 'Keur Massar Parcelles Assainies'==$adresse?'selected="selected"':'' ?>>Keur Massar Parcelles Assainies</option>
                                    <option value="Keur Massar Village" <?=isset($adresse) && $adresse!=null && 'Keur Massar Village'==$adresse?'selected="selected"':'' ?>>Keur Massar Village</option>
                                    <option value="Keur Mbaye Fall" <?=isset($adresse) && $adresse!=null && 'Keur Mbaye Fall'==$adresse?'selected="selected"':'' ?>>Keur Mbaye Fall</option>
                                    <option value="Liberté 6 - Cité Sipres" <?=isset($adresse) && $adresse!=null && 'Liberté 6 - Cité Sipres'==$adresse?'selected="selected"':'' ?>>Liberté 6 - Cité Sipres</option>
                                    <option value="Liberté 6 - Cité Sonatel" <?=isset($adresse) && $adresse!=null && 'Liberté 6 - Cité Sonatel'==$adresse?'selected="selected"':'' ?>>Liberté 6 - Cité Sonatel</option>
                                    <option value="Liberte 6 extension" <?=isset($adresse) && $adresse!=null && 'Liberte 6 extension'==$adresse?'selected="selected"':'' ?>>Liberte 6 extension</option>
                                    <option value="Malika" <?=isset($adresse) && $adresse!=null && 'Malika'==$adresse?'selected="selected"':'' ?>>Malika</option>
                                    <option value="Mamelle" <?=isset($adresse) && $adresse!=null && 'Mamelle'==$adresse?'selected="selected"':'' ?>>Mamelle</option>
                                    <option value="Maristes" <?=isset($adresse) && $adresse!=null && 'Maristes'==$adresse?'selected="selected"':'' ?>>Maristes</option>
                                    <option value="Mbao - Cité Sipres" <?=isset($adresse) && $adresse!=null && 'Mbao - Cité Sipres'==$adresse?'selected="selected"':'' ?>>Mbao - Cité Sipres</option>
                                    <option value="Medina" <?=isset($adresse) && $adresse!=null && 'Medina'==$adresse?'selected="selected"':'' ?>>Medina</option>
                                    <option value="Medina Gounass" <?=isset($adresse) && $adresse!=null && 'Medina Gounass'==$adresse?'selected="selected"':'' ?>>Medina Gounass</option>
                                    <option value="Mermoz" <?=isset($adresse) && $adresse!=null && 'Mermoz'==$adresse?'selected="selected"':'' ?>>Mermoz</option>
                                    <option value="Ngor - Almadies" <?=isset($adresse) && $adresse!=null && 'Ngor - Almadies'==$adresse?'selected="selected"':'' ?>>Ngor - Almadies</option>
                                    <option value="Nord foire" <?=isset($adresse) && $adresse!=null && 'Nord foire'==$adresse?'selected="selected"':'' ?>>Nord foire</option>
                                    <option value="Ouakam" <?=isset($adresse) && $adresse!=null && 'Ouakam'==$adresse?'selected="selected"':'' ?>>Ouakam</option>
                                    <option value="Ouest foire" <?=isset($adresse) && $adresse!=null && 'Ouest foire'==$adresse?'selected="selected"':'' ?>>Ouest foire</option>
                                    <option value="Parcelles - Cite Fadia" <?=isset($adresse) && $adresse!=null && 'Parcelles - Cite Fadia'==$adresse?'selected="selected"':'' ?>>Parcelles - Cite Fadia</option>
                                    <option value="Parcelles - Cite Nations Unies" <?=isset($adresse) && $adresse!=null && 'Parcelles - Cite Nations Unies'==$adresse?'selected="selected"':'' ?>>Parcelles - Cite Nations Unies</option>
                                    <option value="Parcelles Assainies" <?=isset($adresse) && $adresse!=null && 'Parcelles Assainies'==$adresse?'selected="selected"':'' ?>>Parcelles Assainies</option>
                                    <option value="Patte D'oie" <?=isset($adresse) && $adresse!=null && 'Patte D\'oie'==$adresse?'selected="selected"':'' ?>>Patte D'oie</option>
                                    <option value="Patte D'oie builders" <?=isset($adresse) && $adresse!=null && 'Patte D\'oie builders'==$adresse?'selected="selected"':'' ?>>Patte D'oie builders</option>
                                    <option value="Petit Mbao" <?=isset($adresse) && $adresse!=null && 'Petit Mbao'==$adresse?'selected="selected"':'' ?>>Petit Mbao</option>
                                    <option value="Pikine" <?=isset($adresse) && $adresse!=null && 'Pikine'==$adresse?'selected="selected"':'' ?>>Pikine</option>
                                    <option value="Pikine Cité Lobatfall" <?=isset($adresse) && $adresse!=null && 'Pikine Cité Lobatfall'==$adresse?'selected="selected"':'' ?>>Pikine Cité Lobatfall</option>
                                    <option value="Pikine Guinaw Rail" <?=isset($adresse) && $adresse!=null && 'Pikine Guinaw Rail'==$adresse?'selected="selected"':'' ?>>Pikine Guinaw Rail</option>
                                    <option value="Pikine Icotaf" <?=isset($adresse) && $adresse!=null && 'Pikine Icotaf'==$adresse?'selected="selected"':'' ?>>Pikine Icotaf</option>
                                    <option value="Pikine Khourounar" <?=isset($adresse) && $adresse!=null && 'Pikine Khourounar'==$adresse?'selected="selected"':'' ?>>Pikine Khourounar</option>
                                    <option value="Pikine Nord" <?=isset($adresse) && $adresse!=null && 'Pikine Nord'==$adresse?'selected="selected"':'' ?>>Pikine Nord</option>
                                    <option value="Pikine Rue 10" <?=isset($adresse) && $adresse!=null && 'Pikine Rue 10'==$adresse?'selected="selected"':'' ?>>Pikine Rue 10</option>
                                    <option value="Pikine Tally Bou Bess" <?=isset($adresse) && $adresse!=null && 'Pikine Tally Bou Bess'==$adresse?'selected="selected"':'' ?>>Pikine Tally Bou Bess</option>
                                    <option value="Pikine Tally Bou Mak" <?=isset($adresse) && $adresse!=null && 'Pikine Tally Bou Mak'==$adresse?'selected="selected"':'' ?>>Pikine Tally Bou Mak </option>
                                    <option value="Plateau" <?=isset($adresse) && $adresse!=null && 'Plateau'==$adresse?'selected="selected"':'' ?>>Plateau</option>
                                    <option value="Point E" <?=isset($adresse) && $adresse!=null && 'Point E'==$adresse?'selected="selected"':'' ?>>Point E</option>
                                    <option value="Rue 10" <?=isset($adresse) && $adresse!=null && 'Rue 10'==$adresse?'selected="selected"':'' ?>>Rue 10</option>
                                    <option value="Rufisque" <?=isset($adresse) && $adresse!=null && 'Rufisque'==$adresse?'selected="selected"':'' ?>>Rufisque</option>
                                    <option value="Scat Urbam" <?=isset($adresse) && $adresse!=null && 'Scat Urbam'==$adresse?'selected="selected"':'' ?>>Scat Urbam</option>
                                    <option value="Sebikotane" <?=isset($adresse) && $adresse!=null && 'Sebikotane'==$adresse?'selected="selected"':'' ?>>Sebikotane</option>
                                    <option value="Sicap Baobab" <?=isset($adresse) && $adresse!=null && 'Sicap Baobab'==$adresse?'selected="selected"':'' ?>>Sicap Baobab</option>
                                    <option value="Sicap fass Mbao" <?=isset($adresse) && $adresse!=null && 'Sicap fass Mbao'==$adresse?'selected="selected"':'' ?>>Sicap fass Mbao</option>
                                    <option value="Sicap Karack" <?=isset($adresse) && $adresse!=null && 'Sicap Karack'==$adresse?'selected="selected"':'' ?>>Sicap Karack</option>
                                    <option value="Sicap Liberté 1" <?=isset($adresse) && $adresse!=null && 'Sicap Liberté 1'==$adresse?'selected="selected"':'' ?>>Sicap Liberté 1</option>
                                    <option value="Sicap Liberté 2 " <?=isset($adresse) && $adresse!=null && 'Sicap Liberté 2'==$adresse?'selected="selected"':'' ?>>Sicap Liberté 2 </option>
                                    <option value="Sicap Liberté 3" <?=isset($adresse) && $adresse!=null && 'Sicap Liberté 3'==$adresse?'selected="selected"':'' ?>>Sicap Liberté 3</option>
                                    <option value="Sicap Liberté 4" <?=isset($adresse) && $adresse!=null && 'Sicap Liberté 4'==$adresse?'selected="selected"':'' ?> >Sicap Liberté 4</option>
                                    <option value="Sicap Liberté 5" <?=isset($adresse) && $adresse!=null && 'Sicap Liberté 5'==$adresse?'selected="selected"':'' ?>>Sicap Liberté 5</option>
                                    <option value="Sicap Liberté 6" <?=isset($adresse) && $adresse!=null && 'Sicap Liberté 6'==$adresse?'selected="selected"':'' ?>>Sicap Liberté 6</option>
                                    <option value="Sicap Sacre Coeur 1" <?=isset($adresse) && $adresse!=null && 'Sicap Sacre Coeur 1'==$adresse?'selected="selected"':'' ?>>Sicap Sacre Coeur 1</option>
                                    <option value="Sicap Sacre Coeur 2" <?=isset($adresse) && $adresse!=null && 'Sicap Sacre Coeur 2'==$adresse?'selected="selected"':'' ?>>Sicap Sacre Coeur 2</option>
                                    <option value="Sicap Sacre Coeur 3" <?=isset($adresse) && $adresse!=null && 'Sicap Sacre Coeur 3'==$adresse?'selected="selected"':'' ?>>Sicap Sacre Coeur 3</option>
                                    <option value="Sicap Sacre coeur 3 Extension" <?=isset($adresse) && $adresse!=null && 'Sicap Sacre coeur 3 Extension'==$adresse?'selected="selected"':'' ?>>Sicap Sacre coeur 3 Extension</option>
                                    <option value="Soprim" <?=isset($adresse) && $adresse!=null && 'Soprim'==$adresse?'selected="selected"':'' ?>>Soprim</option>
                                    <option value="Sotrac Mermoz" <?=isset($adresse) && $adresse!=null && 'Sotrac Mermoz'==$adresse?'selected="selected"':'' ?>>Sotrac Mermoz</option>
                                    <option value="Sud Foire" <?=isset($adresse) && $adresse!=null && 'Sud Foire'==$adresse?'selected="selected"':'' ?>>Sud Foire</option>
                                    <option value="Thiaroye Gare" <?=isset($adresse) && $adresse!=null && 'Thiaroye Gare'==$adresse?'selected="selected"':'' ?>>Thiaroye Gare</option>
                                    <option value="Thiaroye sur mer" <?=isset($adresse) && $adresse!=null && 'Thiaroye sur mer'==$adresse?'selected="selected"':'' ?>>Thiaroye sur mer</option>
                                    <option value="Usine Bene Tally" <?=isset($adresse) && $adresse!=null && 'Usine Bene Tally'==$adresse?'selected="selected"':'' ?>>Usine Bene Tally</option>
                                    <option value="Usine Niary Tally" <?=isset($adresse) && $adresse!=null && 'Usine Niary Tally'==$adresse?'selected="selected"':'' ?>>Usine Niary Tally</option>
                                    <option value="Yeumbeul" <?=isset($adresse) && $adresse!=null && 'Yeumbeul'==$adresse?'selected="selected"':'' ?>>Yeumbeul</option>
                                    <option value="Yoff" <?=isset($adresse) && $adresse!=null && 'Yoff'==$adresse?'selected="selected"':'' ?>>Yoff</option>
                                    <option value="Zac Mbao" <?=isset($adresse) && $adresse!=null && 'Zac Mbao'==$adresse?'selected="selected"':'' ?>>Zac Mbao</option>
                                    <option value="Zone A et B" <?=isset($adresse) && $adresse!=null && 'Zone A et B'==$adresse?'selected="selected"':'' ?>>Zone A et B</option>
                                    <option value="Zone de Captage" <?=isset($adresse) && $adresse!=null && 'Zone de Captage'==$adresse?'selected="selected"':'' ?>>Zone de Captage </option>
                                    <option value="Zone Industrielle" <?=isset($adresse) && $adresse!=null && 'Zone Industrielle'==$adresse?'selected="selected"':'' ?>>Zone Industrielle</option>
                                 </select>
                              </div>
                              <div class="htc__select__option">
                                 <label for="statut">Trier le contenu par adresse:</label>
                                 <input type="checkbox" name="trierParAdresse" <?=isset($_GET['trierParAdresse'])?'checked="checked"':''?> onchange="document.forms['changerCategorie'].submit();" />
                              </div>
                           </form>
                           <h3 class="text-primary"><?=isset($_GET['resultat'])?htmlspecialchars($_GET['resultat']):'' ?></h3>
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead >
                                    <tr>
                                       <th class="serial" style="color:#c43b68">ID</th>
                                       <th style="color:#c43b68">Statut</th>
                                       <th style="color:#c43b68">Date Commande</th>
                                       <th style="color:#c43b68">Date Livraison</th>
                                       <th style="color:#c43b68">Coût</th>
                                       <th style="color:#c43b68">Méthode de paiement</th>
                                       <th style="color:#c43b68">Payé</th>
                                       <th style="color:#c43b68">Nom</th>
                                       <th style="color:#c43b68">Adresse</th>
                                       <th style="color:#c43b68">Téléphone</th>
                                       <th style="color:#c43b68">Visualiser</th>
                                       <th style="color:#c43b68">Livré</th>
                                       <th style="color:#c43b68">Non livré</th>
                                       <th style="color:#c43b68">Supprimer</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?foreach($listeCommandes as $commande) {?>
                                          <tr>
                                             <td style="color:#c43b68" class="serial"><?=htmlspecialchars($commande->getId()) ?></td>
                                             <td> <span class="name <?=$commande->getStatut()=='livré'? 'text-success':'' ?><?=$commande->getStatut()=='non-livré'? 'text-danger':'' ?> <?=$commande->getStatut()=='en attente'? 'text-warning':'' ?>"><?=htmlspecialchars($commande->getStatut()) ?></span> </td>
                                             <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($commande->getDateCommande()->format('\L\e d-m-Y à H:i:s')) ?></span> </td>
                                             <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($commande->getDateLivraison()->format('\L\e d-m-Y à H:i:s')) ?></span> </td>
                                             <td> <span style="color:#c43b68" class="count"><?=htmlspecialchars($commande->getCout())?></span> </td>
                                             <td><span style="color:#c43b68" class="product"><?=htmlspecialchars($commande->getMethodePaiement()) ?></span></td>
                                             <td><span style="color:#c43b68" class=""><?=$commande->isPaye()?'<img alt="payé" src="https://img.icons8.com/color/48/000000/checked.png"/>':'<img alt="non-payé" src="https://img.icons8.com/emoji/48/000000/cross-mark-emoji.png"/>' ?></span></td>
                                             <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($commande->getCompte()->getPrenom()).' '.htmlspecialchars($commande->getCompte()->getNom()) ?></span> </td>
                                             <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($commande->getAdresse()->getDescription())?></span><br/><span style="color:#c43b68" class="name"><?=htmlspecialchars($commande->getAdresse()->getRegion()).', '.htmlspecialchars($commande->getAdresse()->getVille())?></span> </td>
                                             <td> <span style="color:#c43b68" class="name"><?=htmlspecialchars($commande->getCompte()->getNumeroTelephone())?></span><br/> </td>
                                             <td>
                                                <a class="btn btn-primary" href="visualiserCommande?id=<?=htmlspecialchars($commande->getId()) ?>">Visualiser</a>
                                             </td>
                                             <td>
                                                <form action="livrerCommande" onsubmit="return confirm('Êtes vous sûre d\'avoir livré cette commande?');" method="get"> <input type="hidden" name="action" value="livrer"/> <input type="hidden" name="id" value="<?=htmlspecialchars($commande->getId()) ?>"/><input type="submit" class="btn btn-success" value="Livrer"/></form>
                                             </td>
                                             <td>
                                                <form action="livrerCommande" onsubmit="return confirm('Êtes vous sûre de vouloir annuler cette commande?');" method="get"> <input type="hidden" name="action" value="annuler"/> <input type="hidden" name="id" value="<?=htmlspecialchars($commande->getId()) ?>"/><input type="submit" class="btn btn-warning" value="Annuler"/></form>
                                             </td>
                                             <td>
                                                <form action="supprCommande" onsubmit="return confirm('Êtes vous sûre de vouloir supprimer cette commande?');" method="post"><input type="hidden" name="id" value="<?=htmlspecialchars($commande->getId()) ?>"/><input type="submit" class="btn btn-danger" value="Supprimer"/></form>
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
                           <li class="page-item"><a class="page-link" href="adminCommandes?<?=isset($statut)?'statut='.htmlspecialchars($statut):'' ?>&amp;page=<?=htmlspecialchars($page)>1?htmlspecialchars($page)-1:'1' ?>" style="color:#c43b68">Previous</a></li>
                           <?for($numPage=1; $numPage<=$nbrPages; $numPage++){?>
                              <li class="page-item"><a class="page-link" href="adminCommandes?<?=isset($statut)?'statut='.htmlspecialchars($statut):'' ?>&amp;page=<?=htmlspecialchars($numPage) ?>" style="<?=htmlspecialchars($page)!=$numPage?'color:#c43b68':'background-color:#c43b68'?>"><?=htmlspecialchars($numPage) ?></a></li>
                           <?}?>
                           <li class="page-item"><a class="page-link" href="adminCommandes?<?=isset($statut)?'statut='.htmlspecialchars($statut):'' ?>&amp;page=<?=htmlspecialchars($page)<$nbrPages?htmlspecialchars($page)+1:htmlspecialchars($nbrPages) ?>" style="color:#c43b68">Next</a></li>
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