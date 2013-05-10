<?php
function delete_target($target_id) {
    if (check_permission($target_id))
  $connection->execute("delete from target WHERE id = '$target_id'"); 
}

delete_target($_GET['id']);

?>

Target <?php echo $_GET['id']; ?> deleted.
<meta http-equiv="refresh" content="1; url=http://webdev-04.cant-col.ac.uk/moodle/MyCPD/views/targets/success.php">











