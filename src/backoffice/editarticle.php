<?php

session_start();

require_once("../connect.php");

// if (!isset($_SESSION["user_cook"])) {
//     header("Location: login.php");
// }

if (isset($_GET["id"])) {
    $article_id = strip_tags($_GET["id"]);

    $sql = "SELECT * FROM article WHERE article_id=:article_id";
    $query = $db->prepare($sql);

    $query->bindValue(":article_id", $article_id);
    $query->execute();

    $edit = $query->fetch();

    if (!$edit) {
        header("Location: addarticle.php");
    }
    // } else {
    //     header("Location: ../index.php");
    //     exit();
}

// Récupération des catégories
$sql_category = "SELECT * FROM categorie";
$query_category = $db->prepare($sql_category);
$query_category->execute();
$category = $query_category->fetchAll(PDO::FETCH_ASSOC);

// Récupération des tags
$sql_tags = "SELECT * FROM tags";
$query_tags = $db->prepare($sql_tags);
$query_tags->execute();
$tag = $query_tags->fetchAll(PDO::FETCH_ASSOC);

// Récupération des personnes
$sql_pers = "SELECT * FROM personnes";
$query_pers = $db->prepare($sql_pers);
$query_pers->execute();
$personne = $query_pers->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = strip_tags($_POST["username"]);
    $category_id = (int) strip_tags($_POST["category_id"]);
    $tag_id = (int) strip_tags($_POST["tag_id"]);
    $pers_id = (int) strip_tags($_POST["pers_id"]);
    $title = strip_tags($_POST["title"]);
    $content = strip_tags($_POST["content"]);
    $cooking = strip_tags($_POST["cooking"]);
    $preparation = strip_tags($_POST["preparation"]);
    $ingredients = strip_tags($_POST["ingredients"]);
    $instruction = strip_tags($_POST["instruction"]);

    $uploadDir = "images/recettes/";

    $allowedTypes = ['image/jpg', 'image/jpeg', 'image/png', 'image/webp'];

    $maxFileSize = 4 * 1024 * 1024;

    $imageFile = ['image'];

    foreach ($imageFile as $fileKey) {

        if (isset($_FILES[$fileKey]) && $_FILES[$fileKey]["error"] === 0) {
            if ($_FILES[$fileKey]["size"] <= $maxFileSize && in_array(mime_content_type($_FILES[$fileKey]["tmp_name"]), $allowedTypes)) {
                ${$fileKey} = $uploadDir . uniqid() . '.' . pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION);

                if (!empty($edit[$fileKey]) && file_exists($edit[$fileKey])) {
                    unlink($edit[$fileKey]); // Supprime l'ancienne image
                }

                move_uploaded_file($_FILES[$fileKey]['tmp_name'], ${$fileKey});
            } else {
                echo "<script>alert('Erreur : Fichier $fileKey invalide ou trop volumineux.');</script>";
            }
        } else {
            $$fileKey = $edit[$fileKey];
        }
    }

    try {

        $sql_update = "UPDATE article SET username = :username, category_id = :category_id, tag_id = :tag_id, pers_id = :pers_id, title = :title, content = :content, cooking = :cooking, preparation = :preparation, ingredients = :ingredients, instruction = :instruction, image = :image WHERE article_id = :article_id";
        $query = $db->prepare($sql_update);

        $query->bindValue(":username", $username);
        $query->bindValue(":category_id", $category_id);
        $query->bindValue(":tag_id", $tag_id);
        $query->bindValue(":pers_id", $pers_id);
        $query->bindValue(":title", $title);
        $query->bindValue(":content", $content);
        $query->bindValue(":cooking", $cooking);
        $query->bindValue(":preparation", $preparation);
        $query->bindValue(":ingredients", $ingredients);
        $query->bindValue(":instruction", $instruction);
        $query->bindValue(":image", $image);
        $query->bindValue(":article_id", $article_id);
        $query->execute();

        echo "<script>
                    alert('Les données ont été insérées avec succès.');
                    window.location.href = 'addarticle.php';
                  </script>";
        exit();
    } catch (Exception $e) {
        echo "<script>alert(" . json_encode('Erreur SQL : ' . $e->getMessage()) . ");</script>";
    }
}

?>

<?php include "../backoffice/template/header.php" ?>
<section class="illust-addarticle"></section>
<section class="formulaire">
    <div class="container">
        <h3>Modifier un article</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="left-section">
                <div class="container-prenom">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="username" placeholder="Prénom" value="<?= $edit["username"] ?>" required>
                </div>
                <div class="container-title">
                    <label for="titre">Titre :</label>
                    <input type="text" id="titre" name="title" placeholder="Titre" value="<?= $edit["title"] ?>" required>
                </div>
                <div class="container-categories">
                    <label for="categorie">Catégorie :</label>
                    <select id="categorie" name="category_id" required>
                        <?php foreach ($category as $categories) { ?>
                            <option value="<?= $categories["category_id"] ?>" <?= $categories["category_id"] === $edit["category_id"] ? "selected" : "" ?>><?= $categories["category_name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="container-tags-form">
                    <label for="tags">Tags :</label>
                    <select id="categorie" name="tag_id" required>
                        <?php foreach ($tag as $tags) { ?>
                            <option value="<?= $tags["tag_id"] ?>" <?= $tags["tag_id"] === $edit["tag_id"] ? "selected" : "" ?>><?= $tags["tag_name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="container-coocking">
                <label for="temps_cuisson">Temps cuisson (minutes) :</label>
                <input type="text" id="temps_cuisson" name="cooking" placeholder="Cuisson en minutes" value="<?= $edit["cooking"] ?>" required>
            </div>
            <div class="container-preparation">
                <label for="temps_preparation">Temps préparation (minutes) :</label>
                <input type="text" id="temps_preparation" name="preparation" placeholder="Préparation en minutes" value="<?= $edit["preparation"] ?>" required>
            </div>
            <div class="container-personnes">
                <label for="personnes">Personnes :</label>
                <select id="personnes" name="pers_id" required>
                    <?php foreach ($personne as $personnes) { ?>
                        <option value="<?= $personnes["pers_id"] ?>" <?= $personnes["pers_id"] === $edit["pers_id"] ? "selected" : "" ?>><?= $personnes["number"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="right-section">
                <label for="description">Description :</label>
                <textarea id="description" name="content" placeholder="Description du plat" required><?= htmlspecialchars($edit["content"]) ?></textarea>

                <label for="ingredients">Ingrédients :</label>
                <textarea id="ingredients" name="ingredients" placeholder="Ingrédients besoins" required><?= htmlspecialchars($edit["ingredients"]) ?></textarea>

                <label for="preparation">Préparation :</label>
                <textarea id="preparation" name="instruction" placeholder="Instruction de la préparation" required><?= htmlspecialchars($edit["instruction"]) ?></textarea>

                <label class="uploadLabel" for="image" id="uploadLabel">Upload la photo</label>
                <img src="<?= $edit["image"] ?>" alt="" style="width: 235px; height: 235px; object-fit: cover; margin-bottom: 20px;">
                <input type="file" id="image" name="image" class="image" onchange="previewImage(this, 'imagePreview')">
                <div class="preview" id="imagePreview"></div>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</section>

<h3>Dashboard</h3>
<div class="container-search">
    <img src="../img/logos/search.svg" alt="Recherche">
    <input type="search" name="search" id="search" placeholder="Nom de la recette">
</div>

</body>
<script src="./js/previewimage.js"></script>

</html>