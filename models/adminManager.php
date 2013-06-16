<?php

require_once SYSPATH . 'DbConnectionRegistry.php';

class AdminManagerModel extends BaseModel {
    
    /**
     * get array of staff for populating autocomplete
     * 
     * @param string $search_term
     * @return array
     */
    public function ajaxStaffList($search_term){
        $sql = "
            SELECT  id, displayname AS label  
            FROM    v_staff
            WHERE   displayname LIKE '%".$search_term."%'
                    /* exclude any staff already in manager table */
                    AND id NOT IN (
                        SELECT  moodle_user_id
                        FROM    manager
                        )
            ORDER BY 2";
        
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'ARRAY');

        return $results;
    }
    
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("heading1", "Maintain Managers");
        return $this->viewModel;
    }
    
    public function createGroup($manager){
        $description = $_POST['description'];
        
        $sql = "
            INSERT INTO manager_group (
                manager,
                description
                )
            VALUES (
                '{$manager}',
                '{$description}'
                )";
                
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
    }
    
    public function createGroupForm($manager){
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set('managerDetails',$this->getStaffDetails($manager));
        return $this->viewModel;
    }
    
    /**
     * @todo Refactor to accept multiple inserts from same form
     * @param type $group
     */
    public function createGroupDetail($group){
        $moodle_user_id = $_POST['moodle_user_id'];
        
        $sql = "
            INSERT INTO manager_group_detail (
                manager_group,
                moodle_user_id
                )
            VALUES (
                '{$group}',
                '{$moodle_user_id}'
                )";
                
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
    }
    
    public function createGroupDetailForm(){
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
    
    /**
     * Retrieve details from moodle db, for given id
     * 
     * @param integer $moodle_user_id
     */
    public function getStaffDetails($moodle_user_id){
        $sql = "
            SELECT  *
            FROM    v_staff
            WHERE   id = {$moodle_user_id}";
            
            $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        return $results[0];
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
    
    public function viewGroupDetails($group){
        $sql = "
            SELECT  d.id,
                    d.manager_group,
                    d.moodle_user_id
            FROM    manager_group_detail d
            WHERE   d.manager_group = {$group}";
            
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("groupDetails", $results);
        $this->viewModel->set("group_id",$group);

        return $this->viewModel;
    }
    
    public function viewGroups($manager){
        $sql = "
            SELECT  id,
                    description
            FROM    manager_group
            WHERE   manager = '{$manager}'";
            
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("groups", $results);
        // get manager name from moodle
        $this->viewModel->set("manager", $this->getStaffDetails($manager));

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
