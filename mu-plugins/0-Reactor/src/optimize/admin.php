<?php
/**
 * Clean up the admin area and remove clutter
 * and functionality we don't need!
 */

namespace Reactor\Optimize\Admin;
use function \Sober\Intervention\intervention;

if( function_exists('\Sober\Intervention\intervention') ){

	intervention('remove-dashboard-items', ['all'], ['all'] );
	intervention('remove-toolbar-items', ['comments', 'logo'], ['all']);
	intervention('update-label-footer',  'Built with <3 by <a href="https://creativefuse.org" target="_blank" style="color:#BB1346">CreativeFuse</a>'  );
	intervention('remove-help-tabs');
	intervention('remove-howdy', 'Hey there,');


}

// Disable Admin File Editor
define( 'DISALLOW_FILE_EDIT', true );