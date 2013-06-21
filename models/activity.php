<?php

require_once SYSPATH . 'DbConnectionRegistry.php';

class ActivityModel extends BaseModel {

    
// @todo move to own helper file
    private function html_select_options($options, $selected_id) {
        $html = '';
        foreach ($options as $option) {
            if ($option->id == $selected_id) {
                $html .= '<option id="' . $option->id . '" selected>';
            } else {
                $html .= '<option id="' . $option->id . '">';
            }
            $html .= $option->description . '</option>';
        }
        return $html;
    }

    public function create() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        return $this->viewModel;
    }

    public function delete() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        return $this->viewModel;
    }
    
    private function get_priority_types() {
        $sql = "SELECT id, description FROM priority_type ORDER BY sort_order";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        return $results;
    }

    /**
     * 
     * @todo check whether only current targets required
     * or maybe use option group to display archived at bottom of list
     */
    private function get_targets() {
        /* @todo add IN clause to select only given user's targets */
        $sql = "SELECT  id, title AS description 
                FROM    target
                ORDER BY 2";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        return $results;
    }

    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Activities");
        return $this->viewModel;
    }

    public function update($id) {
        $sql = "SELECT * FROM v_activity WHERE id = {$id}";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $activity = $results[0];
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("activity", $activity);

        $targets = $this->get_targets();
        $selected_target = $activity->target_id;
        $this->viewModel->set("target_options", $this->html_select_options($targets, $selected_target));

        $priority_types = $this->get_priority_types();
        $selected_priority = $activity->priority_type_id;
        $this->viewModel->set("priority_options", $this->html_select_options($priority_types, $selected_priority));

        return $this->viewModel;
    }

    public function view($logged_in_user) {
        
        //@todo academic_year move to global constant
        $academic_year = "2012/09/03 00:00:00";
        $sql = "
            SELECT  * 
            FROM    v_activity 
            WHERE   employee_id = '{$logged_in_user}'
                    AND planned_date > '{$academic_year}' 
                    ";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Activities");
        $this->viewModel->set("activities", $results);

        return $this->viewModel;
    }

    public function archive($logged_in_user) {
        //@todo academic_year move to global constant
        $academic_year = "2012/09/03 00:00:00";
        $sql = "
            SELECT  * 
            FROM    v_activity 
            WHERE   employee_id = '{$logged_in_user}' 
                    AND planned_date < '{$academic_year}'
                ";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Activities");
        $this->viewModel->set("activities", $results);

        return $this->viewModel;
    }

}

/* End of file activity.php */
/* Location: ./models/activity.php */
