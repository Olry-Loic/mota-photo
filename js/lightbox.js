function lightboxHandlers () {
    // Sélectionnez toutes les balises avec l'ID "overlay-eye".
    const overlayEyes = document.querySelectorAll("#overlay-eye");
    
    // Sélectionnez les éléments de la boîte de lumière.
    const lightbox = document.querySelector(".lightbox");
    const lightboxContainer = document.querySelector(".lightbox__container");
    const lightboxClose = document.querySelector(".lightbox__close");
    const lightboxNext = document.querySelector(".lightbox__next");
    const lightboxPrev = document.querySelector(".lightbox__prev");
    const lightboxRef = document.querySelector(".lightbox__ref");
    const lightboxCat = document.querySelector(".lightbox__cat");
    
    // Suivre l'index de l'image actuellement affichée.
    let currentImageIndex = 0;
    // Parcourez chaque icône "overlay-eye" et ajoutez un écouteur de clic.
    overlayEyes.forEach((eye, index) => {
        eye.addEventListener("click", function() {
            // Récupérez l'URL de l'image à partir de la balise précédente.
            const imageSrc = eye.previousElementSibling.getAttribute("href");
            lightboxContainer.querySelector("img").setAttribute("src", imageSrc);
    
            // Extrait les informations de la balise d'info suivante.
            const infoDiv = eye.parentElement.nextElementSibling;
            const ref = infoDiv.querySelector("p:nth-child(1)").textContent;
            const cat = infoDiv.querySelector("p:nth-child(2)").textContent;
    
            // Mettez à jour les balises de la lightbox avec les informations.
            lightboxRef.textContent = ref;
            lightboxCat.textContent = cat;
    
            currentImageIndex = index;
            lightbox.style.display = 'flex';
        });
    });
    
    // Gérez le clic sur le bouton de fermeture de la lightbox.
    lightboxClose.addEventListener("click", function() {
        lightbox.style.display = 'none';
    });
    
    // Gérez le clic sur le bouton "Suivant".
    lightboxNext.addEventListener("click", function() {
        currentImageIndex = (currentImageIndex + 1) % overlayEyes.length;
        const nextImageSrc = overlayEyes[currentImageIndex].previousElementSibling.getAttribute("href");
        lightboxContainer.querySelector("img").setAttribute("src", nextImageSrc);
    
        // Extrait les informations de la balise d'info suivante.
        const infoDiv = overlayEyes[currentImageIndex].parentElement.nextElementSibling;
        const ref = infoDiv.querySelector("p:nth-child(1)").textContent;
        const cat = infoDiv.querySelector("p:nth-child(2)").textContent;
    
        // Mettez à jour les balises de la lightbox avec les informations.
        lightboxRef.textContent = ref;
        lightboxCat.textContent = cat;
    });
    
    // Gérez le clic sur le bouton "Précédent".
    lightboxPrev.addEventListener("click", function() {
        currentImageIndex = (currentImageIndex - 1 + overlayEyes.length) % overlayEyes.length;
        const prevImageSrc = overlayEyes[currentImageIndex].previousElementSibling.getAttribute("href");
        lightboxContainer.querySelector("img").setAttribute("src", prevImageSrc);
    
        // Extrait les informations de la balise d'info suivante.
        const infoDiv = overlayEyes[currentImageIndex].parentElement.nextElementSibling;
        const ref = infoDiv.querySelector("p:nth-child(1)").textContent;
        const cat = infoDiv.querySelector("p:nth-child(2)").textContent;
    
        // Mettez à jour les balises de la lightbox avec les informations.
        lightboxRef.textContent = ref;
        lightboxCat.textContent = cat;
    });
    }
    lightboxHandlers();