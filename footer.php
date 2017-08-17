<footer>
    <div class="row">
        <div class="large-4 medium-4 columns">
			<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<?php dynamic_sidebar( 'footer-1' ) ?>
			<?php endif; ?>
        </div>
        <div class="large-4 medium-4 columns">
			<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<?php dynamic_sidebar( 'footer-2' ) ?>
			<?php endif; ?>
        </div>

        <div class="large-4 medium-4 columns">
			<?php if ( has_custom_logo() ) { ?>
                <li class="menu-text" role="menuitem"><?php the_custom_logo(); ?></li>
			<?php } else { ?>
                <li><?php echo '<img src="' . get_option( "theme_rtcampOne_logo" ) . '" alt="logo">'; ?></li>
                <p>Copyrights &copy; 2017 .all rights reserved</p>
                <p>Terms of Use | Privacy Policy | Designed by kprocks</p>
			<?php } ?>
        </div>
    </div>

</footer>
<?php wp_footer(); ?>

</html>
