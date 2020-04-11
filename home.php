<?php
require "header.php";
?>

    <main>

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
