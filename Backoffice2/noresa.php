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


       
            $req = " SELECT * FROM RESA 
                                    INNER JOIN HEBERGEMENT on RESA.NOHEB = HEBERGEMENT.NOHEB 
                                    INNER JOIN COMPTE on RESA.USER = COMPTE.USER 
                                WHERE RESA.noheb= " . $_GET['noheb'] . "
           ";
       

        $res = mysqli_query($con, $req);
        ?>


        <?php while ($ligne = mysqli_fetch_array($res)): ?>
            <?php $PHOTOHEB = $ligne["PHOTOHEB"]; ?>
            <?php $NOMHEB = $ligne["NOMHEB"]; ?>
            <?php $DATEDEBSEM = $ligne["DATEDEBSEM"]; ?>
            <?php $USER = $ligne["USER"]; ?>
            <?php $CODEETATRESA = $ligne["CODEETATRESA"]; ?>
            <?php $DATERESA = $ligne["DATERESA"]; ?>
            <?php $MONTANTARRHES = $ligne["MONTANTARRHES"]; ?>
            <?php $NOHEB = $ligne["NOHEB"]; ?>
            <?php $NOMTYPEHEB = $ligne["NOMTYPEHEB"]; ?>
            <?php $NBOCCUPANT = $ligne["NBOCCUPANT"]; ?>
            <?php $NOMCPTE = $ligne["NOMCPTE"]; ?>
            <?php $PRENOMCPTE = $ligne["PRENOMCPTE"]; ?>
            <?php $ADRMAILCPTE = $ligne["ADRMAILCPTE"]; ?>
            <?php $NOTELCPTE = $ligne["NOTELCPTE"]; ?>
            <?php $NOPORTCPTE = $ligne["NOPORTCPTE"]; ?>


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

            <header class="masthead1" style="background-image: url('../../image/<?php echo $PHOTOHEB ?>') !important; background-size: cover;
                    height: 100%;">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1 style="color:white !important; padding-top: 10% !important;text-align: center;" id="homeHeading"><?php echo $NOMHEB ?></h1>
                        <hr style="border-color: white !important;">

                    </div>
                </div>
            </header>

            <section class="bg-primary" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mx-auto text-center">
                            Réservé par <?php echo $PRENOMCPTE; ?> <?php echo $NOMCPTE; ?>
                            
                        </div>


                    </div>
                </div>
            </div>
        </section>
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

