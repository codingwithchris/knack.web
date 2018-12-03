<?php

wp_nav_menu(

	array(

		'theme_location' 	=> 'primary',
		'menu_class' 	 	=> 'c-menu c-menu--primary',
		'container' 	 	=> false,
    	'menu_id'        	=> 'primary-menu',
    	'echo'              => true,
    	'before'            => '',
	    'after'             => '',
	    'link_before'       => '',
	    'link_after'        => '',
	    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'depth'             => 0

	)
);