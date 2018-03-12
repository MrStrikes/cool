<?php

require_once('Routing/Router.php');
require_once('vendor/autoload.php');

use Symfony\Component\Yaml\Yaml;

$config = Yaml::parseFile('config/config.yml');

$loader = new Twig_Loader_Filesystem('views');
$twig = new Twig_Environment($loader, array(
    //'cache' => 'cache/twig',
    'cache' => false,
));

$request = empty($_GET['action']) ? $config['homepage_route'] : $_GET['action'];
$router = new Router();
$response = $router->execute($request);
echo $response;
