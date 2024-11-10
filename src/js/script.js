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
