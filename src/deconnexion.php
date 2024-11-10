<?php

session_start();

if (isset($_SESSION["user_cook"])) {
    unset($_SESSION["user_cook"]);
    header("Location: index.php");
    exit();
}
