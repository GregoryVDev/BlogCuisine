<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/category.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <title>Onglet - Élise</title>
</head>

<body>

    <?php require_once("./template/header.php") ?>
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
                                <figcaption>Entrées / Apéros</figcaption>
                            </a>
                        </figure>
                    </article>
                </div>
                <div class="container-articles">
                    <article class="square-img">
                        <figure>
                            <a href="#" class="category-btn" data-category="plats">
                                <img src="./img/plats/plat.jpg" alt="Plat">
                                <figcaption>Plats</figcaption>
                            </a>
                        </figure>
                    </article>
                </div>
                <div class="container-articles">
                    <article class="square-img">
                        <figure>
                            <a href="#" class="category-btn" data-category="desserts">
                                <img src="./img/desserts/dessert.jpg" alt="Dessert">
                                <figcaption>Desserts</figcaption>
                            </a>
                        </figure>
                    </article>
                </div>
            </div>

            <!-- Boutons pour chaque catégorie -->
            <div id="entrees-options" class="options hidden">
                <button><a href="./entreesfroides.php">Froides</a></button>
                <button><a href="./entreeschaudes.php">Chaudes</a></button>
                <button><a href="#">Apéros</a></button>
            </div>

            <div id="plats-options" class="options hidden">
                <button><a href="#">Viandes</a></button>
                <button><a href="#">Féculents</a></button>
                <button><a href="#">Marins</a></button>
            </div>

            <div id="desserts-options" class="options hidden">
                <button><a href="#">Froids</a></button>
                <button><a href="#">Chauds</a></button>
            </div>
        </section>
    </main>
    <?php require_once("./template/footer.php") ?>
</body>
<script src="./js/script.js"></script>

</html>