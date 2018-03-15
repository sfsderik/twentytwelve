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
		<div class="info-blocks info-blocks-3">
			<div class="info-block">
				<div class="info-block-thumbnail">
					<img src="<?php echo asset_path('images/mortgage.png'); ?>" />
				</div>
				<div class="info-block-content">
					<h3>Cursus vitae congue</h3>
					<p>Aliquet nibh praesent tristique magna sit amet purus gravida quis blandit turpis cursus in hac habitasse platea dictumst quisque sagittis purus sit amet volutpat consequat</p>
				</div>
			</div>
			<div class="info-block">
				<div class="info-block-thumbnail">
					<img src="<?php echo asset_path('images/loan.png'); ?>" />
				</div>
				<div class="info-block-content">
					<h3>Pellentesque</h3>
					<p>Ut tortor pretium viverra suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse sed nisi lacus sed viverra tellus in hac habitasse platea dictumst</p>
				</div>
			</div>
			<div class="info-block">
				<div class="info-block-thumbnail">
					<img src="<?php echo asset_path('images/balance.png'); ?>" />
				</div>
				<div class="info-block-content">
					<h3>Sed faucibus</h3>
					<p>Leo integer malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel facilisis volutpat est velit egestas dui id ornare arcu odio ut sem nulla</p>
				</div>
			</div>
		</div>
	</div>
</section>
