<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/recettes.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <title>Plat</title>
</head>

<body>
    <?php require_once("./template/header.php") ?>
    <main>
        <section class="detail">
            <article class="detail-article">
                <div class="container-detail">
                    <a href="#">Plats</a>
                    <a href="#">Viande</a>
                </div>
                </div>
                <h2>Boeuf Bourguignon</h2>
                <div class="credit-detail">
                    <p><span class="credit">par :</span> Grégory</p>
                    <p><span class="credit">posté :</span> 20 août 2024</p>
                    <p><span class="credit">tags :</span> <a href="#">Plats</a>, <a href="#">Viande</a></p>
                </div>
                <figure class="img-container">
                    <img src="./img/plats/boeuf-bourguignon.jpg" alt="Boeuf Bourguignon" class="image-plat">
                    <figcaption class="text-content">Le bœuf bourguignon est un plat traditionnel français, originaire de la région Bourgogne...</figcaption>
                </figure>

                <div class="container-info">
                    <div class="left-info">
                        <h3>Temps de préparation</h3>
                        <p>20 minutes</p>
                    </div>
                    <div class="middle-info">
                        <h3>Temps de cuisson</h3>
                        <p>40 minutes</p>
                    </div>
                    <div class="right-info">
                        <h3>Personnes</h3>
                        <p>4 personnes</p>
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
        </section>
    </main>
    <?php require_once("./template/footer.php") ?>


</body>
<script src="./js/plats.js"></script>

</html>