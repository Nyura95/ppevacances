<?php

session_start();

if (isset($_POST['USER']) && isset($_POST['MDP'])) {
    $USER = $_POST['USER'];
    $MDP = $_POST['MDP'];
    include 'sql.php';
    
    $req = "SELECT * FROM COMPTE WHERE USER = '" . $USER . "' AND MDP = '" . $MDP . "'";

    $res = mysqli_query($con, $req);
    if (mysqli_num_rows($res) == 1) {
      $ligne= mysqli_fetch_array($res);
      $TYPECOMPTE = $ligne["TYPECOMPTE"];
      switch ($TYPECOMPTE) {
          case "1":
             $_SESSION['USER'] = $USER;
            header("location:Backoffice1/indexbackoffice.php");
            break;
         case "2":
             $_SESSION['USER'] = $USER;
            header("location:Backoffice2/indexadmin.php");
            break;
         case "3":
             $_SESSION['USER'] = $USER;
            header("location:Backoffice3/indexgestionnaire.php");
            break;
        default :
             header("location:connection.php");
        break;
            
      }
       
          

        mysqli_close($con);
    }
}

    
   