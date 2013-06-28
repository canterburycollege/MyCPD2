<?php

class ReportModel extends BaseModel {

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Reports");
        return $this->viewModel;
    }
    
    
    public function __construct() {
        parent::__construct();

        //create the model object
        require("models/target.php");
        $this->model = new TargetModel();
    }

    public function view() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Reports");
        return $this->viewModel;
    }
    
    public function allstaff() {
        $moodle_user_id = $_SESSION['USER']->id;

        $sql = "SELECT * FROM v_targets_with_status_and_name";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "All Staff report");
        $this->viewModel->set("targets", $results);

        return $this->viewModel;
    }
    
        public function section() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Section/Faculty report");
        return $this->viewModel;
    }
    
        public function individual() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Individual staff report");
        return $this->viewModel;
    }

}

/* End of file report.php */
/* Location: ./models/report.php */
