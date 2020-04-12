<?php
//session beëindigen en terug naar index.php gaan
session_start();
session_unset();
session_destroy();
header("Location: ../index.php");
