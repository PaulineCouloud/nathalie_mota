<?php get_header(); ?>

<div id="home" class="content-area">
    <main id="main" class="site-main">
        <header class="hero" style="background-image: url('<?php echo get_random_photo(); ?>')">
            Photographe Event
        </header>
        <section>
            <header>
            <div class="filters-container">
            <div class="filters-left">
        <select id="category">
            <option value="">Catégories</option>
            <?php
            $categories = get_terms( array(
                'taxonomy' => 'categorie', // Utilisation de ta clé de taxonomie
                'hide_empty' => false, // Afficher même les catégories sans contenu
            ) );

            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
                foreach ( $categories as $category ) {
                    echo '<option value="' . esc_attr( $category->slug ) . '">' . esc_html( $category->name ) . '</option>';
                }
            }
            ?>
        </select>
        <select id="formats">
            <option value="">Formats</option>
            <?php
                $formats = get_terms(array(
                    'taxonomy' => 'format',
                    'hide_empty' => false,
                ));
                foreach ($formats as $format) {
                    echo '<option value="' . $format->term_id . '">' . $format->name . '</option>';
                }
            ?>
        </select>
    </div>
    <div class="filters-right">
        <select id="sort">
            <option value="">Trier par</option>
            <!-- Options de tri -->
        </select>
    </div>
</div>

            </header>
            <main>
                <div id="photos">
                    <?php
                    $args = array(
                        'post_type' => 'photo',
                        'posts_per_page' => 8,
                        'post_status' => 'publish'
                    );
                    $query = new WP_Query($args);
                    while ($query->have_posts()) {
                        $query->the_post();
                        get_template_part('templates_part/photo');
                    }
                    ?>
                </div>
            </main>
            <footer>
                <button class="btn_nm" id="charger_plus">Charger plus</button>
            </footer>
        </section>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
