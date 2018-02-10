<?php session_start();  ?>
<?php

	$NOHEB  = $_POST['NOHEB'];
        $MONTANTARRHES = $_POST['MONTANTARRHES'];
        $NBOCCUPANT  = $_POST['NBOCCUPANT'];
        $DATEDEBSEM  = $_POST['DATEDEBSEM'];
        $USER =  $_SESSION['USER']; 
        
       
        include '../sql.php';
	$req =  "INSERT INTO RESA (NOHEB,  DATEDEBSEM , USER, CODEETATRESA ,DATERESA,  DATEARRHES, MONTANTARRHES, NBOCCUPANT , TARIFSEMRESA )
			VALUES($NOHEB','$DATEDEBSEM' ,'$USER', '1','$DATEDEBSEM', '$DATEDEBSEM', '$MONTANTARRHES', '$NBOCCUPANT', '$MONTANTARRHES');";

	$res = mysqli_query($con, $req, $rep); 
         echo $req;
	mysqli_close($con); 
       
	