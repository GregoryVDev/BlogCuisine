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

    articles.forEach((article, index) => {
      if (index >= start && index < end) {
        article.style.display = "block";
      } else {
        article.style.display = "none";
      }
    });

    // Montre ou cache le bouton précédent pour la pagination
    const prevPageButton = document.getElementById("prevPage");
    if (page === 1) {
      prevPageButton.style.display = "none";
    } else {
      prevPageButton.style.display = "flex";
      prevPageButton.style.gap = "5px";
    }

    // Montre ou cache le bouton suivant pour la pagination
    const nextPageButton = document.getElementById("nextPage");
    if (page === totalPages) {
      nextPageButton.style.display = "none";
    } else {
      nextPageButton.style.display = "flex";
      nextPageButton.style.gap = "5px";
    }

    // Mise à jour du nombre de page
    const pageNumbers = document.getElementById("pageNumbers");
    pageNumbers.innerHTML = "";

    for (let i = 1; i <= totalPages; i++) {
      const pageNumber = document.createElement("span");
      pageNumber.textContent = i;
      pageNumber.className = "page-number";
      pageNumber.style.cursor = "pointer";
      if (i === currentPage) {
        pageNumber.style.fontWeight = "bold";
      }
      pageNumber.addEventListener("click", () => {
        currentPage = i;
        showPage(currentPage);
      });
      pageNumbers.appendChild(pageNumber);

      // Ajout d'un espace entre les chiffres
      if (i < totalPages) {
        pageNumbers.appendChild(document.createTextNode(" "));
      }
    }
  }

  document.getElementById("prevPage").addEventListener("click", function () {
    if (currentPage > 1) {
      currentPage--;
      showPage(currentPage);
    }
  });

  document.getElementById("nextPage").addEventListener("click", function () {
    if (currentPage < totalPages) {
      currentPage++;
      showPage(currentPage);
    }
  });

  // Affiche d'abord la première page
  showPage(currentPage);
});

// Affichage des boutons quand on clique sur un des catégories

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
