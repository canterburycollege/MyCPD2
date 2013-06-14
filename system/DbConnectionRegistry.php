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
        switch ($db){
            case 'mycpd':
                // require database credentials
                require_once CONFIGPATH . 'database.php';
                require_once 'MySQL.php';
                $dbConn = new MySQL(HOSTNAME, USERNAME, PASSWORD, DATABASE);
                break;
           case 'moodle':
                // require database credentials
                require_once CONFIGPATH . 'moodle-database.php';
                require_once 'MySQL.php';
                $dbConn = new MySQL(HOSTNAME, USERNAME, PASSWORD, DATABASE);
                break;
            case 'host':
                // connection at host level, rather than specific database
                // use to enable distributed queries across several databases
                // require database credentials
                require_once CONFIGPATH . 'host-database.php';
                require_once 'MySQL.php';
                $dbConn = new MySQL(HOSTNAME, USERNAME, PASSWORD);
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
