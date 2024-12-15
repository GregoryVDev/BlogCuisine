<?php
session_start();

require_once("./connect.php");

$sql = "SELECT * FROM article ORDER BY article_id DESC";
$query = $db->prepare($sql);
$query->execute();
$articles = $query->fetchall(PDO::FETCH_ASSOC);


$sql_article = "SELECT a.article_id, c.category_name, t.tag_name, a.username, a.title, a.cooking, a.preparation, a.content, a.date, a.ingredients, a.instruction, a.image 
    FROM article a 
    LEFT JOIN tags t ON a.tag_id = t.tag_id 
    LEFT JOIN categorie c ON a.category_id = c.category_id
    ORDER BY a.date DESC";


$query_article = $db->prepare($sql_article);
$query_article->execute();
$articles_tags = $query_article->fetchall(PDO::FETCH_ASSOC);

?>

<?php include "./template/header.php" ?>
<main>
    <section id="illustration-viande"></section>
    <section id="articles">
        <h1>Viandes</h1>

        <div id="article-container" class="container-produit">
            <div id="article-container" class="container-produit">
                <?php
                $isRowReverse = false; // Variable pour alterner entre les classes
                foreach ($articles_tags as $article) :
                ?>
                    <article class="produit">
                        <figure class="<?= $isRowReverse ? 'row-reverse' : 'flex-row' ?>">
                            <img src="./backoffice/<?= $article["image"] ?>" alt="<?= $article["title"] ?>">
                            <figcaption>
                                <div class="container-tags">
                                    <a href="#"><?= $article["category_name"] ?></a>
                                </div>
                                <h2><a href="detail.php?id=<?= $article["article_id"] ?>"><?= $article["title"] ?></a></h2>
                                <p class="text"><?= $article["content"] ?></p>
                                <div class="container-credit">
                                    <?php
                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $article["date"]);
                                    $formattedDate = $date ? $date->format('d/m/Y') : $article["date"];
                                    ?>
                                    <p><span class="credit">posté :</span> <?= $formattedDate ?></p>
                                    <p><span class="credit">tags :</span> <a href="#"><?= $article["tag_name"] ?></a></p>
                                    <p><span class="credit">par :</span> <?= $article["username"] ?></p>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                    <?php
                    // Alterne la variable pour changer la classe à la prochaine itération
                    $isRowReverse = !$isRowReverse;
                    ?>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div id="pagination" class="container-pages">
                <p id="prevPage">
                    <img src="./img/logos/arrow-left-solid.svg" alt="Page précédente">
                    Précédente
                </p>
                <span id="pageNumbers"></span>
                <p id="nextPage">
                    Suivante
                    <img src="./img/logos/arrow-right-solid.svg" alt="Page Suivante">
                </p>
            </div>
    </section>
</main>
<script src="./js/plats.js"></script>
<?php include "./template/footer.php" ?>