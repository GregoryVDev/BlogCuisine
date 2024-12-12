function previewImage(input, previewId) {
  const previewContainer = document.getElementById(previewId);
  previewContainer.innerHTML = ""; // Reset the container

  if (input.files && input.files[0]) {
    const reader = new FileReader();

    reader.onload = function (e) {
      const img = document.createElement("img");
      img.src = e.target.result;
      img.style.display = "block";
      img.style.margin = "20px auto";
      img.style.maxWidth = "235px";
      img.style.maxHeight = "235px";
      img.alt = "Prévisualisation de l'image";
      previewContainer.appendChild(img);

      // Add remove button
      const removeButton = document.createElement("button");
      removeButton.innerText = "Supprimer";
      removeButton.style.display = "flex";
      removeButton.style.background = "#98a178";
      removeButton.style.color = "red";
      removeButton.style.borderRadius = "10px";
      removeButton.style.margin = "15px auto";
      removeButton.style.padding = "10px";
      removeButton.onclick = function () {
        input.value = ""; // Reset input
        previewContainer.innerHTML = ""; // Remove preview
      };
      previewContainer.appendChild(removeButton);
    };

    reader.readAsDataURL(input.files[0]);
  }
}
