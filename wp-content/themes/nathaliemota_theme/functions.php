<?php
//add style to wordpress theme
function add_theme_scripts() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.1', 'all');
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array("jquery"), '1.0', false );

    //embed lightbox
    wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/lib/lightbox/css/lightbox.min.css', array(), '1.1', 'all');
    wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/lib/lightbox/js/lightbox.min.js', array("jquery"), '1.0', false );

    //embed select2
    wp_enqueue_style( 'select2', get_template_directory_uri() . '/lib/select2/css/select2.min.css', array(), '1.1', 'all');
    wp_enqueue_script( 'select2', get_template_directory_uri() . '/lib/select2/js/select2.min.js', array("jquery"), '1.0', false );

    //photo js script
    wp_enqueue_script('photos-js', get_template_directory_uri() . '/assets/js/photos.js', array('jquery'), null, true);

    wp_localize_script('photos-js', 'charger_photos_vars', array(
        'nonce' => wp_create_nonce('charger_photos_nonce'),
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}

add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function add_static_item_to_footer_menu($items, $args) {
    if ($args->menu == 'Footer') {
        // Ajouter un élément li statique à la fin du menu
        $items .= '<li class="menu-item menu-item-static"><span>Tous droits réservés</span></li>';
    }
    if ($args->menu == 'Principal') {
        // Ajouter un élément li statique à la fin du menu
        $items .= '<li class="menu-item menu-item-static menu_contact"><span>Contact</span></li>';
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_static_item_to_footer_menu', 10, 2);


function custom_post_type_support() {
    // Assure que les images mises en avant sont activées pour tous les types de post
    add_theme_support('post-thumbnails');

    // Ajoute le support pour les images mises en avant pour le type de post 'photo'
    add_post_type_support('photo', 'thumbnail');
}

add_action('after_setup_theme', 'custom_post_type_support');


function get_next_photo($post_id){
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
    );
    $posts= get_posts($args);
    foreach($posts as $key => $post){
        if($post->ID == $post_id){
            if(isset($posts[$key+1])){
                return $posts[$key+1];
            }else{
                return $posts[0];
            }
        }
    }
}

function get_prev_photo($post_id){
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish'
    );
    $posts= get_posts($args);
    foreach($posts as $key => $post){
        if($post->ID == $post_id){
            if(isset($posts[$key-1])){
                return $posts[$key-1];
            }else{
                return $posts[count($posts)-1];
            }
        }
    }
    return false;
}

function get_random_photo(){
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'orderby' => 'rand',
        'post_status' => 'publish'
    );
    $posts= get_posts($args);
    return get_the_post_thumbnail_url($posts[0]->ID);
}

/*
 * Fonction ajax pour récupérer les photos
 * */
function charger_photos() {
    // Vérifie le nonce pour la sécurité
    check_ajax_referer('charger_photos_nonce', 'nonce');

    // Récupère les paramètres envoyés par AJAX
    $categorie = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';
    $sort = isset($_POST['sort']) ? sanitize_text_field($_POST['sort']) : 'DESC';
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    // Arguments pour la requête WP_Query
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 8,
        'paged' => $page,
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => $sort,
    );

    if ($categorie) {
        $args['tax_query'][] = array(
            'taxonomy' => 'categorie',
            'field' => 'slug',
            'terms' => $categorie,
        );
    }

    if ($format) {
        $args['tax_query'][] = array(
            'taxonomy' => 'format',
            'field' => 'id',
            'terms' => $format,
        );
    }

    $query = new WP_Query($args);

    // Commence la mise en mémoire tampon de sortie
    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            // Utilise le template part pour afficher chaque photo
            get_template_part('templates_part/photo');
        }
        $html = ob_get_clean();
    } else {
        $html = ''; // Pas de contenu si aucune photo n'est trouvée
    }

    // Vérifie s'il y a plus de pages
    $has_more = $page < $query->max_num_pages;

    wp_reset_postdata();

    // Envoie la réponse JSON
    wp_send_json_success(array(
        'html' => $html,
        'has_more' => $has_more,
    ));
}

add_action('wp_ajax_charger_photos', 'charger_photos');
add_action('wp_ajax_nopriv_charger_photos', 'charger_photos');



