<?php

session_start();

if (!isset($_SESSION["user_cook"])) {
    header("Location: ../../../login.php");
    exit();
}
require_once("../connect.php");

if (isset($_SESSION["user_cook"])) {
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = strip_tags($_GET["id"]);

        $sql_delete = "DELETE FROM personnes WHERE pers_id=:pers_id";

        $query = $db->prepare($sql_delete);
        $query->bindValue(":pers_id", $id);
        $query->execute();

        header("Location: peoples.php");
        exit();
    }
}
