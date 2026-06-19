<?php
/**
 * IPTV Trusted theme functions.
 * Minimal on purpose — the page markup, CSS and JS are kept exactly
 * as the original single-page design inside index.php.
 */

if ( ! defined( 'ABSPATH' ) ) { exit; } // No direct access.

/**
 * Helper for asset URLs.
 * Put your media in this theme folder under /assets/ and reference them like:
 *   <img src="<?php echo iptv_asset('images/movies.jpg'); ?>">
 *   <video src="<?php echo iptv_asset('videos/video1.mp4'); ?>">
 * (Optional — you can keep your current paths too.)
 */
function iptv_asset( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}
