<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'config/config.php';
require 'config/constants.php';

$app = new \Slim\App(['settings' => $config]);

$conatiner = $app->getContainer();

$conatiner['view'] = new \Slim\Views\PhpRenderer("resources/views/");

$container['view'] = new \Slim\Views\PhpRenderer("resouces/views/");
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
        $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    return $pdo;
};
require 'app/routes.php';
$app->run();