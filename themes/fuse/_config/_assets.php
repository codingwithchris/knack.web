<?php
namespace Fuse;

return [

    'assets' => [

    	'manifest'	=> get_theme_file_path() . '/_dist/manifest.json',
        'prod_path' => get_theme_file_path() . '/_dist/',
        'prod_uri'  => get_theme_file_uri() . '/_dist/',
        'src'       => get_theme_file_uri() .'/resources/assets/',


    ],

    'jquery' => [

        'include'           => true,
        'use_google_cdn'    => true

    ],

    'svg' => [

    	'svg_image_dir'			=> get_theme_file_path() . '/_dist/images/',
    	'svg_sprite'			=> get_theme_file_path() . '/_dist/svg/sprite.svg',

    ]

];
