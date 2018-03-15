<?php get_header('exam'); ?>
    <div class="content">
        <main class="main">
            <?php while(have_posts()) : the_post(); ?>
                <?php get_template_part('content', 'home'); ?>
            <?php endwhile; ?>
        </main><!-- /.main -->
    </div><!-- /.content -->
<?php get_footer('exam'); ?>
