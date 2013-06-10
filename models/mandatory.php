<?php
require_once SYSPATH . 'DbConnectionRegistry.php';

class MandatoryModel extends BaseModel {

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Mandatory & Contractual Training");
        return $this->viewModel;
    }

    public function view() {

        $moodle_user_id = $_SESSION['USER']->id;
//Todo: remove duplicate values.
        $sql = "SELECT title, value, course FROM v_scores WHERE userid = $moodle_user_id";

        $dbConn = DbConnectionRegistry::getInstance('moodle');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Mandatory & Contractual Training");
        $this->viewModel->set("mandatory", $results);
        return $this->viewModel;
    }

    
    
    
    
}

/* End of file mandatory.php */
/* Location: ./models/mandatory.php */





