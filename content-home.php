<div id="post-<?php the_ID(); ?>" class="page" <?php echo has_post_thumbnail() ? 'style="background-image: url('.esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')).')"' : ''; ?>>
    <div class="homepage">
        <?php the_post_thumbnail('full'); ?>
        <?php the_content(); ?>
    </div><!-- .entry-content -->
</div><!-- #post -->
<section class="section">
	<div class="container">
		<h2>Pellentesque adipiscing commodo.</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Malesuada proin libero nunc consequat interdum varius sit. Orci phasellus egestas tellus rutrum.</p>
	</div>
</section>
