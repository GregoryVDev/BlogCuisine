<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/gregory.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <title>Onglet - Grégory</title>
</head>

<body>
    <main>
        <?php require_once("./template/header.php") ?>
        <section id="illustration-onglet"></section>
        <section id="category">
            <h2>Catégories</h2>
            <div class="container-square">
                <div class="container-articles">
                    <article class="square-img">
                        <figure>
                            <a href="#">
                                <img src="./img/entrees/entree.jpg" alt="Entrée / Apéritif">
                                <figcaption>Entrées / Apéros</figcaption>
                            </a>
                        </figure>
                    </article>
                </div>
                <div class="container-articles">
                    <article class="square-img">
                        <figure>
                            <a href="#">
                                <img src="./img/plats/plat.jpg" alt="Plat">
                                <figcaption>Plats</figcaption>
                            </a>
                        </figure>
                    </article>
                </div>
                <div class="container-articles">
                    <article class="square-img">
                        <figure>
                            <a href="#">
                                <img src="./img/desserts/dessert.jpg" alt="Dessert">
                                <figcaption>Desserts</figcaption>
                            </a>
                        </figure>
                    </article>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="./js/script.js"></script>

</html>