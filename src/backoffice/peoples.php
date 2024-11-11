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
            <h3>Nombre de personne</h3>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="left-section">
                    <div class="container-prenom" style="margin: auto;">
                        <label for="personnes">Personnes :</label>
                        <input type="number" id="number" name="number" style="padding: 5px; margin-bottom: 20px;" placeholder="Nombre de personne">
                    </div>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </section>
</body>

</html>