<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Quantum-core
 */
?>

	</div><!-- #content -->
</div> <!--- #pure grid -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
	<?php echo esc_html(get_theme_mod( 'quantum_footer_text', 'Created with WordPress' )); ?>		
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	</div><!-- #container -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
