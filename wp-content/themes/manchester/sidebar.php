<aside>

	<?php if (is_page("about-us")): ?>

		<?php dynamic_sidebar( 'about' ); ?>

	<?php elseif ( is_active_sidebar( 'primary' ) ) : ?>

		<?php dynamic_sidebar( 'primary' ); ?>

	<?php else: ?>

		<?php PLS_Route::handle_default_sidebar(); ?>

	<?php endif ?>

</aside>

<div class="clearfix"></div>