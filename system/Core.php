<?php

/**
 * 
 * Split url into controller/action/parameters
 * 
 * @global type $url
 */
function splitURL() {
    global $url;
    
    $urlArray = array();
    $urlArray = explode("/",$url);
    
    $controller = $urlArray[0];
    array_shift($urlArray);
    $action = $urlArray[0];
    array_shift($urlArray);
    $queryString = $urlArray;
    
    $controllerName = $controller;
    $controller = ucwords($controller);
    $model = rtrim($controller, 's');
    $controller .= 'Controller';
    $dispatch = new $controller($model,$controllerName,$action);
    
    if ((int)method_exists($controller, $action)) {
        call_user_func_array(array($dispatch,$action),$queryString);
    } else {
    /* Error Generation Code Here */
    }
}
?>
