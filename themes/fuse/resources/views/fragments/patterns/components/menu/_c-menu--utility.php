<?php

wp_nav_menu(
	array(

		'theme_location' 	=> 'utility',
		'menu_class' 	 	=> 'o-list--inline c-menu c-menu--utility',
		'container' 	 	=> false,
    	'menu_id'        	=> 'utility-menu',
    	'echo'              => true,
    	'before'            => '',
	    'after'             => '',
	    'link_before'       => '',
	    'link_after'        => '',
	    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	    'depth'             => 0
	)
);