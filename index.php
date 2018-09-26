<?php
/**
 * Front Controller
 */


// autoload all classes from composer's library
require_once "./vendor/autoload.php";

// route content twig's files
$loader = new Twig_Loader_Filesystem('./views');

// we create a twig Environment
$twig = new Twig_Environment($loader, array(
    // routing for cache
    'cache' => '/cache',
));

// Controller
require_once "controller/publicController.php";