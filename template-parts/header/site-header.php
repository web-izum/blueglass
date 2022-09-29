<?php
$wrapper_classes  = 'site-header';
$wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
$wrapper_classes .= has_nav_menu( 'primary' ) ? ' has-menu' : '';
?>

<header id="masthead" class="<?php echo esc_attr( $wrapper_classes ); ?>">
    <div class="container">
        <div class="site-header__wrapper">
	        <?php get_template_part( 'template-parts/elements/site', 'branding' ); ?>
	        <?php get_template_part( 'template-parts/header/site', 'nav' ); ?>

            <button class="site-header__hamburger" type="button" aria-label="<?php __('Open site menu', 'blueglass') ?>">
	            <?php blueglass_the_theme_svg( 'hamburger' ); ?>
            </button>
        </div>
    </div>
</header>
<!-- #masthead -->