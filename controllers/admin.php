<?php

/**
 * Controller for admin, e.g. assigning moodle users as managers, 
 * creating groups and assigning users to these groups.
 * 
 * Also for maintaining organisational structure i.e. faculties & sections. 
 * @todo Consider moving organisational structure to it's own Controller
 * 
 * Loads models and views required by admin
 */
class AdminController extends BaseController {

    public function __construct($action, $urlValues) {
        parent::__construct($action, $urlValues);
        //create the model object
        require("models/admin.php");
        $this->model = new AdminModel();
        // check that logged in user is authorised for this controller
        $this->authorisation();
    }

    /**
     * Get list of staff and format for use in jQuery autocomplete
     */
    public function ajaxStaffList() {
        $search_term = $_GET['term']; // this is search term
        $staff_list = $this->model->ajaxStaffList($search_term);
        echo json_encode($staff_list);
    }

    /**
     * Check that logged-in user is in admin group
     */
    public function authorisation() {
        if (!$this->model->authorisation($_SESSION['USER'])) {
            exit('<h3>Error: You [' . $_SESSION['USER']->username .
            '] are not authorised to view this page</h3>');
        }
    }

    /**
     * Create group to be used to assign new group to manager
     */
    public function createGroup() {
        $manager = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->createGroup($manager);
            header('Location: ' . BASEURL . 'admin/viewGroups/' . $manager);
        } else {
            $this->view->output($this->model->createGroupForm($manager));
        }
    }

    /**
     * Create group_detail, used to assign moodle users to a group
     */
    public function createGroupDetail() {
        $group = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->createGroupDetail($group);
            header('Location: ' . BASEURL . 'admin/viewGroupDetails/' . $group);
        } else {
            $this->view->output($this->model->createGroupDetailForm($group));
        }
    }

    /**
     * Assign moodle user as manager
     */
    public function createManager() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->createManager();
            $manager = $_POST['moodle_user_id'];
            header('Location: ' . BASEURL . 'admin/createGroup/' . $manager);
        } else {
            $this->view->output($this->model->createManagerForm());
        }
    }

    /**
     * @todo delete orphan group detail rows
     */
    public function deleteGroup() {
        $id = $_GET['id'];
        $manager_id = $this->model->deleteGroup($id);
        header('Location: ' . BASEURL . 'admin/viewGroups/'.$manager_id);
    }
    
    public function deleteGroupDetail(){
        $id = $_GET['id'];
        $group_id = $this->model->deleteGroupDetail($id);
        header('Location: ' . BASEURL . 'admin/viewGroupDetails/'.$group_id);
    }

    public function deleteManager() {
        $moodle_user_id = $_GET['id'];
        $this->model->deleteManager($moodle_user_id);
        header('Location: ' . BASEURL . 'admin/viewManagers');
    }

    //default method
    protected function index() {
        header('Location: ' . BASEURL . 'admin/viewManagers');
    }

    /**
     * Update existing group, including adding/removing users
     */
    public function updateGroup() {
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->updateGroup($id);
            $manager_id = $_POST['manager_id'];
            header('Location: ' . BASEURL . 'admin/viewGroups/'.$manager_id);
        } else {
            $this->view->output($this->model->updateGroupForm($id));
        }
    }

    public function updateManager() {
        $moodle_user_id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->updateManager($moodle_user_id);
            header('Location: ' . BASEURL . 'admin/viewManagers/');
        } else {
            $this->view->output($this->model->updateManagerForm($moodle_user_id));
        }
    }

    public function viewGroups() {
        $manager = $_GET['id'];
        $this->view->output($this->model->viewGroups($manager));
    }

    public function viewGroupDetails() {
        $group = $_GET['id'];
        $this->view->output($this->model->viewGroupDetails($group));
    }

    public function viewManagers() {
        $this->view->output($this->model->viewManagers());
    }
    
    
    /*************************************************************************
     * Organisation i.e. Faculties & Sections
     *************************************************************************/

    public function createFaculty() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->createFaculty();
            header('Location: ' . BASEURL . 'admin/viewFaculties/');
        } else {
            $this->view->output($this->model->createFacultyForm());
        }
    }
    
    public function createSection() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->createSection();
            header('Location: ' . BASEURL . 'admin/viewSections/');
        } else {
            $this->view->output($this->model->createSectionForm());
        }
    }
    
    public function deleteFaculty(){
        $id = $_GET['id'];
        $this->model->deleteFaculty($id);
        header('Location: ' . BASEURL . 'admin/viewFaculties/');
    }
    
    public function deleteSection(){
        $id = $_GET['id'];
        $this->model->deleteSection($id);
        header('Location: ' . BASEURL . 'admin/viewSections/');
    }

    public function updateFaculty(){
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->updateFaculty($id);
            header('Location: ' . BASEURL . 'admin/viewFaculties/');
        } else {
            $this->view->output($this->model->updateFacultyForm($id));
        }
    }
    
    public function updateSection(){
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->model->updateSection($id);
            header('Location: ' . BASEURL . 'admin/viewSections/');
        } else {
            $this->view->output($this->model->updateSectionForm($id));
        }
    }
    
    public function viewFaculties(){
        $this->view->output($this->model->viewFaculties());
    }
    
    public function viewSections(){
        $this->view->output($this->model->viewSections());
    }
    
}

/* End of file admin.php */
/* Location: ./admin.php */
