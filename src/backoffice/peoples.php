<?php

session_start();

if (!isset($_SESSION["user_cook"])) {
    header("Location: ../../../login.php");
}

require_once("../connect.php");

// if (isset($_SESSION["user_cook"])) {
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
// } else {
//     header("Location: ../index.php ");
// }

$sql = "SELECT * FROM personnes WHERE pers_id";

$query = $db->prepare($sql);
$query->execute();

$numbers = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include "../backoffice/template/header.php" ?>
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
        </tr>
    </thead>
    <?php foreach ($numbers as $number) { ?>
        <tbody>
            <tr data-page="1">
                <td class="actions">
                    <a href="deletepeoples.php?id=<?= $number["id"] ?>" class="btn-delete">Supprimer</a>
                </td>
                <td><?= $number["number"] ?></td>
            </tr>
        </tbody>
    <?php } ?>
</table>
<div class="container-button">
    <button type="submit" class="delete-produits">Supprimer les articles sélectionnés</button>
</div>
</body>

</html>