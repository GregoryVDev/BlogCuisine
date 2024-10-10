<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/recettes.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Backoffice</title>
</head>

<body>
    <?php require_once("../backoffice/template/header.php") ?>
    <section class="illust-addarticle"></section>
    <section class="formulaire">
        <form method="POST">
            <div class="container">
                <h1>Ajouter un article</h1>
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="left-section">
                        <div class="container-prenom">
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="firstname">
                        </div>
                        <div class="container-categories">
                            <label for="categorie">Catégorie :</label>
                            <select id="categorie" name="categorie">
                                <option value="">--Choisir une catégorie--</option>
                                <option value="">Entrées / Apéro</option>
                                <option value="">Plats</option>
                                <option value="">Desserts</option>
                            </select>
                        </div>
                        <div class="container-tags">
                            <label for="tags">Tags :</label>
                            <select id="tags" name="tags">
                                <option value="">--Choisir des tags--</option>
                                <option value="">Froides</option>
                                <option value="">Chaudes</option>
                                <option value="">Apéros</option>
                                <option value="">Viandes</option>
                                <option value="">Féculents</option>
                                <option value="">Marins</option>
                                <option value="">Froids</option>
                                <option value="">Chauds</option>
                            </select>
                        </div>
                        <div class="container-title">
                            <label for="titre">Titre :</label>
                            <input type="text" id="titre" name="titre">
                        </div>
                        <div class="container-coocking">
                            <label for="temps_cuisson">Temps cuisson :</label>
                            <input type="text" id="temps_cuisson" name="temps_cuisson">
                        </div>
                        <div class="container-preparation">
                            <label for="temps_preparation">Temps préparation :</label>
                            <input type="text" id="temps_preparation" name="temps_preparation">
                        </div>
                        <div class="container-personnes">
                            <label for="personnes">Personnes :</label>
                            <input type="text" id="personnes" name="personnes">
                        </div>
                        <div class="container-alt">
                            <label for="alt_image">Alt image :</label>
                            <input type="text" id="alt_image" name="alt_image">
                        </div>
                    </div>

                    <div class="right-section">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description"></textarea>

                        <label for="ingredients">Ingrédients :</label>
                        <textarea id="ingredients" name="ingredients"></textarea>

                        <label for="preparation">Préparation :</label>
                        <textarea id="preparation" name="preparation"></textarea>



                        <label for="image">Image :</label>
                        <input type="file" id="image" name="image">
                    </div>

                    <button type="submit">Envoyer</button>
                </form>
            </div>

        </form>
    </section>


</body>

</html>