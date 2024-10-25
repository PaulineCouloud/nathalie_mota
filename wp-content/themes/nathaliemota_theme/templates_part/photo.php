<div class="photo_block">
    <div class="photo_block_meta">
        <a href="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" data-lightbox="galerie"
           class="photo_block_zoom" data-title="<div class='lightbox_titre'><?php echo get_the_title(get_the_ID()); ?></div><div class='lightbox_categorie'><?php echo strip_tags(get_the_term_list(get_the_ID(), 'categorie', '', ', ')); ?></div>"></a>
        <a href="<?php echo get_permalink(); ?>" class="photo_block_oeil"></a>
        <div class="photo_block_meta_bottom">
            <div class="photo_block_title"><?php the_title(); ?></div>
            <div class="photo_block_categorie"><?php echo get_the_term_list(get_the_ID(), 'categorie', '', ', '); ?></div>
        </div>
    </div>
    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "large"); ?>" alt="<?php the_title(); ?>"
         class="photo_suggestion_image">
</div>