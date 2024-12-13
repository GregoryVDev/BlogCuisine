<?php

session_start();

require_once("./connect.php");

$sql_category = "SELECT * FROM categorie";
$query_category = $db->prepare($sql_category);
$query_category->execute();
$categories = $query_category->fetchall(PDO::FETCH_ASSOC);

$sql_tags = "SELECT * FROM tags";
$query_tags = $db->prepare($sql_tags);
$query_tags->execute();
$tags = $query_tags->fetchall(PDO::FETCH_ASSOC);

?>



<?php include "./template/header.php" ?>
<main>
    <section id="illustration-onglet"></section>
    <section id="category">
        <h2>Catégories</h2>
        <div class="container-square">
            <div class="container-articles">
                <article class="square-img">
                    <figure>
                        <a href="#" class="category-btn" data-category="entrees">
                            <img src="./img/entrees/entree.jpg" alt="Entrée / Apéritif">
                            <?php foreach ($categories as $category) {
                                if ($category['category_id'] == 1) { // Vérifie si l'ID est égal à 1
                            ?>
                                    <figcaption><?php echo $category['category_name']; // Affiche l'ID 
                                                ?></figcaption>
                            <?php
                                }
                            } ?>
                        </a>
                    </figure>
                </article>
            </div>
            <div class="container-articles">
                <article class="square-img">
                    <figure>
                        <a href="#" class="category-btn" data-category="plats">
                            <img src="./img/plats/plat.jpg" alt="Plat">
                            <?php foreach ($categories as $category) {
                                if ($category["category_id"] == 2) {  ?>
                                    <figcaption><?= $category["category_name"] ?></figcaption>
                                <?php } ?>
                            <?php } ?>
                        </a>
                    </figure>
                </article>
            </div>
            <div class="container-articles">
                <article class="square-img">
                    <figure>
                        <a href="#" class="category-btn" data-category="desserts">
                            <img src="./img/desserts/dessert.jpg" alt="Dessert">
                            <?php foreach ($categories as $category) {
                                if ($category["category_id"] == 3) { ?>
                                    <figcaption><?= $category["category_name"] ?></figcaption>
                                <?php } ?>
                            <?php } ?>
                        </a>
                    </figure>
                </article>
            </div>
        </div>

        <!-- Boutons pour chaque catégorie -->
        <div id="entrees-options" class="options hidden">
            <?php foreach ($tags as $tag) {
                if (in_array($tag['tag_id'], [1, 2, 3])) { // Vérifie si tag_id est 1, 2 ou 3
                    // Définir le lien en fonction de tag_id
                    $link = "#"; // Lien par défaut
                    if ($tag['tag_id'] == 1) {
                        $link = "entreesfroides.php";
                    } elseif ($tag['tag_id'] == 2) {
                        $link = "entreeschaudes.php";
                    } elseif ($tag['tag_id'] == 3) {
                        $link = "aperos.php";
                    }
            ?>
                    <button><a href="<?= $link; ?>"><?= $tag["tag_name"] ?></a></button>
                <?php } ?>
            <?php } ?>
        </div>

        <div id="plats-options" class="options hidden">
            <?php foreach ($tags as $tag) {
                if (in_array($tag['tag_id'], [4, 6, 5])) { // Vérifie si tag_id est 1, 2 ou 3
                    // Définir le lien en fonction de tag_id
                    $link = "#"; // Lien par défaut
                    if ($tag['tag_id'] == 4) {
                        $link = "viandes.php";
                    } elseif ($tag['tag_id'] == 6) {
                        $link = "garnitures.php";
                    } elseif ($tag['tag_id'] == 5) {
                        $link = "marins.php";
                    }
            ?>
                    <button><a href="<?= $link; ?>"><?= $tag["tag_name"] ?></a></button>
                <?php } ?>
            <?php } ?>
        </div>

        <div id="desserts-options" class="options hidden">
            <?php foreach ($tags as $tag) {
                if (in_array($tag['tag_id'], [7, 8])) { // Vérifie si tag_id est 1, 2 ou 3
                    // Définir le lien en fonction de tag_id
                    $link = "#"; // Lien par défaut
                    if ($tag['tag_id'] == 7) {
                        $link = "dessertsfroids.php";
                    } elseif ($tag['tag_id'] == 8) {
                        $link = "dessertschauds.php";
                    }
            ?>
                    <button><a href="<?= $link; ?>"><?= $tag["tag_name"] ?></a></button>
                <?php } ?>
            <?php } ?>
        </div>
    </section>
</main>
<script src="./js/script.js"></script>
<?php include "./template/footer.php" ?>