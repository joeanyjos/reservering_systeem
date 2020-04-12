<?php
//als er op login-submit werd gedrukt programma beginnen
if (isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    //als er niks wordt ingevoerd, foutmelding weergeven
    if (empty($mailuid) || empty($password)) {
        header("Location: ../index.php?error=emptyfields") ;
        exit();
    } else {
        //anders gebruikers naam of email uitdatabase halen
        $sql = "SELECT * FROM users WHERE username= ? OR uemail=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror") ;
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)){
                //wachtwoord controleren als hij niet goed is foutmelding weergeven anders inloggen en sessie beginnen
                $pwdCheck = password_verify($password, $row['pwduser']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?error=wrongpwd") ;
                    exit();
                } else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userID'] = $row['userid'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: ../home.php?login=success") ;
                    exit();
                } else {
                    //anders foutmelding: verkeerd wachtwoord
                    header("Location: ../index.php?error=wrongpwd") ;
                    exit();
                }
            } else {
                //anders foutmelding: gebruiker bestaat niet
                header("Location: ../index.php?error=nouser") ;
                exit();
            }
        }
    }

}
//anders terug naar index verwijzen
else {
    header("Location: ../index.php") ;
    exit();
}
