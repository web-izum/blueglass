<?php if ( has_nav_menu( 'primary' ) ) : ?>
	<nav id="site-navigation" class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary menu', 'blueglass' ); ?>">
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'menu_class'      => 'primary-navigation__wrapper',
				'container'       => false,
				'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => '__return_empty_string',
			)
		);
		?>
	</nav>
    <!-- #site-navigation -->
	<?php get_template_part( 'template-parts/elements/nav', 'widget', array('class_name' => 'primary-navigation__nav-widget') ); ?>
<?php endif; ?>

<?php if ( has_nav_menu( 'mobile' ) ) : ?>
    <nav id="mobile-site-navigation" class="mobile-navigation" aria-label="<?php esc_attr_e( 'Mobile menu', 'blueglass' ); ?>">
	    <?php get_template_part( 'template-parts/elements/close', 'btn', array('class_name' => 'mobile-navigation__close-menu') ); ?>
        <?php
		wp_nav_menu(
			array(
				'theme_location'  => 'mobile',
				'menu_class'      => 'mobile-navigation__wrapper',
				'container'       => false,
				'items_wrap'      => '<ul id="mobile-menu-list" class="%2$s">%3$s</ul>',
				'fallback_cb'     => '__return_empty_string',
			)
		);
		?>

        <?php get_template_part( 'template-parts/elements/nav', 'widget', array('class_name' => 'mobile-navigation__nav-widget') ); ?>
    </nav>
    <!-- #site-navigation -->
<?php endif; ?>
