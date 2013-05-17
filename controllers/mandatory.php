<?php

/**
 * Controller for mandatory & contractual training
 * 
 * Loads models and views required by mandatory & contractual training
 */
class MandatoryController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/mandatory.php");
        $this->model = new MandatoryModel();
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
/* End of file mandatory.php */
/* Location: ./mandatory.php */
