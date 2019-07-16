<?php
/**
 * This file controls what content is rendered on the "Home" page of our site
 * as selected through WP Admin.
 *
 * @since 1.0.0
 * @author CreativeFuse
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 * @see `layouts/template/landing.php` to see this in action
 *
 */

namespace Fuse\Layout\AboutPage;
use function Fuse\Controllers\render as render;
use Fuse\AssetHandlers;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on the Front Page of our site
	if( is_page('about-us') ){


		add_action( 'fuse_content', __NAMESPACE__ . '\load_quote', 1);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_philosophy', 2);
		add_action( 'fuse_content', __NAMESPACE__ . '\load_story_team', 3);

	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/

function load_quote(){

	$section_data = [

		'copy'		=> Acf::field( 'quote_copy' )->get(),
		'credit'	=> Acf::field( 'quote_credit' )->get(),

	];

	render( 'fragments/sections/about/_quote', $section_data );

}

/**
 *
 */
function load_philosophy(){

	$section_data = [

		'title'	=> Acf::field( 'philosophy_title' )->get(),
		'copy'	=> Acf::field( 'philosophy_copy' )->get(),

	];

	render( 'fragments/sections/about/_philosophy', $section_data );

}

/**
 *
 */
function load_story_team(){

	$story_data = [


		'title'		=> Acf::field( 'story_title' )->get(),
		'copy'		=> Acf::field( 'story_copy' )->get(),
		'image'	=> [
			'image_url'	=> Acf::field( 'story_image' )->expect( 'string' )->default( 'https://picsum.photos/700/700' )->get(),
		]


	];

	$squad_data = [

		'title'			=> Acf::field( 'squad_intro_title' )->get(),
		'subtitle'		=> Acf::field( 'squad_intro_copy' )->get(),

	];

	$founders_data = [

		'image' => [
			'media'	=> Acf::field( 'founders_featured_image' )->get()
		],

		'founder_1' => [

			'name'	=> Acf::field( 'founders_founder_1_name' )->get(),
			'roles'	=> Acf::field( 'founders_founder_1_roles' )->get(),
			'insta'	=> Acf::field( 'founders_founder_1_instagram_link' )->get(),
			'bio'	=> Acf::field( 'founders_founder_1_bio' )->get(),

		],

		'founder_2' => [

			'name'	=> Acf::field( 'founders_founder_2_name' )->get(),
			'roles'	=> Acf::field( 'founders_founder_2_roles' )->get(),
			'insta'	=> Acf::field( 'founders_founder_2_instagram_link' )->get(),
			'bio'	=> Acf::field( 'founders_founder_2_bio' )->get(),

		]

	];

	$team_members_data = [

		'team_members'	=> Acf::field( 'team_members' )->expect( 'array' )->default( [] )->get(),

	];

	$section_data = [

		'story'				=> $story_data,
		'squad_intro'		=> $squad_data,
		'founders'			=> $founders_data,
		'team_members'		=> $team_members_data,

	];

	render( 'fragments/sections/about/_story', $section_data );

}
