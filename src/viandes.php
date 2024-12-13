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
            <?php foreach ($articles_tags as $article) : ?>
                <article class="produit">
                    <figure class="flex-row">
                        <img src="./backoffice/<?= $article["image"] ?>" alt="<?= $article["title"] ?>">
                        <figcaption>
                            <div class="container-tags">
                                <a href="#"><?= $article["category_name"] ?></a>
                            </div>
                            <h2><a href="#"><?= $article["title"] ?></a></h2>
                            <p class="text"><?= $article["content"] ?></p>
                            <div class="container-credit">
                                <p><span class="credit">posté :</span> <?= $article["date"] ?></p>
                                <p><span class="credit">tags :</span> <a href="#"><?= $article["tag_name"] ?></a></p>
                                <p><span class="credit">par :</span> Grégory</p>
                            </div>
                        </figcaption>
                    </figure>
                </article>
            <?php endforeach; ?>
            <article class="produit">
                <figure class="row-reverse">
                    <img src="./img/plats/boeuf-bourguignon.jpg" alt="Boeuf Bourguignon">
                    <figcaption>
                        <div class="container-tags">
                            <a href="#">Plats</a>
                            <a href="#">Viande</a>
                        </div>
                        <h2><a href="#">Boeuf Bourguignon au vin</a></h2>
                        <p class="text">Le bœuf bourguignon est un plat traditionnel français, originaire de la région Bourgogne...</p>
                        <div class="container-credit">
                            <p><span class="credit">posté :</span> 20 août 2024</p>
                            <p><span class="credit">tags :</span> <a href="#">Plats</a>, <a href="#">Viande</a></p>
                            <p><span class="credit">par :</span> Grégory</p>
                        </div>
                    </figcaption>
                </figure>
            </article>

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