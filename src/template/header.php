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
                <input type="search" name="search" id="search" placeholder="Rechercher une recette">
            </form>

            <div class="dropdown" id="dropdown" style="display: none;">
                <ul id="results"></ul>
            </div>
        </div>
    </header>
    <script>
        const searchForm = document.getElementById('searchForm');
        const searchInput = document.getElementById('search');
        const dropdown = document.getElementById('dropdown');
        const resultsContainer = document.getElementById('results');

        // Fonction pour réinitialiser la liste et le champ
        function resetDropdown() {
            dropdown.style.display = 'none';
            resultsContainer.innerHTML = '';
        }

        // Fonction pour afficher un message temporaire
        function showAlert(message, duration = 4000) {
            const alert = document.createElement('div');
            alert.textContent = message;
            alert.style.position = 'fixed';
            alert.style.bottom = '20px';
            alert.style.right = '20px';
            alert.style.backgroundColor = 'red';
            alert.style.color = 'white';
            alert.style.padding = '10px 20px';
            alert.style.borderRadius = '5px';
            alert.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
            alert.style.fontSize = '14px';
            document.body.appendChild(alert);

            // Supprimer le message après 2 secondes
            setTimeout(() => {
                alert.remove();
            }, duration);
        }

        // Gestion de la soumission du formulaire
        searchForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche le rechargement de la page

            const query = searchInput.value.trim();

            if (query === '') {
                showAlert('Veuillez entrer un terme de recherche.', 4000);
                return;
            }

            fetch(`traitement_search.php?search=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.redirect) {
                        window.location.href = data.redirect;
                    } else if (data.results && data.results.length > 0) {
                        dropdown.style.display = 'block';
                        resultsContainer.innerHTML = data.results.map(result => `
                        <li>
                            <a href="detail.php?id=${result.article_id}">
                                <span>${result.title}</span>
                                <img src="./backoffice/${result.image}" alt="${result.title}">
                            </a>
                        </li>                        
                    `).join('');
                    } else if (data.message) {
                        resetDropdown();
                        showAlert(data.message, 4000);
                    } else if (data.error) {
                        showAlert('Une erreur interne est survenue.', 4000);
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    resetDropdown();
                    showAlert('Une erreur est survenue. Veuillez réessayer.', 4000);
                });

            searchInput.value = ''; // Effacer le champ après la soumission
        });

        // Masquer la liste lorsqu'on clique en dehors
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target) && e.target !== searchInput) {
                resetDropdown();
            }
        });

        // Réinitialiser la liste lors du retour arrière
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                resetDropdown();
            }
        });
    </script>