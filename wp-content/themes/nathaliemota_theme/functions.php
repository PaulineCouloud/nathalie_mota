<?php
//add style to wordpress theme
function add_theme_scripts() {
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.1', 'all');
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', false );
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
}
