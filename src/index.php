<?php

session_start();

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
            <article class="produit">
                <figure class="flex-row">
                    <img src="./img/plats/boeuf-bourguignon.jpg" alt="Boeuf Bourguignon">
                    <figcaption>
                        <div class="container-tags">
                            <a href="vegetaux.php">Légumes</a>
                            <a href="viandes.php">Viande</a>
                        </div>
                        <h2><a href="#">Boeuf Bourguignon au vin</a></h2>
                        <p class="text">Le bœuf bourguignon est un plat traditionnel français, originaire de la région Bourgogne...</p>
                        <div class="container-credit">
                            <p><span class="credit">posté :</span> 20 août 2024</p>
                            <p><span class="credit">tags :</span> <a href="#">Légumes</a>, <a href="#">Viande</a></p>
                            <p><span class="credit">par :</span> Grégory</p>
                        </div>
                    </figcaption>
                </figure>
            </article>

            <article class="produit">
                <figure class="row-reverse">
                    <img src="./img/plats/boeuf-bourguignon.jpg" alt="Boeuf Bourguignon">
                    <figcaption>
                        <div class="container-tags">
                            <a href="#">Légumes</a>
                            <a href="#">Viande</a>
                        </div>
                        <h2><a href="#">Boeuf Bourguignon au vin</a></h2>
                        <p class="text">Le bœuf bourguignon est un plat traditionnel français, originaire de la région Bourgogne...</p>
                        <div class="container-credit">
                            <p><span class="credit">posté :</span> 20 août 2024</p>
                            <p><span class="credit">tags :</span> <a href="#">Légumes</a>, <a href="#">Viande</a></p>
                            <p><span class="credit">par :</span> Grégory</p>
                        </div>
                    </figcaption>
                </figure>
            </article>
            <article class="produit">
                <figure class="flex-row">
                    <img src="./img/plats/boeuf-bourguignon.jpg" alt="Boeuf Bourguignon">
                    <figcaption>
                        <div class="container-tags">
                            <a href="#">Légumes</a>
                            <a href="#">Viande</a>
                        </div>
                        <h2><a href="#">Boeuf Bourguignon au vin</a></h2>
                        <p class="text">Le bœuf bourguignon est un plat traditionnel français, originaire de la région Bourgogne...</p>
                        <div class="container-credit">
                            <p><span class="credit">posté :</span> 20 août 2024</p>
                            <p><span class="credit">tags :</span> <a href="#">Légumes</a>, <a href="#">Viande</a></p>
                            <p><span class="credit">par :</span> Grégory</p>
                        </div>
                    </figcaption>
                </figure>
            </article>
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
<?php include "./template/footer.php" ?>
</body>
<script src="./js/script.js"></script>
<script src="./js/pagination.js"></script>

</html>