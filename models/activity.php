<?php

require_once SYSPATH .'DbConnectionRegistry.php';

class ActivityModel extends BaseModel
{
    
    public function create(){
        $this->viewModel->set("pageTitle","MyCPD Hub");
        return $this->viewModel;
    }
    
    
    public function delete(){
        $this->viewModel->set("pageTitle","MyCPD Hub");
        return $this->viewModel;
    }


    public function index()
    {   
        $this->viewModel->set("pageTitle","MyCPD Hub");
        $this->viewModel->set("heading1","Activities");
        return $this->viewModel; 
    }
    
    
    public function view($id){
        $employee_id = 1;
        
        $sql = "SELECT * FROM v_activity WHERE target_id = {$id}";
        
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql,'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle","MyCPD Hub");
        $this->viewModel->set("heading1","Activities");
        $this->viewModel->set("activities",$results);
        
        return $this->viewModel;
    }
}

/* End of file activity.php */
/* Location: ./models/activity.php */
