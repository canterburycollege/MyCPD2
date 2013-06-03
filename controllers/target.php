<?php

/**
 * Controller for targets
 * 
 * Loads models and views required by targets
 */
class TargetController extends BaseController {

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/target.php");
        $this->model = new TargetModel();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->created());
        }
        else
            $this->view->output($this->model->create());
    }

    
    public function delete() {
        $id = $_GET['id'];
        $this->view->output($this->model->delete($id));
    }

    //default method
    protected function index() {
        $this->view->output($this->model->index());
    }

    public function view() {

        $this->view->output($this->model->view());
    }
<<<<<<< HEAD
    
        public function update(){
        $id = $_GET['id'];
        $this->view->output($this->model->update($id)); 
=======

    public function update() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->updated($id));
        }
        else
            $this->view->output($this->model->update($id));
>>>>>>> target
    }

}

/* End of file target.php */
/* Location: ./target.php */