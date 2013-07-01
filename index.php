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

// define file paths
define('CONFIGPATH', '/srv/www/mycpd_config/'); // path for config files
##define('CONFIGPATH', 'C:/wamp/mycpd2_config/'); // rh local test version
##define('MOODLECONFIGFILE','C:/wamp/www/moodle/config.php'); // rh local test version
define('MOODLECONFIGFILE','/srv/www/htdocs/moodle/config.php'); 

define('DS', DIRECTORY_SEPARATOR); // window & linux ude different seperators
define('BASEPATH', __DIR__ . DS); // path to this directory
define('SYSPATH', BASEPATH . 'system' . DS);
define('TEMPLATEPATH', BASEPATH . 'views' . DS . 'templates' . DS);

// define url paths
##define('BASEURL', 'http://localhost/moodle/MyCPD/'); // rh local test
define('BASEURL', '/moodle/MyCPD/'); // webdev-04
// load system files
require(SYSPATH . 'Authentication.php');
require(SYSPATH . 'BaseController.php');  
require(SYSPATH . 'BaseModel.php');
require(SYSPATH . 'View.php');
require(SYSPATH . 'ViewModel.php');
require(SYSPATH . 'Loader.php');

// bootstrap
// force login to moodle and save required moodle vars to session
$auth = new Authentication(); 
$loader = new Loader(); 
$controller = $loader->createController(); 
$controller->executeAction(); 

?>