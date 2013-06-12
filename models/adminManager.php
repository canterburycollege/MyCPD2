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
    

    public function getUsers($search_term){
        $sql = "
            SELECT  id, CONCAT(firstname,' ',lastname) AS label  
            FROM    mdl_user
            WHERE   CONCAT(firstname,lastname) LIKE '%".$search_term."%'
            ORDER BY 2";
        
        $dbConn = DbConnectionRegistry::getInstance('moodle');
        $results = $dbConn->get_all($sql, 'ARRAY');
        
        echo json_encode($results);
    }
    
    public function viewGroups($manager_id){
        
    }

    public function viewManagers() {
        
        $sql = "
            SELECT  u.firstname,
                    u.lastname,
                    m.description
            FROM    mycpd.manager m
                    JOIN moodle.mdl_user u
                        ON m.moodle_user_id = u.id";

        $dbConn = DbConnectionRegistry::getInstance('host');
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
