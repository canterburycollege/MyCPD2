<?php

/**
 * Controller for activity
 * 
 * Loads models and views required by activity
 * 
 */
class NewsController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/news.php");
        $this->model = new NewsModel();
    }
    
    public function edit(){
        //Todo: Check to ensure this is an MyCPD admin user.
        $this->view->output($this->model->edit());
    }
    
    public function delete(){
        $this->view->output($this->model->delete());
    }

    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }
    
    public function view(){
        $this->view->output($this->model->view());
    }
}
/* End of file activity.php */
/* Location: ./activity.php */
