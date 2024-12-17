<?php

session_start();

require_once("../connect.php");

if (!isset($_SESSION["user_cook"])) {
    header("Location: ../../../login.php");
    exit();
}

if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $article_id = strip_tags($_GET["id"]);

    try {
        // Récupérer le chemin de l'image de l'article
        $sql = "SELECT image FROM article WHERE article_id = :article_id";
        $query = $db->prepare($sql);
        $query->bindValue(":article_id", $article_id, PDO::PARAM_INT);
        $query->execute();

        $article = $query->fetch(PDO::FETCH_ASSOC);

        if ($article) {
            // Supprimer l'image si elle existe
            $imagePath = $article['image'];
            if (!empty($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Supprimer l'article
            $sql_delete_article = "DELETE FROM article WHERE article_id = :article_id";
            $query_delete_article = $db->prepare($sql_delete_article);
            $query_delete_article->bindValue(":article_id", $article_id, PDO::PARAM_INT);
            $query_delete_article->execute();

            // Confirmation de suppression
            echo "<script>
            alert(" . json_encode('La recette et ses images ont été supprimées avec succès.') . ");
            window.location.href = 'addarticle.php'; 
            </script>";
        } else {
            // Article non trouvé
            echo "<script>
            alert(" . json_encode('Erreur : Recette non trouvée.') . ");
            window.location.href = 'addarticle.php'; 
            </script>";
        }
    } catch (Exception $e) {
        // Gestion des erreurs SQL
        echo "<script>
        alert(" . json_encode('Erreur SQL : ' . $e->getMessage()) . ");
        window.location.href = 'addarticle.php'; 
        </script>";
    }
} else {
    // ID manquant ou vide
    echo "<script>
    alert(" . json_encode('Erreur : ID de la recette non spécifiée ou invalide.') . ");
    window.location.href = 'addarticle.php'; 
    </script>";
}
