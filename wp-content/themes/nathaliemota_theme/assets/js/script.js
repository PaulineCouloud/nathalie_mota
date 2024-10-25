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
    //on récupère le bouton contact de la page photo
    var btn_photo = document.querySelector('.btn_contact_photo');
    //on récupère la modale contact
    var modal = document.querySelector('.modal_contact_background');
    //on recupere le background de la modale
    var background = document.querySelector('.modal_contact_background');
    //on ajoute un écouteur d'événement sur le bouton
    btn.addEventListener('click', function() {
        //on ajoute ou on enlève la classe active sur la modale
        modal.classList.toggle('active');
    });
    if(btn_photo != null) {
        btn_photo.addEventListener('click', function () {
            //on récupére la reference de la photo
            var photo_ref = this.getAttribute('data-photo');
            //on ajoute au formulaire la reference #ff_3_input_text
            document.getElementById('ff_3_input_text').value = photo_ref;
            //on ajoute ou on enlève la classe active sur la modale
            modal.classList.toggle('active');
        });
    }
    //quand on clique dans le background on ferme la modale
    background.addEventListener('click', function(event) {
        if (event.target === background) {
            modal.classList.toggle('active');
        }
    });
}


function showImage(url){
    //get image .photo_navigation_suivante
    var img = document.querySelector('.photo_navigation_suivante');
    //set image url
    img.src = url;
}

jQuery(document).ready(function($) {
    $("#category").select2();
    $("#formats").select2();
    $("#sort").select2();
});
