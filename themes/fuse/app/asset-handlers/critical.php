<?php
namespace Fuse\AssetHandler;

/**
 * Loop over each file specified in the array and inject
 * it into our page.
 *
 * Note that the file type, either script || tag must be defined as the array item value
 * for the file we are injecting
 *
 */
function inject_critical_files( array $files ){

    // Bail if no files are passed
    if( ! $files )
        return;

	foreach( $files as $file => $tag ){

        // Get the asset we need to inject form the asset manifest
		$critical 	= get_asset_from_manifest( $file, false );

        // If the file doesn't exist, bail
        if( ! file_exists( $critical ))
            return;

        // Echo the file out
		echo "<{$tag}>".file_get_contents( $critical )."</{$tag}>";

    }

}