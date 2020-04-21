<?php

session_start();

define('ROOT', __DIR__);
define('USERS', ROOT . '/app/data/users.json');
define('CARS', ROOT . '/app/data/cars.json');

require 'core/functions/form/core.php';
require 'core/functions/form/validators.php';
require 'core/functions/html.php';
require 'core/functions/file.php';

require 'app/functions/form/validators.php';

require 'core/classes/FileDB.php';

