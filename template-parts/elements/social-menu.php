<?php
wp_nav_menu(
	array(
		'theme_location' => 'social',
		'menu_class'     => 'social-menu',
		'container'      => false,
		'items_wrap'     => '<ul id="social-list" class="%2$s">%3$s</ul>',
		'fallback_cb'    => '__return_empty_string',
	)
);
