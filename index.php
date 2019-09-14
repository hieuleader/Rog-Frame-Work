<?php
define('ENV', 'development');
require('Config/Config.php');
require('App/Core/CoreFunction.php');

if (ENV == 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    set_error_handler('showError');
}

// Load thirty party libraries
if (file_exists('vendor/autoload.php')) {
    require('vendor/autoload.php');
}

$autoloads = [
    'Database',
    'Controller',
    'Model',
    'Request',
];

foreach ($autoloads as $file) {
    require('App/Core/'.$file.'.php');
}

$request = new Request;
$controllerName = $request->controller;
$methodName = $request->method;

if(!file_exists('App/Rog/Controller/'.$controllerName.'.php')) {
    show404error();
}

// Create database
require('Database/mysqlDriver.php');
$database = new mysqlDriver;

// Create Controller
require('App/Rog/Controller/'.$controllerName.'.php');
$controller = new $controllerName($database);
if (!method_exists($controller, $methodName)) {
    show404error();
}
$controller->$methodName();

?>