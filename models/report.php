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
        $moodle_user_id = $_SESSION['USER']->id;
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Reports");

        $sql = "SELECT manager_group.manager, section.description, manager_group.id
        FROM manager_group INNER JOIN section ON manager_group.section = section.id
        WHERE (((manager_group.manager)='{$moodle_user_id}'))";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Reports");
        $this->viewModel->set("sections", $results);

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

        public function all_manager_staff_targets($id) {
        $moodle_user_id = $_SESSION['USER']->id;

        $sql = "SELECT * FROM v_manager_all_staff_targets where manager_group = '{$id}'";
        $sql2 = "SELECT description FROM v_section_name where id = '{$id}'";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        $results2 = $dbConn->get_all($sql2, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        
        
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "All Staff report");
        $this->viewModel->set("targets", $results);
        $this->viewModel->set("section", $results2);

        return $this->viewModel;
    }
    
    public function all_manager_staff_activities($id) {
        $moodle_user_id = $_SESSION['USER']->id;

        $sql = "SELECT * FROM v_manager_all_staff_activities where manager_group = '{$id}'";
        $sql2 = "SELECT description FROM v_section_name where id = '{$id}'";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        $results2 = $dbConn->get_all($sql2, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        
        
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "All Staff report");
        $this->viewModel->set("activities", $results);
        $this->viewModel->set("section", $results2);

        return $this->viewModel;
    }
    
    
    public function section() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Section/Faculty report");
        return $this->viewModel;
    }

}

/* End of file report.php */
/* Location: ./models/report.php */
