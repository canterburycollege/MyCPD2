<?php

/**
 * Controller for activity
 * 
 * Loads models and views required by activity
 * 
 */
class ActivityController extends BaseController {

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/activity.php");
        $this->model = new ActivityModel();
    }

    public function create() {
        $this->view->output($this->model->create());
    }

    public function delete() {
        $this->view->output($this->model->delete());
    }

    //default method
    protected function index() {
        $this->view->output($this->model->index());
    }

    public function update() {
        $id = $_GET['id'];
        $this->view->output($this->model->update($id));
    }

    public function view() {
        print_r($_GET);
        $id = $_GET['id'];
        $this->view->output($this->model->view($id));
    }

    public function archive() {
        $this->view->output($this->model->archive());
    }

}

/* End of file activity.php */
/* Location: ./activity.php */
