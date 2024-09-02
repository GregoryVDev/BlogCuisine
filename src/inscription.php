<?php

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

if (!empty($_POST)) {


    if (isset($_POST["prenom"], $_POST["email"], $_POST["pass"], $_POST["pass2"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"])) {

        $prenom = strip_tags($_POST["prenom"]);

        if (!validateEmail($_POST["email"])) {
            die("L'adresse email est incorrect");
        }


        if (isset($_POST["pass"]) && isset($_POST["pass2"])) {
            $pass = $_POST["pass"];
            $pass2 = $_POST["pass2"];
        }

        if ($pass === $pass2) {
            $pass = password_hash($_POST["pass"], PASSWORD_ARGON2ID);
        } else {
            die("Les mots de passe ne correspondent pas");
        }

        require_once("./connect.php");

        $sql = "INSERT INTO users (prenom, email, pass) VALUES (:prenom, :email,'$pass')";

        $query = $db->prepare($sql);

        $query->bindValue(":prenom", $prenom);
        $query->bindValue(":email", $_POST["email"]);

        $query->execute();

        header("Location: login.php");
    } else {
        die("Le formulaire est incomplet");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/inscription.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Inscription</title>
</head>

<body>
    <main>
        <form method="POST">
            <img src="./img/logos/gregory-trans.png" alt="Logo du site">
            <h1>Inscription</h1>
            <div class="container-prenom">
                <label for="prenom">Prénom :</label>
                <input type="text" class="form-input" name="prenom" id="prenom" placeholder="Prénom">
            </div>
            <div class="container-email">
                <label for="email">Email :</label>
                <input type="email" class="form-input" name="email" id="email" placeholder="Email">
            </div>
            <div class="container-password">
                <label for="pass">Mot de passe :</label>
                <input type="password" class="form-input" name="pass" id="pass" placeholder="Mot de passe">
            </div>
            <div class="container-confirm">
                <label for="pass2">Confirmation :</label>
                <input type="password" class="form-input" name="pass2" id="pass2" placeholder="Mot de passe confirmation">
            </div>
            <button type="submit" class="connexion-button">S'inscrire</button>
        </form>
    </main>
</body>

</html>