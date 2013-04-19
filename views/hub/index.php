<?php
require_once(dirname(__FILE__) . '../../../../config.php');

require_login();

$params = array();
$PAGE->set_context($context);

echo $OUTPUT->header();
include ('../templates/header.php');
include ('../templates/nav_bar.php');
echo "{Content Here}";
echo $OUTPUT->footer();
