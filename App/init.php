<?php

// error_reporting(0);
require_once __DIR__.'/../vendor/autoload.php';
// require_once 'file';
// require_once '../vendor/illuminate/foundation/helpers.php';
require_once __DIR__.'/Core/App.php';
require_once __DIR__.'/Core/Controller.php';
require_once __DIR__.'/config.php';
require_once __DIR__.'/db.php';
require_once __DIR__.'/Core/Session.php';
require_once __DIR__.'/Core/Flash.php';
require_once __DIR__.'/helpers.php';

session()->start();
// require_once 'session.php';
