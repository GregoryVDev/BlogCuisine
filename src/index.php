<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <title>Grég & Élise</title>
</head>

<body>
    <?php require_once("./template/header.php") ?>
    <section id="illustration">
        <img src="./img/logos/backgroundplat.jpg" alt="Photo Illustration">
    </section>
    <section id="about">
        <h2>A propos</h2>
        <h3>Voici le blog de recette d'Élise & Grégory</h3>
        <p>Ce site a été créé avec un objectif simple mais précieux : préserver et partager nos recettes de cuisine familiale, ces trésors culinaires transmis de génération en génération. Nous savons à quel point ces recettes sont importantes, car elles portent en elles non seulement les saveurs de notre enfance, mais aussi les souvenirs des moments passés en famille, autour d'une table. Avec le temps, certaines de ces recettes risquent de se perdre, oubliées dans les tiroirs ou dans les souvenirs. </p>

        <p>C'est pourquoi nous avons décidé de les rassembler ici, pour que chacun puisse y accéder et les transmettre à son tour. Ensemble, gardons vivantes nos meilleures recettes, partageons-les avec nos proches et assurons-nous qu'elles continuent de faire partie de notre héritage culinaire.</p>

        <div class="container-image">
            <img src="./img/logos/gregelise.png" alt="Grég & Élise">
        </div>

        <h3>Quel endroit voulez-vous visiter ?</h3>
        <div class="container-links">
            <a href="#">Élise</a>
            <a href="#">Grégory</a>
        </div>
    </section>
    <section id="category">
        <h2>Catégories</h2>
        <div class="container-articles">
            <article class="square-img">
                <figure>
                    <img src="./img/entrees/entree.jpg" alt="Entrée / Apéritif">
                    <figcaption>Entrées / Apéros</figcaption>
                </figure>
            </article>
        </div>
        <div class="container-articles">
            <article class="square-img">
                <figure>
                    <img src="./img/plats/plat.jpg" alt="Plat">
                    <figcaption>Plats</figcaption>
                </figure>
            </article>
        </div>
        <div class="container-articles">
            <article class="square-img">
                <figure>
                    <img src="./img/desserts/dessert.jpg" alt="Dessert">
                    <figcaption>Desserts</figcaption>
                </figure>
            </article>
        </div>
    </section>
    <section id="last">
        <h3>Les derniers articles publiés</h3>
        <div class="container-produit">
            <article class="produit">
                <figure>
                    <img src="./img/plats/boeuf-bourguignon.jpg" alt="Boeuf Bourguignon">
                    <figcaption>
                        <div class="container-tags">
                            <a href="#">Plat</a>
                            <a href="#">Viande</a>
                        </div>
                        <h2>Boeuf Bourguignon au vin</h2>
                        <p class="text">Le bœuf bourguignon est un plat traditionnel français, originaire de la région Bourgogne. Il s'agit d'un ragoût de viande de bœuf mijoté lentement dans un vin rouge corsé...</p>

                        <div class="container-credit">
                            <p>posté : 20 août 2024</p>
                            <p>tags : <a href="#">Plat</a> , <a href="#">viande</a></p>
                            <p>par : Grégory</p>
                        </div>
                    </figcaption>
                </figure>
            </article>
        </div>
    </section>

    <?php require_once("./template/footer.php") ?>
</body>

</html>