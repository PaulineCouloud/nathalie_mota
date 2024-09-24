<!-- footer.php -->
<footer class="site-footer">
    <nav class="site-nav">
        <?php
        wp_nav_menu(array(
            'menu' => 'Footer',
            'container' => false,
            'menu_class' => 'menu_footer',
        ));
        ?>
    </nav>
</footer><!-- #colophon -->
<?php
wp_footer();
get_template_part('templates_part/contact');
?>
</body>
</html>