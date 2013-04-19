<?php
require_once(dirname(__FILE__) . '../../../config.php');

require_login();

$params = array();
$PAGE->set_context($context);

echo $OUTPUT->header();
echo "{Content Here}";
echo $OUTPUT->footer();
