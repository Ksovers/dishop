<?php
require_once dirname(__DIR__) . '/config/init.php';
require_once ROOT . LIBS . '/functions.php';
$routeS= new ishop\Cache();
new ishop\App;
new ishop\Registry;
new ishop\Db;
$route = new ishop\Route;
