<?php
    $class_name = array_key_exists('class_name', $args) ? $args['class_name'] : '';
?>

<button class="close-btn close <?php echo $class_name; ?>" aria-label="<?php __('Close site menu', 'blueglass') ?>">
	<?php blueglass_the_theme_svg( 'close-icon' ); ?>
</button>