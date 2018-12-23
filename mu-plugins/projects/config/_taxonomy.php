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
		 * Industry Taxonomy
		 */
		'industry' => [

			'names' => [

				'name' 		=> 'industry',
			    'singular' 	=> 'Industry',
			    'plural' 	=> 'Industries',
				'slug' 		=> 'industry',

			],

			'options' => [

				'hierarchical'		=> true,
				'query_var'			=> true,
				'rewrite'			=>[

				 	'slug' 			=> 'industry',
				 	'with_front'	=> false

				 ],
				 'show_admin_column'	=> true,
				 'show_ui'				=> true,
				 'show_in_rest'			=> true,

			],

			'labels' => [

				'edit_item'			=>  'Edit industry',
				'add_new_item'		=>  'Add new industry',
				'new_item_name'		=>  'New industry name',

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
