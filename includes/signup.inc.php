<?php
 if (isset($_POST['signup-submit'])){

     require "dbh.inc.php";

     $username = $_POST['userid'];
     $email = $_POST['email'];
     $password = $_POST['pwd'];
     $passwordRepeat = $_POST['pwd-repeat'];

     //kijken of alle velden ingevuld zijn anders statement verlaten
     if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
         header("Location: ../register.php?error=emptyfields&uid=".$username."&email=".$email) ;
         exit();

         //kijken of email valid is anders statement verlaten
     } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
         header("Location: ../signup.php?error=invaliduidmail=") ;
     } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         header("Location: ../register.php?error=invalidmail&uid=".$username) ;
         exit();

         //kijken of username valid is anders statement verlaten
     } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
         header("Location: ../register.php?error=invaliduid&mail=".$email) ;
         exit();

         //kijken of wachtwoorden overeenkomen anders statement verlaten
     } else if ($password !== $passwordRepeat) {
             header("Location: ../register.php?error=passwordcheck&uid=".$username."&mail=".$email) ;
             exit();

     } else {
         //kijken of gebruiker al bestaat, placeholder "?" bij username
         $sql = "SELECT username FROM users WHERE username=?";
         /*prepare statement stmt init
          *if  mysqli_stmt_prepare failed, return to signup page with error message
          *exit statement
          */
         $stmt = mysqli_stmt_init($conn);
         if (!mysqli_stmt_prepare($stmt, $sql)) {
             header("Location: ../register.php?error=sqlerror") ;
             exit();
         } else {
             mysqli_stmt_bind_param($stmt, "s",$username);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_store_result($stmt);
             $resultCheck = mysqli_stmt_num_rows($stmt);
             //als $resultcheck > 0 is username al in gebruik
             if ($resultCheck > 0) {
                 //gebruiker terug naar signup sturen en error message weergeven
                 header("Location: ../register.php?error=usertaken&email=".$email) ;
                 exit();
                 //als username niet in gebruik is, gegevens in database opslaan
             } else {
                 //username, email en wachtwoord in database opslaan, placeholder "?" voor values gebruikt
                 $sql = "INSERT INTO users(username, uemail, pwduser) VALUES(?, ?, ?) ";
                 $stmt = mysqli_stmt_init($conn);
                 //if statement controleert of $stmt en $sql in de database uitgevoerd worden
                 if (!mysqli_stmt_prepare($stmt, $sql)) {
                     header("Location: ../register.php?error=sqlerror");
                     exit();
                 } else {
                     // wachtwoord hashen voordat deze opgeslagen wordt

                     $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                     mysqli_stmt_bind_param($stmt, "sss",$username, $email, $hashedPwd );
                     mysqli_stmt_execute($stmt);

                     header("Location: ../register.php?reg=success") ;
                     exit();
                 }
             }
         }
     }
 }
 //anders statement verlaten
 else {
     header("Location: ../register.php") ;
     exit();
 }