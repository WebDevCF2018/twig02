<?php

/**
 * Front Controller
 */
/*
 *
 * AUTOLOAD
 *
 */
// autoload all classes from composer's library
require_once "./vendor/autoload.php";

// load Controllers
require_once "controller/publicController.php";
// load Models
require_once "models/nosModels.php";

/*
 *
 * end of autolaod
 *
 *
 */

// use publicController
use Controller\publicController AS PC;

// route content twig's files
$loader = new Twig_Loader_Filesystem('./views');

// we create a twig Environment
$twig = new Twig_Environment($loader, array(
        // routing for cache
        // for dev, cache on comment ! 'cache' => 'cache',
        ));

// navigate in the namspace PC (Controller\publicController) and call welcomeAction()
if (!isset($_GET['content'])) {
    PC::welcomeAction($twig);
} else {
    // if isset $_GET['content']
    switch ($_GET['content']) {
        case "contact":
            PC::contactAction($twig);
            break;
        case "map":
            PC::mapAction($twig);
            break;
        default:
            PC::welcomeAction($twig);
    }
}