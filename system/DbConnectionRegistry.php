<?php

/**
 * Registry of database connections.
 * 
 * Provides database connection using the Singleton pattern.
 *
 * @author rhardy
 */
class DbConnectionRegistry {
    private static $register = array();
    
    private function __construct(){}
    
    private static function connect($db){
        // require database credentials
        require_once CONFIGPATH . 'database.php';
        // require database driver class
        require_once 'MySQL.php';
        
        switch ($db){
            case 'mycpd':
                $dbConn = new MySQL(MYCPD_HOSTNAME, MYCPD_USERNAME, MYCPD_PASSWORD, MYCPD_DATABASE);
                break;
           case 'moodle':
                $dbConn = new MySQL(MOODLE_HOSTNAME, MOODLE_USERNAME, MOODLE_PASSWORD, MOODLE_DATABASE);
                break;
            case 'host':
                // connection at host level, rather than specific database
                // to enable distributed queries across several databases
                $dbConn = new MySQL(HOST_HOSTNAME, HOST_USERNAME, HOST_PASSWORD);
                break;
            default:
                $dbConn = NULL;
                echo '<h1>Error in DbConnectionRegistry: Unable to connect to 
                    database (' . $db . '<h1>';
        }
        return $dbConn;
    }
    
    /**
     * Returns instance of database connection.
     * 
     * If instance exists then return it, else create a new one.
     * 
     * @param string $db Name of database/schema
     * @return resource Database connection
     */
    public static function getInstance($db){
        if (!array_key_exists($db, self::$register)) {
            self::$register[$db] = self::connect($db);
        }
        return self::$register[$db];
    }
}

?>
