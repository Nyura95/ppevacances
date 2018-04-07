<?php session_start();  ?>
<?php

	$NOHEB  = $_POST['NOHEB'];
        $MONTANTARRHES = $_POST['MONTANTARRHES'];
        $NBOCCUPANT  = $_POST['NBOCCUPANT'];
        $DATEDEBSEM  = $_POST['DATEDEBSEM'];
        $USER =  $_SESSION['USER']; 
        
       
        include '../sql.php';
	$req =  "INSERT INTO RESA (NOHEB,  DATEDEBSEM , USER, CODEETATRESA ,DATERESA,  DATEARRHES, MONTANTARRHES, NBOCCUPANT , TARIFSEMRESA ) VALUES('$NOHEB','$DATEDEBSEM' ,'$USER', '1','$DATEDEBSEM', '$DATEDEBSEM', '$MONTANTARRHES', '$NBOCCUPANT', '$MONTANTARRHES');";
        echo $req;
        $res = mysqli_query($con, $req); 
        mysqli_close($con); 
        header("location:hebergement2.php");

       
	