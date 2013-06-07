<?php
//require_once('/srv/www/htdocs/moodle/config.php');
//require_login();
$strmymoodle = get_string('myhome');
$USER = $_SESSION['USER'];
$CONTEXT = $_SESSION['CONTEXT'];
$PAGE = $_SESSION['PAGE'];
$OUTPUT = $_SESSION['OUTPUT'];
$CONTEXT_SYSTEM = $_SESSION['CONTEXT_SYSTEM'];

print_r($CONTEXT_SYSTEM);

$userid = $USER->id;  // Owner of the page
$context = get_context_instance(CONTEXT_USER, $USER->id);
$header = "$SITE->shortname: $strmymoodle";
$context = get_context_instance(CONTEXT_SYSTEM);  // So we even see non-sticky blocks
print_r($USER);
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
?>
<script type="text/javascript" src="<?= BASEURL ?>/assets/js/DataTables/media/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        filter = $('#table_detail').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"});
        //auto fill fiter from get for linking. 
        filter.fnFilter('<?php echo $_GET['id']; ?>');
    });
</script>
<?php foreach ($viewModel->get('news') as $row): ?>
 <div class="news"><?= $row->description?></div>
<?php endforeach; ?>   
<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/target.gif' ?>" alt="Target icon"><?= $viewModel->get('heading1'); ?></h1>
<div id="div_activities">
    <form>
        <table id="table_detail">
            <thead>
                <tr>
                    <th>Target tag</th>
                    <th>Target title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date Due</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewModel->get('activities') as $row): ?>
                    <tr>
                        <td><a href="../../activity/view/<?= $row->id ?>"><?= $row->title ?></a></td>
                        <td><?= $row->title_ext ?></td>
                        <td><?= $row->description ?></td>
                        <td><?= $row->status ?></td>
                        <td><?= $row->target_date ?></td>
                        <td>
                            <input type="button" value="Edit" name="edit" id="edit">
                            <input type="button" value="Delete" name="delete" id="delete">
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>



<?php
echo $OUTPUT->footer();