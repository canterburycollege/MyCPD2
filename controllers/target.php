<?php

/**
 * Controller for targets
 * 
 * Loads models and views required by targets
 */
class TargetController extends BaseController
{

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/target.php");
        require("models/news.php");
        $this->model = new TargetModel();
        $this->model2 = new NewsModel();
    }
    
   public function create(){
        $this->view->output($this->model->create());
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
    
        public function update(){
        $id = $_GET['id'];
        $this->view->output($this->model->update($id)); 
    }
}
/* End of file target.php */
/* Location: ./target.php */