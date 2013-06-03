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
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewModel->get('targets') as $row): ?>
                    <tr>
                        <td><a href="../../activity/view/<?= $row->id ?>"><?= $row->title ?></a></td>
                        <td><?= $row->title_ext ?></td>
                        <td><?= $row->description ?></td>
                        <td><?= $row->status ?></td>
                        <td><?= $row->target_date ?></td>
                        <td><a href="../../target/update/<?= $row->id ?>">(Update)</a> </td>
                        <td><a href="../../target/delete/<?= $row->id ?>">(Delete)</a> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    
    <a href ="../../target/create">Create a new target</a>