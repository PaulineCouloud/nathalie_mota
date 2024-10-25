<!-- footer.php -->
<footer class="site-footer">
    <nav class="site-nav">
        <?php
        /*Récupère le menu footer*/ 
        wp_nav_menu(array(
            'menu' => 'Footer',
            'container' => false,
            'menu_class' => 'menu_footer',
        ));
        ?>
    </nav>
</footer>
<?php
get_template_part('templates_part/contact');
wp_footer();
?>
</body>
</html>