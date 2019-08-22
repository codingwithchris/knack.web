<?php
/**
 * The Google Tag Manager Body Script
 *
 * {{container_id}} will be replaced with the unique GTM Container ID 
 * for this site.
 */


namespace CFi\Module\GTM;


$script =  '<!-- Google Tag Manager (noscript body) -->';

	$script .= '<noscript>';

		$script .= '<iframe src="https://www.googletagmanager.com/ns.html?id={{container_id}}" height="0" width="0" style="display:none;visibility:hidden"></iframe>';

	$script .= '</noscript>';

$script .= '<!-- End Google Tag Manager (noscript body) -->';

return $script;






