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
     * Create group to be used to assign new group to manager
     */
    public function createGroup(){
        $manager = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->createGroup($manager);
            header('Location: ' . BASEURL . 'adminManager/viewManagers');
        }
        else {
            $this->view->output($this->model->createGroupForm($manager));
        }
    }
    
    /**
     * Create group_detail, used to assign moodle users to a group
     */
    public function createGroupDetail(){
        $group = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->createGroupDetail($group);
            header('Location: ' . BASEURL . 'adminManager/viewManagers');
        }
        else {
            $this->view->output($this->model->createGroupDetailForm());
        }
    }
    
    /**
     * Assign moodle user as manager
     */
    public function createManager() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->createManager();
            header('Location: ' . BASEURL . 'adminManager/viewManagers');
        }
        else {
            $this->view->output($this->model->createManagerForm());
        }
    }
    
    public function deleteGroup(){
        $id = $_GET['id'];
        $this->view->output($this->model->deleteGroup($id));
    }

    public function deleteManager() {
        $moodle_user_id = $_GET['id'];
        $this->model->deleteManager($moodle_user_id);
        header('Location: ' . BASEURL . 'adminManager/viewManagers');
    }
    
    /**
     * Get list of moodle users and format for use in jQuery autocomplete
     */
    public function getMoodleUsers(){
        $search_term = $_GET['term']; // this is search term
        $users = $this->model->getMoodleUsers($search_term);
        echo json_encode($users);
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
        $moodle_user_id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->updateManager($moodle_user_id);
            header('Location: ' . BASEURL . 'adminManager/viewManagers');
        }
        else {
            $this->view->output($this->model->updateManagerForm($moodle_user_id));
        }
    }
    
    public function viewGroups(){
        $manager = $_GET['id'];
        $this->view->output($this->model->viewGroups($manager));
    }
    
    public function viewManagers(){
        $this->view->output($this->model->viewManagers());
    }
}
/* End of file adminManager.php */
/* Location: ./adminManager.php */
