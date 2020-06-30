<?php

session_start();

define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');

require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/file.php';
require 'vendor/autoload.php';

require 'app/functions/form/validators.php';

$app = new App\App();

require 'app/cofig/routes.php';
