<?php

require '../bootloader.php';

if (!App\App::$db->tableExists('users')) {
    App\App::$db->createTable('users');
}
