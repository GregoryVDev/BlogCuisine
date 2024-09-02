<?php
session_start();

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

if (!empty($_POST)) {
    if (isset($_POST["email"], $_POST["pass"]) && !empty($_POST["email"]) && !empty($_POST["pass"])) {
        if (!validateEmail($_POST["email"])) {
            die("L'adresse email est incorrecte");
        }

        require_once("./connect.php");
        $sql = "SELECT * FROM users WHERE email = :email";

        $query = $db->prepare($sql);

        $query->bindValue(":email", $_POST["email"]);

        $query->execute();

        $user = $query->fetch();

        if (!$user) {
            die("L'utilisateur et/ou le mot de passe est incorrect");
        }

        if (!password_verify($_POST["pass"], $user["pass"])) {
            die("L'utilisateur et/ou le mot de passe est incorrect");
        }

        $_SESSION["user_cook"] = [
            "user_id" => $user["id"],
            "prenom" => $user["prenom"],
            "email" => $user["email"]
        ];

        header("Location: index.php");
        exit();
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
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/fonts.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Connexion</title>
</head>

<body>
    <main>
        <form method="POST">
            <img src="./img/logos/gregory-trans.png" alt="Logo du site">
            <h1>Connexion</h1>
            <div class="container-email">
                <label for="email">Email :</label>
                <input type="email" class="form-input" name="email" id="email" placeholder="Email">
            </div>
            <div class="container-password">
                <label for="password">Mot de passe :</label>
                <input type="password" class="form-input" name="pass" id="pass" placeholder="Mot de passe" required>
            </div>
            <button type="submit" class="connexion-button">Se connecter</button>
</body>

</html>