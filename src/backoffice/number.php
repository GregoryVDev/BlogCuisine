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
        <div class="container">
            <h3>Ajouter le nombre de personne</h3>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="left-section">
                    <div class="container-prenom">
                        <label for="prenom">Prénom :</label>
                        <input type="text" id="prenom" name="firstname" placeholder="Prénom">
                    </div>
                    <div class="container-title">
                        <label for="titre">Titre :</label>
                        <input type="text" id="titre" name="title" placeholder="Titre">
                    </div>
                    <div class="container-categories">
                        <label for="categorie">Catégorie :</label>
                        <select id="categorie" name="category">
                            <option value="">--Catégorie--</option>
                            <option value="">Entrées / Apéro</option>
                            <option value="">Plats</option>
                            <option value="">Desserts</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

</html>