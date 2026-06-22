<?php
/**
 * IPTV Trusted theme functions.
 *
 * The page markup, CSS and JS are kept EXACTLY as the original single-page
 * design (inside header.php / index.php / footer.php). Nothing visual was
 * changed. This file only ADDS the ability to replace every image and video
 * straight from the WordPress Customizer (Appearance → Customize →
 * "IPTV Trusted — Media"). Each control defaults to the original media, so
 * the site looks identical until you upload your own.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // No direct access.

/* -------------------------------------------------------------------------
 * Theme setup
 * ---------------------------------------------------------------------- */
function iptv_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'iptv_setup' );

/* -------------------------------------------------------------------------
 * Helper for asset URLs inside the theme /assets/ folder.
 *   <img src="<?php echo iptv_asset('images/movies.jpg'); ?>">
 * ---------------------------------------------------------------------- */
function iptv_asset( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}

/* -------------------------------------------------------------------------
 * Media helper used by the templates.
 *
 *   iptv_media( 'iptv_video_1', 'https://.../default.mp4' )
 *
 * Returns the Customizer value when set, otherwise the original default.
 * Works for BOTH:
 *   - WP_Customize_Image_Control  -> stores a URL  (string)
 *   - WP_Customize_Media_Control  -> stores an ID  (numeric, resolved here)
 * ---------------------------------------------------------------------- */
function iptv_media( $key, $default = '' ) {
	$val = get_theme_mod( $key, $default );
	if ( is_numeric( $val ) ) {
		$url = wp_get_attachment_url( (int) $val );
		if ( $url ) {
			return esc_url( $url );
		}
	}
	return esc_url( $val );
}

/* -------------------------------------------------------------------------
 * Customizer — register every editable image / video.
 *
 * Defaults below MUST match the URLs currently hardcoded in the templates,
 * so nothing changes visually until the user uploads their own media.
 * ---------------------------------------------------------------------- */
