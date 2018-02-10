<?php

	$NOHEB = $_POST['NOHEB'];

	 include '../sql.php';
	$req = "DELETE FROM HEBERGEMENT 
                WHERE NOHEB= $NOHEB";

	$res = mysqli_query($con, $req); 
	mysqli_close($con); 
	header("location:indexadmin.php");
?> 