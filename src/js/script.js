// Ajout d'une pagination

document.addEventListener("DOMContentLoaded", function () {
  const articlesPerPage = 2;
  const articles = document.querySelectorAll("#article-container .produit");
  const totalPages = Math.ceil(articles.length / articlesPerPage);
  let currentPage = 1;

  function showPage(page) {
    const start = (page - 1) * articlesPerPage;
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

// Je sélectionne tous les éléments qui ont la classe 'category-btn' (les liens pour chaque catégorie)
document.querySelectorAll(".category-btn").forEach((button) => {
  button.addEventListener("click", function (event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    // Cache tous les conteneurs d'options
    document.querySelectorAll(".options").forEach((option) => {
      option.classList.add("hidden");
    });

    // Affiche les boutons en fonction de la catégorie sélectionnée
    const category = this.getAttribute("data-category");
    const optionsContainer = document.getElementById(category + "-options");

    if (optionsContainer) {
      optionsContainer.classList.remove("hidden");
    } else {
      console.error("Conteneur non trouvé pour la catégorie : " + category);
    }
  });
});
