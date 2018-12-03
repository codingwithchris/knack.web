<?php
declare(strict_types=1);

namespace Reactor;

/**
 * Get the dominant RGB value from an image
 * NOTE that the file must come from a path (NOT a URL) on the same domain
 * the site is on in order for this to work properly
 * as it uses fopen() to open the local file.
 *
 * @link https://gist.github.com/pehbehbeh/2417222
 *
 * @param string $image the path to a .jpg image. DOES NOT WORK WITH PNG OR SVG
 * @return array the average rgb values from the image
 */
function get_dominant_image_color( string $image ) : array {

	// If no image is passed, return white rgb values
	if( ! $image )
		return [

			'r' => 255,
			'g' => 255,
			'b' => 255,
		];

	// Create the image
	$i = imagecreatefromjpeg( $image );

	for ($x=0;$x<imagesx($i);$x++) {

	    for ($y=0;$y<imagesy($i);$y++) {

	        $rgb = imagecolorat($i,$x,$y);
	        $r   = ($rgb >> 16) & 0xFF;
	        $g   = ($rgb >> 8) & 0xFF;
	        $b   = $rgb & 0xFF;

	        $rTotal += $r;
	        $gTotal += $g;
	        $bTotal += $b;
			$total++;

		}

	}

	// Get the average color value for r, g, and b
	$rAverage = round($rTotal/$total);
	$gAverage = round($gTotal/$total);
	$bAverage = round($bTotal/$total);

	// Return rgb
	return [
		'r' => $rAverage,
		'g' => $gAverage,
		'b' => $bAverage
	];

}

/**
 * Take an RGB color value and convert it to a hex value
 *
 * @link https://stackoverflow.com/questions/32962624/convert-rgb-to-hex-color-values-in-php
 *
 * @param array $rgb_color rgb color values we want to convert to hex values
 * @return string a hex color value
 */
function convert_rgb_to_hex( array $rgb_color ) : string {

	// If no color passed, return white hex value to prevent errors
	if( ! $rgb_color )
		return '#FFFFFF';

	return sprintf("#%02x%02x%02x", $rgb_color['r'], $rgb_color['g'], $rgb_color['b']);

}