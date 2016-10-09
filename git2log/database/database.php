<?php
// Load composer dependencies
require 'vendor/autoload.php';
// Load configuration file
include 'config.php';

use Illuminate\Database\Capsule\Manager as Capsule;

// Setup connection
$capsule = new Capsule;
$capsule->addConnection(\aquaweb\config\DBArray);
$capsule->setAsGlobal();
$capsule->bootEloquent();