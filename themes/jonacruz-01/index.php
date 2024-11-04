<?php get_header(); ?>

<div class="content-area">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '">', '</a></h2>'); ?>
                </header>
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
                <?php the_content(); ?>
            </article>
        <?php endwhile; ?>

        <?php the_posts_navigation(); ?>
    <?php else : ?>
        <p><?php _e('No posts found', 'jonacruz-01-theme'); ?></p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>