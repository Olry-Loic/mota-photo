// Déclaration d'une constante `links` contenant une NodeList de tous les éléments `li` de la navigation.
const links = document.querySelectorAll("nav li");

// Ajout d'un écouteur d'événement `click` sur l'élément `icons`.
// Lorsque l'utilisateur clique sur cet élément, la classe `active` est ajoutée ou supprimée de la navigation, en fonction de son état actuel.
icons.addEventListener("click", () => {
  nav.classList.toggle("active");
});

// Parcours de la NodeList `links` et ajout d'un écouteur d'événement `click` sur chaque élément `li`.
// Lorsque l'utilisateur clique sur un élément `li`, la classe `active` est supprimée de la navigation.
links.forEach((link) => {
  link.addEventListener("click", () => {
    nav.classList.remove("active");
  });
});