document.addEventListener('DOMContentLoaded', function() {
    hamburger_menu();
    contact_form();
});


/**
 * Fonction pour afficher le menu hamburger
 */
function hamburger_menu(){
    //on récupère le bouton
    var btn = document.querySelector('.hamburger');
    var croix = document.querySelector('.croix');
    //on récupère le menu
    var menu = document.querySelector('.site-nav');
    //on ajoute un écouteur d'événement sur le bouton
    btn.addEventListener('click', function() {
        //on ajoute ou on enlève la classe active sur le menu
        menu.classList.toggle('active');
        btn.classList.toggle('inactive');
        croix.classList.toggle('active');
    });

    croix.addEventListener('click', function() {
        menu.classList.toggle('active');
        btn.classList.toggle('inactive');
        croix.classList.toggle('active');
    });
}

/**
 * Fonction pour afficher le formulaire de contact
 */
function contact_form(){
    //on récupère le bouton contact
    var btn = document.querySelector('.menu_contact');
    //on récupère la modale contact
    var modal = document.querySelector('.modal_contact_background');
    //on recupere le background de la modale
    var background = document.querySelector('.modal_contact_background');
    //on ajoute un écouteur d'événement sur le bouton
    btn.addEventListener('click', function() {
        //on ajoute ou on enlève la classe active sur la modale
        modal.classList.toggle('active');
    });
    //quand on clique sur le background et pas sur la fenetre interne .modal_contact on ferme la modale
    background.addEventListener('click', function(event) {
        if (event.target === background) {
            modal.classList.toggle('active');
        }
    });
}

