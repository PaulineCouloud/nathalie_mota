<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="site-header">
    <a href="/">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/svg/logo.svg" alt="Nathalie Mota" class="logo"/>
    </a>
    <nav class="site-nav">
        <?php
        wp_nav_menu(array(
            'menu' => 'Principal', // Nom du menu à afficher
            'container' => false, // Ne pas utiliser de conteneur HTML autour du menu
            'menu_class' => 'menu', // Classe CSS du menu
        ));
        ?>
    </nav>
    <div class="menu-toggle">
        <!-- Bouton pour ouvrir/fermer le menu en version mobile -->
        <div class="hamburger"></div>
        <!-- Icône hamburger pour ouvrir le menu -->
        <div class="croix"></div>
        <!-- Icône croix pour fermer le menu -->
    </div>
</header>
