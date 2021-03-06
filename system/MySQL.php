
<?php

/**
 * uses improved MySQL extension (mysqli)
 *
 * @author rhardy
 */
class MySQL extends mysqli {

    protected $conn;

    public function __construct($host, $user, $pwd, $db=NULL) {
        parent::__construct($host, $user, $pwd, $db);
        if ($link = mysqli_connect($host, $user, $pwd, $db)) {
            $this->conn = $link;
        } else {
            die('Connect Error (' . mysqli_connect_errno($this->conn) . ') '
                    . mysqli_connect_error());
        }
    }

    public function execute($sql) {
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($this->conn));
        }

        return $result;
    }

    public function get() {
        // return array of row objects
    }

    public function get_all($sql, $rowType = 'ARRAY') {
        $array = NULL;
        $result = $this->execute($sql);

        switch ($rowType) {
            case 'ARRAY':
                while ($row = $result->fetch_assoc()) {
                    $array[] = $row;
                }
                break;
            case 'OBJECT':
                while ($row = $result->fetch_object()) {
                    $array[] = $row;
                }
                break;
            default:
                break;
        }

        $result->free_result();

        return $array;
    }

    /**
     * 
     * @param type $table_name
     * @param type $row Array of column => value
     */
    public function replace_row($table_name, $row) {
        $col_names = null;
        $i = 1;
        $values = null;

        foreach ($row as $col_name => $value) {
            $col_names .= $col_name;
            $value = mysqli_real_escape_string($this->conn, $value);

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

}

/* End of file MySQL.php */
/* Location: ./system/database/MySQL.php */
