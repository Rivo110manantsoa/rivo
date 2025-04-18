<?php 

session_start();

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

$path = "https://".$_SERVER['SERVER_NAME'];
$root = rtrim(str_replace('index.php','',$path), '/');



define('ROOT', $root . "/");
define('ASSETS', ROOT . "assets/");

echo(ROOT);

if (isset($_SERVER['REQUEST_URI'])) {
    $uri = trim($_SERVER['REQUEST_URI'],'/');
    if ($uri == "" || $uri == 'index.php') {
        $_GET['url'] = 'home';
    } else {
        $_GET['url'] = str_replace('index.php','',$uri);
    }    
}

include("../app/init.php");

$router = new Router();
