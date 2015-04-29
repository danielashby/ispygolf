<?php
// Include WordPress
define('WP_USE_THEMES', true);
require('../blog/wp-load.php');
query_posts( 'showposts=2&category_name=news' );
get_header('news');
?>

	<div id="primary" class="content-area clr">
		<div id="content" class="site-content left-content clr" role="main">
			<?php if ( have_posts() ) : ?>
				<div id="blog-wrap" class="clr">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
				</div><!-- #post -->
				<?php wpex_pagejump(); ?>
			<?php else : ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
			</div><!-- #content -->
		<?php get_sidebar('news'); ?>
	</div><!-- #primary CDH -->

<?php  get_footer(); ?>
