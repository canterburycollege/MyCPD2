<?php

/**
 * Class used to handle user authenication
 *
 * @author rhardy
 */
class Authentication {
    
    /**
     *
     * @moodle_user object 
     */
    private $moodle_user;
    
    public function __construct(){
        $this->set_moodle_user();
    }
    
    public function get_moodle_user(){
        return $this->moodle_user;
    }
    
    private function set_moodle_user(){
        require '/../../config.php';
        if($USER->id == 0){
            // goto moodle login page
            require_login();
        } else {
            // logged in as user: {$USER->id};
            $this->moodle_user = $USER;
        }
    }
}

?>
