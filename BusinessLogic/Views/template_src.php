<?php  if ( ! defined('APPPATH')) exit('No direct script access allowed');

$themeConfig = service('avegacmsconfig')->getConfig('template');
$staticPath = "template/{$themeConfig['name']}/dist/%s";
$faviconPath = "template/{$themeConfig['name']}/favicons/%s";

return [

    'htmlClass'  => 'h-100',
    'viewport'   => 'width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no',
    'charset'    => 'utf-8',
    'themeColor' => $themeConfig['color'],

    'js'   => [

        [
            'src'     => base_url(sprintf($staticPath, 'vendors.min.js')),
            'type'    => 'text/javascript',
            'charset' => 'utf-8',
            'use_v'   => true
        ],

        [
            'src'     => base_url(sprintf($staticPath, 'app.min.js')),
            'type'    => 'text/javascript',
            'charset' => 'utf-8',
            'use_v'   => true
        ]
    ],
    'css'  => [

        [
            'href'  => base_url(sprintf($staticPath, 'vendors.min.css')),
            'rel'   => 'stylesheet',
            'type'  => 'text/css',
            'media' => 'all',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($staticPath, 'app.min.css')),
            'rel'   => 'stylesheet',
            'type'  => 'text/css',
            'media' => 'all',
            'use_v' => true
        ]
    ],
    'icon' => [

        [
            'href'  => base_url(sprintf($faviconPath, 'favicon.ico')),
            'rel'   => 'shortcut icon',
            'type'  => 'image/png',
            'sizes' => '32x32',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '57x57',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon-52x52.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '52x52',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon-72x72.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '72x72',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon-76x76.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '76x76',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon-114x114.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '114x114',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon-120x120.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '120x120',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon-144x144.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '144x144',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon-152x152.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '152x152',
            'use_v' => true
        ],

        [
            'href'  => base_url(sprintf($faviconPath, 'apple-touch-icon-180x180.png')),
            'rel'   => 'apple-touch-icon',
            'type'  => 'image/png',
            'sizes' => '180x180',
            'use_v' => true
        ]
    ]
];