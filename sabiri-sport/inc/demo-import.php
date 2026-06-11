<?php
/**
 * Sabiri Sport — Installateur de contenu de démonstration
 * Crée en 1 clic : catégories, sous-catégories, produits phares,
 * page d'accueil, menus et réglages WooCommerce (MAD).
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ---------- Page d'admin ---------- */
add_action( 'admin_menu', function () {
	add_menu_page(
		__( 'Sabiri Sport', 'sabiri-sport' ),
		__( 'Sabiri Sport', 'sabiri-sport' ),
		'manage_options',
		'sabiri-setup',
		'sabiri_render_setup_page',
		'dashicons-superhero',
		59
	);
} );

function sabiri_render_setup_page() {
	$done    = get_option( 'sabiri_demo_installed' );
	$has_wc  = class_exists( 'WooCommerce' );
	?>
	<div class="wrap">
		<h1>⚡ Sabiri Sport — Installation de la boutique</h1>

		<?php if ( ! $has_wc ) : ?>
			<div class="notice notice-error"><p><strong><?php esc_html_e( 'WooCommerce n\'est pas activé.', 'sabiri-sport' ); ?></strong> <?php esc_html_e( 'Installez et activez WooCommerce d\'abord (Extensions → Ajouter → WooCommerce).', 'sabiri-sport' ); ?></p></div>
			<?php return; ?>
		<?php endif; ?>

		<?php if ( isset( $_GET['sabiri_done'] ) ) : ?>
			<div class="notice notice-success"><p><strong>✅ <?php esc_html_e( 'Démo installée avec succès !', 'sabiri-sport' ); ?></strong> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank"><?php esc_html_e( 'Voir le site', 'sabiri-sport' ); ?> →</a></p></div>
		<?php endif; ?>

		<div class="card" style="max-width:680px;padding:10px 24px 24px">
			<h2><?php esc_html_e( 'Installer le contenu de démonstration', 'sabiri-sport' ); ?></h2>
			<p><?php esc_html_e( 'En un clic, ce bouton crée automatiquement :', 'sabiri-sport' ); ?></p>
			<ul style="list-style:disc;padding-left:20px">
				<li><?php esc_html_e( '6 catégories : MMA & UFC, Boxing & Kickboxing, Football, Rugby, CrossFit & Fitness, Médailles & Trophées', 'sabiri-sport' ); ?></li>
				<li><?php esc_html_e( 'Sous-catégories Médailles (Or, Argent, Bronze, Coupes) et Récupération & Protection (Genouillères, Protège-cou, Bandes élastiques, Ceintures de sudation, Accessoires)', 'sabiri-sport' ); ?></li>
				<li><?php esc_html_e( '6 produits phares : Gants MMA UFC (419 MAD), Gants Boxe (399 MAD), Kimono Karaté (599 MAD), Équipement Football (279 MAD), Ballon Rugby (250 MAD), Médaille d\'Or (89 MAD) — avec notes 5★', 'sabiri-sport' ); ?></li>
				<li><?php esc_html_e( 'Page d\'accueil + page Contact, réglage « page statique »', 'sabiri-sport' ); ?></li>
				<li><?php esc_html_e( 'Menu principal et menu pied de page', 'sabiri-sport' ); ?></li>
				<li><?php esc_html_e( 'Devise : Dirham marocain (MAD) + paiement à la livraison activé', 'sabiri-sport' ); ?></li>
			</ul>
			<?php if ( $done ) : ?>
				<p><em>ℹ️ <?php esc_html_e( 'La démo a déjà été installée. Relancer ne créera pas de doublons.', 'sabiri-sport' ); ?></em></p>
			<?php endif; ?>
			<form method="post">
				<?php wp_nonce_field( 'sabiri_install_demo' ); ?>
				<p><button type="submit" name="sabiri_install_demo" class="button button-primary button-hero">🚀 <?php esc_html_e( 'Installer la démo maintenant', 'sabiri-sport' ); ?></button></p>
			</form>
			<hr>
			<h3><?php esc_html_e( 'Étape suivante : les images 📸', 'sabiri-sport' ); ?></h3>
			<p><?php esc_html_e( 'Les images ne peuvent pas être générées automatiquement. Ajoutez les vôtres :', 'sabiri-sport' ); ?></p>
			<ol style="padding-left:20px">
				<li><?php esc_html_e( 'Produits → Catégories → modifier chaque catégorie → « Miniature »', 'sabiri-sport' ); ?></li>
				<li><?php esc_html_e( 'Produits → modifier chaque produit → « Image produit »', 'sabiri-sport' ); ?></li>
				<li><?php esc_html_e( 'Apparence → Personnaliser → Section Hero → « Image de fond du Hero »', 'sabiri-sport' ); ?></li>
			</ol>
		</div>
	</div>
	<?php
}

