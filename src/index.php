<?php

session_start();

require_once("./connect.php");

$sql = "SELECT * FROM article";
$query = $db->prepare($sql);
$query->execute();

$article = $query->fetchall(PDO::FETCH_ASSOC);

$sql_article = "SELECT * FROM article ORDER BY article_id DESC LIMIT 8";
$query_article = $db->prepare($sql_article);
$query_article->execute();

$articles = $query_article->fetchall(PDO::FETCH_ASSOC);

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
    <section id="illustration"></section>
    <section id="about">
        <h2>A propos</h2>
        <h3>Voici le blog de recette d'Élise & Grégory</h3>
        <p>Ce site a été créé avec un objectif simple mais précieux : préserver et partager nos recettes de cuisine familiale, ces trésors culinaires transmis de génération en génération. Nous savons à quel point ces recettes sont importantes, car elles portent en elles non seulement les saveurs de notre enfance, mais aussi les souvenirs des moments passés en famille, autour d'une table. Avec le temps, certaines de ces recettes risquent de se perdre, oubliées dans les tiroirs ou dans les souvenirs. </p>

        <p>C'est pourquoi nous avons décidé de les rassembler ici, pour que chacun puisse y accéder et les transmettre à son tour. Ensemble, gardons vivantes nos meilleures recettes, partageons-les avec nos proches et assurons-nous qu'elles continuent de faire partie de notre héritage culinaire.</p>

        <div class="container-image">
            <img src="./img/logos/gregelise.png" alt="">
        </div>
    </section>
    <section id="last">
        <h3>Les derniers articles publiés</h3>
        <div id="article-container" class="container-produit">
            <?php
            $isRowReverse = false; // Variable pour alterner entre les classes
            foreach ($articles_tags as $recipes) :
            ?>
                <article class="produit">
                    <figure class="<?= $isRowReverse ? 'row-reverse' : 'flex-row' ?>">
                        <img src="./backoffice/<?= $recipes["image"] ?>" alt="<?= $recipes["image"] ?>">
                        <figcaption>
                            <div class="container-tags">
                                <a href="<?= strtolower(str_replace(' ', '', subject: $recipes["tag_name"])) ?>.php"><?= $recipes["tag_name"] ?></a>
                            </div>
                            <h2><a href="detail.php?id=<?= $recipes["article_id"] ?>"><?= $recipes["title"] ?></a></h2>
                            <p class="text"><?= substr($recipes["content"], 0, 100) . "..."; ?></p>
                            <div class="container-credit">
                                <?php
                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $recipes["date"]);
                                $formattedDate = $date ? $date->format('d/m/Y') : $recipes["date"];
                                ?>
                                <p><span class="credit">posté :</span> <?= $formattedDate ?></p>
                                <p><span class="credit">tags :</span> <a href="<?= strtolower($recipes["tag_name"]) ?>.php"><?= $recipes["tag_name"] ?></a></p>
                                <p><span class="credit">par :</span> <?= $recipes["username"] ?></p>
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
    <section id="contact">
        <h3>Un petit mot, une grande recette...</h3>
        <div class="container-form">
            <form method="POST">
                <div class="container-contact">
                    <p>Envie de partager vos nouvelles recettes ou vous avez une petite question sur une des recettes ? </p>
                    <p>Utilisez notre formulaire de contact pour échanger avec nous et enrichir ensemble notre passion culinaire !</p>
                </div>
                <div class="container-name">
                    <label for="name">Nom complet</label>
                    <input type="text" id="name" name="name" placeholder="Nom complet">
                </div>
                <div class="container-email">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>
                <div class="container-object">
                    <label for="object">Objet</label>
                    <input type="text" id="objet" name="object" placeholder="Objet du message">
                </div>
                <div class="container-message">
                    <label for="message">Votre message</label>
                    <textarea name="message" id="message" placeholder="Votre message"></textarea>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </section>
</main>
<script src="./js/script.js"></script>
<script src="./js/pagination.js"></script>
<?php include "./template/footer.php" ?>