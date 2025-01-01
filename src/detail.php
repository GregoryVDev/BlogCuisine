<?php
session_start();

require_once("./connect.php");

// Vérifier si un ID est passé dans l'URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    // Si aucun ID n'est fourni, rediriger ou afficher un message d'erreur
    die("Aucun article sélectionné.");
}

// Récupérer l'ID de l'article depuis l'URL
$article_id = intval($_GET['id']);

// Préparer une requête SQL pour récupérer uniquement l'article correspondant
$sql_article = "SELECT a.article_id, c.category_name, t.tag_name, p.number, a.username, a.title, 
                a.cooking, a.preparation, a.content, a.date, a.ingredients, a.instruction, a.image 
                FROM article a 
                LEFT JOIN tags t ON a.tag_id = t.tag_id 
                LEFT JOIN categorie c ON a.category_id = c.category_id
                LEFT JOIN personnes p ON a.pers_id = p.pers_id
                WHERE a.article_id = :article_id";

$query_article = $db->prepare($sql_article);
$query_article->bindParam(':article_id', $article_id, PDO::PARAM_INT);
$query_article->execute();
$article = $query_article->fetch(PDO::FETCH_ASSOC);

// Vérifier si un article a été trouvé
if (!$article) {
    header("Location: ../../index.php");
}
?>

<?php include "./template/header.php" ?>
<main>
    <section class="detail">
        <article class="detail-article">
            <div class="container-detail">
                <a href="<?= strtolower($article["tag_name"]) ?>.php"><?= htmlspecialchars($article["tag_name"]) ?></a>
            </div>
            <h2><?= htmlspecialchars($article["title"]) ?></h2>
            <div class="credit-detail">
                <p><span class="credit">par :</span> <?= htmlspecialchars($article["username"]) ?></p>
                <?php
                $date = DateTime::createFromFormat('Y-m-d H:i:s', $article["date"]);
                $formattedDate = $date ? $date->format('d/m/Y') : htmlspecialchars($article["date"]);
                ?>
                <p><span class="credit">posté le :</span> <?= $formattedDate ?></p>
                <p><span class="credit">tags :</span> <a href="viandes.php"><?= htmlspecialchars($article["tag_name"]) ?></a></p>
            </div>
            <figure class="img-container">
                <img src="./backoffice/<?= htmlspecialchars($article["image"]) ?>" alt="<?= htmlspecialchars($article["title"]) ?>" class="image-plat" id="imagePlat" onclick="openModal('./backoffice/<?= htmlspecialchars($article["image"]) ?>')">
                <figcaption class="text-content"><?= htmlspecialchars($article["content"]) ?></figcaption>
            </figure>

            <!-- Fenêtre modale -->
            <div id="imageModal" class="modal" onclick="closeModal(event)">
                <span class="close" id="closeBtn">&times;</span>
                <img class="modal-content" id="modalImage">
            </div>

            <div class="container-info">
                <div class="left-info">
                    <h3>Temps de préparation</h3>
                    <p><?= htmlspecialchars($article["preparation"]) ?> minutes</p>
                </div>
                <div class="middle-info">
                    <h3>Temps de cuisson</h3>
                    <p><?= htmlspecialchars($article["cooking"]) ?> minutes</p>
                </div>
                <div class="right-info">
                    <h3>Personnes</h3>
                    <p><?= htmlspecialchars($article["number"]) ?> personnes</p>
                </div>
            </div>
            <div class="container-recette">
                <aside>
                    <h3>Ingrédients</h3>
                    <ul>
                        <?php
                        $ingredients = $article["ingredients"];
                        $ingredients_array = explode("\n", $ingredients);

                        foreach ($ingredients_array as $ingredient) {
                            $ingredient = trim($ingredient);
                            echo "<li>" . htmlspecialchars($ingredient) . "</li>";
                        }
                        ?>
                    </ul>
                </aside>
                <article class="instruction">
                    <h3>Instructions</h3>
                    <ol>
                        <?php
                        $instruction = $article["instruction"];
                        $instruction_array = explode("\n", $instruction);

                        foreach ($instruction_array as $instruction) {
                            $instruction = trim($instruction);
                            echo "<li>" . htmlspecialchars($instruction) . "</li>";
                        }
                        ?>
                    </ol>
                </article>
            </div>
        </article>
    </section>
</main>
<script src="./js/plats.js"></script>
<?php include "./template/footer.php" ?>