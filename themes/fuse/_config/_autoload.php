<?php
namespace Fuse;

return [

   'files' => [

        // Base
        'setup/theme',
        'helpers',
        'admin',
        'filters',
        'menus',

        // Enqueues
        'asset-handlers/manifest',
        'asset-handlers/critical',
        'asset-handlers/fonts',
        'asset-handlers/images',
        'asset-handlers/jquery',
        'asset-handlers/scripts',
        'asset-handlers/styles',
        'asset-handlers/svg',

        // Controllers
        'controllers/wrappers',
        'controllers/templates',
        'controllers/fragments',

        /**
         * Layout Files
         */

        // Core Structure
        'layouts/app',

        // Layout • Page
        'layouts/page/404',
        'layouts/page/page',
        'layouts/page/front-page',

        // Layout • Archive
        'layouts/archive/post',
        'layouts/archive/work',

        // Layout • Single
        'layouts/single/work',

        // Layout • Page Templates
        'layouts/template/landing',

        // Layout • Mixed Page/Post Types
        'layouts/mixed/page-post'

   ]

];
