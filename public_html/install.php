<?php

require '../bootloader.php';

if (!App\App::$db->tableExists('users')) {
    App\App::$db->createTable('users');
}

if(!\App\App::$db->tableExists('pixels')) {
    \App\App::$db->createTable('pixels');
}
