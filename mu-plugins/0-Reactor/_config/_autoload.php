<?php
namespace Reactor;

return [

	'files' => [

		// Helpers
		'_helpers/strings',
		'_helpers/arrays',
		'_helpers/urls',
		'_helpers/query-strings',
		'_helpers/checks',
		'_helpers/colors',
		'_helpers/images',
		'_helpers/posts',

		// Security
		'security/security',

		// Optimizations
		'optimize/admin',
		'optimize/clean',
		'optimize/disable-asset-versioning',
		'optimize/general',
		'optimize/remove-embeds',

		// Integrations,
		'integrations/acf/acf',
		'integrations/gforms/gforms',
		'integrations/woocommerce/woocommerce',

		// Factories
		'factories/class.module-factory',
		'factories/class.shortcode-factory'
	]

];