<?php

/**
 * Controller for targets
 * 
 * Loads models and views required by targets
 */
class TargetController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
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
/* End of file target.php */
/* Location: ./target.php */
