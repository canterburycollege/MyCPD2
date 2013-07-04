<script type="text/javascript" src="<?= BASEURL ?>/assets/js/DataTables/media/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        filter = $('#table_detail').dataTable({
            "bJQueryUI": true,
             "bPaginate": false,
        });
        //auto fill fiter from get for linking. 
        filter.fnFilter('<?php echo $_GET['id']; ?>');
       
    });
</script>

<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><?= $viewModel->get('heading1'); ?></h1>
<p>-- {Elain's MyCPD intoduction here} --</p>
<br>
<div id="mytargets">
<h2>My Targets summary</h2>
<div id="div_activities">
    <form>
        <table id="table_detail">
            <thead>
                <tr>
                    <th>Target tag</th>
                    <th>Target title</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewModel->get('targets') as $row): ?>
                    <tr>
                        <td><a href="activity/view/<?= $row->id ?>"><?= $row->title ?></a></td>
                        <td><?= $row->title_ext ?></td>
                        
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
    
    <a href ="target/create">Create a new target</a>
    
</div>