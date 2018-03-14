<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="row">
        <div class="page-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <div class="page-content">
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
            </header>
            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
            </div><!-- .entry-content -->
        </div>
    </div>
</article><!-- #post -->
