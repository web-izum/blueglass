<footer id="footer" class="site-footer">
    <div class="container">
        <div class="site-footer__wrapper">
	        <?php get_template_part( 'template-parts/elements/site', 'branding', array('location' => 'footer') ); ?>
	        <?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
        </div>
	    <?php get_template_part( 'template-parts/footer/footer', 'bottom' ); ?>
    </div>
</footer>
<!-- /.site-footer -->