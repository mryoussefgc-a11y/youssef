<?php
/**
 * Page d'accueil — Sabiri Sport
 */
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
$hero_img = sabiri_opt( 'sabiri_hero_image' );
?>

<!-- ============ HERO ============ -->
<section class="hero" <?php if ( $hero_img ) : ?>style="background-image:url('<?php echo esc_url( $hero_img ); ?>')"<?php endif; ?>>
	<div class="hero-overlay"></div>
	<div class="container hero-content">
		<p class="hero-kicker"><?php echo esc_html( sabiri_opt( 'sabiri_hero_kicker', 'LA PERFORMANCE COMMENCE ICI' ) ); ?></p>
		<h1 class="hero-title">
			<?php echo esc_html( sabiri_opt( 'sabiri_hero_title_1', 'ÉQUIPEMENTS' ) ); ?><br>
			<span class="accent"><?php echo esc_html( sabiri_opt( 'sabiri_hero_title_2', 'SPORTIFS' ) ); ?></span><br>
			<?php echo esc_html( sabiri_opt( 'sabiri_hero_title_3', 'PROFESSIONNELS' ) ); ?>
		</h1>
		<p class="hero-subtitle"><?php echo esc_html( sabiri_opt( 'sabiri_hero_subtitle', 'MMA · BOXE · FOOTBALL · RUGBY · CROSSFIT · MÉDAILLES & COUPES' ) ); ?></p>
		<div class="hero-buttons">
			<?php if ( function_exists( 'wc_get_page_permalink' ) ) : ?>
				<a class="btn btn-primary" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Commander maintenant', 'sabiri-sport' ); ?></a>
				<a class="btn btn-outline" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Voir le catalogue', 'sabiri-sport' ); ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>

<!-- ============ CATÉGORIES ============ -->
<?php if ( function_exists( 'WC' ) ) :
	$cats = get_terms( array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => false,
		'parent'     => 0,
		'number'     => 6,
		'exclude'    => array( get_option( 'default_product_cat' ) ),
	) );
	if ( $cats && ! is_wp_error( $cats ) ) : ?>
<section class="section section-categories">
	<div class="container">
		<div class="category-grid">
			<?php foreach ( $cats as $cat ) :
				$thumb_id = get_term_meta( $cat->term_id, 'thumbnail_id', true ); ?>
				<a class="category-card" href="<?php echo esc_url( get_term_link( $cat ) ); ?>">
					<?php if ( $thumb_id ) : ?>
						<?php echo wp_get_attachment_image( $thumb_id, 'sabiri-category', false, array( 'loading' => 'lazy' ) ); ?>
					<?php else : ?>
						<span class="category-placeholder"></span>
					<?php endif; ?>
					<span class="category-name"><?php echo esc_html( $cat->name ); ?></span>
					<span class="category-link"><?php esc_html_e( 'Voir', 'sabiri-sport' ); ?> →</span>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
</section>
	<?php endif; ?>

<!-- ============ PRODUITS PHARES ============ -->
<?php $featured = sabiri_get_featured_products( 6 );
if ( $featured ) : ?>
<section class="section section-featured">
	<div class="container">
		<div class="section-head">
			<h2 class="section-title"><?php esc_html_e( 'Produits phares', 'sabiri-sport' ); ?></h2>
			<a class="section-more" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Voir tous les produits', 'sabiri-sport' ); ?> →</a>
		</div>
		<div class="product-grid">
			<?php foreach ( $featured as $product ) : ?>
				<div class="product-card">
					<a href="<?php echo esc_url( $product->get_permalink() ); ?>" class="product-thumb">
						<?php echo $product->get_image( 'sabiri-product', array( 'loading' => 'lazy' ) ); ?>
					</a>
					<div class="product-body">
						<a class="product-name" href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo esc_html( $product->get_name() ); ?></a>
						<?php if ( $product->get_average_rating() > 0 ) : ?>
							<div class="product-rating"><?php echo wp_kses_post( wc_get_rating_html( $product->get_average_rating() ) ); ?> <small>(<?php echo esc_html( $product->get_review_count() ); ?>)</small></div>
						<?php endif; ?>
						<div class="product-price"><?php echo wp_kses_post( $product->get_price_html() ); ?></div>
						<a href="<?php echo esc_url( '?add-to-cart=' . $product->get_id() ); ?>" data-quantity="1" data-product_id="<?php echo esc_attr( $product->get_id() ); ?>" class="btn btn-add add_to_cart_button ajax_add_to_cart"><?php esc_html_e( 'Ajouter au panier', 'sabiri-sport' ); ?></a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>
<?php endif; // WC ?>

<!-- ============ POURQUOI NOUS CHOISIR ============ -->
<section class="section section-why">
	<div class="container">
		<h2 class="section-title centered"><?php esc_html_e( 'Pourquoi nous choisir ?', 'sabiri-sport' ); ?></h2>
		<div class="why-grid">
			<div class="why-card">
				<div class="why-icon">★</div>
				<h3><?php esc_html_e( 'Qualité professionnelle', 'sabiri-sport' ); ?></h3>
				<p><?php esc_html_e( 'Équipements sélectionnés pour les athlètes exigeants.', 'sabiri-sport' ); ?></p>
			</div>
			<div class="why-card">
				<div class="why-icon">🚚</div>
				<h3><?php esc_html_e( 'Livraison partout au Maroc', 'sabiri-sport' ); ?></h3>
				<p><?php esc_html_e( 'Livraison rapide dans toutes les villes.', 'sabiri-sport' ); ?></p>
			</div>
			<div class="why-card">
				<div class="why-icon">💰</div>
				<h3><?php esc_html_e( 'Prix compétitifs', 'sabiri-sport' ); ?></h3>
				<p><?php esc_html_e( 'Le meilleur rapport qualité-prix, sans compromis.', 'sabiri-sport' ); ?></p>
			</div>
			<div class="why-card">
				<div class="why-icon">🎧</div>
				<h3><?php esc_html_e( 'Service client rapide', 'sabiri-sport' ); ?></h3>
				<p><?php esc_html_e( 'Notre équipe est à votre écoute 7j/7.', 'sabiri-sport' ); ?></p>
			</div>
		</div>
	</div>
</section>

<!-- ============ CONTENU DE LA PAGE (sections additionnelles via l'éditeur) ============ -->
<?php
while ( have_posts() ) : the_post();
	$content = get_the_content();
	if ( trim( $content ) ) : ?>
		<section class="section section-page-content">
			<div class="container"><?php the_content(); ?></div>
		</section>
	<?php endif;
endwhile;
?>

<?php get_footer(); ?>
