<?php

/**
 * Description of Model
 *
 * @author rhardy
 */
class BaseModel {
    
    protected $viewModel;

    //create the base and utility objects available to all models on model creation
    public function __construct()
    {
        $this->viewModel = new ViewModel();
	$this->commonViewData();
    }

    //establish viewModel data that is required for all views in this method (i.e. the main template)
    protected function commonViewData() {

        // get news
        require_once SYSPATH . 'DbConnectionRegistry.php';
        $sql = "SELECT * FROM news";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $news = $dbConn->get_all($sql, 'OBJECT');
        if (empty($news)) {
            // initialize array to prevent php warning msg.
            $news = Array();
        }
	$this->viewModel->set("news", $news);
    }
    //e.g. $this->viewModel->set("mainMenu",array("Home" => "/home", "Help" => "/help"));
    
    
    
}

/* End of file BaseModel.php */
/* Location: ./system/BaseModel.php */
