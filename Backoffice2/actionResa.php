<?php 
  if(isset($_POST['delete'])) {
    include '../sql.php';
    $req = "DELETE FROM RESA WHERE NOHEB = ".$_POST['delete'];
    $res = mysqli_query($con, $req);
    mysql_close($con);
    header("location:indexadmin.php?delete=".$_POST['delete']);
  }
  if(isset($_POST['update'])) {
    include '../sql.php';
    $req = "UPDATE RESA SET TARIFSEMRESA = '".$_POST['TARIFSEMRESA']."' WHERE NOHEB = ".$_POST['update'];
    $res = mysqli_query($con, $req);
    mysql_close($con);
    header("location:indexadmin.php?update=".$_POST['update']);
  }

?>