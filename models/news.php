<?php

require_once SYSPATH . 'DbConnectionRegistry.php';

class NewsModel extends BaseModel {

    public function index() {

        return $this->viewModel;
    }

    public function view() {
        $employee_id = 1;

        $sql = "SELECT * FROM news";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        $this->viewModel->set("news", $results);

        return $this->viewModel;
    }

    public function update() {
        $sql = "SELECT * FROM news";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');


        $sql = "SELECT * FROM news_items";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results2 = $dbConn->get_all($sql, 'OBJECT');

        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        $this->viewModel->set("news", $results);
        $this->viewModel->set("news_items", $results2);
        return $this->viewModel;
    }

    public function updated() {
        $description = mysql_real_escape_string($_POST['description']);

        $sql = "UPDATE news SET
                description = '{$description}'";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        header('Location: /moodle/MyCPD/');
    }

    public function delete($id) {
        $sql = "DELETE FROM news_items WHERE id = '{$id}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
        header('Location: /moodle/MyCPD/news/update/');
    }

    public function updateni($id) {
        $sql = "SELECT * FROM news_items";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');

        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        $this->viewModel->set("news_items", $results);
        return $this->viewModel;
    }

    public function updatedni($id) {
        $description = mysql_real_escape_string($_POST['description']);

        $sql = "UPDATE news_items SET
                description = '{$description}' WHERE id = '{$id}'";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        header('Location: /moodle/MyCPD/news/update/');
    }

        public function add() {


        return $this->viewModel;
    }
    
    public function added() {
        $description = mysql_real_escape_string($_POST['description']);

        $sql = "INSERT news_items SET
                description = '{$description}'";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $dbConn->execute($sql);
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        header('Location: /moodle/MyCPD/news/update/');
    }

}

/* End of file activity.php */
/* Location: ./models/activity.php */
