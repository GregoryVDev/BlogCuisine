<?php
session_start();

require_once("../connect.php");

if (!isset($_SESSION["user_cook"])) {
    header("Location: ../../../login.php");
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

$sql = "SELECT article_id, title, username FROM article ORDER BY title ASC";
$query_article = $db->prepare($sql);
$query_article->execute();
$articles = $query_article->fetchAll(PDO::FETCH_ASSOC);


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
                move_uploaded_file($_FILES[$fileKey]['tmp_name'], ${$fileKey});
            } else {
                echo "<script>alert('Erreur : Fichier $fileKey invalide ou trop volumineux.');</script>";
            }
        } else {
            echo "<script>alert('Erreur : Fichier $fileKey invalide ou trop volumineux.');</script>";
        }
    }

    try {
        $sql_article = "INSERT INTO article (username, category_id, tag_id, pers_id, title, content, cooking, preparation, ingredients, instruction, image) VALUES (:username, :category_id, :tag_id, :pers_id, :title, :content, :cooking, :preparation, :ingredients, :instruction, :image)";
        $query = $db->prepare($sql_article);

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
        $query->bindValue(":image", $image ?? null);

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
        <h3>Ajouter un article</h3>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="left-section">
                <div class="container-prenom">
                    <label for="prenom">Prénom :</label>
                    <input type="text" id="prenom" name="username" placeholder="Prénom" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
                </div>
                <div class="container-title">
                    <label for="titre">Titre :</label>
                    <input type="text" id="titre" name="title" placeholder="Titre" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" required>
                </div>
                <div class="container-categories">
                    <label for="categorie">Catégorie :</label>
                    <select id="categorie" name="category_id">
                        <option value="" disabled selected>--Catégorie--</option>
                        <?php foreach ($category as $categories) { ?>
                            <option value="<?= $categories["category_id"] ?>"><?= $categories["category_name"] ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="container-tags-form">
                    <label for="tags">Tags :</label>
                    <select id="categorie" name="tag_id" required>
                        <option value="" disabled selected>--Tags--</option>
                        <?php foreach ($tag as $tags) { ?>
                            <option value="<?= $tags["tag_id"] ?>"><?= $tags["tag_name"] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="container-coocking">
                <label for="temps_cuisson">Temps cuisson (minutes) :</label>
                <input type="text" id="temps_cuisson" name="cooking" placeholder="Cuisson en minutes" value="<?= htmlspecialchars($_POST['cooking'] ?? '') ?>" required>
            </div>
            <div class="container-preparation">
                <label for="temps_preparation">Temps préparation (minutes) :</label>
                <input type="text" id="temps_preparation" name="preparation" placeholder="Préparation en minutes" value="<?= htmlspecialchars($_POST['preparation'] ?? '') ?>" required>
            </div>
            <div class="container-personnes">
                <label for="personnes">Personnes :</label>
                <select id="personnes" name="pers_id">
                    <option value="" disabled selected>--Nombre de personne--</option>
                    <?php foreach ($personne as $personnes) { ?>
                        <option value="<?= $personnes["pers_id"] ?>"><?= $personnes["number"] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="right-section">
                <label for="description">Description :</label>
                <textarea id="description" name="content" placeholder="Description du plat" required><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>

                <label for="ingredients">Ingrédients :</label>
                <textarea id="ingredients" name="ingredients" placeholder="Ingrédients besoins" required><?= htmlspecialchars($_POST['ingredients'] ?? '') ?></textarea>

                <label for="preparation">Préparation :</label>
                <textarea id="preparation" name="instruction" placeholder="Instruction de la préparation" required><?= htmlspecialchars($_POST['instruction'] ?? '') ?></textarea>

                <label class="uploadLabel" for="image" id="uploadLabel">Upload la photo</label>
                <input type="file" id="image" name="image" class="image" required onchange="previewImage(this, 'imagePreview')">
                <div class="preview" id="imagePreview"></div>
            </div>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</section>

<h3>Dashboard</h3>
<div class="container-search">
    <form action="traitement_recipes.php" method="GET" id="searchForm">
        <img src="../img/logos/search.svg" alt="Recherche" style="bottom: 7px;">
        <input type="search" name="recipes" id="search" placeholder="Rechercher une recette">
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>Action</th>
            <th>Titre</th>
            <th>Prénom</th>
            <th><input type="checkbox" id="selectAll"></th>
        </tr>
    </thead>
    <?php $i = 0; ?>
    <?php foreach ($articles as $article) { ?>
        <tbody>
            <tr data-page="1" class="<?= $i % 2 == 0 ? 'even' : 'odd' ?>">
                <td class="actions">
                    <a href="editarticle.php?id=<?= $article["article_id"] ?>" class="btn-edit">Modifier</a>
                    <a href="../detail.php?id=<?= $article["article_id"] ?>" class="btn-see">Voir</a>
                    <a href="deletearticle.php?id=<?= $article["article_id"] ?>"
                        class="btn-delete"
                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette recette ?');">
                        Supprimer
                    </a>
                </td>
                <td><?= $article["title"] ?></td>
                <td><?= $article["username"] ?></td>
                <td><input type="checkbox" class="article-checkbox" value="<?= $article["article_id"] ?>"></td>
            </tr>
        </tbody>
        <?php $i++ ?>
    <?php } ?>
    <!-- PAGINATION -->
    <div id="pagination" class="container-pages">
        <span id="pageNumbers"></span>
    </div>
</table>
<div class="container-button">
    <button type="submit" id="deleteSelected" class="delete-produits">Supprimer les articles sélectionnés</button>
</div>
</body>
<script src="./js/pagination.js"></script>
<script src="./js/previewimage.js"></script>
<script>
    // Sélectionne l'élément HTML de la case à cocher "Tout sélectionner" par son ID
    const selectAllCheckbox = document.getElementById('selectAll');

    // Sélectionne toutes les cases à cocher des articles par leur classe CSS
    const articleCheckboxes = document.querySelectorAll('.article-checkbox');

    // Sélectionne le bouton "Supprimer les articles sélectionnés" par son ID
    const deleteButton = document.getElementById('deleteSelected');

    // Lorsqu'une modification est apportée à la case "Tout sélectionner"
    selectAllCheckbox.addEventListener('change', function() {
        // Pour chaque case à cocher des articles
        articleCheckboxes.forEach(checkbox => {
            // Met à jour l'état de chaque case en fonction de l'état de la case "Tout sélectionner"
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    // Lorsqu'une case à cocher d'article est modifiée
    articleCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Si une case d'article est décochée, décoche également "Tout sélectionner"
            if (!checkbox.checked) {
                selectAllCheckbox.checked = false;
            } else {
                // Si toutes les cases d'articles sont cochées, coche "Tout sélectionner"
                const allChecked = [...articleCheckboxes].every(c => c.checked);
                // Si toutes les cases sont cochées, coche la case "Tout sélectionner", sinon laisse la décochée
                selectAllCheckbox.checked = allChecked;
            }
        });
    });

    // Lorsqu'on clique sur le bouton "Supprimer les articles sélectionnés"
    deleteButton.addEventListener('click', function() {
        // Crée un tableau pour stocker les IDs des articles sélectionnés
        const selectedArticles = [];

        // Pour chaque case à cocher des articles
        articleCheckboxes.forEach(checkbox => {
            // Si la case est cochée, ajoute son ID au tableau selectedArticles
            if (checkbox.checked) {
                selectedArticles.push(checkbox.value);
            }
        });

        // Vérifie si au moins un article a été sélectionné
        if (selectedArticles.length > 0) {
            // Si des articles ont été sélectionnés, demande une confirmation avant de supprimer
            if (confirm('Êtes-vous sûr de vouloir supprimer ces recettes ?')) {
                // Crée un formulaire HTML pour envoyer les données à un fichier PHP
                const form = document.createElement('form');
                form.method = 'POST'; // Méthode d'envoi des données (POST)
                form.action = 'deletearticle.php'; // Fichier PHP où les données seront envoyées

                // Pour chaque article sélectionné, ajoute un champ caché dans le formulaire
                selectedArticles.forEach(articleId => {
                    const input = document.createElement('input');
                    input.type = 'hidden'; // Crée un champ caché
                    input.name = 'article_ids[]'; // Tableau pour stocker plusieurs IDs d'articles
                    input.value = articleId; // L'ID de l'article
                    form.appendChild(input); // Ajoute le champ caché au formulaire
                });

                // Ajoute le formulaire au corps de la page
                document.body.appendChild(form);

                // Envoie le formulaire pour supprimer les articles
                form.submit();
            }
        } else {
            // Si aucun article n'a été sélectionné, affiche une alerte
            alert('Veuillez sélectionner au moins un article.');
        }
    });
</script>

</html>