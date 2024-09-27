// Ajout d'une pagination

// Attend que la page HTML soit chargé avant d'executer la function
document.addEventListener("DOMContentLoaded", function () {
  // On définit combien d'articles on veut afficher par page (limité à 2 par page)
  const articlesPerPage = 2;
  // On sélectionne tous les éléments avec la classe .produit à l'intérieur de l'élément qui a l'ID #article-container. On récupère tous les articles
  const articles = document.querySelectorAll("#article-container .produit");
  // On calcule le nombre total de pages en divisant le nombre total d'articles et Math.ceil permet d'arrondir supérieurement chaque pour qu'il y ait assez de pages pour chaques articles
  const totalPages = Math.ceil(articles.length / articlesPerPage);
  // On garde la page actuelle. Par défaut, on est à la première page de la pagination
  let currentPage = 1;

  function showPage(page) {
    // C'est l'index (0) (la position) du premier article à afficher sur une page donnée. Sur la 2e page, l'article aura l'index (2) car l'index 0 c'est le tout premier article, etc...
    const start = (page - 1) * articlesPerPage; // C'est la première page donc (1 - 1)* 2 car il y a deux pages d'articles = 0 donc le premier article commencera avec l'index 0
    // Si on est sur la 2e page on fait donc (2 - 1) * 2 = 2 donc on commence la page 2 avec l'article qui a l'index 2 (en général ça serait le 3e article mais on commence avec l'index 0)

    // C'est l'index juste après le dernier article à afficher
    // Si on est sur la page 1, on fait start (0) + 2 (car on a limité à 2 articles par page) = 2 donc on va afficher l'index 0 et 1
    // Sur la 2e page on fait start (2) + 2 = 4 donc on va afficher l'index 2 et 3
    const end = start + articlesPerPage;

    // On parcourt chaque article dans la liste avec son index
    articles.forEach((article, index) => {
      // Si l'index de l'article est supérieur ou égale au start et inférieur à end, on l'affiche en block. Sinon, on le cache avec display: none.
      // Avec ce code, seuls les articles de la page actuelle sont visibles, les autres sont cachés.
      if (index >= start && index < end) {
        article.style.display = "block";
      } else {
        article.style.display = "none";
      }
    });

    // Montre ou cache le bouton précédent pour la pagination selon notre position
    const prevPageButton = document.getElementById("prevPage");
    // Si la page est strictement égale à 1, on cache le bouton "précédent"
    if (page === 1) {
      prevPageButton.style.display = "none";
      // Sinon on affiche le bouton "précédent"
    } else {
      prevPageButton.style.display = "flex";
      prevPageButton.style.gap = "5px";
    }

    // Montre ou cache le bouton suivant pour la pagination
    const nextPageButton = document.getElementById("nextPage");
    // Si on est sur la dernière page, on cache le bouton "suivant"
    if (page === totalPages) {
      nextPageButton.style.display = "none";
      // Sinon on affiche le bouton "suivant"
    } else {
      nextPageButton.style.display = "flex";
      nextPageButton.style.gap = "5px";
    }

    // Mise à jour du nombre de page
    const pageNumbers = document.getElementById("pageNumbers");
    // On vide l'élément HTML où on a affiché les numéros de page pour remettre à jour à chaque fois qu'on change de page. C'est important car quand on change de page, on veut réinitialiser l'affichage des numéros de page avant d'ajouter les nouveaux numéros. Si on ne fait pas ça, les anciens numéros de page resteraient affichés, ce qui pourrait créer de la confusion
    pageNumbers.innerHTML = "";

    // On commence à la page 1 et on ajoute une page à chaque fois qu'on a de page. Là on a 2 pages, donc on tant qu'on a pas i = 2, on va ajouter +1 au i jusqu'à qu'il soit à la page 2. Donc on va afficher 2 pages en tout
    for (let i = 1; i <= totalPages; i++) {
      const pageNumber = document.createElement("span");
      // On affiche le "i" à jour
      pageNumber.textContent = i;
      pageNumber.className = "page-number";
      pageNumber.style.cursor = "pointer";
      // Si la page est à jour, on affiche en gras la page actuelle où on se trouve
      if (i === currentPage) {
        pageNumber.style.fontWeight = "bold";
      }

      // On ajoute un événement pour que quand on clique pour changer de page, on met l'index à jour pour savoir la page actuelle et on appel la fonction showPage
      pageNumber.addEventListener("click", () => {
        currentPage = i;
        showPage(currentPage);
      });
      pageNumbers.appendChild(pageNumber);

      // Ajout d'un espace entre les chiffres
      // Si la page actuelle est inférieur au nombre total de page, on créé un text avec un espace entre chaque chiffre car il reste encore des pages à afficher après celle-ci.
      if (i < totalPages) {
        pageNumbers.appendChild(document.createTextNode(" "));
      }
    }
  }

  // On récupère l'id prevPage en lui donnant une fonction avec un événement clique
  document.getElementById("prevPage").addEventListener("click", function () {
    // Si la page actuelle est supérieur à 1
    if (currentPage > 1) {
      // On peut la décrémente de 1 la page seulement si on n'est pas déjà à la première page
      currentPage--;
      // On appelle la fonction avec la page actuelle
      showPage(currentPage);
    }
  });

  document.getElementById("nextPage").addEventListener("click", function () {
    // Si la page actuelle est inférieur au nombre total de page
    if (currentPage < totalPages) {
      // On incrémente de 1 la page seulement si on n'est pas déjà à la dernière page
      currentPage++;
      showPage(currentPage);
    }
  });

  // On appelle la fonction showPage en mettant à jour la page actuelle
  showPage(currentPage);
});

// Affichage des boutons quand on clique sur une des catégories

// Variable pour stocker la catégorie actuellement affichée
let currentCategory = null;

// Je sélectionne tous les éléments qui ont la classe 'category-btn' (les liens pour chaque catégorie)
document.querySelectorAll(".category-btn").forEach((button) => {
  button.addEventListener("click", function (event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    const category = this.getAttribute("data-category");
    const optionsContainer = document.getElementById(category + "-options");

    // Vérifie si c'est la catégorie déjà affichée
    if (currentCategory === category) {
      // Si c'est la catégorie visible, on la cache
      optionsContainer.classList.add("hidden");
      currentCategory = null; // Réinitialise la catégorie affichée
    } else {
      // Cache tous les conteneurs d'options
      document.querySelectorAll(".options").forEach((option) => {
        option.classList.add("hidden");
      });

      // Affiche les boutons en fonction de la catégorie sélectionnée
      if (optionsContainer) {
        optionsContainer.classList.remove("hidden");
        currentCategory = category; // Met à jour la catégorie affichée
      } else {
        console.error("Conteneur non trouvé pour la catégorie : " + category);
      }
    }
  });
});
