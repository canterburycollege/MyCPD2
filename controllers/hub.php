<?php

/**
 * Controller for hub
 * 
 * Loads models and views required by hub
 * 
 */
class HubController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/hub.php");
        $this->model = new HubModel();
        
        require("models/target.php");
        $this->model = new TargetModel();
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }
    
    public function view(){
        $this->view->output($this->model->view());
    }
}
/* End of file hub.php */
/* Location: ./hub.php */
