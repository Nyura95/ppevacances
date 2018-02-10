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
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Bienvenue</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <ul class="nav navbar-nav">
                
                             <a style="float: right;"class="navbar-brand js-scroll-trigger" href="moncompte2.php">Bonjour <?php echo $_SESSION ['USER'] ?></a>
                            
                           
                        </a>

                    </li>
                </ul>


            </div>
        </nav>

        <header class="masthead">
            <div class="header-content">
                <div class="header-content-inner">
                    <h1 id="homeHeading">PPE VACANCES</h1>
                    <hr id="home">
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#heb">Hébergement </a>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#res"> Réservation </a>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#vac"> Vacancier </a> 



                </div>
            </div>
        </header>

        <section class="p-0" id="heb">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <br> <h2 class="section-heading"> CONSULTER ET ADMINISTRER LES HEBERGEMENTS</h2>
                    <hr class="primary">
                    <br>
                    <form  class="form" action="" method="GET">
                        <input  type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
                        <input class="btn btn-primary btn-xl js-scroll-trigger" type="text " name="max" placeholder="Prix max €" >  

                        <input class="btn btn-primary btn-xl js-scroll-trigger" type="submit" value="Valider" >
                    </form> <br>
                    <br> <br>
                    <h2 class="section-heading">NOS APPARTEMENTS</h2>

                    <hr class="primary">
                    <br> <br>



                    <div class="container-fluid">
                        <div class="row no-gutter popup-gallery">

                            <?php
                            include '../sql.php';

                            if (!empty($_GET["max"])) {
                                $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB 
             WHERE TARIFSEMHEB  <= " . $_GET['max'] . "
                 AND NOMTYPEHEB = 'Appartement'
           
            

            ";
                            } else {
                                $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB
                                    WHERE NOMTYPEHEB = 'Appartement'
                                  
                                   
           ";
                            }
                            ?> 


                            <?php $res = mysqli_query($con, $req);
                            ?>


                            <?php while ($ligne = mysqli_fetch_array($res)): ?>
                                <?php $PHOTOHEB = $ligne["PHOTOHEB"]; ?>
                                <?php $NOMHEB = $ligne["NOMHEB"]; ?>
                                <?php $SURFACEHEB = $ligne["SURFACEHEB"]; ?>
                                <?php $NBPLACEHEB = $ligne["NBPLACEHEB"]; ?>
                                <?php $SECTEURHEB = $ligne["SECTEURHEB"]; ?>
                                <?php $DESCRIHEB = $ligne["DESCRIHEB"]; ?>
                                <?php $NOHEB = $ligne["NOHEB"]; ?>
                                <?php $TARIFSEMHEB = $ligne["TARIFSEMHEB"]; ?>
                                <?php $NOMTYPEHEB = $ligne["NOMTYPEHEB"]; ?>
                                <div class="col-lg-4 col-sm-6">
                                    <a class="portfolio-box" href="noheb.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../../image/<?php echo $PHOTOHEB ?>" alt="">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">

                                                <div class="project-name">
                                                    <?php echo $NOMHEB ?> - <?php echo $NOMTYPEHEB ?>   <br>
                                                    <hr style="border-color: white;">
                                                    <?php echo $SECTEURHEB ?> <br>  
                                                    <?php echo $NBPLACEHEB ?> place(s) - <?php echo $SURFACEHEB ?> m2<br>  
                                                    <?php echo $TARIFSEMHEB ?> /semaine<br>  

                                                    <br>
                                                    Ref: <?php echo $NOHEB ?> <br>

                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>



                            <?php endwhile; ?>
                            <?php mysqli_close($con); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-0" id="resa">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <br> <br>
                    <br> <br>
                    <h2 class="section-heading">NOS BUNGALOWS</h2>

                    <hr class="primary">
                    <br> <br>

                    <div class="container-fluid">
                        <div class="row no-gutter popup-gallery">

                            <?php
                            include '../sql.php';

                            if (!empty($_GET["max"])) {
                                $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB 
             WHERE TARIFSEMHEB  <= " . $_GET['max'] . "
                 AND NOMTYPEHEB = 'Bungalow'
           
            

            ";
                            } else {
                                $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB
                                    WHERE NOMTYPEHEB = 'Bungalow'
                                  
                                   
           ";
                            }
                            ?> 


                            <?php $res = mysqli_query($con, $req);
                            ?>


                            <?php while ($ligne = mysqli_fetch_array($res)): ?>
                                <?php $PHOTOHEB = $ligne["PHOTOHEB"]; ?>
                                <?php $NOMHEB = $ligne["NOMHEB"]; ?>
                                <?php $SURFACEHEB = $ligne["SURFACEHEB"]; ?>
                                <?php $NBPLACEHEB = $ligne["NBPLACEHEB"]; ?>
                                <?php $SECTEURHEB = $ligne["SECTEURHEB"]; ?>
                                <?php $DESCRIHEB = $ligne["DESCRIHEB"]; ?>
                                <?php $NOHEB = $ligne["NOHEB"]; ?>
                                <?php $TARIFSEMHEB = $ligne["TARIFSEMHEB"]; ?>
                                <?php $NOMTYPEHEB = $ligne["NOMTYPEHEB"]; ?>
                                <div class="col-lg-4 col-sm-6">
                                    <a class="portfolio-box" href="noheb.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../../image/<?php echo $PHOTOHEB ?>" alt="">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">

                                                <div class="project-name">
                                                    <?php echo $NOMHEB ?> - <?php echo $NOMTYPEHEB ?>   <br>
                                                    <hr style="border-color: white;">
                                                    <?php echo $SECTEURHEB ?> <br>  
                                                    <?php echo $NBPLACEHEB ?> place(s) - <?php echo $SURFACEHEB ?> m2<br>  
                                                    <?php echo $TARIFSEMHEB ?> /semaine<br>  

                                                    <br>
                                                    Ref: <?php echo $NOHEB ?> <br>

                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>



                            <?php endwhile; ?>
                            <?php mysqli_close($con); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-0" id="vc">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <br> <br>
                    <br> <br>
                    <h2 class="section-heading">NOS MOBIL HOMES</h2>

                    <hr class="primary">
                    <br> <br>



                    <div class="container-fluid">
                        <div class="row no-gutter popup-gallery">

                            <?php
                            include '../sql.php';

                            if (!empty($_GET["max"])) {
                                $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB 
             WHERE TARIFSEMHEB  <= " . $_GET['max'] . "
                 AND NOMTYPEHEB = 'Mobil home'
           
            

            ";
                            } else {
                                $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB
                                    WHERE NOMTYPEHEB = 'Mobil home'
                                  
                                   
           ";
                            }
                            ?> 


                            <?php $res = mysqli_query($con, $req);
                            ?>


                            <?php while ($ligne = mysqli_fetch_array($res)): ?>
                                <?php $PHOTOHEB = $ligne["PHOTOHEB"]; ?>
                                <?php $NOMHEB = $ligne["NOMHEB"]; ?>
                                <?php $SURFACEHEB = $ligne["SURFACEHEB"]; ?>
                                <?php $NBPLACEHEB = $ligne["NBPLACEHEB"]; ?>
                                <?php $SECTEURHEB = $ligne["SECTEURHEB"]; ?>
                                <?php $DESCRIHEB = $ligne["DESCRIHEB"]; ?>
                                <?php $NOHEB = $ligne["NOHEB"]; ?>
                                <?php $TARIFSEMHEB = $ligne["TARIFSEMHEB"]; ?>
                                <?php $NOMTYPEHEB = $ligne["NOMTYPEHEB"]; ?>
                                <div class="col-lg-4 col-sm-6">
                                    <a class="portfolio-box" href="noheb.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../../image/<?php echo $PHOTOHEB ?>" alt="">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">

                                                <div class="project-name">
                                                    <?php echo $NOMHEB ?> - <?php echo $NOMTYPEHEB ?>   <br>
                                                    <hr style="border-color: white;">
                                                    <?php echo $SECTEURHEB ?> <br>  
                                                    <?php echo $NBPLACEHEB ?> place(s) - <?php echo $SURFACEHEB ?> m2<br>  
                                                    <?php echo $TARIFSEMHEB ?> /semaine<br>  

                                                    <br>
                                                    Ref: <?php echo $NOHEB ?> <br>

                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>



                            <?php endwhile; ?>
                            <?php mysqli_close($con); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-0" id="cha">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <br> <br>
                    <br> <br>
                    <h2 class="section-heading">NOS CHALETS</h2>

                    <hr class="primary">
                    <br> <br>



                    <div class="container-fluid">
                        <div class="row no-gutter popup-gallery">

                            <?php
                            include '../sql.php';

                            if (!empty($_GET["max"])) {
                                $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB 
             WHERE TARIFSEMHEB  <= " . $_GET['max'] . "
                 AND NOMTYPEHEB = 'Chalet'
           
            

            ";
                            } else {
                                $req = " SELECT * FROM TYPE_HEB 
                                    INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB
                                    WHERE NOMTYPEHEB = 'Chalet'
                                  
                                   
           ";
                            }
                            ?> 


                            <?php $res = mysqli_query($con, $req);
                            ?>


                            <?php while ($ligne = mysqli_fetch_array($res)): ?>
                                <?php $PHOTOHEB = $ligne["PHOTOHEB"]; ?>
                                <?php $NOMHEB = $ligne["NOMHEB"]; ?>
                                <?php $SURFACEHEB = $ligne["SURFACEHEB"]; ?>
                                <?php $NBPLACEHEB = $ligne["NBPLACEHEB"]; ?>
                                <?php $SECTEURHEB = $ligne["SECTEURHEB"]; ?>
                                <?php $DESCRIHEB = $ligne["DESCRIHEB"]; ?>
                                <?php $NOHEB = $ligne["NOHEB"]; ?>
                                <?php $TARIFSEMHEB = $ligne["TARIFSEMHEB"]; ?>
                                <?php $NOMTYPEHEB = $ligne["NOMTYPEHEB"]; ?>
                                <div class="col-lg-4 col-sm-6">
                                    <a class="portfolio-box" href="noheb.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../../image/<?php echo $PHOTOHEB ?>" alt="">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">

                                                <div class="project-name">
                                                    <?php echo $NOMHEB ?> - <?php echo $NOMTYPEHEB ?>   <br>
                                                    <hr style="border-color: white;">
                                                    <?php echo $SECTEURHEB ?> <br>  
                                                    <?php echo $NBPLACEHEB ?> place(s) - <?php echo $SURFACEHEB ?> m2<br>  
                                                    <?php echo $TARIFSEMHEB ?> /semaine<br>  

                                                    <br>
                                                    Ref: <?php echo $NOHEB ?> <br>

                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>



                            <?php endwhile; ?>
                            <?php mysqli_close($con); ?>
                        </div>
                        <div id="dialog" title="CREER UN NOUVEL HEBERGEMENT">
                            <section class="bg-primary" id="about" style="margin-top: -15%;">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto text-center">
                                            <p class="text-faded">
                                            <form method="POST" action="add.php"> 
                                                <input class="btn btn-primary3 btn-xl js-scroll-trigger" type="text" name="NOMHEB" placeholder="Saisir le nom "> <br><br>
                                                <select class="btn btn-primary3 btn-xl js-scroll-trigger" name="CODETYPEHEB">
                                                    <?php
                                                    include '../sql.php';

                                                    $res = $con->query("SELECT * FROM TYPE_HEB INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB GROUP BY NOMTYPEHEB ");
                                                    while ($row = $res->fetch_assoc()) {
                                                        echo "<option>" . $row['CODETYPEHEB'] . "</option> ";
                                                    }
                                                    ?>
                                                </select> <br> <br>
                                                <p> 1 = Appartement 2 = Bungalow 3 = Mobil Home 4 = Chalet <br>

                                                    <br>
                                                    <input  class="btn btn-primary3 btn-xl js-scroll-trigger"type="text" name="NBPLACEHEB" placeholder="Saisir le nombre de place max"> <br><br>
                                                    <input class="btn btn-primary3 btn-xl js-scroll-trigger" type="text" name="SURFACEHEB" placeholder="Saisir la surface de m2 "> <br><br>
                                                    <input type="checkbox" name="INTERNET"> Avec connexion internet  
                                                    <input  type="checkbox" name="INTERNET"> Sans connexion internet<br><br>
                                                    <select class="btn btn-primary3 btn-xl js-scroll-trigger" name="SECTEURHEB">
                                                        <?php
                                                        include '../sql.php';

                                                        $res = $con->query("SELECT * FROM TYPE_HEB INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB GROUP BY SECTEURHEB ");
                                                        while ($row = $res->fetch_assoc()) {
                                                            echo "<option> " . $row['SECTEURHEB'] . "</option> ";
                                                        }
                                                        ?>
                                                    </select> <br> <br>
                                                    <input class="btn btn-primary3 btn-xl js-scroll-trigger" type="text" name="ORIENTATIONHEB" placeholder="Saisir l'orientation"> <br><br>
                                                    <textarea name="DESCRIHEB" rows="10" cols="30"> Saisir le description de l'hébergement </textarea> <br><br>
                                                    <input  class="btn btn-primary3 btn-xl js-scroll-trigger"type="text" name="TARIFSEMHEB" placeholder="Saisir le prix par semaine"> <br><br>
                                               <!-- <p> Saisir la photo de l'héberergement </p> -->
                                              <!--  <input class="btn btn-primary3 btn-xl js-scroll-trigger" name="monFichier" type="file"> -->


                                                    <input class="btn btn-primary4 btn-xl js-scroll-trigger"type="submit" name="valid" value="Ajouter">

                                            </form>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <br>      <button id="opener" class="btn btn-primary btn-xl js-scroll-trigger"> Ajouter un hébergement</button> <br>
                        <div id="promo"style="border: 1px solid #57D53B; color: #57D53B; "> <?php
                            if ($_GET['info'] == 'ok') {
                                echo "L'hébergement a bien été aujouté ";
                            }
                            ?> 
                        </div>
                        <br> <br>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-0" id="res">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <br> <br>
                    <br> <br>
                    <h2 class="section-heading">CONSULTER ET ADMINISTRER LES RESERVATIONS</h2>

                    <hr class="primary">
                    <br> <br>
                    <form  class="form" action="" method="GET">
                        <input  type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
                        <select class="btn btn-primary btn-xl js-scroll-trigger" name="DATEDEBSEM">
                            <?php
                            include '../sql.php';

                            $res = $con->query("SELECT * FROM RESA GROUP BY DATEDEBSEM ");
                            while ($row = $res->fetch_assoc()) {
                                echo "<option> " . $row['DATEDEBSEM'] . "</option> ";
                            }
                            ?>
                        </select> 

                        <input class="btn btn-primary btn-xl js-scroll-trigger" type="submit" value="Valider" >
                    </form> <br>

                    <div class="container-fluid">
                        <div class="row no-gutter popup-gallery">

                            <?php
                            include '../sql.php';

                            if (!empty($_GET["DATEDEBSEM"])) {
                                $req = " SELECT * FROM RESA 
                                    INNER JOIN HEBERGEMENT on RESA.NOHEB = HEBERGEMENT.NOHEB
                                    INNER JOIN ETAT_RESA on RESA.CODEETATRESA = ETAT_RESA.CODEETATRESA
                                    INNER JOIN TYPE_HEB on HEBERGEMENT.CODETYPEHEB = TYPE_HEB.CODETYPEHEB
                                    INNER JOIN COMPTE on RESA.USER = COMPTE.USER
                                    INNER JOIN SEMAINE on RESA.DATEDEBSEM = SEMAINE.DATEDEBSEM
                                    WHERE RESA.DATEDEBSEM  = '" . $_GET['DATEDEBSEM'] . "'
  
            ";
                            } else {
                                $req = " SELECT * FROM RESA 
                                    INNER JOIN HEBERGEMENT on RESA.NOHEB = HEBERGEMENT.NOHEB
                                    INNER JOIN ETAT_RESA on RESA.CODEETATRESA = ETAT_RESA.CODEETATRESA
                                    INNER JOIN TYPE_HEB on HEBERGEMENT.CODETYPEHEB = TYPE_HEB.CODETYPEHEB
                                    INNER JOIN COMPTE on RESA.USER = COMPTE.USER
                                    INNER JOIN SEMAINE on RESA.DATEDEBSEM = SEMAINE.DATEDEBSEM
                                    
                            
           ";
                            }
                            ?> 


                            <?php $res = mysqli_query($con, $req);
                            ?>


                            <?php while ($ligne = mysqli_fetch_array($res)): ?>
                                <?php $PHOTOHEB = $ligne["PHOTOHEB"]; ?>
                                <?php $NOMHEB = $ligne["NOMHEB"]; ?>
                                <?php $SURFACEHEB = $ligne["SURFACEHEB"]; ?>
                                <?php $NBPLACEHEB = $ligne["NBPLACEHEB"]; ?>
                                <?php $SECTEURHEB = $ligne["SECTEURHEB"]; ?>
                                <?php $DESCRIHEB = $ligne["DESCRIHEB"]; ?>
                                <?php $NOHEB = $ligne["NOHEB"]; ?>
                                <?php $TARIFSEMHEB = $ligne["TARIFSEMHEB"]; ?>
                                <?php $NOMTYPEHEB = $ligne["NOMTYPEHEB"]; ?>
                                <?php $DATEDEBSEM = $ligne["DATEDEBSEM"]; ?>
                                <?php $USER = $ligne["USER"]; ?>
                                <?php $CODEETATRESA = $ligne["CODEETATRESA"]; ?>
                                <?php $DATEARRHES = $ligne["DATEARRHES"]; ?>
                                <?php $MONTANTARRHES = $ligne["MONTANTARRHES"]; ?>
                                <?php $NBOCCUPANT = $ligne["NBOCCUPANT"]; ?>
                                <?php $TARIFSEMRESA = $ligne["TARIFSEMRESA"]; ?>
                                <?php $NOMCPTE = $ligne["NOMCPTE"]; ?>
                                <?php $PRENOMCPTE = $ligne["PRENOMCPTE"]; ?>
                                <?php $DATEFINSEM = $ligne["DATEFINSEM"]; ?>



                                <div class="col-lg-4 col-sm-6">
                                    <a class="portfolio-box" href="noresa.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../../image/<?php echo $PHOTOHEB ?>" alt="">
                                        <div class="portfolio-box-caption">
                                            <div class="portfolio-box-caption-content">

                                                <div class="project-name">
                                                    <?php echo $NOMHEB ?> - <?php echo $NOMTYPEHEB ?>   <br>
                                                    <hr style="border-color: white;">
                                                    Réserver par <?php echo $PRENOMCPTE ?>  <?php echo $NOMCPTE ?> <br>  
                                                    Arrivée : <?php echo $DATEDEBSEM ?> <br>  
                                                    Départ : <?php echo $DATEFINSEM ?> <br>  
                                                    <?php echo $TARIFSEMHEB ?> /semaine<br>  

                                                    <br>
                                                    Ref: <?php echo $NOHEB ?> <br>

                                                </div>
                                            </div>
                                        </div>
                                    </a>

                                </div>

                            <?php endwhile; ?>
                            <?php mysqli_close($con); ?>

                        </div>
                        <div id="dialog1" title="CREER UNE NOUVELLE RESERVATION">
                            <section class="bg-primary" id="about">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8 mx-auto text-center">
                                            <p class="text-faded">
                                            <form method="POST" action="addresa.php"> 
                                                <select class="btn btn-primary3 btn-xl js-scroll-trigger" name="NOHEB">
                                                    <option> Séléctionner ref hébergement </option>
                                                    <?php
                                                    include '../sql.php';

                                                    $res = $con->query("SELECT * FROM HEBERGEMENT");
                                                    while ($row = $res->fetch_assoc()) {
                                                        echo "<option>" . $row['NOHEB'] . "</option> ";
                                                    }
                                                    ?>
                                                </select> <br><br>
                                                <select class="btn btn-primary3 btn-xl js-scroll-trigger" name="DATEDEBSEM">
                                                    <option> Séléctionner la semaine d'arrivée </option>
                                                    <?php
                                                    include '../sql.php';

                                                    $res = $con->query("SELECT * FROM SEMAINE");
                                                    while ($row = $res->fetch_assoc()) {
                                                        echo "<option>" . $row['DATEDEBSEM'] . "</option> ";
                                                    }
                                                    ?>
                                                </select> <br> <br>
                                                <select class="btn btn-primary3 btn-xl js-scroll-trigger" name="USER">
                                                    <option> Séléctionner le USER </option>
                                                    <?php
                                                    include '../sql.php';

                                                    $res = $con->query("SELECT * FROM COMPTE ORDER BY USER");
                                                    while ($row = $res->fetch_assoc()) {
                                                        echo "<option>" . $row['USER'] . "</option> ";
                                                    }
                                                    ?>
                                                </select> <br>

                                                <br>
                                                <input  class="btn btn-primary3 btn-xl js-scroll-trigger"type="text" name="NBOCCUPANT" placeholder="Saisir le nombre d'occupant"> <br><br>
                                                <input  class="btn btn-primary3 btn-xl js-scroll-trigger"type="text" name="MONTANTARRHES" placeholder="Saisir le prix par semaine"> <br><br>
                                                <input class="btn btn-primary4 btn-xl js-scroll-trigger"type="submit" name="valid" value="Ajouter">

                                            </form>
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <br> 
                        <button id="opener1" class="btn btn-primary btn-xl js-scroll-trigger"> Ajouter une réservation</button> <br>
                        <div id="promo"style="border: 1px solid #57D53B; color: #57D53B; "> 
                            <?php
                            if ($_GET['info'] == 'vad') {
                                echo "La réservation a bien été aujouté ";
                            }
                            ?> 
                        </div>
                        <br> <br>
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


