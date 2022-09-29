<?php
/*
 * @params $args: array
 * [
 *    'location':string => 'footer', default ''
 * ]
*/

$site_name    = get_bloginfo( 'name' );
$custom_logo_id = array_key_exists('location', $args) && $args['location'] === 'footer' ? get_theme_mod( 'footer_logo' ) : get_theme_mod( 'custom_logo' ); ?>

<?php if ( $custom_logo_id ) : ?>
	<div class="site-logo">
        <a class="site-logo__link" href="<?php echo get_home_url('/') ?>" aria-label="<?php __('Link to website home page', 'blueglass') ?>">
           <?php echo wp_get_attachment_image( $custom_logo_id, 'full', '', ['class'=>'site-logo__img'] ); ?>
        </a>
    </div>
<?php else : ?>
    <div class="site-name">
        <a class="site-name__link" href="<?php get_home_url('/') ?>">
            <p class="site-name__text">
                <?php echo $site_name; ?>
            </p>
        </a>
    </div>
<?php endif; ?>