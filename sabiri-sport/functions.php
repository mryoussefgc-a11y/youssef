<?php
/**
 * Sabiri Sport — fonctions du thème
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'SABIRI_VERSION', '1.1.4' );

require get_template_directory() . '/inc/demo-import.php';

/* ---------- Supports du thème ---------- */
add_action( 'after_setup_theme', function () {
	load_theme_textdomain( 'sabiri-sport', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'align-wide' );

	// WooCommerce
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );

	register_nav_menus( array(
		'primary' => __( 'Menu principal', 'sabiri-sport' ),
		'footer'  => __( 'Menu pied de page', 'sabiri-sport' ),
	) );

	add_image_size( 'sabiri-category', 400, 500, true );
	add_image_size( 'sabiri-product', 600, 600, true );
} );

/* ---------- Désactiver les styles de mise en page par défaut de WooCommerce ---------- */
// Évite les conflits (float/columns) avec notre grille personnalisée.
add_filter( 'woocommerce_enqueue_styles', function ( $styles ) {
	unset( $styles['woocommerce-layout'] );
	unset( $styles['woocommerce-smallscreen'] );
	return $styles;
} );

/* ---------- Scripts & styles ---------- */
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'sabiri-fonts', 'https://fonts.googleapis.com/css2?family=Oswald:wght@500;600;700&family=Inter:wght@400;500;600;700&display=swap', array(), null );
	wp_enqueue_style( 'sabiri-main', get_template_directory_uri() . '/assets/css/main.css', array(), SABIRI_VERSION );
	wp_enqueue_style( 'sabiri-style', get_stylesheet_uri(), array( 'sabiri-main' ), SABIRI_VERSION );
	wp_enqueue_script( 'sabiri-main', get_template_directory_uri() . '/assets/js/main.js', array(), SABIRI_VERSION, true );
} );

/* ---------- Widgets / sidebars ---------- */
add_action( 'widgets_init', function () {
	register_sidebar( array(
		'id'            => 'shop-sidebar',
		'name'          => __( 'Sidebar Boutique (filtres)', 'sabiri-sport' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
} );

/* ---------- WooCommerce : réglages d'affichage ---------- */
// 4 produits par ligne sur desktop
add_filter( 'loop_shop_columns', function () { return 4; } );
add_filter( 'loop_shop_per_page', function () { return 12; } );

// Retirer les wrappers par défaut et utiliser les nôtres
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_before_main_content', function () {
	echo '<div class="container shop-container"><main class="shop-main">';
}, 10 );
add_action( 'woocommerce_after_main_content', function () {
	echo '</main></div>';
}, 10 );

// Fragment AJAX du compteur panier
add_filter( 'woocommerce_add_to_cart_fragments', function ( $fragments ) {
	$fragments['span.cart-count'] = '<span class="cart-count">' . WC()->cart->get_cart_contents_count() . '</span>';
	return $fragments;
} );

/* ---------- Traductions de secours (si le pack FR de WooCommerce n'est pas installé) ---------- */
add_filter( 'gettext', function ( $translated, $text, $domain ) {
	if ( 'woocommerce' !== $domain ) return $translated;
	$fr = array(
		'Add to cart'        => 'Ajouter au panier',
		'Read more'          => 'Lire la suite',
		'%s customer review' => '%s avis client',
		'%s customer reviews'=> '%s avis clients',
		'Select options'     => 'Choisir les options',
		'Sale!'              => 'Promo !',
		'In stock'           => 'En stock',
		'Out of stock'       => 'Rupture de stock',
		'Related products'   => 'Produits similaires',
		'Description'        => 'Description',
		'Reviews'            => 'Avis',
		'Additional information' => 'Informations complémentaires',
		'Category:'          => 'Catégorie :',
		'Categories:'        => 'Catégories :',
		'Shop'               => 'Boutique',
	);
	return $fr[ $text ] ?? $translated;
}, 20, 3 );

/* ---------- Helper : produits mis en avant ---------- */
function sabiri_get_featured_products( $limit = 6 ) {
	if ( ! class_exists( 'WooCommerce' ) ) return array();
	return wc_get_products( array(
		'limit'      => $limit,
		'featured'   => true,
		'status'     => 'publish',
	) );
}

/* ---------- Personnalisation (Customizer) ---------- */
add_action( 'customize_register', function ( $wp_customize ) {
	$wp_customize->add_section( 'sabiri_hero', array(
		'title'    => __( 'Section Hero (Accueil)', 'sabiri-sport' ),
		'priority' => 30,
	) );

	$fields = array(
		'sabiri_hero_kicker'   => array( __( 'Petit texte au-dessus du titre', 'sabiri-sport' ), 'LA PERFORMANCE COMMENCE ICI' ),
		'sabiri_hero_title_1'  => array( __( 'Titre — ligne 1', 'sabiri-sport' ), 'ÉQUIPEMENTS' ),
		'sabiri_hero_title_2'  => array( __( 'Titre — ligne 2 (en bleu)', 'sabiri-sport' ), 'SPORTIFS' ),
		'sabiri_hero_title_3'  => array( __( 'Titre — ligne 3', 'sabiri-sport' ), 'PROFESSIONNELS' ),
		'sabiri_hero_subtitle' => array( __( 'Sous-titre', 'sabiri-sport' ), 'MMA · BOXE · FOOTBALL · RUGBY · CROSSFIT · MÉDAILLES & COUPES' ),
		'sabiri_whatsapp'      => array( __( 'Numéro WhatsApp (ex: 212612345678)', 'sabiri-sport' ), '' ),
		'sabiri_instagram'     => array( __( 'Lien Instagram', 'sabiri-sport' ), '' ),
		'sabiri_facebook'      => array( __( 'Lien Facebook', 'sabiri-sport' ), '' ),
		'sabiri_tiktok'        => array( __( 'Lien TikTok', 'sabiri-sport' ), '' ),
		'sabiri_phone'         => array( __( 'Téléphone affiché', 'sabiri-sport' ), '+212 6 12 34 56 78' ),
		'sabiri_email'         => array( __( 'Email de contact', 'sabiri-sport' ), 'contact@sabirisport.ma' ),
		'sabiri_address'       => array( __( 'Adresse', 'sabiri-sport' ), 'Casablanca, Maroc' ),
		'sabiri_medals_slug'   => array( __( 'Slug catégorie parente — Médailles & Récompenses', 'sabiri-sport' ), 'medailles-trophees' ),
		'sabiri_recovery_slug' => array( __( 'Slug catégorie parente — Récupération & Protection', 'sabiri-sport' ), 'recuperation-protection' ),
		'sabiri_instagram_images' => array( __( 'IDs des images Instagram (séparés par des virgules, ex: 12,15,18)', 'sabiri-sport' ), '' ),
	);

	foreach ( $fields as $id => $data ) {
		$wp_customize->add_setting( $id, array( 'default' => $data[1], 'sanitize_callback' => 'sanitize_text_field' ) );
		$wp_customize->add_control( $id, array( 'label' => $data[0], 'section' => 'sabiri_hero', 'type' => 'text' ) );
	}

	$wp_customize->add_setting( 'sabiri_hero_image', array( 'sanitize_callback' => 'esc_url_raw' ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'sabiri_hero_image', array(
		'label'   => __( 'Image de fond du Hero', 'sabiri-sport' ),
		'section' => 'sabiri_hero',
	) ) );
} );

function sabiri_opt( $key, $default = '' ) {
	return get_theme_mod( $key, $default );
}
