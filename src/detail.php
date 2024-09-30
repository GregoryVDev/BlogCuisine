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
                <div class="img-container">
                    <img src="./img/plats/boeuf-bourguignon.jpg" alt="Boeuf Bourguignon" class="image-plat">
                </div>
                <p class="text">Le bœuf bourguignon est un plat traditionnel français, originaire de la région Bourgogne...</p>

            </article>
        </section>
    </main>
    <?php require_once("./template/footer.php") ?>


</body>
<script src="./js/plats.js"></script>

</html>