/* ---------- Traitement ---------- */
add_action( 'admin_init', function () {
	if ( ! isset( $_POST['sabiri_install_demo'] ) ) return;
	if ( ! current_user_can( 'manage_options' ) ) return;
	check_admin_referer( 'sabiri_install_demo' );
	if ( ! class_exists( 'WooCommerce' ) ) return;

	sabiri_install_demo_content();
	update_option( 'sabiri_demo_installed', 1 );
	wp_safe_redirect( admin_url( 'admin.php?page=sabiri-setup&sabiri_done=1' ) );
	exit;
} );

function sabiri_demo_cat( $name, $slug, $parent = 0 ) {
	$existing = get_term_by( 'slug', $slug, 'product_cat' );
	if ( $existing ) return (int) $existing->term_id;
	$res = wp_insert_term( $name, 'product_cat', array( 'slug' => $slug, 'parent' => $parent ) );
	return is_wp_error( $res ) ? 0 : (int) $res['term_id'];
}

function sabiri_install_demo_content() {

	/* --- Catégories principales --- */
	$main_cats = array(
		'MMA & UFC'           => 'mma-ufc',
		'Boxing & Kickboxing' => 'boxing-kickboxing',
		'Football'            => 'football',
		'Rugby'               => 'rugby',
		'CrossFit & Fitness'  => 'crossfit-fitness',
		'Médailles & Trophées'=> 'medailles-trophees',
	);
	$cat_ids = array();
	foreach ( $main_cats as $name => $slug ) {
		$cat_ids[ $slug ] = sabiri_demo_cat( $name, $slug );
	}

	/* --- Sous-catégories Médailles --- */
	foreach ( array(
		'Médailles d\'Or'     => 'medailles-or',
		'Médailles d\'Argent' => 'medailles-argent',
		'Médailles de Bronze' => 'medailles-bronze',
		'Coupes & Trophées'   => 'coupes-trophees',
	) as $name => $slug ) {
		sabiri_demo_cat( $name, $slug, $cat_ids['medailles-trophees'] );
	}

	/* --- Récupération & Protection + sous-catégories --- */
	$recov_id = sabiri_demo_cat( 'Récupération & Protection', 'recuperation-protection' );
	foreach ( array(
		'Genouillères'              => 'genouilleres',
		'Protège-cou'               => 'protege-cou',
		'Bandes élastiques'         => 'bandes-elastiques',
		'Ceintures de sudation'     => 'ceintures-sudation',
		'Accessoires récupération'  => 'accessoires-recuperation',
	) as $name => $slug ) {
		sabiri_demo_cat( $name, $slug, $recov_id );
	}

	/* --- Produits phares --- */
	$products = array(
		array( 'Gants MMA UFC',        419, 'mma-ufc',            'Gants MMA professionnels, qualité compétition. Protection optimale et grip parfait.' ),
		array( 'Gants Boxe',           399, 'boxing-kickboxing',  'Gants de boxe premium en cuir, rembourrage haute densité pour l\'entraînement et le combat.' ),
		array( 'Kimono Karaté',        599, 'boxing-kickboxing',  'Kimono de karaté professionnel, tissu résistant et confortable, toutes tailles disponibles.' ),
		array( 'Équipement Football',  279, 'football',           'Pack équipement football complet : maillot, short et chaussettes de qualité professionnelle.' ),
		array( 'Ballon Rugby',         250, 'rugby',              'Ballon de rugby officiel, grip optimal, idéal pour matchs et entraînements.' ),
		array( 'Médaille d\'Or',        89, 'medailles-trophees', 'Médaille d\'or premium avec ruban, parfaite pour récompenser vos champions.' ),
	);

	foreach ( $products as $p ) {
		list( $name, $price, $cat_slug, $desc ) = $p;
		$exists = get_posts( array( 'post_type' => 'product', 'title' => $name, 'post_status' => 'any', 'numberposts' => 1, 'fields' => 'ids' ) );
		if ( $exists ) continue;

		$product = new WC_Product_Simple();
		$product->set_name( $name );
		$product->set_regular_price( (string) $price );
		$product->set_description( $desc );
		$product->set_short_description( $desc );
		$product->set_status( 'publish' );
		$product->set_featured( true );
		$product->set_stock_status( 'instock' );
		if ( ! empty( $cat_ids[ $cat_slug ] ) ) {
			$product->set_category_ids( array( $cat_ids[ $cat_slug ] ) );
		}
		$pid = $product->save();

		// Note 5★ de démo
		update_post_meta( $pid, '_wc_average_rating', '5' );
		update_post_meta( $pid, '_wc_review_count', wp_rand( 12, 64 ) );
		update_post_meta( $pid, '_wc_rating_count', array( 5 => wp_rand( 12, 64 ) ) );
	}

	/* --- Pages --- */
	$home_id = 0;
	$home = get_page_by_path( 'accueil' );
	if ( $home ) {
		$home_id = $home->ID;
	} else {
		$home_id = wp_insert_post( array(
			'post_title'  => 'Accueil',
			'post_name'   => 'accueil',
			'post_status' => 'publish',
			'post_type'   => 'page',
		) );
	}

	$contact = get_page_by_path( 'contact' );
	$contact_id = $contact ? $contact->ID : wp_insert_post( array(
		'post_title'   => 'Contact',
		'post_name'    => 'contact',
		'post_status'  => 'publish',
		'post_type'    => 'page',
		'post_content' => "<h2>Contactez-nous</h2>\n<p>Téléphone / WhatsApp : +212 6 XX XX XX XX</p>\n<p>Email : contact@sabirisport.ma</p>\n<p>Maroc — Livraison dans toutes les villes.</p>",
	) );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home_id );

	/* --- Menus --- */
	$menu_id = wp_get_nav_menu_object( 'Menu principal' );
	if ( ! $menu_id ) {
		$menu_id = wp_create_nav_menu( 'Menu principal' );

		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Accueil', 'menu-item-object' => 'page', 'menu-item-object-id' => $home_id, 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Boutique', 'menu-item-object' => 'page', 'menu-item-object-id' => wc_get_page_id( 'shop' ), 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );

		foreach ( array( 'Sports de combat' => 'boxing-kickboxing', 'Football' => 'football', 'CrossFit' => 'crossfit-fitness' ) as $label => $slug ) {
			$term = get_term_by( 'slug', $slug, 'product_cat' );
			if ( $term ) {
				wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => $label, 'menu-item-object' => 'product_cat', 'menu-item-object-id' => $term->term_id, 'menu-item-type' => 'taxonomy', 'menu-item-status' => 'publish' ) );
			}
		}
		wp_update_nav_menu_item( $menu_id, 0, array( 'menu-item-title' => 'Contact', 'menu-item-object' => 'page', 'menu-item-object-id' => $contact_id, 'menu-item-type' => 'post_type', 'menu-item-status' => 'publish' ) );

		$locations = get_theme_mod( 'nav_menu_locations', array() );
		$locations['primary'] = is_object( $menu_id ) ? $menu_id->term_id : $menu_id;
		$locations['footer']  = is_object( $menu_id ) ? $menu_id->term_id : $menu_id;
		set_theme_mod( 'nav_menu_locations', $locations );
	}

	/* --- Réglages WooCommerce --- */
	update_option( 'woocommerce_currency', 'MAD' );
	update_option( 'woocommerce_default_country', 'MA' );
	update_option( 'woocommerce_currency_pos', 'right_space' );

	// Paiement à la livraison
	$cod = get_option( 'woocommerce_cod_settings', array() );
	$cod['enabled'] = 'yes';
	$cod['title']   = 'Paiement à la livraison';
	update_option( 'woocommerce_cod_settings', $cod );
}
