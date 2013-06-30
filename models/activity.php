<?php

require_once SYSPATH . 'DbConnectionRegistry.php';
require_once SYSPATH . 'formHelper.php';

class ActivityModel extends BaseModel {
    

// @todo move to own helper file
    private function html_select_options($options, $selected_id) {
        $html = '';
        foreach ($options as $option) {
            if ($option->id == $selected_id) {
                $html .= '<option value="' . $option->id . '" selected>';
            } else {
                $html .= '<option value="' . $option->id . '">';
            }
            $html .= $option->description . '</option>';
    }}


   public function create() {
        $this->viewModel->set("pageTitle", "Create Activity");
        
        $Targetsql = "select id, title, moodle_user_id from target;";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($Targetsql, 'OBJECT');

        
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }

        $this->viewModel->set("pageTitle", "Create Activity");
        $this->viewModel->set("heading1", "Create Activity");
        $this->viewModel->set("targets", $results);
        
        $priority_types = $this->get_priority_types();
        $this->viewModel->set("priority_options", html_select_options($priority_types, NULL));
        
        return $this->viewModel;

   }
   
   
   


    public function created() {
           $moodle_user_id = $_SESSION['USER']->id; 
        $this->viewModel->set("pageTitle", "MyCPD Hub");

        $title = $_POST['title'];
        $target_id = $_POST['target_id'];
        $description = $_POST['description'];
        $cpdtitle = $_POST['cpdtitle'];
        $teacherOutcome = $_POST['teacherOutcome'];
        $studentOutcome = $_POST['studentOutcome'];
        $priority = $_POST['priority'];
        $activity_date = $_POST['activity_date'];

echo "1) ".$title."<br>";
echo "2) ".$description."<br>";
echo "3) ".$target_id."<br>";
echo "4) ".$cpdtitle."<br>";
echo "5) ".$teacherOutcome."<br>";
echo "6) ".$studentOutcome."<br>";
echo "7) ".$priority."<br>";
echo "8) ".$activity_date."<br>";



 $sql = "INSERT INTO activity 
                (
                moodle_user_id,
                title,
                target_id,
                provider,
                learning_outcomes,
                impact,
                priority_type_id,
                planned_date
                ) VALUES (
               '{$moodle_user_id}',
                '{$title}',
                '{$target_id}',
                '{$cpdtitle}',
                '{$teacherOutcome}',
                '{$studentOutcome}',
                '{$priority}',
                '{$activity_date}')";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
echo $sql;       
 $dbConn->execute($sql);

header('Location: /moodle/MyCPD/activity/view/');


    }

    public function delete($id) {
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        
        // first, check that activity belongs to logged-in user
        $sql = "
            SELECT  count(*) AS row_count
            FROM    activity 
            WHERE   id = {$id} AND moodle_user_id = {$_SESSION['USER']->id}";
        $results = $dbConn->get_all($sql,'OBJECT');
        $row_count = $results[0]->row_count;
        if ($row_count < 1) {
            return 'not_authorised';
        }
        
        $sql2 = "DELETE FROM activity WHERE id = '{$id}'";
        $dbConn->execute($sql2);
    }
    
    private function get_priority_types() {
        $sql = "SELECT id, description FROM priority_type ORDER BY sort_order";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        return $results;
    }

    /**
     * 
     * @todo check whether only current targets required
     * or maybe use option group to display archived at bottom of list
     */
    private function get_targets($logged_in_user) {
        /* @todo add IN clause to select only given user's targets */
        $sql = "SELECT  id, title AS description 
                FROM    target
                ORDER BY 2";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        return $results;
    }

    public function index($logged_in_user) {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Activities");
        return $this->viewModel;
    }
    
    public function update($id){
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $sql = "
            UPDATE  activity
            SET     title = '{$_POST['title']}',
                    /*provider = '{$_POST['provider']}',*/
                    learning_outcomes = '{$_POST['learning_outcomes']}',
                    planned_date = '{$_POST['planned_date']}',
                    /*cpd_type_id = '{$_POST['cpd_type_id']}',*/
                    target_id = '{$_POST['target_id']}',
                    impact = '{$_POST['impact']}',
                    priority_type_id = '{$_POST['priority_type_id']}',
                    /*evaluation_url = '{$_POST['evaluation_url']}',*/
                    /*hours_of_cpd = '{$_POST['hours_of_cpd']}',*/
                    /*rating = '{$_POST['rating']}'*/
                    completed_date = '{$_POST['completed_date']}'
            WHERE   id = {$id}";
        $dbConn->execute($sql);
    }

    public function updateForm($id) {
        $dbConn = DbConnectionRegistry::getInstance('mycpd'); 
        
        // first, check that activity belongs to logged-in user
        $sql = "
            SELECT  count(*) AS row_count
            FROM    activity 
            WHERE   id = {$id} AND moodle_user_id = {$_SESSION['USER']->id}";
        $results = $dbConn->get_all($sql,'OBJECT');
        $row_count = $results[0]->row_count;
        if ($row_count < 1) {
            return 'not_authorised';
        }
        
        $sql2 = "SELECT * FROM v_activity WHERE id = {$id}";
        $results2 = $dbConn->get_all($sql2, 'OBJECT');
        if (empty($results2)) {
            // initialize array to prevent php warning msg.
            $results2 = Array();
        }
        $activity = $results2[0];
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("activity", $activity);

        $targets = $this->get_targets();
        $selected_target = $activity->target_id;
        $this->viewModel->set("target_options", html_select_options($targets, $selected_target));

        $priority_types = $this->get_priority_types();
        $selected_priority = $activity->priority_type_id;
        $this->viewModel->set("priority_options", html_select_options($priority_types, $selected_priority));

        return $this->viewModel;
    }

    public function view($logged_in_user) {
        
        //@todo academic_year move to global constant
        $academic_year = "2012/09/03 00:00:00";
        $sql = "
            SELECT  * 
            FROM    v_activity 
            WHERE   moodle_user_id = '{$logged_in_user}'
                    
                    ";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Activities");
        $this->viewModel->set("activities", $results);

        return $this->viewModel;
    }


    public function archive($logged_in_user) {
        //@todo academic_year move to global constant
        $academic_year = "2012/09/03 00:00:00";
        $sql = "
            SELECT  * 
            FROM    v_activity 
            WHERE   moodle_user_id = '{$logged_in_user}' 
                    AND planned_date < '{$academic_year}'
                ";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        $this->viewModel->set("heading1", "Activities");
        $this->viewModel->set("activities", $results);

        return $this->viewModel;
    }


}

/* End of file activity.php */
/* Location: ./models/activity.php */
