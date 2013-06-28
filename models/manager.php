<?php

require_once SYSPATH . 'DbConnectionRegistry.php';

class AdminManagerModel extends BaseModel {
    
    public function authorisation($USER) {
        $sql = "
            SELECT  count(*) as row_count
            FROM    manager_group
            WHERE   manager = '{$USER->id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if ($results[0]->row_count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    public function viewActivities($manager){
        $sql = "
            SELECT  * 
            FROM    v_activity_group
            WHERE   manager_id = '{$manager}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Activities");
        $this->viewModel->set("manager", $results[0]->manager_displayname);
        $this->viewModel->set("activities", $results);

        return $this->viewModel;
    }
}

/* End of file manager.php */
/* Location: ./manager.php */
