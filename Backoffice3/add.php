<?php

	$NOMHEB  = $_POST['NOMHEB'];
	$NBPLACEHEB  = $_POST['NBPLACEHEB']; 
	$SURFACEHEB = $_POST['SURFACEHEB']; 
	$INTERNET = $_POST['INTERNET']; 
	$SECTEURHEB = $_POST['SECTEURHEB']; 
	$ORIENTATIONHEB = $_POST['ORIENTATIONHEB'];
        $DESCRIHEB = $_POST['DESCRIHEB'];
        $TARIFSEMHEB = $_POST['TARIFSEMHEB'];
        $CODETYPEHEB = $_POST['CODETYPEHEB'];
        $PHOTOHEB = $_POST['PHOTOHEB'];
       
        include '../sql.php';
	$req =  "INSERT INTO HEBERGEMENT (NOMHEB,CODETYPEHEB, SURFACEHEB, NBPLACEHEB, INTERNET, SECTEURHEB, ORIENTATIONHEB, DESCRIHEB, PHOTOHEB, TARIFSEMHEB  )
			VALUES( '$NOMHEB' ,'$CODETYPEHEB', '$SURFACEHEB' , '$NBPLACEHEB', '1', '$SECTEURHEB', '$ORIENTATIONHEB', 'Pas de déscription','chaletpp.jpg' ,'$TARIFSEMHEB');";

	$res = mysqli_query($con, $req, $rep); 
	mysqli_close($con); 
        header("location:indexadmin.php?info=ok")
	
?> 