
    <?php   

        $NOHEB = $_POST['NOHEB'];
        $NOMHEB = $_POST['NOMHEB'];
	$SECTEURHEB  = $_POST['SECTEURHEB'];
	$DESCRIHEB  = $_POST['DESCRIHEB']; 
	$NBPLACEHEB = $_POST['NBPLACEHEB']; 
	$SURFACEHEB = $_POST['SURFACEHEB']; 
        $ORIENTATIONHEB = $_POST['ORIENTATIONHEB'];
        $TARIFSEMHEB = $_POST['TARIFSEMHEB']; 


 
 
if (isset($NOHEB) && isset($NOMHEB) && isset($SECTEURHEB) && isset($DESCRIHEB) && isset($NBPLACEHEB) && isset($SURFACEHEB) && isset($ORIENTATIONHEB) && isset($TARIFSEMHEB)) {
     include '../sql.php';
        $req = "UPDATE HEBERGEMENT SET NOMHEB = '".$NOMHEB."' ,NBPLACEHEB = ".$NBPLACEHEB.", SURFACEHEB = ".$SURFACEHEB.", SECTEURHEB = '".$SECTEURHEB."', DESCRIHEB = '".$DESCRIHEB."' , TARIFSEMHEB = ".$TARIFSEMHEB." where NOHEB = ".$NOHEB;
	$res = mysqli_query($con, $req); 
        mysqli_close($con); 
        header("location:indexadmin.php");
   }
  
?>
   