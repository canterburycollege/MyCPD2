<?php

require_once SYSPATH . 'DbConnectionRegistry.php';

class AdminManagerModel extends BaseModel {
    
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("heading1", "Maintain Managers");
        return $this->viewModel;
    }
    
    public function createGroup(){
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        return $this->viewModel;
    }
    
    public function createManager(){
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        
        $moodle_user_id = $_POST['moodle_user_id'];
        $description = $_POST['description'];
        
        $sql = "INSERT INTO manager (
                    moodle_user_id,
                    description
                    ) 
                VALUES (
                    '{$moodle_user_id}',
                    '{$description}'
                    )";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
        header('Location: viewManagers');
        
        //return $this->viewModel;
    }
    
    public function createManagerForm(){
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        return $this->viewModel;
    }

        public function deleteGroup(){
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        return $this->viewModel;
    }
    
    public function deleteManager($moodle_user_id){
        $sql = "DELETE FROM manager WHERE moodle_user_id = '{$moodle_user_id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
        header('Location: ' . BASEURL . 'adminManager/viewManagers');
    }
    
    public function viewGroups($manager_id){
        
    }

    public function viewManagers() {
        
        $sql = "SELECT * FROM manager";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("managers", $results);

        return $this->viewModel;
    }
}
?>