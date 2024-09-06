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

    // Show or hide the previous page button
    const prevPageButton = document.getElementById("prevPage");
    if (page === 1) {
      prevPageButton.style.display = "none";
    } else {
      prevPageButton.style.display = "flex";
      prevPageButton.style.gap = "5px";
    }

    // Show or hide the next page button
    const nextPageButton = document.getElementById("nextPage");
    if (page === totalPages) {
      nextPageButton.style.display = "none";
    } else {
      nextPageButton.style.display = "flex";
      nextPageButton.style.gap = "5px";
    }

    // Update the page numbers
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

      // Add a space between numbers
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

  // Show the first page initially
  showPage(currentPage);
});
