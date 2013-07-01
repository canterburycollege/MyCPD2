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

<h1>Maintain Faculties</h1>
<div id="div_faculties">
    <table id="table_detail">
        <thead>
            <tr>
                <th>Faculty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewModel->get('faculties') as $row): ?>
                <tr>
                    <td><?= $row->description ?></td>
                    <td><a href="<?= BASEURL ?>admin/updateFaculty/<?= $row->id ?>">Update</a> 
                        | 
                        <a href="<?= BASEURL ?>admin/deleteFaculty/<?= $row->id ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br/>
    <a href="<?= BASEURL ?>admin/createFaculty/">Add New Faculty</a>
</div>