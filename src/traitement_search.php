<?php

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $_GET["search"] = htmlspecialchars(($_GET["search"]));

    $search = strip_tags($_GET["search"]);

    require_once("./connect.php");

    $search = "%$search%";

    $sql = "SELECT article_id FROM article WHERE title OR username LIKE :search";
    $query = $db->prepare($sql);
    $query->bindValue(":search", $search);
    $query->execute();
    $result = $query->fetchall();
}
