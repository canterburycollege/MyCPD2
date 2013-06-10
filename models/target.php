<?php

require_once SYSPATH . 'DbConnectionRegistry.php';

class TargetModel extends BaseModel {

    public function create() {
        $this->viewModel->set("pageTitle", "Create Target");
        $employee_id = 1;

        $sql = "SELECT * FROM target_status";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');

        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        $this->viewModel->set("pageTitle", "Create target");
        $this->viewModel->set("heading1", "Create target");
        $this->viewModel->set("targets", $results);
        return $this->viewModel;
    }

    public function created() {
        $moodle_user_id = $_SESSION['USER']->id;
        $this->viewModel->set("pageTitle", "Create Target");
        $employee_id = $_SESSION['USER']->id;

        $title = $_POST['title'];
        $title_ext = $_POST['title_ext'];
        $description = $_POST['description'];
        $target_date = $_POST['target_date'];
        $status = $_POST['status'];

        $sql = "INSERT INTO target 
                (title,
                title_ext,
                description,
                target_date,
                status_id,
                moodle_user_id) VALUES ('{$title}','{$title_ext}','{$description}', '{$target_date}', '{$status}', '{$moodle_user_id}')";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
        header('Location: /moodle/MyCPD/target/view/');
    }

    public function delete($id) {
        $sql = "DELETE FROM target WHERE id = '{$id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);

        header('Location: /moodle/MyCPD/target/view/');
    }

    //data passed to the home index view
    public function index() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Targets");
        return $this->viewModel;
    }

    public function view() {
        $moodle_user_id = $_SESSION['USER']->id;

        $sql = "SELECT * FROM v_targets_with_status WHERE moodle_user_id = {$moodle_user_id}";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Targets");
        $this->viewModel->set("targets", $results);

        return $this->viewModel;
    }

    public function update($id) {
        $moodle_user_id = $_SESSION['USER']->id;

        $sql = "SELECT * FROM v_targets_with_status WHERE moodle_user_id = {$moodle_user_id} AND id = {$id}";
        $sql2 = "SELECT * FROM target_status";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        $results2 = $dbConn->get_all($sql2, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        if (empty($results2)) {
            // initialize array to prevent php warning msg.
            $results2 = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Update target");
        $this->viewModel->set("targets", $results);
        $this->viewModel->set("targets2", $results2);
        return $this->viewModel;
    }

    public function updated($id) {
        $moodle_user_id = $_SESSION['USER']->id;
        $title = $_POST['title'];
        $title_ext = $_POST['title_ext'];
        $description = $_POST['description'];
        $target_date = $_POST['target_date'];
        $status = $_POST['status'];


        $sql = "UPDATE target SET
                title = '{$title}',
                title_ext = '{$title_ext}',
                description = '{$description}',
                target_date = '{$target_date}',
                status_id = '{$status}'
                WHERE moodle_user_id = {$moodle_user_id} AND id = {$id}";


        $dbConn = DbConnectionRegistry::getInstance('mycpd');

        $dbConn->execute($sql);
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        header('Location: /moodle/MyCPD/target/view/');
    }

}

/* End of file target.php */
/* Location: ./models/target.php */
