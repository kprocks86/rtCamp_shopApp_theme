<footer>

	<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
		<?php dynamic_sidebar( 'footer-1' ) ?>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
		<?php dynamic_sidebar( 'footer-2' ) ?>
	<?php endif; ?>
	<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
		<?php dynamic_sidebar( 'footer-3' ) ?>
	<?php endif; ?>
    <p>&copy; 2017, shopApp</p>
</footer>
<?php wp_footer(); ?>

</html>
