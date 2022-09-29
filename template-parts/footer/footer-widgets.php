<?php
if ( is_active_sidebar( 'footer-sidebar-1' ) || is_active_sidebar( 'footer-sidebar-2' )) { ?>

	<aside class="site-footer__widgets">

        <?php if ( is_active_sidebar( 'footer-sidebar-1' )) { ?>
            <?php dynamic_sidebar( 'footer-sidebar-1' ); ?>
        <?php } ?>

        <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ) { ?>
            <?php dynamic_sidebar( 'footer-sidebar-2' ); ?>
        <?php } ?>

        <?php get_template_part( 'template-parts/elements/nav', 'widget', array('class_name' => 'site-footer__nav-widget black') ); ?>
	</aside>
    <!-- .footer-widgets-outer-wrapper -->

<?php } ?>