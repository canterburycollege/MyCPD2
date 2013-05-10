
<?php
/**
 * uses improved MySQL extension (mysqli)
 *
 * @author rhardy
 */

// require database credentials
require_once 'c:\wamp\mycpd2_config\database.php';


class MySQL extends mysqli {
    
    protected $conn;
    
    public function __construct($host,$user,$pwd,$db) {
        parent::__construct($host,$user,$pwd,$db);
        if ( $link = mysqli_connect($host, $user, $pwd, $db) ) {
            $this->conn = $link;
        } else {
            die('Connect Error (' . mysqli_connect_errno($this->conn) . ') '
            . mysqli_connect_error());
        }
    } 
   

    public function execute($sql){
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($this->conn));
        }

        return $result;
    }
    
    
    public function get(){
        // return array of row objects
    }
    
    public function get_all($sql){
        $array = NULL;
        $result = $this->execute($sql);

        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }

        $result->free_result();

        return $array;
    }
    

    public function get_table_info($table_name){
        $sql = "
            SHOW COLUMNS FROM $table_name";

        $array = NULL;
        $result = $this->execute($sql);

        while ( $row = $result->fetch_assoc() ) {
            $field_name = $row['Field'];
            $array[$field_name] = $row;
        }
        $result->free_result();

        return $array;
    }
    


    /**
     * 
     * @param type $table_name
     * @param type $row Array of column => value
     */
    public function replace_row($table_name,$row){
        $col_names = null;
        $i = 1;
        $values = null;

        foreach ($row as $col_name => $value) {
            $col_names .= $col_name;
            $value = mysqli_real_escape_string($this->conn,$value);
            
            $values .= "'" . $value . "'";
            
            if ($i < count($row)) {
                $col_names .= ',';
                $values .= ',';
            }

            $i++;
        }

        
        $sql = "
            REPLACE INTO $table_name ( $col_names )
            VALUES ( $values )";

        $this->execute($sql);
    }
    
    
    public function truncate_table($table_name) {
        $sql = "
            TRUNCATE TABLE $table_name";
        
        $this->execute($sql);
    }

} 

/* End of file MySQL.php */
/* Location: ./system/database/MySQL.php */