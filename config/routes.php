<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::prefix('admin', function (RouteBuilder $routes) {
	$routes->plugin('Trois/Newsletter', ['path' => '/newsletter'], function (RouteBuilder $routes) {
		$routes->connect('/', ['controller' => 'Newsletters', 'action' => 'index'], ['routeClass' => DashedRoute::class]);
		$routes->fallbacks(DashedRoute::class);
	});
});


Router::plugin('Trois/Newsletter', ['path' => '/mailing'], function (RouteBuilder $routes) {
  $routes->connect('/:controller');
  $routes->fallbacks('DashedRoute');
});