function iptv_customize_register( $wp_customize ) {

	// One panel to hold all media sections.
	$wp_customize->add_panel( 'iptv_media_panel', array(
		'title'       => __( 'IPTV Trusted — Media', 'iptv-trusted' ),
		'description' => __( 'Replace any image or video used on the page. Each field already shows the current media as default.', 'iptv-trusted' ),
		'priority'    => 30,
	) );

	$tpl = get_template_directory_uri();

	/*
	 * Map of all media slots:
	 *   section id => array( title, array( setting_key => array( label, default, type ) ) )
	 * type: 'image' uses the image uploader (URL); 'video' uses the media uploader filtered to video.
	 */
	$sections = array(

		'iptv_sec_logo' => array(
			'Logo',
			array(
				'iptv_footer_logo' => array( 'Footer logo', 'https://s3-eu-west-1.amazonaws.com/tpd/logos/690ba9cc3ef46c785bd2c9c6/0x0.png', 'image' ),
			),
		),

		'iptv_sec_hero' => array(
			'Hero — Avatars',
			array(
				'iptv_hero_avatar_1' => array( 'Hero avatar 1', 'https://randomuser.me/api/portraits/men/32.jpg', 'image' ),
				'iptv_hero_avatar_2' => array( 'Hero avatar 2', 'https://randomuser.me/api/portraits/women/44.jpg', 'image' ),
				'iptv_hero_avatar_3' => array( 'Hero avatar 3', 'https://randomuser.me/api/portraits/men/51.jpg', 'image' ),
				'iptv_hero_avatar_4' => array( 'Hero avatar 4', 'https://randomuser.me/api/portraits/women/68.jpg', 'image' ),
			),
		),

		'iptv_sec_posters' => array(
			'Categories — Posters',
			array(
				'iptv_poster_sports'        => array( 'Sports poster', 'https://img.magnific.com/vecteurs-libre/concept-equipement-sport_1284-13034.jpg?semt=ais_hybrid&w=740&q=80', 'image' ),
				'iptv_poster_movies'        => array( 'Movies poster', 'https://metrofilms.com/media/120x160+LFDM+Salles+07_11.61fd378d-a704-445a-87ba-03d685c52740.jpg', 'image' ),
				'iptv_poster_series'        => array( 'Series poster', $tpl . '/images/series.jpg', 'image' ),
				'iptv_poster_kids'          => array( 'Kids poster', $tpl . '/images/kids.jpg', 'image' ),
				'iptv_poster_entertainment' => array( 'Entertainment poster', $tpl . '/images/entertainment.jpg', 'image' ),
				'iptv_poster_documentaries' => array( 'Documentaries poster', $tpl . '/images/documentaries.jpg', 'image' ),
			),
		),

		'iptv_sec_videos' => array(
			'UGC — Videos',
			array(
				'iptv_video_1' => array( 'Video 1 (Firestick setup)', 'https://darkred-gazelle-929999.hostingersite.com/wp-content/uploads/2026/06/snaptik_7652478384852749598_v3.mp4', 'video' ),
				'iptv_video_2' => array( 'Video 2 (Premier League)', 'https://darkred-gazelle-929999.hostingersite.com/wp-content/uploads/video2.mp4', 'video' ),
				'iptv_video_3' => array( 'Video 3 (Smart TV)', 'https://darkred-gazelle-929999.hostingersite.com/wp-content/uploads/video3.mp4', 'video' ),
				'iptv_video_4' => array( 'Video 4 (Boxing night)', 'https://darkred-gazelle-929999.hostingersite.com/wp-content/uploads/video4.mp4', 'video' ),
			),
		),

		'iptv_sec_reviews' => array(
			'Reviews — Avatars',
			array(
				'iptv_review_avatar_1'  => array( 'Review avatar 1', 'https://randomuser.me/api/portraits/men/1.jpg', 'image' ),
				'iptv_review_avatar_2'  => array( 'Review avatar 2', 'https://randomuser.me/api/portraits/men/11.jpg', 'image' ),
				'iptv_review_avatar_3'  => array( 'Review avatar 3', 'https://randomuser.me/api/portraits/men/32.jpg', 'image' ),
				'iptv_review_avatar_4'  => array( 'Review avatar 4', 'https://randomuser.me/api/portraits/men/45.jpg', 'image' ),
				'iptv_review_avatar_5'  => array( 'Review avatar 5', 'https://randomuser.me/api/portraits/men/51.jpg', 'image' ),
				'iptv_review_avatar_6'  => array( 'Review avatar 6', 'https://randomuser.me/api/portraits/men/63.jpg', 'image' ),
				'iptv_review_avatar_7'  => array( 'Review avatar 7', 'https://randomuser.me/api/portraits/men/72.jpg', 'image' ),
				'iptv_review_avatar_8'  => array( 'Review avatar 8', 'https://randomuser.me/api/portraits/men/85.jpg', 'image' ),
				'iptv_review_avatar_9'  => array( 'Review avatar 9', 'https://randomuser.me/api/portraits/men/91.jpg', 'image' ),
				'iptv_review_avatar_10' => array( 'Review avatar 10', 'https://randomuser.me/api/portraits/men/15.jpg', 'image' ),
				'iptv_review_avatar_11' => array( 'Review avatar 11', 'https://randomuser.me/api/portraits/men/22.jpg', 'image' ),
				'iptv_review_avatar_12' => array( 'Review avatar 12', 'https://randomuser.me/api/portraits/men/38.jpg', 'image' ),
			),
		),

		'iptv_sec_whatsapp' => array(
			'WhatsApp Proof',
			array(
				'iptv_wa_support' => array( 'Support chat (large)', 'https://appollo-tv.com/wp-content/uploads/2024/01/testimoni3.jpg', 'image' ),
				'iptv_wa_chat_1'  => array( 'Chat screenshot 1', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni4-min.jpg.webp', 'image' ),
				'iptv_wa_chat_2'  => array( 'Chat screenshot 2', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni3-min.jpg.webp', 'image' ),
				'iptv_wa_chat_3'  => array( 'Chat screenshot 3', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni2-min.jpg.webp', 'image' ),
				'iptv_wa_chat_4'  => array( 'Chat screenshot 4', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni1-min.jpg.webp', 'image' ),
				'iptv_wa_chat_5'  => array( 'Chat screenshot 5', 'https://appollo-tv.com/wp-content/uploads/2024/01/testimoni3.jpg', 'image' ),
				'iptv_wa_chat_6'  => array( 'Chat screenshot 6', 'https://appollo-tv.com/wp-content/uploads/2024/01/testimoni6.jpg', 'image' ),
				'iptv_wa_chat_7'  => array( 'Chat screenshot 7', 'https://roomipty.com/wp-content/uploads/2025/08/testimoni3-min.jpg.webp', 'image' ),
				'iptv_wa_chat_8'  => array( 'Chat screenshot 8', 'https://appollo-tv.com/wp-content/uploads/2024/01/testimoni5.jpg', 'image' ),
			),
		),
	);

	$priority = 10;
	foreach ( $sections as $section_id => $section ) {
		list( $section_title, $controls ) = $section;

		$wp_customize->add_section( $section_id, array(
			'title'    => $section_title,
			'panel'    => 'iptv_media_panel',
			'priority' => $priority++,
		) );

		foreach ( $controls as $setting_key => $control ) {
			list( $label, $default, $type ) = $control;

			$wp_customize->add_setting( $setting_key, array(
				'default'           => $default,
				'sanitize_callback' => 'esc_url_raw',
				'transport'         => 'refresh',
			) );

			if ( 'video' === $type ) {
				// Media uploader limited to video files (stores attachment ID).
				$wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, $setting_key, array(
					'label'       => $label,
					'section'     => $section_id,
					'mime_type'   => 'video',
					'description' => __( 'Upload or pick a video. Leave empty to keep the current one.', 'iptv-trusted' ),
				) ) );
			} else {
				// Image uploader (stores URL).
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_key, array(
					'label'   => $label,
					'section' => $section_id,
				) ) );
			}
		}
	}
}
add_action( 'customize_register', 'iptv_customize_register' );

/*
 * NOTE on video settings: WP_Customize_Media_Control stores an attachment ID,
 * but the default is a URL string. The iptv_media() helper handles both, and
 * esc_url_raw keeps URL defaults intact. When the user picks a video from the
 * media library the stored ID is resolved back to its URL automatically.
 */
