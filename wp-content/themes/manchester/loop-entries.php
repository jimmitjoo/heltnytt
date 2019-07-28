<?php
/**
 * Loop Entries Templates
 *
 * Loops over a list entries and displays them. It is include on the archive and blog pages.
 *
 * @package PlacesterBlueprint
 * @subpackage Template
 */
?>


<section id="lvl4">

		<section class="left-content">
			<section class="list">

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

			<section class="list-item<?php if (is_sticky()) { echo ' sticky'; } ?>">
			
				<section class="blog-title">
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __('Permalink to %1$s', 'manchester'), the_title_attribute( array('echo' => false) ) ) ?>"><?php the_title(); ?></a></h3>
					<h6 class="blue"><?php printf( __('Posted on %s by %s', 'manchester'), get_the_time('F jS, Y'), get_the_author() ); ?></h6>
				</section>

				<section class="blog-text">

					<p class="nrm-txt"><?php the_excerpt(); ?></p>
					<a class="read-more" href="<?php the_permalink() ?>"><?php _e('Read More', 'manchester'); ?></a>
					<?php if (has_tag()): ?>
					<section class="blog-tags">
						<label><?php the_tags(); ?></label>
					</section>
					<?php endif; ?>
				</section>
			</section>

    <?php endwhile; ?>

    <nav class="posts">
        <div class="prev"><?php next_posts_link( '&laquo; ' . __('Older Entries', 'manchester' ) ); ?></div>
        <div class="next"><?php previous_posts_link( __('Newer Entries', 'manchester') . '&raquo;') ?></div>
    </nav>
    
<?php else : ?>
    
    <?php get_template_part( 'loop-error' ); ?>
    
<?php endif; ?>

			</section>
		</section>
	
</section>