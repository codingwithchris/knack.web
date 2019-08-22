<?php
/**
 * The Google Tag Manager Head Script
 *
 * {{container_id}} will be replaced with the unique GTM Container ID 
 * for this site.
 */


namespace CFi\Module\GTM;

$script =  "<!-- Google Tag Manager Head-->";

	$script .= "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','{{container_id}}');</script>";

$script .= "<!-- End Google Tag Manager Head -->";

return $script;