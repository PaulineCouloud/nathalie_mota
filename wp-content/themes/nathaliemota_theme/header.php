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
            'menu' => 'Principal',
            'container' => false,
            'menu_class' => 'menu',
        ));
        ?>
    </nav>
    <div class="menu-toggle">
        <div class="hamburger"></div>
        <div class="croix"></div>
    </div>
</header>
