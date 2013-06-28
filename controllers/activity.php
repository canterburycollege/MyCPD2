<?php

/**
 * Controller for activity
 * 
 * Loads models and views required by activity
 * 
 */
class ActivityController extends BaseController {
    
    private $logged_in_user;

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        // set logged in user
        $USER = $_SESSION['USER'];
        $this->logged_in_user = $USER->id;
        //create the model object
        require("models/activity.php");
        $this->model = new ActivityModel();
    }

    public function create() {

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->created());
        }
        else
           // $this->view->output($this->model->create());

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

    public function update() {
        $id = $_GET['id'];
        $this->view->output($this->model->update($id));
    }

    public function view() {
        $this->view->output($this->model->view($this->logged_in_user));
    }

    public function archive() {
        $this->view->output($this->model->archive($this->logged_in_user));
    }

}

/* End of file activity.php */
/* Location: ./activity.php */
