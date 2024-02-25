'use strict';
    // Mobile navigation
    document.querySelector('.nav-toggle').addEventListener('click', function () {
        document.querySelector('.nav-mobile').classList.toggle('hidden');
    });

    // Accordeon
    document.addEventListener("DOMContentLoaded", function () {
        // Sélectionnez tous les boutons de l'accordéon
        const accordionButtons = document.querySelectorAll("[data-te-collapse-init]");

        // Ajoutez un écouteur d'événement à chaque bouton
        accordionButtons.forEach(function (button) {
            button.addEventListener("click", function () {
                // Récupérez la cible de l'élément de données
                const targetId = button.getAttribute("data-te-target");
                const targetElement = document.querySelector(targetId);

                // Fermez tous les éléments de l'accordéon sauf celui cliqué
                document.querySelectorAll("[data-te-collapse-item]").forEach(function (item) {
                    if (item !== targetElement) {
                        item.classList.add("hidden");
                        item.setAttribute("aria-expanded", "false");
                        item.previousElementSibling.querySelector("span").classList.remove("rotate-180");
                    }
                });

                // Basculez la visibilité de la cible cliquée
                if (targetElement.classList.contains("hidden")) {
                    // Affichez la cible, mettez à jour l'attribut aria-expanded et ajoutez/retirez la classe pour tourner la flèche
                    targetElement.classList.remove("hidden");
                    button.setAttribute("aria-expanded", "true");
                    button.querySelector("span").classList.add("rotate-180");
                } else {
                    // Masquez la cible, mettez à jour l'attribut aria-expanded et ajoutez/retirez la classe pour réinitialiser la flèche
                    targetElement.classList.add("hidden");
                    button.setAttribute("aria-expanded", "false");
                    button.querySelector("span").classList.remove("rotate-180");
                }
            });
        });
    });

    // Formulaire
    function handleInputFocus(inputId, labelId) {
        const input = document.getElementById(inputId);
        const label = document.getElementById(labelId);

        label.classList.add('label-moved');
    }

    function handleInputBlur(inputId, labelId) {
        const input = document.getElementById(inputId);
        const label = document.getElementById(labelId);

        if (input.value === '') {
            label.classList.remove('label-moved');
        }
    }         


    // YouTube API script
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('ytplayer', {
            videoId: 'XFWRnbTDhnY',  // Remplace 'VIDEO_ID' par l'ID de ta vidéo YouTube
            playerVars: {
                autoplay: 1,
                loop: 1,
                controls: 1,
                showinfo: 0,
                autohide: 1,
                modestbranding: 1,
                vq: 'hd1080'
            },
            events: {
                onReady: onPlayerReady
            }
        });
    }

    function onPlayerReady(event) {
        event.target.mute(); // Optionnel : Pour couper le son de la vidéo
    }