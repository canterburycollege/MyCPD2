<?php

/**
 * Controller for targets
 * 
 * Loads models and views required by targets
 */
class TargetController extends BaseController {

    private $logged_in_user;

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        // set logged in user
        $USER = $_SESSION['USER'];
        $this->logged_in_user = $USER->id;
        //create the model object
        require("models/target.php");
        $this->model = new TargetModel();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->created($this->logged_in_user));
        }
        else
            $this->view->output($this->model->create($this->logged_in_user));
    }

    public function delete() {
        $id = $_GET['id'];
        $this->view->output($this->model->delete($id));
    }

    //default method
    protected function index() {
        $this->view->output($this->model->index($this->logged_in_user));
    }

    public function view() {

        $this->view->output($this->model->view($this->logged_in_user));
    }

    public function viewM() {

        $this->view->output($this->model->view($this->logged_in_user));
    }

    public function update() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->updated($id));
        }
        else
            $this->view->output($this->model->update($id));
    }

}

/* End of file target.php */
    /* Location: ./target.php */