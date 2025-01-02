<?php
session_start();
require_once("../connect.php");

if (!isset($_SESSION["user_cook"])) {
    header("Location: ../../../login.php");
    exit();
}

try {
    if (isset($_POST['article_ids']) && !empty($_POST['article_ids'])) {
        // Suppression de plusieurs articles
        $article_ids = $_POST['article_ids'];

        // Commence une transaction
        $db->beginTransaction();

        // Récupère les images associées aux articles
        $sql = "SELECT image FROM article WHERE article_id IN (" . implode(',', array_map('intval', $article_ids)) . ")";
        $query = $db->prepare($sql);
        $query->execute();
        $articles = $query->fetchAll(PDO::FETCH_ASSOC);

        // Supprime les fichiers images
        foreach ($articles as $article) {
            $imagePath = $article['image'];
            if (!empty($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Supprime les articles
        $sql_delete_articles = "DELETE FROM article WHERE article_id IN (" . implode(',', array_map('intval', $article_ids)) . ")";
        $query_delete_articles = $db->prepare($sql_delete_articles);
        $query_delete_articles->execute();

        // Commit la transaction
        $db->commit();

        echo "<script>
        alert(" . json_encode('Les recettes et leurs images ont été supprimées avec succès.') . ");
        window.location.href = 'addarticle.php'; 
        </script>";
    } elseif (isset($_GET['id'])) {
        // Suppression d'un seul article
        $articleId = (int) $_GET['id'];

        // Commence une transaction
        $db->beginTransaction();

        // Récupère l'image associée à l'article
        $sql = "SELECT image FROM article WHERE article_id = :article_id";
        $query = $db->prepare($sql);
        $query->bindValue(":article_id", $articleId);
        $query->execute();
        $article = $query->fetch(PDO::FETCH_ASSOC);

        if ($article) {
            $imagePath = $article['image'];
            if (!empty($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }

            // Supprime l'article
            $sql_delete = "DELETE FROM article WHERE article_id = :article_id";
            $query_delete = $db->prepare($sql_delete);
            $query_delete->bindValue(":article_id", $articleId);
            $query_delete->execute();

            // Commit la transaction
            $db->commit();

            echo "<script>
            alert('La recette et son image ont été supprimées avec succès.');
            window.location.href = 'addarticle.php'; 
            </script>";
        } else {
            throw new Exception("L'article n'existe pas.");
        }
    } else {
        // Aucun ID ou données d'article reçus
        echo "<script>
        alert(" . json_encode('Erreur : Aucun article sélectionné.') . ");
        window.location.href = 'addarticle.php'; 
        </script>";
    }
} catch (Exception $e) {
    // En cas d'erreur, rollback la transaction et afficher un message d'erreur
    if ($db->inTransaction()) {
        $db->rollBack();
    }
    echo "<script>
    alert(" . json_encode('Erreur SQL : ' . $e->getMessage()) . ");
    window.location.href = 'addarticle.php'; 
    </script>";
}
