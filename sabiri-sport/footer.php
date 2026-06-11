<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<section class="trust-bar">
	<div class="container trust-grid">
		<div class="trust-item">
			<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="2" y="6" width="20" height="13" rx="2"/><path d="M2 10h20"/></svg>
			<div><strong><?php esc_html_e( 'Paiement à la livraison', 'sabiri-sport' ); ?></strong><span><?php esc_html_e( 'Payez en toute sécurité', 'sabiri-sport' ); ?></span></div>
		</div>
		<div class="trust-item">
			<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M21 12a9 9 0 1 1-9-9"/><path d="M21 3v6h-6"/></svg>
			<div><strong><?php esc_html_e( 'Satisfait ou remboursé', 'sabiri-sport' ); ?></strong><span><?php esc_html_e( '14 jours pour changer d\'avis', 'sabiri-sport' ); ?></span></div>
		</div>
		<div class="trust-item">
			<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6z"/><path d="M9 12l2 2 4-4"/></svg>
			<div><strong><?php esc_html_e( 'Produits authentiques', 'sabiri-sport' ); ?></strong><span><?php esc_html_e( '100% Originaux & Garantis', 'sabiri-sport' ); ?></span></div>
		</div>
		<div class="trust-item">
			<svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M3 12a9 9 0 0 1 18 0v5a2 2 0 0 1-2 2h-2v-7h4M3 12v5a2 2 0 0 0 2 2h2v-7H3"/></svg>
			<div><strong><?php esc_html_e( 'Support 7/7', 'sabiri-sport' ); ?></strong><span><?php esc_html_e( 'Assistance rapide', 'sabiri-sport' ); ?></span></div>
		</div>
	</div>
</section>

<footer class="site-footer">
	<div class="container footer-grid">
		<div class="footer-col footer-about">
			<a class="site-logo-text" href="<?php echo esc_url( home_url( '/' ) ); ?>"><strong>SABIRI</strong> SPORT</a>
			<p><?php esc_html_e( 'Votre partenaire n°1 pour tous vos équipements sportifs professionnels : MMA, Boxe, Football, Rugby, CrossFit et bien plus encore.', 'sabiri-sport' ); ?></p>
		</div>

		<div class="footer-col">
			<h4><?php esc_html_e( 'Liens rapides', 'sabiri-sport' ); ?></h4>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'container'      => false,
				'menu_class'     => 'footer-menu',
				'fallback_cb'    => function () {
					echo '<ul class="footer-menu">';
					echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Accueil', 'sabiri-sport' ) . '</a></li>';
					if ( function_exists( 'wc_get_page_permalink' ) ) {
						echo '<li><a href="' . esc_url( wc_get_page_permalink( 'shop' ) ) . '">' . esc_html__( 'Boutique', 'sabiri-sport' ) . '</a></li>';
						echo '<li><a href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '">' . esc_html__( 'Mon compte', 'sabiri-sport' ) . '</a></li>';
						echo '<li><a href="' . esc_url( wc_get_cart_url() ) . '">' . esc_html__( 'Panier', 'sabiri-sport' ) . '</a></li>';
					}
					echo '</ul>';
				},
			) );
			?>
		</div>

		<div class="footer-col">
			<h4><?php esc_html_e( 'Contactez-nous', 'sabiri-sport' ); ?></h4>
			<ul class="footer-contact">
				<li><?php echo esc_html( sabiri_opt( 'sabiri_address', 'Casablanca, Maroc' ) ); ?></li>
				<li><a href="tel:<?php echo esc_attr( preg_replace( '/\s+/', '', sabiri_opt( 'sabiri_phone', '+212612345678' ) ) ); ?>"><?php echo esc_html( sabiri_opt( 'sabiri_phone', '+212 6 12 34 56 78' ) ); ?></a></li>
				<li><a href="mailto:<?php echo esc_attr( sabiri_opt( 'sabiri_email', 'contact@sabirisport.ma' ) ); ?>"><?php echo esc_html( sabiri_opt( 'sabiri_email', 'contact@sabirisport.ma' ) ); ?></a></li>
				<li><?php esc_html_e( 'Lun – Dim : 9h00 – 19h00', 'sabiri-sport' ); ?></li>
			</ul>
		</div>

		<div class="footer-col">
			<h4><?php esc_html_e( 'Suivez-nous', 'sabiri-sport' ); ?></h4>
			<div class="footer-social">
				<?php if ( sabiri_opt( 'sabiri_facebook' ) ) : ?><a href="<?php echo esc_url( sabiri_opt( 'sabiri_facebook' ) ); ?>" target="_blank" rel="noopener" aria-label="Facebook">f</a><?php endif; ?>
				<?php if ( sabiri_opt( 'sabiri_instagram' ) ) : ?><a href="<?php echo esc_url( sabiri_opt( 'sabiri_instagram' ) ); ?>" target="_blank" rel="noopener" aria-label="Instagram">◎</a><?php endif; ?>
				<?php if ( sabiri_opt( 'sabiri_tiktok' ) ) : ?><a href="<?php echo esc_url( sabiri_opt( 'sabiri_tiktok' ) ); ?>" target="_blank" rel="noopener" aria-label="TikTok">♪</a><?php endif; ?>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<div class="container">
			<p>© <?php echo esc_html( date_i18n( 'Y' ) ); ?> SABIRI SPORT — <?php esc_html_e( 'Tous droits réservés.', 'sabiri-sport' ); ?></p>
		</div>
	</div>
</footer>

<?php if ( sabiri_opt( 'sabiri_whatsapp' ) ) : ?>
<a class="whatsapp-float" href="https://wa.me/<?php echo esc_attr( sabiri_opt( 'sabiri_whatsapp' ) ); ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
	<svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5-1.3A10 10 0 1 0 12 2zm5.4 14.1c-.2.7-1.3 1.3-1.8 1.3-.5.1-1.1.1-1.7-.1-.4-.1-.9-.3-1.6-.6-2.8-1.2-4.6-4-4.8-4.2-.1-.2-1.1-1.5-1.1-2.9s.7-2 1-2.3c.2-.3.5-.3.7-.3h.5c.2 0 .4 0 .6.4l.9 2.1c.1.2.1.4 0 .6l-.4.6-.4.5c-.1.1-.3.3-.1.6.2.3.8 1.3 1.7 2.1 1.2 1.1 2.2 1.4 2.5 1.6.3.1.5.1.7-.1l1-1.2c.2-.3.4-.2.7-.1l2 1c.3.1.5.2.6.3 0 .1 0 .7-.2 1.3z"/></svg>
</a>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
