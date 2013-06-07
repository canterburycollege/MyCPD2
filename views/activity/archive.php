<script type="text/javascript" src="<?= BASEURL ?>/assets/js/DataTables/media/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function(){
        filter = $('#table_detail').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"});
        //auto fill fiter from get for linking. 
        filter.fnFilter( '<?php echo $_GET['id']; ?>' ); 
    });
    
</script>
<?php foreach ($viewModel->get('news') as $row): ?>
 <div class="news"><?= $row->description?></div>
<?php endforeach; ?>   
<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/plan2.png' ?>" alt="Target icon"><?= $viewModel->get('heading1'); ?></h1>Archive | <a href="<?= BASEURL ?>activity/view/">Current</a>
<div id="div_activities">
    <table id="table_detail">
        <thead>
            <tr>
                <th>Target this CPD addresses</th>
                <th>Title of CPD activity/event</th>
                <th>Intended Learning Outcomes for teacher</th>
                <th>Intended impact on student outcomes</th>
                <th>Priority level</th>
                <th>Target Date</th>
                <th>Completed?</th>
                <th>Evaluation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewModel->get('activities') as $row): ?>
                <tr>
                    <td><?= $row->target ?></td>
                    <td><?= $row->title ?></td>
                    <td><?= $row->learning_outcomes ?></td>
                    <td><?= $row->impact ?></td>
                    <td><?= $row->priority_type ?></td>
                    <td><?= $row->planned_date ?></td>
                    <td><?= $row->completed_date ?></td>
                    <td><?= $row->evaluation_url ?></td>
                    <td><a href="<?= BASEURL ?>activity/update/<?= $row->id ?>">Update</a> 
                        | 
                        <a href="<?= BASEURL ?>activity/delete/<?= $row->id ?>">Delete</a> 
                    </td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>