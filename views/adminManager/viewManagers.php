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

<?php include_once TEMPLATEPATH . 'nav_bar_admin.php'; ?>

<h1>Maintain Managers</h1>
<div id="div_managers">
    <table id="table_detail">
        <thead>
            <tr>
                <th>Manager</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewModel->get('managers') as $row): ?>
                <tr>
                    <td><?= $row->displayname ?></td>
                    <td><?= $row->description ?></td>
                    <td><a href="<?= BASEURL ?>adminManager/updateManager/<?= $row->moodle_user_id ?>">Update</a> 
                        | 
                        <a href="<?= BASEURL ?>adminManager/deleteManager/<?= $row->moodle_user_id ?>">Delete</a>
                        | 
                        <a href="<?= BASEURL ?>adminManager/viewGroups/<?= $row->moodle_user_id ?>">View Groups</a> 
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br/>
    <a href="<?= BASEURL ?>adminManager/createManager/">Add New Manager</a>
</div>