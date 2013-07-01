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

<h1>Maintain Sections</h1>
<div id="div_sections">
    <table id="table_detail">
        <thead>
            <tr>
                <th>Section</th>
                <th>Faculty</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewModel->get('sections') as $row): ?>
                <tr>
                    <td><?= $row->section ?></td>
                    <td><?= $row->faculty ?></td>
                    <td width="15%"><a href="<?= BASEURL ?>admin/updateSection/<?= $row->id ?>">Update</a> 
                        | 
                        <a href="<?= BASEURL ?>admin/deleteSection/<?= $row->id ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br/>
    <a href="<?= BASEURL ?>admin/createSection/">Add New Section</a>
</div>