<?php

if(! class_exists( 'Register_nav_menu' )) :

class Register_nav_menu {

	public $location;

	public function __construct(array $location = [])
	{
		$this->location = $location;

		if (empty($location)) return;

		add_action( 'init', [$this, 'register_menu'] );
	}

	public function register_menu()
	{
		register_nav_menus($this->location);
	}

}

endif;