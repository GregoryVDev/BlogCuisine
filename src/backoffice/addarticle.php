<?php
session_start();

require_once("../connect.php");

// if (!isset($_SESSION["user_cook"])) {
//     header("Location: login.php");
// }

// Récupération des catégories

$sql_category = "SELECT * FROM categorie";
$query_category = $db->prepare($sql_category);
$query_category->execute();
$category = $query_category->fetchAll(PDO::FETCH_ASSOC);

// Récupération des tags
$sql_tags = "SELECT * FROM tags";
$query_tags = $db->prepare($sql_tags);
$query_tags->execute();
$tag = $query_tags->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] === "POST") {


}



?>


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
            <h3>Ajouter un article</h3>
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
                    <div class="container-tags-form">
                        <label for="tags">Tags :</label>
                        <select id="tags" name="tags">
                            <option value="">--Choisir des tags--</option>
                            <option value="">Entrées Froides</option>
                            <option value="">Entrées Chaudes</option>
                            <option value="">Apéros</option>
                            <option value="">Viandes</option>
                            <option value="">Marins</option>
                            <option value="">Féculents</option>
                            <option value="">Desserts Froids</option>
                            <option value="">Desserts Chauds</option>
                        </select>
                    </div>
                    <div class="container-coocking">
                        <label for="temps_cuisson">Temps cuisson (minutes) :</label>
                        <input type="text" id="temps_cuisson" name="coocking" placeholder="Cuisson en minutes">
                    </div>
                    <div class="container-preparation">
                        <label for="temps_preparation">Temps préparation (minutes) :</label>
                        <input type="text" id="temps_preparation" name="preparation" placeholder="Préparation en minutes">
                    </div>
                    <div class="container-personnes">
                        <label for="personnes">Personnes :</label>
                        <select id="personnes" name="number">
                            <option value="">--Nombre de personne--</option>
                            <option value="">2</option>
                            <option value="">4</option>
                            <option value="">6</option>
                            <option value="">8</option>
                        </select>
                    </div>
                </div>

                <div class="right-section">
                    <label for="description">Description :</label>
                    <textarea id="description" name="description" placeholder="Description"></textarea>

                    <label for="ingredients">Ingrédients :</label>
                    <textarea id="ingredients" name="ingredients" placeholder="Ingrédients"></textarea>

                    <label for="preparation">Préparation :</label>
                    <textarea id="preparation" name="preparation" placeholder="Instruction de la préparation"></textarea>

                    <label class="uploadLabel" for="image" id="uploadLabel">Upload la photo</label>
                    <input type="file" id="image" name="image" class="image" accept="image/*" required>

                    <img id="previewImage" src="#" alt="Aperçu de l'image" style="max-width: 100%; display: none;">
                    <button type="button" id="deleteImageButton" style="display: none;">Supprimer</button>
                </div>
                <button type="submit">Envoyer</button>
            </form>
        </div>
    </section>

    <h3>Dashboard</h3>
    <div class="container-search">
        <img src="../img/logos/search.svg" alt="Recherche">
        <input type="search" name="search" id="search" placeholder="Nom de la recette">
    </div>

    <table>
        <thead>
            <tr>
                <th>Action</th>
                <th>Titre</th>
                <th><input type="checkbox"></th>
            </tr>
        </thead>
        <tbody>
            <tr data-page="1">
                <td class="actions"><a href="#" class="btn-edit">Modifier</a>
                    <a href="#" class="btn-see">Voir</a>
                    <a href="#" class="btn-delete">Supprimer</a>
                </td>
                <td>The Bible</td>
                <td><label><input type="checkbox"></label></td>
            </tr>
            <tr data-page="1">
                <td class="actions"><a href="#" class="btn-edit">Modifier</a>
                    <a href="#" class="btn-see">Voir</a>
                    <a href="#" class="btn-delete">Supprimer</a>
                </td>
                <td>Harry Potter</td>
                <td><label><input type="checkbox"></label></td>
            </tr>
            <tr data-page="1">
                <td class="actions"><a href="#" class="btn-edit">Modifier</a>
                    <a href="#" class="btn-see">Voir</a>
                    <a href="#" class="btn-delete">Supprimer</a>
                </td>
                <td>The Lord of the Rings</td>
                <td><label><input type="checkbox"></label></td>
            </tr>
        </tbody>
    </table>
    <div class="container-button">
        <button type="submit" class="delete-produits">Supprimer les articles sélectionnés</button>
    </div>
</body>
<script src="./js/pagination.js"></script>

</html>