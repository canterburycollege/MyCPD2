<script type="text/javascript" src="<?= BASEURL ?>/assets/js/DataTables/media/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function(){
        filter = $('#table_detail').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"});
        //auto fill fiter from get for linking. 
        filter.fnFilter( "<?php echo $viewModel->get('target_desc'); ?>" ); 
    });
    
    function confirmPost()
{
var agree=confirm("Are you sure you want to delete this activity?");
if (agree)
return true ;
else
return false ;
}
    
</script>

<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
 <h2><img src="<?= BASEURL . '/assets/pix/plan2.png' ?>" alt="Activitys icon">All Staff Activities - <?php foreach ($viewModel->get('section') as $row): ?><?= $row->description ?> <?php endforeach; ?></h2>

<div id="div_activities">
    <table id="table_detail">
        <thead>
            <tr>
                <th>Name</th>
                <th>Target this CPD addresses</th>
                <th>Title of CPD activity/event</th>
                <th>Intended Learning Outcomes for teacher</th>
                <th>Intended impact on student outcomes</th>
                <th>Priority level</th>
                <th>Target Date</th>
                <th>Completed?</th>
                <th>Evaluation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewModel->get('activities') as $row): ?>
                <tr>
                    <td><?= $row->displayname ?></td>
                    <td><?= $row->target ?></td>
                    <td><?= $row->title ?></td>
                    <td><?= $row->learning_outcomes ?></td>
                    <td><?= $row->impact ?></td>
                    <td><?= $row->priority_type ?></td>
                    <td><?= $row->planned_date ?></td>
                    <td><?= $row->completed_date ?></td>
                    <td><?= $row->evaluation_notes ?></td>   
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>