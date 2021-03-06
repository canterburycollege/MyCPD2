<?php

/**
 * Class used to handle user authenication and get required moodle variables
 *
 * @author rhardy
 */
class Authentication {
    
    public function __construct(){
        $this->set_moodle_vars();
    }
    
    private function set_moodle_vars(){

        //require '/../../config.php';
        //require '/srv/www/htdocs/moodle/config.php';

        require MOODLECONFIGFILE;

        if($USER->id == 0){
            // goto moodle login page
            require_login();
        } 
        // set moodle vars
        $_SESSION['USER'] = $USER;
        $_SESSION['OUTPUT'] = $OUTPUT;
        $_SESSION['PAGE'] = $PAGE;
    }
}

?>
