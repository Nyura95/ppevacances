<?php

	$NOHEB  = $_POST['NOHEB'];
	$DATEDEBSEM  = $_POST['DATEDEBSEM']; 
	$USER = $_POST['USER']; 
	$MONTANTARRHES = $_POST['MONTANTARRHES']; 
	$NBOCCUPANT = $_POST['NBOCCUPANT']; 
	
       
        include '../sql.php';
	$req =  "INSERT INTO RESA (NOHEB, DATEDEBSEM, USER, CODEETATRESA, DATEARRHES, MONTANTARRHES, NBOCCUPANT, TARIFSEMRESA )
			VALUES('$NOHEB','$DATEDEBSEM', '$USER' ,'1' , '$DATEDEBSEM','$MONTANTARRHES', '$NBOCCUPANT', '$MONTANTARRHES');";

	$res = mysqli_query($con, $req, $rep); 
	mysqli_close($con); 
        header("location:indexadmin.php?info=vad")
	
?> 