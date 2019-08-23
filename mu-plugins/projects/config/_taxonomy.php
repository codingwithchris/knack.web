<?php
namespace Knack\Projects;

return [

	'taxonomy' => [

		/**
		 * Type Taxonomy
		 */
		'type' => [

			'names' => [

				'name' 		=> 'type',
			    'singular' 	=> 'Type',
			    'plural' 	=> 'Types',
				'slug' 		=> 'type',

			],

			'options' => [

				'hierarchical'		=> true,
				'query_var'			=> true,
				'rewrite'			=>[

				 	'slug' 			=> 'type',
				 	'with_front'	=> false

				 ],
				 'show_admin_column'	=> true,
				 'show_ui'				=> true,
				 'show_in_rest'			=> true,

			],

			'labels' => [

				'edit_item'			=>  'Edit type',
				'add_new_item'		=>  'Add new type',
				'new_item_name'		=>  'New type name',

			],

			'filters' => [


			],

			'columns' => [



			]

		],

		/**
		 * Project Category Taxonomy
		 */
		'project_category' => [

			'names' => [

				'name' 		=> 'project_category',
			    'singular' 	=> 'Category',
			    'plural' 	=> 'Categories',
				'slug' 		=> 'project-category',

			],

			'options' => [

				'hierarchical'		=> true,
				'query_var'			=> true,
				'rewrite'			=>[

				 	'slug' 			=> 'project-category',
				 	'with_front'	=> false

				 ],
				 'show_admin_column'	=> true,
				 'show_ui'				=> true,
				 'show_in_rest'			=> true,

			],

			'labels' => [

				'edit_item'			=>  'Edit project category',
				'add_new_item'		=>  'Add new project category',
				'new_item_name'		=>  'New project category name',

			],

			'filters' => [


			],

			'columns' => [



			]

		],

		/**
		 * Featured Taxonomy
		 */
		'featured' => [

			'names' => [

				'name' 		=> 'featured',
			    'singular' 	=> 'Featured',
			    'plural' 	=> 'Featured',
				'slug' 		=> 'featured',

			],

			'options' => [

				'hierarchical'		=> true,
				'query_var'			=> true,
				'rewrite'			=> false,
				'show_admin_column'	=> true,
				'show_ui'			=> true,
				'show_in_rest'		=> true,

			],

			'labels' => [

				'edit_item'			=>  'Edit featured',
				'add_new_item'		=>  'Add new featured',
				'new_item_name'		=>  'New featured name',

			],

			'filters' => [


			],

			'columns' => [



			]

		],

	],

];
