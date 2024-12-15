<?php
session_start();

require_once("./connect.php");

$sql = "SELECT * FROM article";
$query = $db->prepare($sql);
$query->execute();
$articles = $query->fetchall(PDO::FETCH_ASSOC);

$sql_article = "SELECT a.article_id, c.category_name, t.tag_name, p.number, a.username, a.title, a.cooking, a.preparation, a.content, a.date, a.ingredients, a.instruction, a.image 
    FROM article a 
    LEFT JOIN tags t ON a.tag_id = t.tag_id 
    LEFT JOIN categorie c ON a.category_id = c.category_id
    LEFT JOIN personnes p ON a.pers_id = p.pers_id";


$query_article = $db->prepare($sql_article);
$query_article->execute();
$articles_tags = $query_article->fetchall(PDO::FETCH_ASSOC);
?>

<?php include "./template/header.php" ?>
<main>
    <section class="detail">
        <?php foreach ($articles_tags as $article) : ?>
            <article class="detail-article">
                <div class="container-detail">
                    <a href="viandes.php"><?= $article["category_name"] ?></a>
                </div>
                </div>
                <h2><?= $article["title"] ?></h2>
                <div class="credit-detail">
                    <p><span class="credit">par :</span> <?= $article["username"] ?></p>
                    <?php
                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $article["date"]);
                    $formattedDate = $date ? $date->format('d/m/Y') : $article["date"];
                    ?>
                    <p><span class="credit">posté :</span> <?= $formattedDate ?></p>
                    <p><span class="credit">tags :</span> <a href="viandes.php"><?= $article["tag_name"] ?></a></p>
                </div>
                <figure class="img-container">
                    <img src="./backoffice/<?= $article["image"] ?>" alt="<?= $article["title"] ?>" class="image-plat">
                    <figcaption class="text-content"><?= $article["content"] ?></figcaption>
                </figure>

                <div class="container-info">
                    <div class="left-info">
                        <h3>Temps de préparation</h3>
                        <p><?= $article["preparation"] ?> minutes</p>
                    </div>
                    <div class="middle-info">
                        <h3>Temps de cuisson</h3>
                        <p><?= $article["cooking"] ?> minutes</p>
                    </div>
                    <div class="right-info">
                        <h3>Personnes</h3>
                        <p><?= $article["number"] ?> personnes</p>
                    </div>
                </div>
                <div class="container-recette">
                    <aside>
                        <h3>Ingrédients</h3>
                        <ul>
                            <li>4 carottes</li>
                            <li>100gr beurre</li>
                            <li>1 bouteille de vin rouge</li>
                            <li>Poivre</li>
                            <li>Sel</li>
                            <li>4 oignons</li>
                            <li>600gr de boeuf</li>
                            <li>1 bouquet garni</li>
                        </ul>
                    </aside>
                    <article class="instruction">
                        <h3>Instructions</h3>
                        <ol>
                            <li>
                                Détailler la viande en cubes de 3 cm de côté, enlever les gros morceaux de gras.
                            </li>
                            <li>
                                Couper l'oignon en morceaux. Le faire revenir dans une poêle au beurre. Une fois transparent, le verser dans une cocotte en fonte de préférence.
                            </li>
                            <li>
                                Procéder de même avec la viande mais en plusieurs fois, jusqu'à ce que tous les morceaux soient cuits. Les ajouter au fur et à mesure dans la cocotte. Ne pas avoir peur d'ajouter du beurre entre chaque fournée.
                            </li>
                            <li>
                                Quand toute la viande est dans la cocotte, déglacer la poêle avec de l'eau ou du vin et faire bouillir en raclant pour récupérer le suc. Saler, poivrer, ajouter au reste.
                            </li>
                            <li>
                                Recouvrir le tout avec une partie du vin et faire mijoter quelques heures avec le bouquet garni et les carottes en rondelles.
                            </li>
                            <li>
                                Le lendemain, faire mijoter au moins 2 heures en plusieurs fois, ajouter du vin ou de l'eau si nécessaire.
                            </li>
                        </ol>
                    </article>
                </div>
            </article>
        <?php endforeach; ?>
    </section>
</main>
<script src="./js/plats.js"></script>
<?php include "./template/footer.php" ?>