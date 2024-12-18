<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="png" href="../img/logos/gregory-trans.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/recettes.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/category.css">
    <title>Grég & Élise</title>
</head>

<body>

    <header>
        <div class="navbar-top">
            <div class="container-icons">
                <?php if (isset($_SESSION["user_cook"]) && $_SESSION["user_cook"]) { ?>
                    <a href="../backoffice/addarticle.php"><img src="../img/logos/dashboard.svg" alt="Panel Admin"></a>
                    <div class="dr"></div>
                    <a href="../deconnexion.php"><img src="../img/logos/userred.svg" alt="Deconnexion"></a>
                <?php } else { ?>
                    <a href="login.php"><img src="../img/logos/user.svg" alt="Se connecter"> </a>
                <?php } ?>
            </div>
        </div>
        <nav>
            <ul>
                <li><a href="../index.php">Accueil</a></li>
                <li class="circle"></li>
                <li><a href="../category.php">Catégories</a></li>
                <li class="circle"></li>
                <li><a href="../index.php#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="container-img">
            <img src="../img/logos/gregory-trans.png" alt="Logo du site">
        </div>
        <h1>La Cuisine Familiale</h1>
        <h2>Bienvenue dans la famille</h2>
        <div class="container-search">
            <form action="traitement_search.php" method="GET" id="searchForm">
                <img src="../img/logos/search.svg" alt="Recherche">
                <input type="search" name="search" id="search" placeholder="Nom de la recette">
                <div id="dropdown">
                    <a href="#about">About</a>
                    <a href="#base">Base</a>
                    <a href="#blog">Blog</a>
                    <a href="#contact">Contact</a>
                    <a href="#custom">Custom</a>
                    <a href="#support">Support</a>
                    <a href="#tools">Tools</a>
                </div>
            </form>
        </div>
    </header>