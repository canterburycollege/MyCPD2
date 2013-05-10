<?php

require_once 'C:wamp\www\MyCPD2\system\DbConnectionRegistry.php';

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
        return $this->viewModel;
    }
    
    
    public function view(){
        $sql = "SELECT * FROM activity";
        
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql);
        $this->viewModel->set("pageTitle","MyCPD Hub");
        $this->viewModel->set("results",$results);
        return $this->viewModel;
    }
}

/* End of file activity.php */
/* Location: ./models/activity.php */
