<?php
require_once('../../config.php');
require_once('../../../../mycpd_config/database.php');
require_once 'MySQL.php';
require_login();
$userid = $USER->id;

$title_c = mysql_real_escape_string($_POST['title']);
$title_ext_c = mysql_real_escape_string($_POST['title_ext']);
$description_c = mysql_real_escape_string($_POST['description']);
$target_status_id_c = mysql_real_escape_string($_POST['target_status']);
$target_date_c = mysql_real_escape_string($_POST['target_date']);

//Save to database.
include'MyCPD.php';
$connection = new MyCPD();
$connection->execute("INSERT INTO target (title, title_ext, description, status_id, mdl_user_id, target_date)
VALUES ('$title_c', '$title_ext_c', '$description_c','$target_status_id_c','$userid','$target_date_c')");


?>
<!-- redirect to success. -->
<meta http-equiv="refresh" content="0; url=http://webdev-04.cant-col.ac.uk/moodle/MyCPD/views/targets/success.php"> 
