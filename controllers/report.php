<?php

/**
 * Controller for reports
 * 
 * Loads models and views required by reports
 */
class ReportController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/report.php");
        $this->model = new ReportModel();
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
/* End of file report.php */
/* Location: ./hub.php */
