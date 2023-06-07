<?php $multiLangs = env('avegacms.multiLangs', false);

$routes->group('api', ['namespace' => '\Template\BusinessLogic\Libraries'], function($routes) {
    $routes->get('posts', 'Api::posts');
    $routes->get('services', 'Api::services');
});

// $routes->add('albums', 'Content::index', ['priority' => 20000]);
