<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<?php

		// Load analytics head script here before we load the rest of our head
		do_action( 'fuse_load_analytics_head' );

	?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

  	<?php do_action( 'fuse_after_body_open' ); ?>
