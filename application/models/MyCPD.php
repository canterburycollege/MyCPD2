<?php
/**
 * Connect to MyCPD
 *
 * @author rhardy
 */

//Get 'HOSTNAME' 'USERNAME' and 'PASSWORD' credentials
require_once '/srv/www/mycpd_config/database.php';

require_once 'MySQL.php';

class MyCPD extends MySQL {

    protected $conn;


    public function  __construct() {
        // connect to MyCPD database
        $this->connect(HOSTNAME, USERNAME, PASSWORD, 'mycpd');
  
    }

    

}
?>
