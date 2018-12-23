<?php
namespace App;

return array(

	'project'	=> array(

		'name'					=> 'creativefuse',
		'version' 				=> '0.0.1',
		'text_domain'			=> 'fuse',
		'timezone'				=> 'America/New_York',

	),

	'author'	=> array(

		'name'	=> 'CreativeFuse',
		'email'	=> 'support@creativefuse.org',

	),

	'env' => array(

		// An array of potential dev environments
		'dev'	=> array(
			'.local',
			'.dev',
			'localhost:3000',
		),

	),

	// The custom modules we need to load
	'modules'	=> array(

		'projects'

	)

);
