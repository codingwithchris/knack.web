<?php
namespace Knack\Projects;

return [

	/**
	 * Register Our Shows Custom Post Type
	 */

	'post_type' => [

		'names' => [

			'name' 		=> 'projects',
		    'singular' 	=> 'Project',
		    'plural' 	=> 'Projects',
		    'slug' 		=> 'projects'

		],

		'options' => [

			'description'  => 'Knack Creative Projects',
			'public' => true,
			'publicly_queryable' => true,
			'menu_position' => 10,
			'show_ui' => true,
			'query_var' => true,
			'hierarchical' => true,
			'has_archive' => false,
			'capability_type' => 'post',

			'supports'  => [
				'title',
				'thumbnail',
				'page-attributes'
			],

			'rewrite'	=> [
		 		'slug' 			=> 'projects',
			 	'with_front'	=> false
			 ],

		],

		'labels' => [

			'edit_item'	  => 'Edit Project',
			'add_new_item' => 'Add a new Project',
			'new_item_name'  => 'New Project Name',
			'description'  => 'Knack Creative Projects',

		],

		'filters' => [

			'featured',
			'type',
			'industry',

		],

		'columns' => [


		]

	]

];