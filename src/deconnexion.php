<?php

session_start();

if (isset($_SESSION["user_cook"])) {
    unset($_SESSION["user_cook"]);
    header("Location: connexion.php");
    exit();
}
