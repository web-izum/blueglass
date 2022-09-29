<?php
$class_name = array_key_exists('class_name', $args) ? $args['class_name'] : ''; ?>

<b class="nav-widget <?php echo $class_name; ?>">
	<button class="nav-widget__btn" type="button" aria-label="<?php __('Book a tour', 'blueglass') ?>">
		<?php echo __('Book a tour', 'blueglass') ?>
	</button>
</b>