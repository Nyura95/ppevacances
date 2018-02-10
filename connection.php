<!DOCTYPE html>
<html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Creative - Start Bootstrap Theme</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/creative.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.html">Accueil</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>
        </nav>

        <header class="masthead">
            <div class="header-content">
                <div class="header-content-inner">
            <form class="compte" action="trtlogin.php" method="POST" id='form'> 
                <h2> IDENTIFIEZ-VOUS</h2>
                <input class="btn btn-primary btn-xl js-scroll-trigger form" type="text" placeholder="Utilisateur" name="USER" id='USER'> <br><br>
                <input class="btn btn-primary btn-xl js-scroll-trigger form"type="password" placeholder="Mot de passe" name="MDP" id='MDP'> <br><br>
                <!-- div qui affichera les erreurs que l'on veut en js -->
                <div style='color: red;display:none' id='error'></div>
                
                <input class="btn btn-primary btn-xl js-scroll-trigger" type="button" name="valide" id='valide' value="Se connecter"> <br><br>
                <a> Mot de passe oublié </a> <br>
            </form> 

                </div>
            </div>
        </header>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="js/creative.min.js"></script>

    </body>
    <script>
        var error = 'Une erreur est survenu !'
        var nothing = 'Veuillez remplir le formulaire !'
        var bad = 'Votre nom d\'utilissateur ou votre mot de passe ne sont pas bon !'
        var connect = 'Veuillez vous connecter !'

        // va afficher les erreurs
        var showError = function(html) {
            $('#error').show()
            $('#error').html(html)
        }
        var hideError = function(html) {
            $('#error').hide()
            $('#error').html('')
        }


        // Executé une fois que la page et le DOM js est fini de charger
        $(function() {

            // Suivant l'url, on affiche les erreurs retourné par ton back
            <?php if(ISSET($_GET['error'])) { ?>
                // Montre la div
                showError(error)
            <?php } ?>
            <?php if(ISSET($_GET['nothing'])) { ?>
                // Montre la div
                showError(nothing)
            <?php } ?>
            <?php if(ISSET($_GET['bad'])) { ?>
                // Montre la div
                showError(bad)
            <?php } ?>
            <?php if(ISSET($_GET['connect'])) { ?>
                // Montre la div
                showError(connect)
            <?php } ?>
            // ---------------

            


            $("#valide").on('click', function(e) {
                var user = $('#USER');
                var mdp = $('#MDP');
                // On check si le formulaire est remplit
                if(user.val() != '' && mdp.val() != '') {
                    hideError()
                    // le return stop le code, il n'ira pas plus loins
                    return $('#form').submit()
                } 

                // Si on viens ici, alors c'est que l'un ou l'autre est vide. On regarde et on change en fonction
                if(user.val() == '') {
                    // Si il est vide, on l'affiche en rouge
                    user.attr('class', user.attr('class').replace('btn-primary', 'btn-danger'))
                    showError(nothing)
                } else {
                    // Sinon on l'affiche en primary
                    user.attr('class', user.attr('class').replace('btn-danger', 'btn-primary'))
                }

                // Si on viens ici, alors c'est que l'un ou l'autre est vide. On regarde et on change en fonction
                if(mdp.val() == '') {
                    // Si il est vide, on l'affiche en rouge
                    mdp.attr('class', mdp.attr('class').replace('btn-primary', 'btn-danger'))
                    showError(nothing)
                } else {
                    // Sinon on l'affiche en primary
                    mdp.attr('class', mdp.attr('class').replace('btn-danger', 'btn-primary'))
                }

            })
        });
    </script>
</html>

