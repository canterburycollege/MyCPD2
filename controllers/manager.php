<?php

/**
 * Controller for manager, e.g. viewing CPD records of specified staff
 * 
 * Access is restricted to users who have groups of staff attached to them
 * 
 * Loads models and views required by manager
 */
class ManagerController extends BaseController {

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        //create the model object
        require("models/manager.php");
        $this->model = new AdminManagerModel();
        // check that logged in user is authorised for this controller
        $this->authorisation();
    }

    /**
     * Check that logged-in user has any groups attached
     */
    public function authorisation() {
        if (!$this->model->authorisation($_SESSION['USER'])) {
            exit('<h3>Error: You [' . $_SESSION['USER']->username .
            '] are not authorised to view this page</h3>');
        }
    }
    
    //default method
    protected function index() {
        header('Location: ' . BASEURL . 'manager/viewActivities/');
    }
    
    public function viewActivities(){
        $manager = $this->model->authorisation($_SESSION['USER']);
        echo $manager;
        //$this->view->output($this->model->viewActivities($manager));
    }
}

/* End of file manager.php */
/* Location: ./manager.php */
