<?php defined( 'ABSPATH' ) || exit; ?>

</main>
</div>

<footer id="colophon" class="site-footer">

	<div class="site-info">

		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'autobiography' ) ); ?>"><?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'autobiography' ), 'WordPress' );
		?></a>

		<span class="sep"> | </span>

		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf( esc_html__( 'Theme: %1$s by %2$s.', 'autobiography' ), 'autobiography', '<a href="https://www.webmandesign.eu">WebMan Design, Oliver Juhas</a>' );
		?>

	</div>

</footer>

<?php wp_footer(); ?>

</body>

</html>
