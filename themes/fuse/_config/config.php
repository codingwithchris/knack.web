<?php
namespace Fuse;

// Merge all config files into a single config object
// to be loaded into our theme
return array_merge(

	include_once( __DIR__ . '/_theme.php' ),
	include_once( __DIR__ . '/_autoload.php' ),
	include_once( __DIR__ . '/_assets.php' )

);
