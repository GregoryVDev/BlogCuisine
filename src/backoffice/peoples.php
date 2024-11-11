<?php

session_start();

if (!isset($_SESSION["user_cook"])) {
    header("Location: login.php");
}

require_once("../connect.php");

if (isset($_SESSION["user_cook"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $number = strip_tags($_POST["number"]);

        $sql_people = "INSERT INTO personnes (number) VALUES (:number)";

        $query = $db->prepare($sql_people);
        $query->bindValue(":number", $number);
        $query->execute();

        require_once("../close.php");

        header("Location: peoples.php");
        exit();
    }
} else {
    header("Location: ../index.php ");
}

$sql = "SELECT * FROM personnes WHERE id";

$query = $db->prepare($sql);
$query->execute();

$number = $query->fetchAll(PDO::FETCH_ASSOC);

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
    <table style="margin-top: 50px;">
        <thead>
            <tr>
                <th>Action</th>
                <th>Personnes</th>
                <th><input type="checkbox"></th>
            </tr>
        </thead>
        <tbody>
            <tr data-page="1">
                <td class="actions"><a href="#" class="btn-edit">Modifier</a>
                    <a href="#" class="btn-delete">Supprimer</a>
                </td>
                <td>The Bible</td>
                <td><label><input type="checkbox"></label></td>
            </tr>
            <tr data-page="1">
                <td class="actions"><a href="#" class="btn-edit">Modifier</a>
                    <a href="#" class="btn-delete">Supprimer</a>
                </td>
                <td>Harry Potter</td>
                <td><label><input type="checkbox"></label></td>
            </tr>
            <tr data-page="1">
                <td class="actions"><a href="#" class="btn-edit">Modifier</a>
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

</html>