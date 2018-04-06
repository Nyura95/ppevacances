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

        <header class="masthead">
            <div class="header-content">
                <div class="header-content-inner">
                    <h1 id="homeHeading">Nos offres et réservations</h1>
                    <hr id="home">
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="avve2.php">L'expérience Village Vacances </a> <br>  <br>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#app">Appartement</a> 
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#bun">Bungalows</a>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#hm">Mobil Home</a>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#cha"> Chalet</a>
                    <br> <br>
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="contact1.php">Contact</a> 
                


                </div>
            </div>
        </header>

        <section class="p-0" id="app">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <br>
                     <form  class="form" action="" method="GET">
                        <input  type="hidden" name="type" value="<?php echo $_GET['type'] ?>">
                        <input class="btn btn-primary btn-xl js-scroll-trigger" type="text " name="max" placeholder="Prix max €" >  
                   
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
                    <br> <br>
                    <h2 class="section-heading">NOS APPARTEMENTS</h2>

                    <hr class="primary">
                    <br> <br>
                   


                    <div class="container-fluid">
                        <div class="row no-gutter popup-gallery">

                            
                            <?php
                            include '../sql.php';

                           if (!empty($_GET["max"])) {
                                $req = " SELECT * FROM TYPE_HEB INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB WHERE TARIFSEMHEB  <= " . $_GET['max'] . " AND NOMTYPEHEB = 'appartement'";
                            } else {
                                $req = " SELECT * FROM TYPE_HEB INNER JOIN HEBERGEMENT on TYPE_HEB.CODETYPEHEB = HEBERGEMENT.CODETYPEHEB WHERE NOMTYPEHEB = 'appartement'";
                            }
                            ?> 


                            <?php $res = mysqli_query($con, $req); ?>


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
                                    <a class="portfolio-box" href="infoheb.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../img/image/<?php echo $PHOTOHEB ?>" alt="">
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
        <section class="p-0" id="bun">

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
                                    <a class="portfolio-box" href="infoheb.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../img/image/<?php echo $PHOTOHEB ?>" alt="">
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
        <section class="p-0" id="hm">

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
                                    <a class="portfolio-box" href="infoheb.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../img/image/<?php echo $PHOTOHEB ?>" alt="">
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
                                    <a class="portfolio-box" href="infoheb.php?noheb=<?php echo $NOHEB ?>">
                                        <img class="img-fluid" src="../img/image/<?php echo $PHOTOHEB ?>" alt="">
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

