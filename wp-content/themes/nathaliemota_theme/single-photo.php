<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="photo_header">
                    <div class="photo_infos">
                        <h2 class="photo_titre"><?php the_title(); ?></h2>
                        <ul class="photo_meta">
                            <li>Référence : <?php echo get_field("reference"); ?></li>
                            <li>Catégorie : <?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', '); ?></li>
                            <li>Format : <?php echo get_the_term_list(get_the_ID(), 'format', '', ', '); ?></li>
                            <li>Type : <?php echo get_field("type"); ?></li>
                            <li>Année : <?php echo get_field("annee"); ?></li>
                        </ul>
                    </div>
                    <div class="photo_image">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),"large"); ?>" alt="<?php the_title(); ?>">
                    </div>
                </div>
                <div class="photo_sidebar">
                    <div class="photo_contact">
                        <div class="photo_contact_btn_texte">Cette photo vous intéresse ?</div>
                        <button class="btn_nm">Contact</button>
                    </div>
                    <div class="photo_navigation">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"
                             class="photo_navigation_suivante">
                        <div class="photo_fleche">
                            <div class="photo_fleche_gauche"></div>
                            <div class="photo_fleche_droite"></div>
                        </div>
                    </div>
                </div>
                <aside class="photo_suggestion">
                    <div class="photo_suggestion_text">Vous aimerez aussi</div>
                    <ul class="photo_suggestion_liste">
                        <?php
                        $args = array(
                            'post_type' => 'photo',
                            'posts_per_page' => 2,
                            'post__not_in' => array(get_the_ID()),
                        );
                        $query = new WP_Query($args);
                        while ($query->have_posts()) {
                            $query->the_post();
                            ?>
                            <li class="photo_suggestion_item">
                                <?php
                                get_template_part('templates_part/photo');
                                ?>
                            </li>
                            <?php
                        }
                        wp_reset_postdata();
                        ?>
                    </ul>
                </aside>

            </article><!-- #post-<?php the_ID(); ?> -->
        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>