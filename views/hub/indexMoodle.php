<?php
require_once('/srv/www/htdocs/moodle/config.php');
require_login();



$context = get_context_instance(CONTEXT_SYSTEM);  

// Start setting up the page
$params = array();
$PAGE->set_context($context);

$PAGE->set_url($CFG->wwwroot.'/MyCPD/views/template.php');

$PAGE->navbar->add('MyCPD',new moodle_url('/MyCPD/views/hub/index.php'));
$PAGE->navbar->add('Hub',new moodle_url('/MyCPD/views/hub/index.php'));

$PAGE->set_pagetype('my-index');
$PAGE->blocks->add_region('content');
$PAGE->set_title('MyCPD');

echo $OUTPUT->header();

echo "<h1>MyCPD Hub</h1>
<p>-- insert nav bar here --</p>
<p>-- insert message of the day here --</p>
<p>-- insert content here --</p>";

echo $OUTPUT->footer();

