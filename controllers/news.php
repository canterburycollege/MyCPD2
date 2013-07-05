<?php

/**
 * Controller for activity
 * 
 * Loads models and views required by activity
 * 
 */
class NewsController extends BaseController {

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/news.php");
        $this->model = new NewsModel();
    }

    public function update() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->updated($id));
        }
        else
            $this->view->output($this->model->update($id));
    }

    public function updateni() {
        $id = $_GET['id'];
        // $this->view->output($this->model->updateni($id));
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->updatedni($id));
        }
        else
            $this->view->output($this->model->updateni($id));
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->added());
        }
        else
            $this->view->output($this->model->add());
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

}

/* End of file activity.php */
/* Location: ./activity.php */
