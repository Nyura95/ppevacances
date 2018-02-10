<?php session_start(); ?>
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


    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="indexbackoffice.php">accueil</a>
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

        <header class="masthead">
            <div class="header-content">
                <div class="header-content-inner">
                                   <?php
                            include '../sql.php';

                            $req = "SELECT * FROM COMPTE WHERE USER ='".$_SESSION ['USER'] ."'";
                            ?> 


                            <?php $res = mysqli_query($con, $req);
                            ?>


        <?php while ($ligne = mysqli_fetch_array($res)): ?>
                            <?php $USER = $_SESSION ['USER']; ?>
                            <?php $MDP = $ligne["MDP"]; ?>
                            <?php $DATEINSCRIP = $ligne["DATEINSCRIP"]; ?>
                            <?php $ADRMAILCPTE = $ligne["ADRMAILCPTE"]; ?>
                            <?php $NOTELCPTE = $ligne["NOTELCPTE"]; ?>
                            <?php $NOPORTCPTE = $ligne["NOPORTCPTE"]; ?>
                            <?php $DATEFERME = $ligne["DATEFERME"]; ?>
                              <?php $NOMCPTE = $ligne["NOMCPTE"]; ?>
                            <?php $PRENOMCPTE = $ligne["PRENOMCPTE"]; ?>
                    
                    <h1 id="homeHeading">Bienvenue dans <br> votre compte <br> <?php echo $PRENOMCPTE ?> <?php echo $NOMCPTE ?></h1>
                    <hr id="home">

                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="trtdec.php">Déconnexion</a> 

                </div>
            </div>
        </header>

        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="section-heading text-white">MES INFORMATIONS</h2>
                        <hr class="light">
                        <div class="text-faded"> 
             


                            <div style="text-align: left; padding-left: 10%; ">
                                Utilisateur : <br>
                                <?php echo $USER ?> <br><br>
                                Mot de passe: <br>
                                <?php echo $MDP ?> <br><br>
                                Date d'inscription: <br>
                                <?php echo $DATEINSCRIP ?> <br><br>
                                Date de fermeture du compte: <br>
                                <?php
                                if (!empty($DATEFERME)) {
                                    echo $DATEFERME;
                                } else {
                                    echo "La date de fermeture de votre compte n'est pas renseigné";
                                }
                                ?> <br> <br>
                                Adresse mail: <br>
                                <?php
                                if (!empty($ADRMAILCPTE)) {
                                    echo $ADRMAILCPTE;
                                } else {
                                    echo "L'adresse mail n'est pas renseigné";
                                }
                                ?> <br> <br>

                                Téléphone domicle: <br>
                                <?php
                                if (!empty($NOTELCPTE)) {
                                    echo $NOTELCPTE;
                                } else {
                                    echo "Le téléphone domicile n'est pas renseigné";
                                }
                                ?> <br><br>
                                Téléphone portable: <br>
                                <?php
                                if (!empty($NOPORTCPTE)) {
                                    echo $NOPORTCPTE;
                                } else {
                                    echo "Le téléphone portable n'est pas renseigné";
                                }
                                ?> <br><br>
                        
                            </div>
        <?php endwhile; ?>
                            <?php mysqli_close($con); ?>

                        </div>
                    </div>
                </div>
        </section>
        <section class="bg-primary2" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="section-heading text-blue">MES RESERVATIONS</h2>
                        <hr class="light">
                        <div class="text-faded" style="">  
                       
                        <?php
                        include '../sql.php';

                        $req = "SELECT * FROM RESA
                                INNER JOIN ETAT_RESA ON RESA.CODEETATRESA = ETAT_RESA.CODEETATRESA
                                INNER JOIN HEBERGEMENT ON RESA.NOHEB = HEBERGEMENT.NOHEB
                                INNER JOIN SEMAINE ON RESA.DATEDEBSEM = SEMAINE.DATEDEBSEM
                                WHERE USER ='".$_SESSION ['USER'] ."'
                                ORDER BY DATERESA DESC
                               ";
                        ?> 


                        <?php $res = mysqli_query($con, $req);
                        ?>

                        <?php while ($ligne = mysqli_fetch_array($res)): ?>
                        <?php $USER = $_SESSION ['USER']; ?>
                        <?php $NOMETATRESA = $ligne["NOMETATRESA"]; ?>
                        <?php $DATERESA = $ligne["DATERESA"]; ?>
                        <?php $DATEDEBSEM = $ligne["DATEDEBSEM"]; ?>
                        <?php $DATEFINSEM = $ligne["DATEFINSEM"]; ?>
                        <?php $NOHEB = $ligne["NOHEB"]; ?>
                        <?php $NOMHEB = $ligne["NOMHEB"]; ?>
                        <?php $PHOTOHEB = $ligne["PHOTOHEB"]; ?>
                         <?php $TARIFSEMHEB = $ligne["TARIFSEMHEB"]; ?>


                        <div style=" color: #5472AE; border: 1px solid #5472AE; height: 521px;">
                            L'état de la résevation : <?php echo $NOMETATRESA; ?> <br><br>
                            Date réservation: <br> <?php echo $DATERESA; ?> <br> <br> Date arrivée: <br> <?php echo $DATEDEBSEM; ?> <br> <br> Date départ: <br> <?php echo $DATEFINSEM; ?> <br> <br>
                            <p>  <img style="width:20%;" src="../../image/<?php echo $PHOTOHEB ?>"> <br> Nom de l'hébergement :<?php echo $NOMHEB ?> <br> REF: <?php echo $NOHEB; ?> </p>
                            <p style="text-align: left; padding-left: 10%;"> Total réseervation : </p> 
                            
                            <div>
                            <p style="float: left; padding-left: 10%;"> Sous-total : </p> <p style="float: left; padding-left: 58%;"> <?php echo $TARIFSEMHEB ?> € </p>
                            </div>
                        </div>

<?php endwhile; ?>
                            <?php mysqli_close($con); ?>
                        </div>
                    </div>
                </div>
        </section>
        <!-- Bootstrap core JavaScript -->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="../js/creative.min.js"></script>

    </body>

</html>

