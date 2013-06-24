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
        $priority_types = $this->get_priority_types();
        
        $this->viewModel->set("priority_options", $this->html_select_options($priority_types, NULL));
        
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




    }

    public function delete() {
        $this->viewModel->set("pageTitle", "MyCPD Hub");
        return $this->viewModel;
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

    public function update($id) {
        $sql = "SELECT * FROM v_activity WHERE id = {$id}";

        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if (empty($results)) {
            // initialize array to prevent php warning msg.
            $results = Array();
        }
        $activity = $results[0];
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
