<?php
namespace Fuse\Components;

wp_nav_menu(
	array(

		'theme_location' 	=> 'mobile',
		'menu_class' 	 	=> 'c-menu c-menu--mobile',
		'container' 	 	=> false,
    	'menu_id'        	=> 'mobile-menu',
    	'echo'              => true,
    	'before'            => '',
	    'after'             => '',
	    'link_before'       => '',
	    'link_after'        => '',
	    'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	    'depth'             => 0
	)
);
