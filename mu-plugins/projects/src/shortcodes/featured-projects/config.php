<?php
/**
 * Next Show Shortcode Config
 *
 * @package     Knack\Projects;
 * @since       0.0.1
 * @author      nvwd
 * @license     GNU-2.0+
 */

namespace Knack\Projects;

return array(

	'shortcode_name'              => 'featured_projects',

	'do_shortcode_within_content' => true,

	'processing_function'         => __NAMESPACE__ . '\process_shortcode',

	'views'					=> [

		'featured-projects'	=> module()->get_config('views') . 'featured-projects.php',

	],

	'defaults'                    => array(

		'count'			=> 1,
		'layout'		=> '',
		'group'			=> '',
		'location'		=> '',
		'class'			=> '',

	),


);