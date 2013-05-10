<?php

/**
 * Bootstrap file.
 * 
 * Loads required classes.
 * Instantiates a new Loader object.
 * Creates requested Controller object based on the 'controller' URL value and 
 * then executes the requested method, based on the 'action' URL value. This 
 * controller method then outputs a view.
 */

// define config vars
define('BASEPATH', __DIR__ . DIRECTORY_SEPARATOR); // path to this directory
define('DS', DIRECTORY_SEPARATOR); // window & linux ude different seperators
define('SYSPATH', BASEPATH . 'system' . DS);


require(SYSPATH . 'BaseController.php');  
require(SYSPATH . 'BaseModel.php');
require(SYSPATH . 'View.php');
require(SYSPATH . 'ViewModel.php');
require(SYSPATH . 'Loader.php');

$loader = new Loader(); 
$controller = $loader->createController(); 
$controller->executeAction(); 

?>
