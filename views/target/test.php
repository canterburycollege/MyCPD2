<?php
require_once('/srv/www/htdocs/moodle/config.php');
require_login();

$strmymoodle = get_string('myhome');
$userid = $USER->id;  // Owner of the page
$context = get_context_instance(CONTEXT_USER, $USER->id);
$header = "$SITE->shortname: $strmymoodle";
$context = get_context_instance(CONTEXT_SYSTEM);  // So we even see non-sticky blocks

// Start setting up the page
$params = array();
$PAGE->set_context($context);
$PAGE->set_url('/my/index.php', $params);
$PAGE->set_pagelayout('mydashboard');
$PAGE->set_pagetype('my-index');
$PAGE->blocks->add_region('content');
$PAGE->set_title($header);
$PAGE->set_heading($header);


echo $OUTPUT->header();

echo $OUTPUT->blocks_for_region('content');

echo $OUTPUT->footer();
