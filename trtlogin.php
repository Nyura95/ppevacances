<?php
// Si les form demandé son là ET qu'il ne sont pas égale à ''
if (isset($_POST['USER']) && $_POST['USER'] != '' && isset($_POST['MDP']) && $_POST['MDP'] != '') {
    $USER = $_POST['USER'];
    $MDP = $_POST['MDP'];
    include 'sql.php';
    
    $req = "SELECT * FROM COMPTE WHERE USER = '" . $USER . "' AND MDP = '" . $MDP . "'";

    $res = mysqli_query($con, $req);
    // On check effectivement si il y a bien unne entrée
    if (mysqli_num_rows($res) == 1) {
        // On start la sesson uniquement lorsque l'utilisateur est reconnu
        session_start();
        $ligne= mysqli_fetch_array($res);
        $TYPECOMPTE = $ligne["TYPECOMPTE"];
        switch ($TYPECOMPTE) {
            case "1":
                // Si la variable de session est remplit, alors c'est qu'il est connecté
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
    } else {
        // sinon on redirige avec la variable 'bad' qui affichera une erreur en js
        header("Location:connection.php?bad");
    }

    mysqli_close($con);
} else {
    // sinon on retourne sur le formaulaire avec la variable 'nothing' qui affichera une erreur en js
    header("Location:connection.php?nothing");
}

    
   