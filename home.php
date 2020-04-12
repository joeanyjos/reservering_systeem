<?php
require "header.php";
?>

    <main>
        //kijkt of de gebruiker al ingelogd is, wel ingelogd = naar home niet ingelogd = naar index
        <?php
        if (isset($_SESSION['userID'])){
            echo "You are logged in Welcome back!";
        } else {
            header("Location: ../index.php");
            exit();
        }
        ?>


    </main>

<?php
require "footer.php";
