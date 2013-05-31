<?php

require_once SYSPATH . 'DbConnectionRegistry.php';

class TargetModel extends BaseModel {

    public function create() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        return $this->viewModel;
    }

    public function delete() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        return $this->viewModel;
    }

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Targets");
        return $this->viewModel;
    }

    public function view() {
        $employee_id = 1;

        $sql = "SELECT * FROM v_targets_with_status WHERE employee_id = {$employee_id}";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Targets");
        $this->viewModel->set("targets", $results);

        return $this->viewModel;
    }

        public function update($id) {
        $employee_id = 1;

        $sql = "SELECT * FROM v_targets_with_status WHERE employee_id = {$employee_id} AND id = {$id}";
        $sql2 = "SELECT * FROM target_status";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        $results2 = $dbConn->get_all($sql2, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        if (empty($results2)) {
            // initialize array to prevent php warning msg.
            $results2 = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Update target");
        $this->viewModel->set("targets", $results);
        $this->viewModel->set("targets2", $results2);
        return $this->viewModel;
    }
    
    
}

/* End of file target.php */
/* Location: ./models/target.php */
