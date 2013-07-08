<?php

/**
 * Controller for reports
 * 
 * Loads models and views required by reports
 */
class ReportController extends BaseController {

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/report.php");
        $this->model = new ReportModel();
    }

    //default method
    protected function index() {
        $this->view->output($this->model->index());
    }

    public function view() {
        $this->view->output($this->model->view());
    }

    public function allstaff() {
        $this->view->output($this->model->allstaff());
    }
    
      public function allManagerStaffTargets() {
          $id = $_GET['id'];
        $this->view->output($this->model->all_manager_staff_targets($id));
    }
    
          public function allManagerStaffActivities() {
          $id = $_GET['id'];
        $this->view->output($this->model->all_manager_staff_activities($id));
    }
    

    public function section() {
        $this->view->output($this->model->section());
    }

    public function individual() {
        $this->view->output($this->model->individual());
    }

}

/* End of file report.php */
/* Location: ./report.php */
