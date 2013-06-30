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
        } else {
            $this->view->output($this->model->create($this->logged_in_user));
        }
    }

    public function delete() {
        $id = $_GET['id'];
        if($this->model->delete($id) == 'not_authorised'){
            /* @todo create error view */
            echo "ERROR: You are not the owner of this activity";
        } else {
            header('Location:' . BASEURL . 'activity/view/');
        }
    }

    //default method
    protected function index() {
        header('Location:' . BASEURL . 'activity/view/');
    }

    public function update() {
        $id = $_GET['id'];
        if($this->model->updateForm($id) == 'not_authorised'){
            /* @todo create error view */
            echo "ERROR: You are not the owner of this activity";
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $this->model->update($id);
                header('Location:' . BASEURL . 'activity/view/');
            } else {
                $this->view->output($this->model->updateForm($id));
            }
        }
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
