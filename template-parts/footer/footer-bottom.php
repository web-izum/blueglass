<div class="site-footer__bottom">
    <div class="site-footer__information">
        <p class="site-footer__information-item site-footer__information-item_copyright">&copy;
		    <?php echo date_i18n( _x( 'Y', 'copyright date format', 'blueglass' ) ); ?>
		    <?php echo __( 'Tanzania', 'blueglass' ); ?>
        </p>
	    <?php the_terms_conditions_link( '<p class="site-footer__information-item site-footer__information-item_terms-conditions">', '</p>' ); ?>
	    <?php the_privacy_policy_link( '<p class="site-footer__information-item site-footer__information-item_policy">', '</p>' ); ?>
    </div>
    <?php get_template_part( 'template-parts/elements/social', 'menu' ); ?>
</div>