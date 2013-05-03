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


require("system/BaseController.php");  
require("system/BaseModel.php");
require("system/View.php");
require("system/ViewModel.php");
require("system/Loader.php");

$loader = new Loader(); 
$controller = $loader->createController(); 
$controller->executeAction(); 

?>
