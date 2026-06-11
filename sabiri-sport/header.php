<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
	<div class="container header-inner">
		<button class="menu-toggle" aria-label="<?php esc_attr_e( 'Ouvrir le menu', 'sabiri-sport' ); ?>" aria-expanded="false">
			<span></span><span></span><span></span>
		</button>

		<div class="site-branding">
			<?php
			if ( has_custom_logo() ) {
				the_custom_logo();
			} else {
				echo '<a class="site-logo-text" href="' . esc_url( home_url( '/' ) ) . '"><strong>SABIRI</strong> SPORT</a>';
			}
			?>
		</div>

		<nav class="main-nav" aria-label="<?php esc_attr_e( 'Navigation principale', 'sabiri-sport' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => false,
				'menu_class'     => 'nav-menu',
				'fallback_cb'    => function () {
					echo '<ul class="nav-menu">';
					echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Accueil', 'sabiri-sport' ) . '</a></li>';
					if ( function_exists( 'wc_get_page_permalink' ) ) {
						echo '<li><a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '">' . esc_html__( 'Boutique', 'sabiri-sport' ) . '</a></li>';
					}
					echo '</ul>';
				},
			) );
			?>
		</nav>

		<div class="header-actions">
			<?php if ( function_exists( 'WC' ) ) : ?>
				<a class="header-account" href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" aria-label="<?php esc_attr_e( 'Mon compte', 'sabiri-sport' ); ?>">
					<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-7 8-7s8 3 8 7"/></svg>
				</a>
				<a class="header-cart" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'Panier', 'sabiri-sport' ); ?>">
					<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1.5"/><circle cx="19" cy="21" r="1.5"/><path d="M2 3h3l2.6 12.4a2 2 0 0 0 2 1.6h8.8a2 2 0 0 0 2-1.6L22 7H6"/></svg>
					<span class="cart-count"><?php echo esc_html( WC()->cart ? WC()->cart->get_cart_contents_count() : 0 ); ?></span>
				</a>
			<?php endif; ?>
		</div>
	</div>
</header>
