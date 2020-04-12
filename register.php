<?php
require "header.php" ?>

<main>
    <h1>Registreren</h1>
    <?php
    //foutmeldingen weergeven
    if (isset($_GET['error'])){
        if ($_GET['error'] == "emptyfields"){
            echo 'Alle velden invullen!';
        } else if ($_GET['error'] == "invaliduidmail"){
            echo 'Incorrect gebruikersnaam en email!';
        } else if ($_GET['error'] == "invaliduid"){
            echo 'Ongeldige gebruikersnaam!';
        } else if ($_GET['error'] == "invalidmail"){
            echo 'Ongeldige email!';
        } else if ($_GET['error'] == "passwordcheck"){
            echo 'Wachtwoorden komen niet overeen!';
        } else if ($_GET['error'] == "usertaken") {
            echo 'Gebruikersnaam bestaat al!';
        }
    }
    //successvolle registratie vermelden
    else if ($_GET["reg"] == "success"){
        echo 'Registratie successvol!';
    }
    ?>
    <form action="includes/signup.inc.php" method="post">
        <input type="text" name="userid" placeholder="Gebruikersnaam">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="pwd" placeholder="Wachtwoord">
        <input type="password" name="pwd-repeat" placeholder="Wachtwoord herhalen">
        <button type="submit" name="signup-submit">Registreren</button>
    </form>
</main>

<?php
require "footer.php" ?>
