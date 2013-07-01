  <?php $USER = $_SESSION['USER']->id; 
  
      function isAdmin($USER) {
        $sql = "
            SELECT  count(*) as row_count
            FROM    admin_user
            WHERE   moodle_user_id = '{$USER}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if ($results[0]->row_count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
  
          function isManager($USER) {
        $sql = "
            SELECT  count(*) as row_count
            FROM    manager
            WHERE   moodle_user_id = '{$USER}'";
        $dbConn = DbConnectionRegistry::getInstance('mycpd');
        $results = $dbConn->get_all($sql, 'OBJECT');
        if ($results[0]->row_count > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    ?>