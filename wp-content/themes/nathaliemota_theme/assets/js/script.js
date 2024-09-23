document.addEventListener('DOMContentLoaded', function() {
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
});