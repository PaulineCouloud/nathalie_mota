<?php get_header(); ?>

<div id="home" class="content-area">
    <main id="main" class="site-main">
        <header class="hero" style="background-image: url('<?php echo get_random_photo(); ?>')">
            Photographe Event
        </header>
        <section>
            <header>
                <div>
                    <select id="categorie">
                        <option>Catégories</option>
                    </select>
                    <select id="format">
                        <option>Formats</option>
                    </select>
                </div>
                <div>
                    <select id="tri">
                        <option>Trier par</option>
                    </select>
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
