<?php

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

if (!empty($_POST)) {
    if (isset($_POST["prenom"], $_POST["email"], $_POST["pass"], $_POST["pass2"]) && !empty($_POST["prenom"]) && !empty($_POST["email"]) && !empty($_POST["pass"]) && !empty($_POST["pass2"])) {

        $prenom = strip_tags($_POST["prenom"]);
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