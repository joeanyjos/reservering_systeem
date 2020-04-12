<?php
    session_start();

?>
<!DOCTYPE HTML>
<html lang="eng">
<head>
    <meta charset="utf-8">
    <title> McDonald's Muntbergweg </title>
    <link rel="stylesheet" href="stylesheet/stylesheet.css">
</head>
<body>

<header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="reserveren.php">Reserveren</a></li>
            <li><a href="register.php">Personeel registratie</a></li>
        </ul>
        <div>
                
            //als gebruiker ingelogd is, wordt de uitlog knop weergegeven
            <?php
            if (isset($_SESSION['userID'])){
                echo '<form action="includes/logout.inc.php" method="post">
                    <button type="submit" name="logout-submit">Uitloggen</button>
                    </form>';
                //anders wordt de inlogbalk weergegeven 
            } else {
                echo ' <form action="includes/login.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="Gebruikersnaam/Email...">
                <input type="password" name="pwd" placeholder="Wachtwoord...">
                <button type="submit" name="login-submit">Inloggen</button>
            </form>
            <a href="register.php">Registreren</a>';
            }

            ?>

        </div>
    </nav>
</header>
</body>
</html>

