    	<footer id="colophon" class="site-footer" role="contentinfo">
    		<div class="container">
    			<div class="row">
    				<?php if ( is_active_sidebar( 'footer-widget' ) ) : ?>
                      <?php dynamic_sidebar( 'footer-widget' ); ?>
                    <?php endif; ?>
    				<div class="site-info col-sm-6 <?php echo is_active_sidebar( 'footer-widget' ) ? 'col-sm-pull-6' : ''; ?>">
    					<div class="footer-brand">
    						<?php if ( get_header_image() ) : ?>
	                        	<img src="<?php header_image(); ?>" class="footer-image" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
	                        <?php else : ?>
	                            <img src="" alt="<?php echo get_bloginfo('name'); ?>"/>
	                        <?php endif; ?>
    					</div>
    					<a href="#">Privacy Policy</a> | 
    					<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'twentytwelve' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'twentytwelve' ); ?>"><?php printf( __( 'Proudly powered by %s', 'twentytwelve' ), 'WordPress' ); ?></a>
    				</div>
    			</div>
    		</div>
    	</footer>
    </div><!-- /.wrap -->
    <?php wp_footer(); ?>
  </body>
</html>
