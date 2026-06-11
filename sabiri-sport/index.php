<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header(); ?>

<div class="container page-wrap">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?>>
				<h1 class="page-title"><?php the_title(); ?></h1>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p><?php esc_html_e( 'Aucun contenu trouvé.', 'sabiri-sport' ); ?></p>
	<?php endif; ?>
</div>

<?php get_footer(); ?>
