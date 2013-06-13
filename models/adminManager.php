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

    public function deleteGroup($id){
        $sql = "DELETE FROM manager_group WHERE id ='{$id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
    }
    
    public function deleteManager($moodle_user_id){
        $sql = "DELETE FROM manager WHERE moodle_user_id = '{$moodle_user_id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
    }
    

    public function getMoodleUsers($search_term){
        $sql = "
            SELECT  id, CONCAT(firstname,' ',lastname) AS label  
            FROM    mdl_user
            WHERE   CONCAT(firstname,lastname) LIKE '%".$search_term."%'
            ORDER BY 2";
        
        $dbConn = DbConnectionRegistry::getInstance('moodle');
        $results = $dbConn->get_all($sql, 'ARRAY');

        return $results;
    }
    
    public function updateManager($moodle_user_id){
        $description = $_POST['description'];
        $sql = "
            UPDATE  manager 
            SET     description = '{$description}'
            WHERE   moodle_user_id = {$moodle_user_id}
            ";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
    }
    
    public function updateManagerForm($moodle_user_id){
        $sql = "
            SELECT  m.moodle_user_id,
                    CONCAT(u.firstname,' ',u.lastname) as display_name,
                    m.description
            FROM    moodle.mdl_user u
                    JOIN mycpd.manager m
                        ON u.id = m.moodle_user_id
            WHERE   m.moodle_user_id = {$moodle_user_id}
            ";
            
        $dbConn = DbConnectionRegistry::getInstance('host');
        $results = $dbConn->get_all($sql, 'OBJECT');   
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("manager", $results[0]);
        return $this->viewModel;
    }
    
    public function viewGroups($moodle_user_id){
        $sql = "
            SELECT  id,
                    manager,
                    description
            FROM    manager_group
            WHERE   manager = '{$moodle_user_id}'";
            
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("groups", $results);

        return $this->viewModel;
            
    }

    public function viewManagers() {
        $sql = "
            SELECT  u.id as moodle_user_id,
                    u.firstname,
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
