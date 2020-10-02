<?php
require_once 'vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Database;
$db = new Database;
$db->addConnection([
    'driver'=> 'mysql',
    'host' => 'localhost',
    'database' => 'db_tasks',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci'
]);
$db->setAsGlobal();
$db->bootEloquent();