<?php

require '../bootloader.php';

if (!App\App::$db->tableExists('users')) {
    App\App::$db->createTable('users');
}

if (!App\App::$db->tableExists('drinks')) {
    App\App::$db->createTable('drinks');
}

if (!App\App::$db->tableExists('items')) {
    App\App::$db->createTable('items');
}

if (!App\App::$db->tableExists('orders')) {
    App\App::$db->createTable('orders');
}
