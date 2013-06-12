<?php

/**
 * Controller for manager admin, e.g. assigning moodle users as managers, 
 * creating groups and assigning users to these groups.
 * 
 * Loads models and views required by manager
 */
class AdminManagerController extends BaseController {
    
    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);

        //create the model object
        require("models/adminManager.php");
        $this->model = new AdminManagerModel();
        /**
         * @todo Accessible by admin only
         */
    }
    
    /**
     * Create group to be used to assign users
     */
    public function createGroup(){
        $this->view->output($this->model->createGroup());
    }
    
    /**
     * Assign moodle user as manager
     */
    public function createManager() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->view->output($this->model->createManager());
            header('Location: http://localhost/moodle/MyCPD/adminManager/viewManagers/');
        }
        else {
            $this->view->output($this->model->createManagerForm());
        }
    }
    
    public function deleteGroup(){
        $id = $_GET['id'];
        $this->view->output($this->model->deleteGroup());
    }

    public function deleteManager() {
        $moodle_user_id = $_GET['id'];
        $this->view->output($this->model->deleteManager($moodle_user_id));
    }
    
    /**
     *  @todo - get $rows from database 
     */
    public function getUsers(){
        $search_term = $_GET['term']; // this is search term
        $this->model->getUsers($search_term);
    }
    
    //default method
    protected function index()
    {
        $this->view->output($this->model->index());
    }
    
    /**
     * Update existing group, including adding/removing users
     */
    public function updateGroup() {
        $id = $_GET['id'];
        $this->view->output($this->model->updateGroup($id));
    }
    
    public function updateManager() {
        $id = $_GET['id'];
        $this->view->output($this->model->updateManager($id));
    }
    
    public function viewGroups(){
        $manager_id = $_GET['id'];
        $this->view->output($this->model->view($manager_id));
    }
    
    public function viewManagers(){
        $this->view->output($this->model->viewManagers());
    }
}
/* End of file adminManager.php */
/* Location: ./adminManager.php */
