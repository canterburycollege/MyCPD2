<?php
require_once(dirname(__FILE__) . '../../../../config.php');

require_login();


$context = get_context_instance(CONTEXT_SYSTEM);


// Start setting up the page
$params = array();
$PAGE->set_context($context);
$PAGE->set_url('/my/index.php', $params);


echo $OUTPUT->header();
include ('../templates/header.php');
include ('../templates/nav_bar.php');

echo "<h2>New target added.</h2>";
echo $OUTPUT->footer();

//Redirect to targets. ?>
<meta http-equiv="refresh" content="2; url=http://webdev-04.cant-col.ac.uk/moodle/MyCPD/views/targets/"> 