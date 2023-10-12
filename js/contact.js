// Déclaration d'une constante `contactBtn` contenant une NodeList de tous les éléments `.contactBtn`.
const contactBtn = document.querySelectorAll(".contactBtn");
// Déclaration d'une constante `contactModale` contenant l'élément DOM avec l'id `contactModal`.
const contactModale = document.getElementById("contactModal");

// Parcours de la NodeList `contactBtn` et ajout d'un écouteur d'événement `click` sur chaque élément.
contactBtn.forEach((Btn) => {
Btn.addEventListener("click", function (e) {
    // Récupération de la valeur de l'attribut `data-reference` de l'élément cliqué.
    const reference = e.target.getAttribute("data-reference");
    // Attribution de la valeur de la référence au champ de formulaire `#reference`.
    document.querySelector("#reference").value = reference
    // Affichage de la modale de contact.
    contactModale.style.display = "flex";
});
})

// Ajout d'un écouteur d'événement `click` sur la fenêtre.
window.addEventListener("click", function (event) {
    // Si l'utilisateur clique sur la modale de contact, celle-ci est masquée.
    if (event.target == contactModale) {
        contactModale.style.display = "none";
    }
});

