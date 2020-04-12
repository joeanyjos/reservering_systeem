<?php
 require "header.php";
 ?>

<main>
 //als gebruiker niet ingelogd is wordt text weergegeven
    <?php
        if (!isset($_SESSION['userID'])){
            echo "You are logged out";
        }

    ?>


</main>

<?php
require "footer.php";
