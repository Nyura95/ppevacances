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
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <!-- Plugin CSS -->
        <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/creative.min.css" rel="stylesheet">

    </head>

    <body id="page-top">

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="indexadmin.php">Bienvenue</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown">
                            Bonjour <?php echo $_SESSION ['USER'] ?>
                            <span class="caret"></span>
                        </a>

                    </li>
                </ul>


            </div>
        </nav>

        <header class="masthead">
            <div class="header-content">
                <div class="header-content-inner">
                    <h1 id="homeHeading">Liste des identifiants</h1>
                    <hr id="home">
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#ges"> Gestionnnaire </a>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#vac"> Vacancier </a> 



                </div>
            </div>
        </header>

      
       
 
        <section class="bg-primary" id="ges">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="section-heading text-white"> Liste des identifiants des gestionnaires</h2>
                        <hr class="light">
                        <p class="text-faded">
                      
                            <?php
                            include '../sql.php';

                      
                                $req = "SELECT * FROM COMPTE
                                        WHERE TYPECOMPTE = 3
                                        ORDER BY `NOPORTCPTE` ASC
           
            

            ";
                            ?> 


                            <?php $res = mysqli_query($con, $req);
                            ?>


                            <?php while ($ligne = mysqli_fetch_array($res)): ?>
                                <?php $USER = $ligne["USER"]; ?>
                                <?php $MDP = $ligne["MDP"]; ?>
                                <?php $NOMCPTE = $ligne["NOMCPTE"]; ?>
                                <?php $PRENOMCPTE = $ligne["PRENOMCPTE"]; ?>
                                <?php $ADRMAILCPTE = $ligne["ADRMAILCPTE"]; ?>
                                <?php $NOTELCPTE = $ligne["NOTELCPTE"]; ?>
                                <?php $NOPORTCPTE = $ligne["NOPORTCPTE"]; ?>
                               
                        <div class="text-white" style="text-align: left;">
                            <p>  Profil de  <?php echo $NOMCPTE ?> <?php echo $PRENOMCPTE ?> </p>
                            
                                <p> Utilisateur: <?php echo $USER ?>
                                <p> Mot de passe : <?php echo $MDP ?>
                                <p> E-mail : <?php
                                if(!empty($ADRMAILCPTE)){ echo $ADRMAILCPTE;} else {echo "Non renseigné";}?> 
                                <p> N° Fix : <?php     
                                if(!empty($NOTELCPTE)){ echo $NOTELCPTE;} else {echo "Non renseigné";}?> 
                                <p> N° Portable : <?php 
                                if(!empty($NOPORTCPTE)){ echo $NOPORTCPTE;} else {echo "Non renseigné";}?>
                            </div> <br>
                        <hr class="light"style="text-align: center;"> <br>

                               



                            <?php endwhile; ?>
                            <?php mysqli_close($con); ?>
                        </p>

                    </div>
                </div>
            </div>
        </section>
         <section class="bg-primary" id="vac">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <h2 class="section-heading text-white"> Liste des identifiants des vacanciers</h2>
                        <hr class="light">
                        <p class="text-faded">
                      
                            <?php
                            include '../sql.php';

                      
                                $req = "SELECT * FROM COMPTE
                                        WHERE TYPECOMPTE = 1
                                        ORDER BY `NOPORTCPTE` ASC
           
            

            ";
                            ?> 


                            <?php $res = mysqli_query($con, $req);
                            ?>


                            <?php while ($ligne = mysqli_fetch_array($res)): ?>
                                <?php $USER = $ligne["USER"]; ?>
                                <?php $MDP = $ligne["MDP"]; ?>
                                <?php $NOMCPTE = $ligne["NOMCPTE"]; ?>
                                <?php $PRENOMCPTE = $ligne["PRENOMCPTE"]; ?>
                                <?php $ADRMAILCPTE = $ligne["ADRMAILCPTE"]; ?>
                                <?php $NOTELCPTE = $ligne["NOTELCPTE"]; ?>
                                <?php $NOPORTCPTE = $ligne["NOPORTCPTE"]; ?>
                               
                        <div class="text-white" style="text-align: left;">
                            <p>  Profil de  <?php echo $NOMCPTE ?> <?php echo $PRENOMCPTE ?> </p>
                            
                                <p> Utilisateur: <?php echo $USER ?>
                                <p> Mot de passe : <?php echo $MDP ?>
                                <p> E-mail : <?php
                                if(!empty($ADRMAILCPTE)){ echo $ADRMAILCPTE;} else {echo "Non renseigné";}?> 
                                <p> N° Fix : <?php     
                                if(!empty($NOTELCPTE)){ echo $NOTELCPTE;} else {echo "Non renseigné";}?> 
                                <p> N° Portable : <?php 
                                if(!empty($NOPORTCPTE)){ echo $NOPORTCPTE;} else {echo "Non renseigné";}?>
                        </div> <br>
                        <hr class="light"style="text-align: center;"> <br>
                               



                            <?php endwhile; ?>
                            <?php mysqli_close($con); ?>
                        </p>

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
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <!-- Custom scripts for this template -->
        <script src="../js/creative.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#dialog").dialog({
                    autoOpen: false,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "blind",
                        duration: 1000
                    }
                });

                $("#opener").on("click", function () {
                    $("#dialog").dialog("open");
                });
            });
            $(function () {
                $("#dialog1").dialog({
                    autoOpen: false,
                    show: {
                        effect: "blind",
                        duration: 1000
                    },
                    hide: {
                        effect: "blind",
                        duration: 1000
                    }
                });

                $("#opener1").on("click", function () {
                    $("#dialog1").dialog("open");
                });
            });
        </script>

    </body>

</html>


