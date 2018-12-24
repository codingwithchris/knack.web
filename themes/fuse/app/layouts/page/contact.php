<?php
/**
 * This file controls what is loaded on all standard pages.
 *
 * @since 1.0.0
 * @author CreativeFuse
 *
 * NOTE: If you wish to override existing action hook output, you must first
 * remove the action hooks that generate that output. Note also that, when removing these actions
 * you must match the action hook name, fully namespaced function name AND the action hook priority.
 *
 * @see `layouts/template/landing.php` to see this in action
 */

namespace Fuse\Layout\ContactPage;
use function Fuse\Controllers\render as render;
use Samrap\Acf\Acf;


// Fire our setup once we have all  Wordpress data
add_action( 'wp', __NAMESPACE__ . '\setup');

function setup(){

	// If we are on a normal page
	if( is_page( 'contact-us' ) ){

		add_action( 'fuse_content', __NAMESPACE__ . '\load_left_section', 1 );
		add_action( 'fuse_content', __NAMESPACE__ . '\load_right_section', 1 );

	}
}

/*************************************************************
 * The following will be loaded when the conditional check in
 * setup() returns true.
 ************************************************************/


function load_left_section(){

    $section_data = [

        'title'     => Acf::field( 'title' )->get(),
        'subtitle'  => Acf::field( 'subtitle' )->get(),

        'contact'   => [

            'phone'     => Acf::option( 'contact_info_phone' )->get(),
            'email'     => Acf::option( 'contact_info_email' )->get(),

            'address'   => [
                'top'       => Acf::option( 'contact_info_address_top' )->get(),
                'bottom'    => Acf::option( 'contact_info_address_bottom' )->get(),
                'link'      => Acf::option( 'contact_info_gmaps_link' )->get(),
            ],

            'facebook'  => [
                'link'  => Acf::option( 'contact_info_facebook_link' )->get(),
                'text'  => Acf::option( 'contact_info_facebook_text' )->get(),
            ],

            'instagram'  => [
                'link'  => Acf::option( 'contact_info_instagram_link' )->get(),
                'text'  => Acf::option( 'contact_info_instagram_text' )->get(),
            ]

        ],

        'background'    => [

            'image_url'     => Acf::field( 'background_image' )->get(),
            'overlay_type'	=> 'white--90',
        ],

    ];

    render( 'fragments/sections/contact/_left', $section_data );

}

function load_right_section(){

    $section_data = [

        'intro'     => Acf::field( 'intro' )->get(),
        'form_id'   => '1',

    ];

    render( 'fragments/sections/contact/_right', $section_data );

}