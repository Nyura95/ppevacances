<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Creative - Start Bootstrap Theme</title>

        <!-- Bootstrap core CSS -->
        <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='../https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='../https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>


        <!-- Plugin CSS -->
        <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/creative.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
      

        <?php
        include '../sql.php';


            $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB 
                                WHERE noheb= " . $_GET['noheb'] . "
           ";
        

        $res = mysqli_query($con, $req);
        ?>


        <?php while ($ligne = mysqli_fetch_array($res)): ?>
            <?php $PHOTOHEB = $ligne["PHOTOHEB"]; ?>
            <?php $NOMHEB = $ligne["NOMHEB"]; ?>
            <?php $SURFACEHEB = $ligne["SURFACEHEB"]; ?>
            <?php $NBPLACEHEB = $ligne["NBPLACEHEB"]; ?>
            <?php $SECTEURHEB = $ligne["SECTEURHEB"]; ?>
            <?php $DESCRIHEB = $ligne["DESCRIHEB"]; ?>
            <?php $ORIENTATIONHEB = $ligne["ORIENTATIONHEB"]; ?>
            <?php $NOHEB = $ligne["NOHEB"]; ?>
            <?php $NOMTYPEHEB = $ligne["NOMTYPEHEB"]; ?>
            <?php $TARIFSEMHEB = $ligne["TARIFSEMHEB"]; ?>
            <?php $ETATHEB = $ligne["ETATHEB"]; ?>
            <?php $INTERNET = $ligne["INTERNET"]; ?>


        </head>

        <body id="page-top">

            <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="indexbackoffice.php">Accueil</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
             <div class="container">
                 <a style="float: right;"class="navbar-brand js-scroll-trigger" href="moncompte.php">Mon compte</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>
 <form action="trtmodifheb.php" method="POST">
            <header class="masthead1" style="background-image: url('../../image/<?php echo $PHOTOHEB ?>') !important; background-size: cover;
                    height: 100%;">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1 style="color:white !important; padding-top: 10% !important;text-align: center;" id="homeHeading"><input type="text" value="<?php echo $NOMHEB ?>"</h1>
                        <hr style="border-color: white !important;">

                    </div>
                </div>
            </header>

            <section class="bg-primary" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center">
                           
                            <h2 class="section-heading text-white"> <?php echo $NOMTYPEHEB ?>   </h2>  
                            
                            <p class="text-faded"> Localisé dans <input type="text" value="<?php echo $SECTEURHEB ?>" </p>

                            <hr class="light">
                            <p class="text-faded" style="text-align: left">
                            <h2 class="section-heading text-white" style="text-align:left;">  Descriptif  </h2>  
                            <p class="text-faded" style="text-align: left;">  <input type="text" value="<?php echo $DESCRIHEB ?>"   </p>
                            <h2 class="section-heading text-white" style="text-align:left;">  Logement  </h2>
                            <p class="text-faded" style="text-align: left;">  Cette hébergement comporte <b> <input type="text" value="<?php echo $NBPLACEHEB ?>" place(s) </b> et a une surface de <b> <input type="text" value="<?php echo $SURFACEHEB ?>" m2 </b> <br>
                                    Il se situe dans<b> <?php echo $SECTEURHEB ?> </b> et est orienté coté <b> <input type="text" value="<?php echo $ORIENTATIONHEB ?>" </b> <br> 
                                 La  <b> <?php
                                        if ($INTERNET == 1) {
                                            echo "connexion internet est founit";
                                        } else {
                                            echo "connexion internet n'est pas founit";
                                        }
                                        ?> </b>
                                </p>
                            <h2 class="section-heading text-white" style="text-align:left;">  Tarif  </h2>


                            <p class="text-faded" style="text-align: left;"> Les tarifs par semaine s'éléve à <b> <input type="text" value="<?php echo $TARIFSEMHEB ?>" </b> ‎€ </p>

                            <h2 class="section-heading text-white" style="text-align:left;">  En détail    </h2>


                            <ul class="text-faded" style="text-align: left">
                                 <li>  Distance Pistes : 200 m </li>
                                    <li>  Espace forme : Espace bien-être à l'Espace Paradisio à 3 km de la résidence - avec supplément.</li>
                                    <li>  Distance Ecole de Ski : 500 m</li>
                                    <li>  Animations Famille : A proximité - avec supplément.</li> <br>
                                    <li>  Animaux Admis : 65 € / animal / semaine. 10 € / animal / jour (séjours de 1 à 6 nuits).</li>
                                    <li>  Caution : La caution est à régler depuis votre espace client. Son montant est défini par rapport à la typologie de l'appartement.</li>
                                    <li>  Accès Internet / WiFi : Sous réserve de disponibilités - avec supplément.</li>
                                    <li>  Taxe de séjour : A régler depuis votre espace client, montant variable selon la localité. Gratuit pour les moins de 18 ans.</li> <br>
                                    <li>  Piscine : Espace Paradisio avec complexe aquatique à 3 km de la résidence - avec supplément.</li>
                                    <li>  Restaurant : A proximité - avec supplément.</li>
                                    <li>  Navette : Gratuite entre Montchavin et les quartiers des Coches.</li>
                                    <li>  Parking extérieur : Parkings publics à proximité - gratuits, sous réserve de disponibilités.</li> <br>
                                    <li>  Ménage fin de séjour : Inclus hors coin cuisine.</li>
                                    <li>  Linge de Lit : Inclus - contenu peut varier selon les résidences : drap-housse, drap ou housse de couette et taie d'oreiller.</li>
                                    <li>  Kit d'entretien : Inclus - contenu peut varier selon les résidences : éponge, lavette, flacon de produit multi-usages, flacon de produit liquide vaisselle main, tablette lave-vaisselle et torchon.</li>
                                    <li>  Garderie d'enfants : A proximité - avec supplément.</li> <br> 


                            </ul>
                            
                            <input type="submit" name="modif" value="Modifier">
                        

                        </div>


                    </div>
                </div>
            </div>
        </section>
 </form>
    <?php endwhile; ?>
    <?php mysqli_close($con); ?>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/creative.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
</body>

</html>

