// Récupérez le bouton de contact et la modale
const contactBtn = document.querySelectorAll(".contactBtn");
const contactModale = document.getElementById("contactModal");


// Ajoutez un gestionnaire d'événements pour afficher la modale
contactBtn.forEach((Btn) => {
Btn.addEventListener("click", function (e) {
    const reference = e.target.getAttribute("data-reference");
    document.querySelector("#reference").value = reference
    contactModale.style.display = "flex";
});
})

// Fermez également la modale si l'utilisateur clique en dehors de la modale
window.addEventListener("click", function (event) {
    if (event.target == contactModale) {
        contactModale.style.display = "none";
    }
});

