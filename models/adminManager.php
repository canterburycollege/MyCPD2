<?php

require_once SYSPATH . 'DbConnectionRegistry.php';
require_once SYSPATH . 'formHelper.php';

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
            ORDER BY 2";
        
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'ARRAY');

        return $results;
    }
    
    public function createGroup($manager){
        $sql = "
            INSERT INTO manager_group (
                manager,
                section,
                description
                )
            VALUES (
                '{$manager}',
                '{$_POST['section']}',
                '{$_POST['description']}'
                )";
                
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
    }
    
    public function createGroupForm($manager){
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set('managerDetails',$this->getStaffDetails($manager));
        $this->viewModel->set("section_options",html_select_options($this->getSectionOptions()));
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
    
    public function createGroupDetailForm($group){
        
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
        $sql = "
            DELETE FROM manager 
            WHERE moodle_user_id = '{$moodle_user_id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
    }
    
    /**
     * return an array of options to be used in html select
     * 
     * @return array
     */
    private function getSectionOptions(){
        $sql = "
            SELECT  s.id, 
                    CONCAT(s.description,' (',f.description,')') AS description
            FROM    section s
                    JOIN faculty f
                        ON s.faculty = f.id
            ORDER BY 2";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        
        return $results;
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
    
    public function updateGroup($id){
        $section_id = $_POST['section_id'];
        $description = $_POST['description'];
        $sql = "
            UPDATE  manager_group
            SET     section = '{$section_id}',
                    description = '{$description}'
            WHERE   id = '{$id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);    
    }
    
    public function updateGroupForm($id){
        $sql = "
            SELECT  g.description,
                    g.section AS section_id,
                    (
                    SELECT  m.displayname
                    FROM    v_staff m
                    WHERE   m.id = g.manager
                    ) AS manager
            FROM    manager_group g
            WHERE   g.id = '{$id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT'); 
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("group", $results[0]);
        $this->viewModel->set("section_options", 
                html_select_options($this->getSectionOptions(), $results[0]->section_id));
        return $this->viewModel;
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
        // sql to get staff rows
        $sql1 = "
            SELECT  s.displayname
            FROM    manager_group_detail d
                    JOIN v_staff s
                        ON d.moodle_user_id = s.id
            WHERE   d.manager_group = {$group}";
            
        // sql to get group row
        $sql2 = "
            SELECT  m.displayname as managerName,
                    g.description as groupName
            FROM    manager_group g
                    JOIN v_staff m
                        ON g.manager = m.id
            WHERE   g.id = {$group}";
            
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $staffRows = $dbConn->get_all($sql1, 'OBJECT');
        $groupRow = $dbConn->get_all($sql2, 'OBJECT');
        if (empty($staffRows)) {
            // initialize array to prevent php warning msg.
            $staffRows = Array();
        }
        if (empty($groupRow)) {
            // initialize array to prevent php warning msg.
            $groupRow = Array();
        }
        
        $this->viewModel->set("pageTitle", "MyCPD Admin");
        $this->viewModel->set("staffRows", $staffRows);
        $this->viewModel->set("groupRow", $groupRow[0]);
        $this->viewModel->set("group_id",$group);

        return $this->viewModel;
    }
    
    public function viewGroups($manager){
        $sql = "
            SELECT  mg.id,
                    (
                    SELECT  CONCAT(s.description,' (',f.description,')') AS section
                    FROM    section s
                            JOIN faculty f
                                ON s.faculty = f.id
                    WHERE   mg.section = s.id
                    ) AS section,
                    mg.description,
                    (
                    SELECT  count(*)
                    FROM    manager_group_detail mgd
                    WHERE   mgd.manager_group = mg.id
                    ) AS num_of_staff
            FROM    manager_group mg
            WHERE   mg.manager = '{$manager}'";
            
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
