<?php
/**
 * uses improved MySQL extension (mysqli)
 *
 * @author rhardy
 */


abstract class MySQL extends mysqli {

    public function close()
    {
        mysqli_close($this->conn);
    } // end function



    public function connect($host,$user,$pwd,$db)
    {
        if ( $link = mysqli_connect($host, $user, $pwd, $db) ) {
            $this->conn = $link;
        } else {
            die('Connect Error (' . mysqli_connect_errno($this->conn) . ') '
            . mysqli_connect_error());
        }
    } // end function



    public function execute($sql)
    {
        $result = mysqli_query($this->conn,$sql);
        if (!$result) {
            die('Invalid query: ' . mysqli_error($this->conn));
        }

        return $result;
    } // end function


    public function get_all($sql)
    {
        $array = NULL;
        $result = $this->execute($sql);

        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }

        $result->free_result();

        return $array;
    }


    public function get_table_info($table_name)
    {
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


    public function replace_row($table_name,$row)
    {
        // $row is an array of column => value

        $col_names = null;
        $i = 1;
        $values = null;

        foreach ($row as $col_name => $value) {
            $col_names .= $col_name;

            $values .= "'" . mysqli_real_escape_string($this->conn,$value) . "'";
            
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

} // end class
?>
