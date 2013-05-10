<?php

/**
 * Description of View
 *
 * @author rhardy
 */
class View {    
    
    protected $viewFile;
    
    //establish view location on object creation
    public function __construct($controllerClass, $action) {
        $controllerName = str_replace("Controller", "", $controllerClass);
        $this->viewFile = "views/" . strtolower($controllerName) . "/" . $action . ".php";

    }
               
    //output the view
    public function output($viewModel, $template = "maintemplate") {
        
        $templateFile = "views/templates/".$template.".php";
        
        if (file_exists($this->viewFile)) {
            if ($template) {
                //include the full template
                if (file_exists($templateFile)) {
                    require($templateFile);
                } else {
                    require("views/error/badtemplate.php");
                }
            } else {
                //we're not using a template view so just output the method's view directly
                require($this->viewFile);
            }
        } else {
            require("views/error/badview.php");
        }
        
    }
}

/* End of file View.php */
/* Location: ./system/View.php */
