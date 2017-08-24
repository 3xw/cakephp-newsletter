# cakephp-newsletter plugin for CakePHP
This plugin allows you cache and store data in redis engine

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

	composer require 3xw/cakephp-newsletter

Load it in your config/boostrap.php

	Plugin::load('Trois/Newsletter');

Run the following command in the CakePHP console to create the tables using the Migrations plugin:

	bin/cake Migrations migrate -p Trois/Newsletter

## more to come
