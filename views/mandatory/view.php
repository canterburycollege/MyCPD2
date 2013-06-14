<script type="text/javascript" src="<?= BASEURL ?>assets/js/DataTables/media/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        filter = $('#table_detail').dataTable({
            "bJQueryUI": true,
             "bPaginate": false });
        //auto fill fiter from get for linking. 
        filter.fnFilter('<?php echo $_GET['id']; ?>');
    });
</script>

<?php include MOODLECONFIGFILE ?>
<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/contract.png' ?>" alt="Mandatory icon"><?= $viewModel->get('heading1'); ?></h1>
 
<div id="results">
    <form>
        <table id="table_detail">
            <thead>
                <tr>
                    <th>Course name</th>
                    <th>Score</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewModel->get('mandatory') as $row): ?>
                    <tr>
                        <td><a href="<?= $CFG->wwwroot?>/course/view.php?id=<?= $row->course ?>"><?= $row->title; ?></a></td>
                        <td><?= $row->value ?></td>
                        <?php //todo: add grey for not attempted. ?>
                        <td align='center'><?php if($row->value >=80){ echo "<img src='".BASEURL."assets/pix/green.png' height='24' width='24'>"; } else { echo "<img src='".BASEURL."assets/pix/red.png' height='24' width='24'>";} ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>

