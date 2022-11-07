<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Activation du compte</title>
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
        <h2>Dernière étape: activez votre compte</h2>
        <form id="contact-form" action="login" method="post">
            <div class="single-contact-form">
                <div class="contact-box name">
                    <label for="codeActivation">Saisissez le code d'activation qui vous a été envoyé par mail.</label>
                    <input type="text" id="codeActivation" name="codeActivation" placeholder="Vueillez vérifier votre messagerie*" style="width:100%">
                    <input type="hidden" name="id" value="<?=isset($compte) && null!==$compte->getId()?$compte->getId():htmlspecialchars($_POST['id']) ?>"/>
                    <input type="hidden" name="form" value="activation"/>
                    <span class="text-danger"><?=isset($erreurs['codeActivation'])?$erreurs['codeActivation']:''?></span>
                </div>
            </div>
            <p class=<?= empty($erreurs)?'text-success':'text-danger' ?>> <?=htmlspecialchars($resultat)?> </p>
            
            <div class="contact-btn">
                <button type="submit" class="fv-btn">Confirmer</button>
            </div>
        </form>
    </body>
</html>