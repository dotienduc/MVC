<?php

require_once __DIR__ . '../../vendor/autoload.php';

use App\core\App;
use App\core\Controller;

$config = require_once(dirname(__FILE__).'/../config/main.php');


session_start();
$app = App::getInstance();
$app->run($config);