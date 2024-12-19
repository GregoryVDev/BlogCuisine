<?php
// Spécifie que le contenu retourné par ce script sera au format JSON
// Cela permet au client (navigateur ou application) de comprendre que la réponse est au format JSON
header('Content-Type: application/json');

require_once("./connect.php");

// *** Récupération et validation du paramètre de recherche ***

// Vérifie si un paramètre 'search' est passé dans l'URL via une requête GET
// Si oui, on supprime les espaces inutiles au début et à la fin de la chaîne avec `trim`
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Valide le terme de recherche
if ($search === '' || strlen($search) > 50) {
    // Si le champ est vide ou dépasse 50 caractères, retourne un message d'erreur au format JSON
    echo json_encode(['results' => [], 'message' => 'Veuillez entrer un terme de recherche valide.']);
    exit; // Arrête immédiatement l'exécution du script
}

// *** Préparation et exécution de la requête SQL ***

// Préparation de la requête SQL pour chercher dans la table `article`
// La colonne `name` est filtrée avec `LIKE` pour permettre une recherche partielle
// Limite les résultats à 10 pour éviter des réponses trop volumineuses
//METTRE TON NOM DE TABLE ET DE COLONNE A TOI 
$sql = $db->prepare("SELECT article_id, username, title, image FROM article WHERE title LIKE :search LIMIT 10");

// Exécute la requête avec le paramètre sécurisé `:search` pour protéger contre les injections SQL
$sql->execute(['search' => "%$search%"]);

// Récupère les résultats sous forme de tableau associatif
$results = $sql->fetchAll(PDO::FETCH_ASSOC);

// *** Gestion des résultats ***

if (count($results) === 1) {
    // Si un seul résultat est trouvé, redirige vers une page spécifique
    // METTRE TON LIEN DE PAGE A TOI  
    echo json_encode(['redirect' => 'detail.php?id=' . $results[0]['article_id']]);
} elseif (count($results) > 1) {
    // Si plusieurs résultats sont trouvés, les sécurise avant de les retourner
    $securedResults = array_map(function ($result) {
        return [
            'article_id' => strip_tags($result['article_id']), // Supprime tout balisage HTML de l'ID pour éviter les injections XSS
            'title' => strip_tags($result['title']), // Supprime tout balisage HTML du nom
            'image' => strip_tags($result['image']) // Supprime tout balisage HTML dans l'image (précaution supplémentaire)
        ];
    }, $results);

    // Retourne les résultats sécurisés au format JSON
    echo json_encode(['results' => $securedResults]);
} else {
    // Si aucun résultat n'est trouvé, retourne un message clair au format JSON
    echo json_encode(['results' => [], 'message' => 'Aucune recette trouvée.']);
}
