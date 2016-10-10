<?php
// Load composer dependencies
require $_SERVER['DOCUMENT_ROOT'].'/git2log'.'/vendor/autoload.php';
// Load configuration file
include $_SERVER['DOCUMENT_ROOT'].'/git2log'.'/config.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Setup connection
$capsule = new Capsule;
$capsule->addConnection(\aquaweb\config\DBArray);
$capsule->setAsGlobal();
$capsule->bootEloquent();