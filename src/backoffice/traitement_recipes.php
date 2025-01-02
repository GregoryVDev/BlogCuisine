<?php
// header('Content-Type: application/json');

// require_once("../connect.php");

// // Récupération et validation du paramètre de recherche
// $recipes = isset($_GET["recipes"]) ? trim($_GET["recipes"]) : '';

// if ($recipes === '' || strlen($recipes) > 50) {
//     // Si aucun terme de recherche n'est saisi ou qu'il est trop long
//     $sql = "SELECT article_id, title, username FROM article LIMIT 25";
// } else {
//     // Sinon, on cherche les recettes correspondant au terme saisi
//     $sql = "SELECT article_id, title, username FROM article WHERE title LIKE :recipes LIMIT 25";
// }

// $sql = $db->prepare($sql);

// if ($recipes !== '') {
//     $sql->execute(['recipes' => "%$recipes%"]);
// } else {
//     $sql->execute();
// }

// $results = $sql->fetchAll(PDO::FETCH_ASSOC);

// // Retour des résultats en format JSON
// echo json_encode(['results' => $results]);
