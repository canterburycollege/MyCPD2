<script type="text/javascript" src="<?= BASEURL ?>assets/js/DataTables/media/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        filter = $('#table_detail').dataTable({
            "bJQueryUI": true,
             "bPaginate": true });
        //auto fill fiter from get for linking. 
        filter.fnFilter('');
    });
</script>

<?php include MOODLECONFIGFILE ?>
<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h2><img src="<?= BASEURL . '/assets/pix/contract.png' ?>" alt="Mandatory icon">All Staff Mandatory Training - <?php foreach ($viewModel->get('section') as $row): ?><?= $row->description ?> <?php endforeach; ?></h2>

 
<div id="results_manager">
    <form>
        <table id="table_detail">
            <thead>
                <tr>
                    <th width="200px">Name</th>
                    <th width="500px">Course name</th>
                    <th>Score</th>
                    <th>Status</th>
                    <th>Result</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewModel->get('mandatory') as $row): ?>
                    <tr>
                        <td><?= $row->displayname ?></td>
                        <td><a href="<?= $CFG->wwwroot?>/course/view.php?id=<?= $row->course ?>"><?= $row->title; ?></a></td>
                        <td><?= $row->value ?></td>
                        <?php //todo: add grey for not attempted. ?>
                        <td align='center'><?php if($row->value >=80){ echo "<img src='".BASEURL."assets/pix/green.png' height='24' width='24'>"; } else { echo "<img src='".BASEURL."assets/pix/red.png' height='24' width='24'>";} ?></td>
                        <td align='center'><?php if($row->value >=80){ echo "Pass"; } else { echo "Fail";} ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>

