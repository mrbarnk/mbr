<?php

define('BASE_URL', 'http://localhost/fxreport/');

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'fxreport',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => 'mbr_',
]);

// Set the event dispatcher used by Eloquent models... (optional)
// use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
// $capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


// use \Illuminate\Container\Container as Container;
use \Illuminate\Support\Facades\Facade as Facade;

/**
* Setup a new app instance container
*
* @var Illuminate\Container\Container
*/
$app = new Container();
$app->singleton('app', 'Illuminate\Container\Container');
$app->singleton('hash', 'Illuminate\Support\Facades\Hash');

/**
* Set $app as FacadeApplication handler
*/
Facade::setFacadeApplication($app);
