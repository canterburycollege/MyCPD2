<?php

require_once SYSPATH .'DbConnectionRegistry.php';

class NewsModel extends BaseModel
{
    


    public function index()
    {   

        return $this->viewModel; 
    }
    
    
    public function view(){
        $employee_id = 1;
        
        $sql = "SELECT * FROM news";
        
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql,'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        $this->viewModel->set("news",$results);
        
        return $this->viewModel;
    }
    
        public function edit(){
        $sql = "SELECT * FROM news";
        
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql,'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        $this->viewModel->set("news",$results);
        
        return $this->viewModel;
    }
}

/* End of file activity.php */
/* Location: ./models/activity.php */
